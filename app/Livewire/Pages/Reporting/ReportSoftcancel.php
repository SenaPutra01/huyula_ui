<?php

namespace App\Livewire\Pages\Reporting;

use App\Models\Reporting\ReportSoftcancel as ReportingReportSoftcancel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as PdfWriter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use Livewire\Component;

class Reportsoftcancel extends Component
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
            $data = ReportingReportSoftcancel::whereBetween('subscription_first_start_date', [$this->from_date, $this->to_date])
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

    public function render()
    {
        $reporting = ReportingReportSoftcancel::all();
        return view('livewire.pages.reporting.report-softcancel', [
            'report_softcancel' => $reporting
        ]);
    }
}
