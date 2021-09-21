@extends('cadastro::layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <h3>Módulo de Cadastros</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <a href="{{ route('animais.index') }}"><i class="material-icons">pets</i></a>
                        </div>
                        <p class="card-category">Animais</p>
                        <h3 class="card-title">{{ $animais }}</h3>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <a href="{{ route('clientes.index') }}"><i class="material-icons">person</i></a>
                        </div>
                        <p class="card-category">Clientes</p>
                        <h3 class="card-title">{{ $clientes }}</h3>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection