<?php

namespace App\Livewire\Pages\Product;

use App\Models\SubscriberActivity as subscriberActivity;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class LogActivity extends Component
{

    // public function getData()
    // {
    //     $start = request()->get('start', 0);
    //     $length = request()->get('length', 10);

    //     $logActivities = subscriberActivity::select('msisdn', 'subscriberid', 'status', 'activationcode', 'req_text', 'resp_text', 'statuschangetime', 'starttime', 'endtime')
    //         ->orderBy('statuschangetime', 'desc')
    //         ->offset($start)
    //         ->limit($length)
    //         ->get();

    //     // Total data untuk pagination
    //     $totalData = subscriberActivity::count();

    //     return response()->json([
    //         'draw' => request()->input('draw'),
    //         'recordsTotal' => $totalData,
    //         'recordsFiltered' => $totalData,
    //         'data' => $logActivities,
    //     ]);
    // }



    // public function getData(Request $request)
    // {
    //     // Ambil parameter start dan length untuk pagination dari DataTables
    //     $start = $request->get('start', 0);
    //     $length = $request->get('length', 10);

    //     // Ambil nilai pencarian dari input
    //     $search = $request->get('search', []);

    //     // Filter pencarian untuk MSISDN, SubscriberID, dan Status
    //     $msisdn = $search['msisdn'] ?? '';
    //     $subscriberid = $search['subscriberid'] ?? '';
    //     $status = $search['status'] ?? '';

    //     // Query dasar untuk mengambil data
    //     $query = SubscriberActivity::select(
    //         'msisdn',
    //         'subscriberid',
    //         'status',
    //         'activationcode',
    //         'req_text',
    //         'resp_text',
    //         'statuschangetime',
    //         'starttime',
    //         'endtime'
    //     );

    //     // Filter berdasarkan parameter pencarian jika ada
    //     if ($msisdn) {
    //         $query->where('msisdn', 'like', '%' . $msisdn . '%');
    //     }

    //     if ($subscriberid) {
    //         $query->where('subscriberid', 'like', '%' . $subscriberid . '%');
    //     }

    //     if ($status) {
    //         $query->where('status', 'like', '%' . $status . '%');
    //     }

    //     // Hitung jumlah total data tanpa filter
    //     $totalData = SubscriberActivity::count();

    //     // Ambil data sesuai pagination dan urutkan berdasarkan `statuschangetime`
    //     $logActivities = $query->orderBy('statuschangetime', 'desc')
    //         ->offset($start)
    //         ->limit($length)
    //         ->get();

    //     // Hitung jumlah data yang difilter sesuai pencarian
    //     $filteredDataCount = $logActivities->count();

    //     // Kembalikan data dalam format JSON untuk DataTables
    //     return response()->json([
    //         'draw' => $request->input('draw'),
    //         'recordsTotal' => $totalData,
    //         'recordsFiltered' => $filteredDataCount,
    //         'data' => $logActivities,
    //     ]);
    // }



    // public function getData(Request $request)
    // {
    //     // Ambil nilai pagination dan filter dari request
    //     $start = $request->get('start', 0);
    //     $length = $request->get('length', 10);
    //     $searchValue = $request->get('search')['value'] ?? ''; // Ambil nilai pencarian

    //     // Query untuk mengambil data dengan filter pencarian dan pagination
    //     $query = SubscriberActivity::select(
    //         'msisdn',
    //         'subscriberid',
    //         'status',
    //         'activationcode',
    //         'req_text',
    //         'resp_text',
    //         'statuschangetime',
    //         'starttime',
    //         'endtime'
    //     );

    //     if ($searchValue) {
    //         $query->where('msisdn', 'like', '%' . $searchValue . '%')
    //             ->orWhere('subscriberid', 'like', '%' . $searchValue . '%')
    //             ->orWhere('status', 'like', '%' . $searchValue . '%');
    //     }

    //     // Hitung total data tanpa filter
    //     $totalData = SubscriberActivity::count();

    //     // Ambil data yang sesuai dengan pagination
    //     $logActivities = $query->orderBy('statuschangetime', 'desc')
    //         ->offset($start)
    //         ->limit($length)
    //         ->get();

    //     // Hitung data yang sudah difilter
    //     $filteredData = $query->count();

    //     return response()->json([
    //         'draw' => $request->input('draw'), // Harus sama dengan 'draw' di frontend
    //         'recordsTotal' => $totalData, // Total data tanpa filter
    //         'recordsFiltered' => $filteredData, // Data setelah filter
    //         'data' => $logActivities // Data yang ditampilkan
    //     ]);
    // }


    public function getData(Request $request)
    {
        // Ambil nilai pagination dan filter dari request
        $start = $request->get('start', 0);
        $length = $request->get('length', 10);
        $search = $request->get('search', []);

        // Ambil nilai pencarian dari filter
        $msisdn = $search['msisdn'] ?? '';
        $subscriberid = $search['subscriberid'] ?? '';
        $status = $search['status'] ?? '';

        // Query untuk mengambil data dengan filter pencarian dan pagination
        $query = SubscriberActivity::select(
            'msisdn',
            'subscriberid',
            'status',
            'activationcode',
            'req_text',
            'resp_text',
            'statuschangetime',
            'starttime',
            'endtime'
        );

        // Terapkan filter pencarian jika ada
        if ($msisdn) {
            $query->where('msisdn', 'like', '%' . $msisdn . '%');
        }
        if ($subscriberid) {
            $query->where('subscriberid', 'like', '%' . $subscriberid . '%');
        }
        if ($status) {
            $query->where('status', 'like', '%' . $status . '%');
        }

        // Hitung total data tanpa filter
        $totalData = SubscriberActivity::count();

        // Ambil data sesuai dengan pagination
        $logActivities = $query->orderBy('statuschangetime', 'desc')
            ->offset($start)
            ->limit($length)
            ->get();

        // Hitung data yang sudah difilter
        $filteredData = $query->count();

        return response()->json([
            'draw' => $request->input('draw'), // Pastikan draw counter tetap konsisten
            'recordsTotal' => $totalData, // Total data tanpa filter
            'recordsFiltered' => $filteredData, // Data yang sudah difilter
            'data' => $logActivities // Data yang ditampilkan
        ]);
    }



    public function render()
    {
        return view('livewire.pages.product.log-activity');
    }
}
