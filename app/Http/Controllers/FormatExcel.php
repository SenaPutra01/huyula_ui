<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FormatExcel extends Controller
{
    public function softCancelFormat()
    {
        // Buat data CSV
        $csvData = [
            ['subscriberid', 'endtime'],
            ['KSS-HYL-ASDP-DIGIPORT1', '11/28/2025']
        ];

        // Buat spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Import data CSV ke spreadsheet
        $sheet->fromArray($csvData);

        // Buat writer untuk menulis spreadsheet
        $writer = new Xlsx($spreadsheet);

        // Buat header untuk file Excel
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="format-softcancel.xlsx"',
        ];

        // Set output buffer
        ob_start();
        $writer->save('php://output');
        $excelData = ob_get_clean();

        // Kembalikan file Excel sebagai respons HTTP
        return response($excelData, 200, $headers);
    }

    public function activateFormat()
    {
        // Buat data CSV
        $csvData = [
            ['productid', 'licensecount', 'subscriberid', 'starttime', 'endtime'],
            ['STD_MOB', 1, 'KSS-HYL-ASDP-DIGIPORT1', '11/28/2024', '11/28/2025']
        ];

        // Buat spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Import data CSV ke spreadsheet
        $sheet->fromArray($csvData);

        // Buat writer untuk menulis spreadsheet
        $writer = new Xlsx($spreadsheet);

        // Buat header untuk file Excel
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="format-activate.xlsx"',
        ];

        // Set output buffer
        ob_start();
        $writer->save('php://output');
        $excelData = ob_get_clean();

        // Kembalikan file Excel sebagai respons HTTP
        return response($excelData, 200, $headers);
    }
}
