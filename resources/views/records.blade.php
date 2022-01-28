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
                                {{-- <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/team-2.jpg"
                                                    class="avatar avatar-sm me-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-xs">John Michael</h6>
                                                <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Manager</p>
                                        <p class="text-xs text-secondary mb-0">Organization</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm badge-success">Online</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-normal">23/04/18</span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="javascript:;" class="text-secondary font-weight-normal text-xs"
                                            data-toggle="tooltip" data-original-title="Edit user">
                                            Edit
                                        </a>
                                    </td>
                                </tr> --}}
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
