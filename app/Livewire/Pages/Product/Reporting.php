<?php

namespace App\Livewire\Pages\Product;

use Livewire\Component;
use App\Models\Reporting as report_dashboard;

class Reporting extends Component
{
    public function render()
    {
        $reporting = report_dashboard::all();
        return view('livewire.pages.product.reporting', [
            'reporting' => $reporting
        ]);
    }
}
