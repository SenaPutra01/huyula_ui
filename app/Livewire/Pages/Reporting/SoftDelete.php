<?php

namespace App\Livewire\Pages\Reporting;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SoftDelete extends Component
{
    use WithFileUploads;

    public $softCancel;

    public function softCancelBulk()
    {
        $this->validate([
            'softCancel' => 'required|file|mimes:xlsx,xls',
        ]);

        $username = env('API_USERNAME');
        $password = env('API_PASSWORD');

        $url = baseUrlProd('SoftCancleBulk');
        // $url = baseUrl('SoftCancleBulk-test');


        $response = Http::withBasicAuth($username, $password)
            ->attach('file', fopen($this->softCancel->getRealPath(), 'rb'), $this->softCancel->getClientOriginalName())
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
        return view('livewire.pages.reporting.soft-delete');
    }
}
