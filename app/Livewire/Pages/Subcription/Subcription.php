<?php

namespace App\Livewire\Pages\Subcription;

use App\Models\subscriber;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Subcription extends Component
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
        // dd($data);
        $this->msisdn = $data['msisdn'];
        $this->status = $data['status'];
        $this->startTime = $data['StartTime'];
        $this->endTime = $data['EndTime'];
        $this->productId = $data['ProductId'];
        $this->shorten = $data['shorten'];
    }

    public function subscriptionData()
    {
        $start = request()->get('start', 0);
        $length = request()->get('length', 0);

        $subcribers = subscriber::select([
            'subscriberid',
            'productcode',
            'licensecount',
            'msisdn',
            'starttime',
            'endtime'
        ])
            ->orderBy('starttime', 'desc')
            ->offset($start)
            ->limit($length)
            ->get();

        $totalData = subscriber::count();

        return response()->json([
            'draw' => request()->get('draw'),
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalData,
            'data' => $subcribers
        ]);
    }

    public function render()
    {
        return view('livewire.pages.subcription.subcription');
    }
}
