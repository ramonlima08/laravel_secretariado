@extends('layouts.app')

@section('title',"Gestão de Bancos")

@section('content')

    {{-- ROW 2 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Bancos</h5>
                    <p class="card-category">{{count($banks)}} Bancos encontradas</p>
                </div>
                <div class="card-body">
                    <p class="text-right"><a href="{{route('banco.create')}}" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Novo Banco</a></p>

                    <table class="table table-bordered tablhe-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Nome</th>
                                <th>Agencia</th>
                                <th>Conta</th>
                                <th style="width: 15%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $bank)
                                <tr>
                                    <td>{{$bank->id}}</td>
                                    <td>{{$bank->name}}</td>
                                    <td>{{$bank->agency}}</td>
                                    <td>{{$bank->account}}-{{$bank->account_dv}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('banco.edit',$bank->id) }}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('banco.show',$bank->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
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
