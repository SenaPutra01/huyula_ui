<div class="section">
    <div id="card-stats" class="pt-0">
        <div class="row">
            <div class="col s12 m4 l4 xl4">
                <!-- Ubah dari 6 ke 4 untuk 3 kolom -->
                <div class="card white-text animate fadeLeft"
                    style="background: linear-gradient(107.2deg, rgb(150, 15, 15) 10.6%, rgb(247, 0, 0) 91.1%);">
                    <div class="padding-4">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">check_circle</i>
                                <p>Active</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text mt-10">{{ $successCount }}</h5>
                                <p class="no-margin">Active License</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4 xl4">
                <!-- Ubah dari 6 ke 4 untuk 3 kolom -->
                <div class="card white-text animate fadeLeft"
                    style="background: linear-gradient(107.2deg, rgb(150, 15, 15) 10.6%, rgb(247, 0, 0) 91.1%);">
                    <div class="padding-4">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">hourglass_empty</i>
                                <p>Expired</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text mt-10">{{ $expiringCount }}</h5>
                                <p class="no-margin">Expiring License</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4 xl4">
                <!-- Ubah dari 6 ke 4 untuk 3 kolom -->
                <div class="card white-text animate fadeRight"
                    style="background: linear-gradient(107.2deg, rgb(150, 15, 15) 10.6%, rgb(247, 0, 0) 91.1%);">
                    <div class=" padding-4">
                        <div class="row">
                            <div class="col s7 m7">
                                <i class="material-icons background-round mt-5">timeline</i>
                                <p>Sales</p>
                            </div>
                            <div class="col s5 m5 right-align">
                                <h5 class="mb-0 white-text">80%</h5>
                                <p class="no-margin">Growth</p>
                                <p>3,42,230</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- statistic --}}
    {{-- <div class="row">
        <div class="col s12 l5">
            <!-- User Statistics -->
            <div class="card user-statistics-card animate fadeLeft">
                <div class="card-content">
                    <h4 class="card-title mb-0">
                        User Statistics
                        <i class="material-icons float-right">more_vert</i>
                    </h4>
                    <div class="row">
                        <div class="col s12 m6">
                            <ul class="collection border-none mb-0">
                                <li class="collection-item avatar">
                                    <i class="material-icons circle pink accent-2">trending_up</i>
                                    <p class="medium-small">This year</p>
                                    <h5 class="mt-0 mb-0">60%</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col s12 m6">
                            <ul class="collection border-none mb-0">
                                <li class="collection-item avatar">
                                    <i class="material-icons circle purple accent-4">trending_down</i>
                                    <p class="medium-small">Last year</p>
                                    <h5 class="mt-0 mb-0">40%</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-statistics-container">
                        <div id="user-statistics-bar-chart" class="user-statistics-shadow ct-golden-section"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <input type="hidden" id="product-counts" value='{{ json_encode($values) }}'>
    <input type="hidden" id="product-codes" value='{{ json_encode($labels) }}'>

    <div class="row">
        <div class="col s12">
            <!-- User Statistics -->
            <div class="card user-statistics-card animate fadeLeft">
                <div class="card-content">
                    <h4 class="card-title mb-0">
                        Product Statistics
                        <i class="material-icons float-right">more_vert</i>
                    </h4>
                    <div class="user-statistics-container">
                        <div id="user-statistics-bar-chart" class="user-statistics-shadow ct-golden-section"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
{{-- <script src="{{ asset('dist/') }}/assets/js/scripts/dashboard-modern.js"></script> --}}
<script src="{{ asset('custom/js/chart.js') }}"></script>
@endpush