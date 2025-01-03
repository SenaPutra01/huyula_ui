<?php

namespace App\Livewire\Pages\Reporting;

use Livewire\Component;
use App\Models\Reporting\ReportDigiport as ReportingReportDigiport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as PdfWriter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;

class ReportDigiport extends Component
{
    public function export($format)
    {
        set_time_limit(120); // Mengatur batas waktu eksekusi menjadi 120 detik

        if (empty($this->from_date) || empty($this->to_date)) {
            session()->flash('error', 'Tanggal tidak boleh kosong.');
            return;
        }

        try {
            // Mengambil data dengan pagination atau batching
            $data = ReportingReportDigiport::whereBetween('subscription_first_start_date', [$this->from_date, $this->to_date])
                ->orderBy('subscription_first_start_date', 'asc')
                ->get();

            if ($data->isEmpty()) {
                session()->flash('error', 'Tidak ada data yang ditemukan untuk rentang tanggal ini.');
                return;
            }

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Data Export');

            // Set header untuk spreadsheet
            $headers = [
                'Subscriber ID',
                'License ID',
                'Product Code',
                'License Count',
                'Subscription First Start Date',
                'Command',
                'Command Processing Date',
                'Command Subscription Start Date',
                'Command Subscription End Date',
                'Command Trial Intervals Quantity',
                'Command Chargeable Intervals Quantity'
            ];
            $sheet->fromArray($headers, NULL, 'A1'); // Menggunakan fromArray untuk mengisi header

            // Isi data ke dalam spreadsheet
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
                    $item->command_subscription_end_date_,
                    $item->command_trial_intervals_quantity,
                    $item->command_chargeable_intervals_quantity,
                ];
            }
            $sheet->fromArray($rows, NULL, 'A2'); // Menggunakan fromArray untuk mengisi data

            if ($format == 'xlsx') {
                $writer = new Xlsx($spreadsheet);
                $fileName = 'data_export_' . date('YmdHis') . '.xlsx';
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

    // public function getReportDigiport()
    // {
    //     $start = request()->get('start', 0);
    //     $length = request()->get('length', 10);

    //     $reporting = ReportingReportDigiport::select([
    //         'productid',
    //         'licensecount',
    //         'subscriberid',
    //         'license_count',
    //         'starttime',
    //         'endtime',
    //         'grl',
    //         'activation_code',
    //         'created_at'
    //     ])
    //         ->orderBy('starttime', 'desc')  // Pastikan kolom yang di-sort sudah terindex
    //         ->offset($start)
    //         ->limit($length)
    //         ->get();

    //     $totalData = ReportingReportDigiport::count();


    //     return response()->json([
    //         'draw' => request()->input('draw'),
    //         'recordsTotal' => $totalData,
    //         'recordsFiltered' => $totalData,
    //         'data' => $reporting,
    //     ]);
    // }

    public function getReportDigiport()
    {
        $start = request()->get('start', 0);
        $length = request()->get('length', 10);
        $search = request()->get('search', []);

        $searchMsisdn = $search['msisdn'] ?? '';
        $searchSubscriberId = $search['subscriberid'] ?? '';
        $startDate = $search['startDate'] ?? '';
        $endDate = $search['endDate'] ?? '';

        $query = ReportingReportDigiport::select([
            'productid',
            'licensecount',
            'subscriberid',
            'license_count',
            'starttime',
            'endtime',
            'grl',
            'activation_code',
            'created_at'
        ]);

        if ($searchMsisdn) {
            $query->where('msisdn', 'like', '%' . $searchMsisdn . '%');
        }

        if ($searchSubscriberId) {
            $query->where('subscriberid', 'like', '%' . $searchSubscriberId . '%');
        }

        if ($startDate && $endDate) {
            $query->whereBetween('starttime', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('starttime', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('endtime', '<=', $endDate);
        }

        $totalData = ReportingReportDigiport::count();

        $reporting = $query->orderBy('starttime', 'desc')
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
        return view('livewire.pages.reporting.report-digiport');
    }
}
