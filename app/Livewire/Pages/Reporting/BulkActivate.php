<?php

namespace App\Livewire\Pages\Reporting;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class BulkActivate extends Component
{
    use WithFileUploads;

    public $activateBulk;

    public function activateBulkFunc()
    {
        $this->validate([
            'activateBulk' => 'required|file|mimes:xlsx,xls',
        ]);

        $username = env('API_USERNAME');
        $password = env('API_PASSWORD');
        // dd($username);
        $url = baseUrlProd('ActivateBulk');
        // $url = baseUrl('ActivateBulk-test');


        $response = Http::withBasicAuth($username, $password)
            ->attach('file', fopen($this->activateBulk->getRealPath(), 'rb'), $this->activateBulk->getClientOriginalName())
            ->post($url);

        // dd(json_decode($response));
        $message = json_decode($response);
        if ($response->successful()) {
            $this->dispatch('notify', title: 'success', message: $message->message);
            // return redirect()->back();
        } else {
            $this->dispatch('notify', title: 'failed', message: $message->detail);
            // return redirect()->back();
        }
    }


    public function render()
    {
        return view('livewire.pages.reporting.bulk-activate');
    }
}
