@extends('layouts.app')

@section('title', 'Financeiro')

@section('content')

    <div class="row">
        <div class="col-md-12 text-right">
            <p class="text-right">
                <a href="#" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Novo Lançamento</a>
                <a href="{{route('banco.index')}}" class="btn btn-info btn-round"><i class="fa fa-cogs"></i> Gerenciar Bancos</a>
            </p>
        </div>
    </div>

    {{-- Row 1 --}}
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-danger">
                                <i class="nc-icon nc-bell-55 text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Vencidas</p>
                                <p class="card-title"> {{$contacts ?? 0}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-info"></i>
                        Lançamentos
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-time-alarm text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Venc. Próximo</p>
                                <p class="card-title"> {{$companies ?? 0}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-info"></i>
                        Lançamentos
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-bank text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Bancos</p>
                                <p class="card-title">{{$responsibles ?? 0}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-save"></i>
                        Registrados
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-time-alarm text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Agenda</p>
                                <p class="card-title"> {{$schedules ?? 0}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-save"></i>
                        Agendamentos
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    {{-- END ROW 1 --}}

    

    {{-- ROW 3 --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Despesas por Grupos</h5>
                    <p class="card-category">Período de 30 dias</p>
                </div>
                <div class="card-body ">
                    <canvas id="chartEmail"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-primary"></i> Serviços de Terceiros <br>
                        <i class="fa fa-circle text-warning"></i> Contas de Consumo <br>
                        <i class="fa fa-circle text-gray"></i> Aquisições <br>
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> apuração de 01/01/21 à 30/01/21
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Evolução Mensal</h5>
                    <p class="card-category">Quantitativo Mensal</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-primary"></i> Serviços de Terceiros <br>
                        <i class="fa fa-circle text-warning"></i> Contas de Consumo <br>
                    </div>
                    <hr />
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 3 --}}

@endsection

{{-- <script src="{{ asset('demo/demo.js') }}"></script> --}}

@push('scripts')
    
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });

        demo = {
            
            initChartsPages: function() {
                chartColor = "#FFFFFF";

                ctx = document.getElementById('chartEmail').getContext("2d");

                myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Dr. Mendelssohn', 'Dra. Carla', 'Sem Responsável'],
                    datasets: [{
                    label: "Emails",
                    pointRadius: 0,
                    pointHoverRadius: 0,
                    backgroundColor: [
                        '#4acccd',
                        '#fcc468',
                        '#e3e3e3'
                    ],
                    borderWidth: 0,
                    data: [5, 3, 3]
                    }]
                },

                options: {

                    legend: {
                    display: false
                    },

                    pieceLabel: {
                    render: 'percentage',
                    fontColor: ['white'],
                    precision: 2
                    },

                    tooltips: {
                        enabled: true
                    },

                    scales: {
                    yAxes: [{

                        ticks: {
                        display: false
                        },
                        gridLines: {
                        drawBorder: false,
                        zeroLineColor: "transparent",
                        color: 'rgba(255,255,255,0.05)'
                        }

                    }],

                    xAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                        drawBorder: false,
                        color: 'rgba(255,255,255,0.1)',
                        zeroLineColor: "transparent"
                        },
                        ticks: {
                        display: false,
                        }
                    }]
                    },
                }
                });

                var speedCanvas = document.getElementById("speedChart");

                var dataFirst = {
                data: [0, 19, 15, 13, 12],
                fill: false,
                borderColor: '#fbc658',
                backgroundColor: 'transparent',
                pointBorderColor: '#fbc658',
                pointRadius: 4,
                pointHoverRadius: 4,
                pointBorderWidth: 8,
                };

                var dataSecond = {
                data: [0, 13, 10, 15, 22],
                fill: false,
                borderColor: '#51CACF',
                backgroundColor: 'transparent',
                pointBorderColor: '#51CACF',
                pointRadius: 4,
                pointHoverRadius: 4,
                pointBorderWidth: 8
                };

                var speedData = {
                labels: ["Jan", "Feb", "Mar", "Apr", "May"],
                datasets: [dataFirst, dataSecond]
                };

                var chartOptions = {
                legend: {
                    display: false,
                    position: 'top'
                }
                };

                var lineChart = new Chart(speedCanvas, {
                type: 'line',
                hover: false,
                data: speedData,
                options: chartOptions
                });
            },
        }

    </script>
@endpush
