@push('css')
<style>
    .ct-label {
        font-size: 12px;
        text-anchor: middle;
        transform: translateX(0) rotate(0);
    }

    .ct-horizontal .ct-label {
        transform: translateY(10px);
        /* Menambahkan spasi tambahan jika perlu */
    }
</style>
@endpush


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

    <input type="hidden" id="product-counts" value='{{ json_encode($values) }}'>
    <input type="hidden" id="product-codes" value='{{ json_encode($labels) }}'>

    <div class="row">
        <div class="col s12">
            <!-- User Statistics -->
            <div class="card user-statistics-card animate fadeLeft">
                <div class="card-content">
                    <h4 class="card-title mb-4">Total Subscription</h4>
                    <div class="total-transaction-container">
                        <div id="total-transaction-line-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $(window).on("load", function () {
        // Data bulan dan data transaksi yang diteruskan dari controller
        var months = @json($months); // Pastikan data bulan ini berupa array yang benar
        var seriesData = @json($chartData); // Data transaksi per bulan (array of arrays)
        
        // Cek data untuk memastikan semuanya terhubung dengan benar
        console.log(months); // Cek apakah bulan benar
        console.log(seriesData); // Cek apakah data benar
        
        // Konfigurasi Chartist Line Chart
        var TotalTransactionLine = new Chartist.Line(
            '#total-transaction-line-chart',
            {
                series: seriesData, 
                labels: months // Data transaksi per bulan
            },
            {
                chartPadding: 10,
                axisX: {
                    showGrid: false,
                },
                axisY: {
                    showLabel: true,
                    showGrid: true,
                    low: 0,
                    high: Math.max(...seriesData[0]), // Set high untuk mengikuti data tertinggi
                    scaleMinSpace: 40,
                },
                lineSmooth: Chartist.Interpolation.simple({
                    divisor: 2,
                }),
                plugins: [
                    Chartist.plugins.tooltip({
                        class: 'total-transaction-tooltip',
                        appendToBody: true,
                    }),
                ],
                // fullWidth: true,
            }
        );

        // Event ketika chart selesai digambar (created)
        TotalTransactionLine.on('created', function (data) {
            var defs = data.svg.querySelector('defs') || data.svg.elem('defs');
            defs.elem('linearGradient', {
                id: 'lineLinearStats',
                x1: 0,
                y1: 0,
                x2: 1,
                y2: 0,
            })
            .elem('stop', {
                offset: '0%',
                'stop-color': 'rgba(255, 82, 249, 0.1)',
            })
            .parent()
            .elem('stop', {
                offset: '10%',
                'stop-color': 'rgba(255, 82, 249, 1)',
            })
            .parent()
            .elem('stop', {
                offset: '30%',
                'stop-color': 'rgba(255, 82, 249, 1)',
            })
            .parent()
            .elem('stop', {
                offset: '95%',
                'stop-color': 'rgba(133, 3, 168, 1)',
            })
            .parent()
            .elem('stop', {
                offset: '100%',
                'stop-color': 'rgba(133, 3, 168, 0.1)',
            });
        });

        // Event ketika titik digambar (draw)
        TotalTransactionLine.on('draw', function (data) {
            var circleRadius = 5;
            if (data.type === 'point') {
                var circle = new Chartist.Svg('circle', {
                    cx: data.x,
                    cy: data.y,
                    'ct:value': data.value.y,
                    r: circleRadius,
                    class: data.value.y === 35
                        ? 'ct-point ct-point-circle'
                        : 'ct-point ct-point-circle-transperent',
                });
                data.element.replace(circle);
            }
        });
    });

</script>
@endpush