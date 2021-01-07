@extends('layouts.app')

@section('title',"Agenda")

@section('content')

    {{-- ROW 1 --}}
    {{-- <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-calendar-60 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Eventos Hoje</p>
                                <p class="card-title">2
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Visualizar
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-watch-time text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Essa semana</p>
                                <p class="card-title"> 9
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i>
                        Eventos da semana
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-vector text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Mês</p>
                                <p class="card-title">23
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar-o"></i>
                        Eventos no mês
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- END ROW 1 --}}

    {{-- ROW 2 TABLE --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Eventos</h5>
                    <p class="card-category">{{count($schedules)}} Eventos encontradas</p>
                </div>
                <div class="card-body">
                    <p class="text-right"><a href="{{route('agenda.create')}}" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Novo Evento</a></p>

                    <table class="table table-bordered tablhe-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Data</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Contato</th>
                                <th>Obs</th>
                                <th style="width: 15%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->id}}</td>
                                    <td>{{$schedule->getDateFormatBr($schedule->date)}}</td>
                                    <td>{{$schedule->name}}</td>
                                    <td>{{$schedule->eventType->name}}</td>
                                    <td>{{$schedule->contact->name ?? ''}}</td>
                                    <td>{{$schedule->note}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('agenda.edit',$schedule->id) }}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('agenda.show',$schedule->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                {{-- <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Última empresa criada a 60 dias
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- END ROW 2 TABLE --}}

@endsection
