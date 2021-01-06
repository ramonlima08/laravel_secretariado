@extends('layouts.app')

@section('title',"Gestão de Contatos")

@section('content')

    {{-- ROW 2 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Contatos</h5>
                    <p class="card-category">{{count($contacts)}} Contatos encontrados</p>
                </div>
                <div class="card-body">
                    <p class="text-right"><a href="{{route('contato.create')}}" class="btn btn-success btn-round"><i class="fa fa-plus"></i> Novo Contato</a></p>

                    <table class="table table-bordered tablhe-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Contato</th>
                                <th>Empresa</th>
                                <th>Telefone</th>
                                <th style="width: 15%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->company_id}}</td>
                                    <td>{{$contact->telephone ?? $contact->cellphone}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('contato.edit',$contact->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ route('contato.show',$contact->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a>
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
