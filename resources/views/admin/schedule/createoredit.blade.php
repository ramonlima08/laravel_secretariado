@extends('layouts.app')

@section('title',  "$action Agenda")

@section('content')

    {{-- ROW --}}
    <div class="row">
        <div class="col-md-12">
            @isset($schedule->id)
                <form action="{{ route('agenda.update',$schedule->id) }}" method="post">
            @else
                <form action="{{ route('agenda.store') }}" method="post">
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
                        <h5 class="card-title">Dados do Evento</h5>
                    </div>
                    <div class="card-body">
                        @isset($schedule->id)
                            @method('PUT')
                        @endisset

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nome do Evento</label>
                                    <input name="name" type="text" class="form-control" {{ $disabled ?? '' }} placeholder="Nome do Evento"
                                        value="{{ $schedule->name ?? old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Data do Evento</label>
                                    <input name="date" type="text" class="form-control maskDateTime" {{ $disabled ?? '' }} placeholder="__/__/____ __:__:__"
                                        value="{{ $schedule->getDateFormatBr($schedule->date) ?? old('date') }}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Tipo de Evento</label>
                                    @include('components.selectbox',[
                                        'name'=>"event_type_id",
                                        'default' => null,
                                        'options' => $event_types,
                                        'selected' => $schedule->event_type_id
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contato</label>
                                    @include('components.selectbox',[
                                        'name'=>"contact_id",
                                        'default' => ['value'=>0,'text'=>"Nenhum Contato"],
                                        'options' => $contacts,
                                        'selected' => $schedule->contact_id
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Responsável</label>
                                    @include('components.selectbox',[
                                        'name'=>"responsible_id",
                                        'default' => ['value'=>0,'text'=>"Nenhum Responsável"],
                                        'options' => $responsibles,
                                        'selected' => $schedule->responsible_id
                                    ])
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação</label>
                                    <textarea name="note" {{ $disabled ?? '' }} class="form-control textarea">{{ $schedule->note ?? old('note') }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('agenda.index') }}" type="submit"
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
