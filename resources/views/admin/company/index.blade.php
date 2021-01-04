@extends('layouts.app')

@section('title',"Gestão de Empresas")

@section('content')

    {{-- ROW 2 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Empresas</h5>
                    <p class="card-category">24 Empresas encontradas</p>
                </div>
                <div class="card-body">
                    <p class="text-right"><a href="{{route('empresa.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Nova Empresa</a></p>

                    <table class="table table-bordered tablhe-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Empresa</th>
                                <th>CNPJ</th>
                                <th>Telefone</th>
                                <th style="width: 10%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Empresa</td>
                                <td>12451254/0001-01</td>
                                <td>(21) 2211-9988</td>
                                <td>
                                    <button class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </button>
                                    
                                </td>
                            </tr>
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
