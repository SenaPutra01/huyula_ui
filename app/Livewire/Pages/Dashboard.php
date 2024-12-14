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
        $productCounts = DB::table(table('subscribe_activity'))
            ->select('productcode', DB::raw('COUNT(productcode) AS product_count'))
            ->groupBy('productcode')
            ->orderBy('product_count', 'ASC')
            ->get();

        // Menghitung jumlah entri yang endtime-nya kurang dari 7 hari ke depan
        $expiringCount = DB::table(table('subscribe_activity'))
            ->where('endtime', '<', DB::raw('CURRENT_DATE + INTERVAL \'7 days\''))
            ->where('endtime', '>=', DB::raw('CURRENT_DATE')) // Opsional: memastikan endtime tidak di masa lalu
            ->count();

        // Menyiapkan data untuk grafik
        $labels = $productCounts->pluck('productcode')->toArray();
        $values = $productCounts->pluck('product_count')->toArray();

        return view('livewire.pages.dashboard', compact('successCount', 'labels', 'values', 'expiringCount'));
    }
}
