<?php

namespace App\Livewire\Pages\Product;

use App\Models\LogActivity as ModelsLogActivity;
use Livewire\Component;

class LogActivity extends Component
{
    public function getData()
    {
        $start = request()->get('start', 0);
        $length = request()->get('length', 10);

        $logActivities = ModelsLogActivity::select('created_at', 'req', 'resp', 'status')
            ->orderBy('created_at', 'desc')
            ->offset($start)
            ->limit($length)
            ->get();

        $totalData = ModelsLogActivity::count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalData,
            'data' => $logActivities,
        ]);
    }

    public function render()
    {
        return view('livewire.pages.product.log-activity');
    }
}
