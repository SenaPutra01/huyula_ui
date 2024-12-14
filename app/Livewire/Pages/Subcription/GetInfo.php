<?php

namespace App\Livewire\Pages\Subcription;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

use function Pest\Laravel\json;

class GetInfo extends Component
{
    public $msisdn;
    public $status;
    public $startTime;
    public $endTime;
    public $productId;
    public $shorten;

    public function getInfo($req_msisdn, $req_productcode)
    {
        $url = baseUrl('/getInfo');

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json'
        ];
        $response = $client->request('GET', $url, [
            'headers' => $headers,
            'json' => [
                'msisdn' => $req_msisdn,
                'productcode' => $req_productcode
            ],
        ]);


        $data = json_decode($response->getBody()->getContents(), true);

        $msisdn = $data['msisdn'];
        $status = $data['status'];
        $startTime = $data['StartTime'];
        $endTime = $data['EndTime'];
        $productId = $data['ProductId'];
        $shorten = $data['shorten'];
    }

    public function render()
    {
        return view('livewire.pages.subcription.get-info');
    }
}
