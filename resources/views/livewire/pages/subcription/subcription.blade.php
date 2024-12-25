@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/pages/data-tables.css">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/') }}/assets/css/custom/custom.css">
@endpush
<div class="row">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <!-- Page Length Options -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card">
                                <div class="card-content mt-3">
                                    <div class="row">
                                        <div class="col s12">
                                            <table id="subscriber-table" class="display nowrap" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>Info</th>
                                                        <th>Subcriber ID</th>
                                                        <th>Product Code</th>
                                                        <th>License Count</th>
                                                        <th>MSISDN</th>
                                                        <th>Start date</th>
                                                        <th>End date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
        <x-modal name="getInfo" :show="$errors->isNotEmpty()" focusable>
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-800">
                    {{ __('Detail Subscriber') }}
                </h2>

                <div class="grid grid-row-3 grid-flow-col gap-2">
                    <div class="mt-6">
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" value="{{ $msisdn }}" name="msisdn" id="msisdn"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="msisdn"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MSISDN</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" value="{{ $status }}" name="status" id="status"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="status"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Status</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" value="{{ $startTime }}" name="startTime" id="startTime"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="startTime"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Start
                                    Time</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" value="{{ $endTime }}" name="endTime" id="endTime"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="endTime"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus: translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">End
                                    Time</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" value="{{ $productId }}" name="productId" id="productId"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " required />
                                <label for="productId"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product
                                    ID</label>
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <a href="{{ $shorten }}" target="_blank"
                                    class="block py-3 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    {{ $shorten }}
                                </a>
                                <label for="shorten"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Shorten</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="() => { $dispatch('close'); location.reload(); }">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                </div>
            </div>
        </x-modal>
    </div>

    @push('js')
    <script>
        $(document).ready(function() {
        $('#subscriber-table').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: '{{ route('subscription-data') }}',
                dataSrc: 'data'
            },
            columns: [
                { data: '',
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex gap-2">
                                <a href="#"  
                                wire:click="getInfo('${row.msisdn}', '${row.productcode}')" 
                                x-on:click.prevent="$dispatch('open-modal', 'getInfo')">
                                <i class="material-icons text-center px-5" style="display: inline; margin: auto;">visibility</i>
                                </a>
                            </div>
                        `;
                    },
                },
                { data: 'subscriberid' },
                { data: 'productcode' },
                { data: 'licensecount' },
                { data: 'msisdn' },
                { data: 'starttime',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }
                },
                { data: 'endtime',
                    render: function(data, type, row) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }
                },
            ],
            paging: true,
            lengthMenu: [10, 25, 50],
            // responsive: true,
            // scrollY: 500,
            scrollX: true,
        });
    });
    </script>
    {{-- <script src="{{ asset('dist/') }}/assets/js/scripts/data-tables.js"></script> --}}
    @endpush