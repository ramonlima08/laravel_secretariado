@extends('layouts.app')

@section('title',  "$action Banco")

@section('content')

    {{-- ROW --}}
    <div class="row">
        <div class="col-md-12">
            @isset($bank->id)
                <form action="{{ route('banco.update',$bank->id) }}" method="post">
            @else
                <form action="{{ route('banco.store') }}" method="post">
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
                        <h5 class="card-title">Dados do Banco</h5>
                    </div>
                    <div class="card-body">
                        @isset($bank->id)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Código Nacional</label>
                                    <input name="cod" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="xxx"
                                        value="{{ $bank->cod ?? old('cod') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do Banco</label>
                                    <input name="name" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Nome do Banco"
                                        value="{{ $bank->name ?? old('name') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agencia</label>
                                    <div class="input-group">
                                        <input name="agency" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="xxxx"
                                            value="{{ $bank->agency ?? old('agency') }}">
                                        <div class="input-group-addon">
                                            <div class="input-group-text">-</div>
                                        </div>
                                        <input name="agency_dv" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="x"
                                            value="{{ $bank->agency_dv ?? old('agency_dv') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Conta</label>
                                    <div class="input-group">
                                        <input name="account" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="xxxx"
                                            value="{{ $bank->account ?? old('account') }}">
                                        <div class="input-group-addon">
                                            <div class="input-group-text">-</div>
                                        </div>
                                        <input name="account_dv" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="x"
                                            value="{{ $bank->account_dv ?? old('account_dv') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Gerente</label>
                                    <input name="manager" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Gerente"
                                        value="{{ $bank->manager ?? old('manager') }}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input name="phone" type="text" class="form-control maskPhone" {{ $disabled ?? '' }} placeholder="(xx) xxxx-xxxx"
                                        value="{{ $bank->phone ?? old('phone') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação</label>
                                    <textarea name="note" {{ $disabled ?? '' }} class="form-control textarea">{{ $bank->note ?? old('note') }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('banco.index') }}" type="submit" class="btn btn-default btn-round">Voltar</a>
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
