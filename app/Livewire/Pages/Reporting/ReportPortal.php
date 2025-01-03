<?php

namespace App\Livewire\Pages\Reporting;

use Livewire\Component;
use App\Models\Reporting as report_portal;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class ReportPortal extends Component
{
    public $from_date;
    public $to_date;

    public function export($format)
    {
        set_time_limit(120);

        if (empty($this->from_date) || empty($this->to_date)) {
            session()->flash('error', 'Tanggal tidak boleh kosong.');
            return;
        }

        try {
            $data = report_portal::whereBetween('subscription_first_start_date', [$this->from_date, $this->to_date])
                ->orderBy('subscription_first_start_date', 'asc')
                ->get();

            if ($data->isEmpty()) {
                session()->flash('error', 'Tidak ada data yang ditemukan untuk rentang tanggal ini.');
                return;
            }

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Data Export');

            $headers = [
                'Subscriber ID',
                'License ID',
                'Product Code',
                'License Count',
                'Subscription First Start Date',
                'Command',
                'Command Processing Date',
                'Command Subscription Start Date',
                'Command Subscription End Date'
            ];
            $sheet->fromArray($headers, NULL, 'A1');

            $rows = [];
            foreach ($data as $item) {
                $rows[] = [
                    $item->subscriber_id,
                    $item->license_id,
                    $item->product_code,
                    $item->license_count,
                    $item->subscription_first_start_date,
                    $item->command,
                    $item->command_processing_date,
                    $item->command_subscription_start_date,
                    $item->command_subscription_end_date_
                ];
            }
            $sheet->fromArray($rows, NULL, 'A2');

            if ($format == 'xlsx') {
                $writer = new Xlsx($spreadsheet);
                $fileName = 'data_export_' . date('Ymd') . '.xlsx';
                $writer->save($fileName);
                return response()->download($fileName)->deleteFileAfterSend();
            } elseif ($format == 'pdf') {
                $writer = new Mpdf($spreadsheet);
                $fileName = 'report.pdf';
                return response()->stream(function () use ($writer) {
                    $writer->save('php://output');
                }, 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="report.pdf"',
                ]);
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function getReportPortal()
    {
        $start = request()->get('start', 0);
        $length = request()->get('length', 10);
        $search = request()->get('search', []);

        $searchMsisdn = $search['msisdn'] ?? '';
        $searchSubscriberId = $search['subscriberid'] ?? '';
        $startDate = $search['startDate'] ?? '';
        $endDate = $search['endDate'] ?? '';

        $query = report_portal::select([
            'subscriber_id',
            'license_id',
            'product_code',
            'license_count',
            'subscription_first_start_date',
            'command',
            'command_processing_date',
            'command_subscription_start_date',
            'command_subscription_end_date_'
        ]);

        if ($searchMsisdn) {
            $query->where('msisdn', 'like', '%' . $searchMsisdn . '%');
        }

        if ($searchSubscriberId) {
            $query->where('subscriber_id', 'like', '%' . $searchSubscriberId . '%');
        }

        if ($startDate && $endDate) {
            $query->whereBetween('command_subscription_start_date', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('command_subscription_start_date', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('command_subscription_end_date_', '<=', $endDate);
        }

        $totalData = report_portal::count();

        $reporting = $query->orderBy('subscription_first_start_date', 'desc')
            ->offset($start)
            ->limit($length)
            ->get();

        $filteredData = $query->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $filteredData,
            'data' => $reporting
        ]);
    }


    public function render()
    {
        return view('livewire.pages.reporting.report-portal');
    }
}
