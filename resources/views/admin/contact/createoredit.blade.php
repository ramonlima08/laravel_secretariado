@extends('layouts.app')

@section('title',  "$action Contato")

@section('content')

    {{-- ROW --}}
    <div class="row">
        <div class="col-md-12">
            @isset($contact->id)
                <form action="{{ route('contato.update',$contact->id) }}" method="post">
            @else
                <form action="{{ route('contato.store') }}" method="post">
            @endisset
            
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Dados do Contato</h5>
                    </div>
                    <div class="card-body">
                        @isset($contact->id)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    @include('components.selectbox',[
                                        'name'=>"company_id",
                                        'default' => ['value'=>0,'text'=>"Nenhuma empresa"],
                                        'options' => $companies,
                                        'selected' => $contact->company_id
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do contato</label>
                                    <input name="name" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Nome da contato"
                                        value="{{ $contact->name ?? old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <input name="cellphone" type="text" class="form-control maskPhone" {{ $disabled ?? '' }} placeholder="(xx) xxxx-xxxx"
                                        value="{{ $contact->cellphone ?? old('cellphone') }}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input name="telephone" type="text" class="form-control maskPhone" {{ $disabled ?? '' }} placeholder="(xx) xxxx-xxxx"
                                        value="{{ $contact->telephone ?? old('telephone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input name="email" type="email" class="form-control" {{ $disabled ?? '' }} placeholder="E-mail" 
                                    value="{{ $contact->email ?? old('email') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação</label>
                                    <textarea name="note" {{ $disabled ?? '' }} class="form-control textarea">{{ $contact->note ?? old('note') }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('contato.index') }}" type="submit"
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
