@extends('layouts.app')

@section('title',  "$action Responsável")

@section('content')

    {{-- ROW --}}
    <div class="row">
        <div class="col-md-12">
            @isset($responsible->id)
                <form action="{{ route('responsavel.update',$responsible->id) }}" method="post">
            @else
                <form action="{{ route('responsavel.store') }}" method="post">
            @endisset
            
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Dados da Responsável</h5>
                    </div>
                    <div class="card-body">
                        @isset($responsible->id)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome da Responsável</label>
                                    <input name="name" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Nome da Responsável"
                                        value="{{ $responsible->name ?? old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input name="cellphone" type="text" class="form-control maskPhone" {{ $disabled ?? '' }} placeholder="(xx) xxxx-xxxx"
                                        value="{{ $responsible->cellphone ?? old('cellphone') }}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input name="telephone" type="text" class="form-control maskPhone" {{ $disabled ?? '' }} placeholder="(xx) xxxx-xxxx"
                                        value="{{ $responsible->telephone ?? old('telephone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" type="email" class="form-control" {{ $disabled ?? '' }} placeholder="E-mail" 
                                    value="{{ $responsible->email ?? old('email') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação</label>
                                    <textarea name="note" {{ $disabled ?? '' }} class="form-control textarea">{{ $responsible->note ?? old('note') }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('responsavel.index') }}" type="submit"
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
