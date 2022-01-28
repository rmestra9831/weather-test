@extends('layouts.app')
@section('title', 'App de Clima - Historial')

@include('layouts.navbar')

@section('content')
    {{-- cabecera del contenido --}}
    <header class="header-2">
        <div class="page-header min-vh-75"
            style="background-image: url('https://cdn.pixabay.com/photo/2020/01/04/23/37/landscape-4742004_960_720.jpg')"
            loading="lazy">
            <span class="mask bg-gradient-primary opacity-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 text-center mx-auto">
                        <h1 class="text-white pt-3 mt-n5">Historial de Busquedas</h1>
                        <p class="lead text-white mt-3 px-5">En este apartado estan todas las busquedas realizadas</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <section class="py-5">
            <div class="container">
                <h4 class="justify-content-center d-flex text-7xl">Historial</h4>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IP
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Dispositivo</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Navegador</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Versión</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ciudad Buscada</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pais - Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $record)
                                    <tr>
                                        <td class="align-middle text-center">{{ $record->ip }}</td>
                                        <td class="align-middle text-center">{{ $record->device }}</td>
                                        <td class="align-middle text-center">{{ $record->navigator }}</td>
                                        <td class="align-middle text-center">{{ $record->version }}</td>
                                        <td class="align-middle text-center">{{ $record->searchCity }}</td>
                                        <td class="align-middle text-center">{{ $record->searchCountryState }}</td>
                                        <td class="align-middle text-center">{{ $record->countryId }}</td>
                                        <td class="align-middle text-center">{{ $record->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.footer')
    </div>
@endsection
@section('script')

@endsection
