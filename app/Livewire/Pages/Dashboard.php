<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $successCount = DB::table(table('subscribe_activity'))
            ->whereNotNull('activationcode')
            ->count('subscriberid');

        // Query kedua untuk menghitung jumlah produk berdasarkan productcode
        // $productCounts = DB::table(table('subscribe_activity'))
        //     ->select('productcode', DB::raw('COUNT(productcode) AS product_count'))
        //     ->groupBy('productcode')
        //     ->orderBy('product_count', 'ASC')
        //     ->get();

        // Menghitung jumlah entri yang endtime-nya kurang dari 7 hari ke depan
        $expiringCount = DB::table(table('subscribe_activity'))
            ->where('endtime', '<', DB::raw('CURRENT_DATE + INTERVAL \'7 days\''))
            ->where('endtime', '>=', DB::raw('CURRENT_DATE')) // Opsional: memastikan endtime tidak di masa lalu
            ->count();


        $productCounts = DB::table('subscribe_activity')
            ->select(
                DB::raw('TO_CHAR(statuschangetime, \'YYYY-MM\') AS month_year'), // Format tanggal menjadi YYYY-MM
                DB::raw('COUNT(*) AS total_count') // Menghitung jumlah data per bulan
            )
            ->groupBy(DB::raw('TO_CHAR(statuschangetime, \'YYYY-MM\')')) // Kelompokkan berdasarkan bulan dan tahun
            ->orderBy(DB::raw('TO_CHAR(statuschangetime, \'YYYY-MM\')'), 'ASC') // Urutkan berdasarkan bulan dan tahun
            ->get();


        // Menyiapkan data untuk grafik
        // $labels = $productCounts->pluck('productcode')->toArray();
        // $values = $productCounts->pluck('product_count')->toArray();
        // Menyiapkan data untuk grafik
        $labels = $productCounts->pluck('month_year')->toArray();  // Ambil nama bulan dan tahun sebagai label
        $values = $productCounts->pluck('total_count')->toArray(); // Ambil jumlah total per bulan

        $months = [];
        foreach ($labels as $label) {
            // Format 'YYYY-MM' menjadi nama bulan (misalnya '2024-01' menjadi 'January')
            $month = \Carbon\Carbon::createFromFormat('Y-m', $label)->format('F');
            $months[] = $month;
        }

        // dd($months);
        $chartData = [$values];

        return view('livewire.pages.dashboard', compact('successCount', 'labels', 'values', 'expiringCount', 'chartData', 'months'));
    }
}
