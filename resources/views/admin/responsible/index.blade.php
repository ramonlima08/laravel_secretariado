@extends('layouts.app')

@section('title',"Gestão de Responsáveis")

@section('content')

    {{-- ROW 2 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Responsáveis</h5>
                    <p class="card-category">{{count($responsibles)}} Responsáveis encontradas</p>
                </div>
                <div class="card-body">
                    <p class="text-right"><a href="{{route('responsavel.create')}}" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Novo Responsável</a></p>

                    <table class="table table-bordered tablhe-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Celular</th>
                                <th>Telefone</th>
                                <th style="width: 15%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($responsibles as $responsible)
                                <tr>
                                    <td>{{$responsible->id}}</td>
                                    <td>{{$responsible->name}}</td>
                                    <td>{{$responsible->cellphone}}</td>
                                    <td>{{$responsible->telephone}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('responsavel.edit',$responsible->id) }}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('responsavel.show',$responsible->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
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
    {{-- END ROW 2 --}}

@endsection
