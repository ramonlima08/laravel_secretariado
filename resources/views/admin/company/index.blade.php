@extends('layouts.app')

@section('title',"Gestão de Empresas")

@section('content')

    {{-- ROW 2 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Empresas</h5>
                    <p class="card-category">{{count($campanies)}} Empresas encontradas</p>
                </div>
                <div class="card-body">
                    <p class="text-right"><a href="{{route('empresa.create')}}" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Nova Empresa</a></p>

                    <table class="table table-bordered tablhe-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Empresa</th>
                                <th>CNPJ</th>
                                <th>Telefone</th>
                                <th style="width: 15%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($campanies as $company)
                                <tr>
                                    <td>{{$company->id}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->cnpj}}</td>
                                    <td>{{$company->telephone}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('empresa.edit',$company->id) }}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('empresa.show',$company->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Última empresa criada a 60 dias
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}

@endsection
