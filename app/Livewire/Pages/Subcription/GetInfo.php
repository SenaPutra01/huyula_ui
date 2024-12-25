<?php

namespace App\Livewire\Pages\Subcription;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

use function Pest\Laravel\json;

class GetInfo extends Component
{
    public function render()
    {
        return view('livewire.pages.subcription.get-info');
    }
}
