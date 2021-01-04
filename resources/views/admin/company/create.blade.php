@extends('layouts.app')

@section('title', 'Nova de Empresas')

@section('content')

    {{-- ROW 2 --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Nova Empresas</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('empresa.store') }}" method="post">

                        <div class="row">
                            
                            <div class="col-md-8 px-1">
                                <div class="form-group">
                                    <label>Nome da Empresa</label>
                                    <input name="name" type="text" class="form-control" placeholder="Username" value="michael23">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="Company" value="Chet">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address"
                                        value="Melbourne, Australia">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" value="Melbourne">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" placeholder="Country" value="Australia">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="number" class="form-control" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>About Me</label>
                                    <textarea
                                        class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                                </div>
                            </div>
                        </div>
                        
                    </form>

                </div>
                <div class="card-footer">
                    <hr>
                    <div class="text-center">
                        <a href="{{ route('empresa.index') }}" type="submit" class="btn btn-default btn-round">Voltar</a>
                        <input type="submit" class="btn btn-success btn-round" value="Enviar">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END ROW 2 --}}

@endsection
