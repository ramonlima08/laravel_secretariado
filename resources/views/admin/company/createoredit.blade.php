@extends('layouts.app')

@section('title',  "$action Empresa")

@section('content')

    {{-- ROW --}}
    <div class="row">
        <div class="col-md-12">
            @isset($company->id)
                <form action="{{ route('empresa.update',$company->id) }}" method="post">
            @else
                <form action="{{ route('empresa.store') }}" method="post">
            @endisset
            
                @csrf

                @if ($errors->any())
                <div class="alert alert-warning">
                    <p>Falha ao salvar</p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Dados da Empresa</h5>
                    </div>
                    <div class="card-body">
                        @isset($company->id)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome da Empresa</label>
                                    <input name="name" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Nome da Empresa"
                                        value="{{ $company->name ?? old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input name="cnpj" type="text" class="form-control maskCnpj" {{ $disabled ?? '' }} placeholder="00.000.000/0000-00"
                                        value="{{ $company->cnpj ?? old('cnpj') }}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input name="telephone" type="text" class="form-control maskPhone" {{ $disabled ?? '' }} placeholder="(xx) xxxx-xxxx"
                                        value="{{ $company->telephone ?? old('telephone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" type="email" class="form-control" {{ $disabled ?? '' }} placeholder="E-mail" 
                                    value="{{ $company->email ?? old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Site</label>
                                    <input name="site" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Site" 
                                    value="{{ $company->site ?? old('site') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação</label>
                                    <textarea name="note" {{ $disabled ?? '' }} class="form-control textarea">{{ $company->note ?? old('note') }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('empresa.index') }}" type="submit"
                                class="btn btn-default btn-round">Voltar</a>
                            @if(!isset($disabled))
                                <input type="submit" class="btn btn-success btn-round" value="Salvar">
                            @endif
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- END ROW --}}

@endsection
