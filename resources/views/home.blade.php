@extends('layouts.app')
@section('title', 'App de Clima')

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
                        <h1 class="text-white pt-3 mt-n5">Browser Weather</h1>
                        <p class="lead text-white mt-3 px-5">Prueba tecnica para browser travel</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- contenido --}}
    {{-- @dd(config('app.cities')) --}}
    {{-- @foreach (config('app.cities') as $item)
        @dd($item)
    @endforeach --}}
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <section class="py-5">
            <div class="container">
                <div x-data="weather()" x-init="await loadWeather()" class="row align-items-center">
                    <div class="row">
                        <div class="row justify-content-center text-center my-sm-5">
                            <div class="col-lg-6">
                                <span class="badge badge-primary mb-3">Infinite combinations</span>
                                <h2 class="text-dark mb-0">Estado del Clima</h2>
                                <p class="lead">A continuación se muestran estas 3 ciudades principales</p>
                            </div>
                        </div>
                    </div>
                    {{-- Tarjetas de clima pre-establecidas --}}
                    <template x-for="(weather,index) in listWeather" :key="">
                        <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
                            <div class="rotating-card-container">
                                <div
                                    class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
                                    <div class="front front-background" :style="{ backgroundImage: url(" weather.image") }"
                                        style="background-size: cover;">
                                        <div class="card-body py-5 text-center">
                                            <h3>Hoy</h3>
                                            <h2><span style="font-size: 5rem;" x-html="weather.temperature"></span>°c</h2>
                                            <h3 class="text-white text-capitalize mb-0 mt-n4" x-text="weather.city"></h3>
                                            <hr class="mt-0">
                                            <h6 class="text-white mb-0">Temperatura Max - Min</h6>
                                            <div class="maxmin">
                                                <h2><span x-html="weather.maxmintemp.max"></span><small
                                                        class="contentArrowTemp">°<i class="fas fa-arrow-up"></i></small>
                                                </h2>
                                                <h2><span x-html="weather.maxmintemp.min"></span><small
                                                        class="contentArrowTemp">°<i class="fas fa-arrow-down"></i></small>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back back-background"
                                        style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1365&amp;q=80); background-size: cover;">
                                        <div class="card-body pt-auto text-center">
                                            <h2><span style="font-size: 5rem;" x-html="weather.humidity"></span>%</h2>
                                            <h3 class="text-white mt-n4">Humedad</h3>
                                            <button type="button"
                                                x-on:click="setLocationMap(weather.location.lat, weather.location.lng)"
                                                class="btn btn-info btn-sm btn-location-tem">Ver en mapa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- fin de tarjetas de clima pre-establecidas --}}
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 col-sm-12 order-md-first first-last">
                        <div id="map">
                            mapa aqui
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 order-md-last order-first">
                        <div class="card h-auto p-4 mb-4">
                            <p class="text-center h5">Buscar Ciudad</p>
                            <div class="input-group input-group-outline">
                                @csrf
                                <input type="text" id="city" class="form-control">
                                <button onclick="searchCity()" type="button" class="btn btn-info m-0"><i
                                        class="fas fa-search"></i></button>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body show-info-weather">
                                    Ciudad no seleccionada
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.footer')
    </div>
    @include('common.default-modal')
@endsection
@section('script')
    <script>
        // Carga de las tarjetas principales
        function weather() {
            return {
                listWeather: [],
                loadWeather: function() {
                    window.axios.get('/api/getDefaultsCountry', {})
                        .then((response) => {
                            this.listWeather = response.data
                        })
                    setInterval(() => {
                        window.axios.get('/api/getDefaultsCountry', {})
                            .then((response) => {
                                this.listWeather = response.data
                            })
                    }, 15000);
                }
            }
        }

        let map, infoWindow;
        // obtención de los datos desde config.app
        var locations = {!! json_encode(config('app.cities')) !!};
        // Inicialización de google maps
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: parseFloat(locations[2]['lat']),
                    lng: parseFloat(locations[2]['lng'])
                },
                zoom: 4,
            });
            var infowindow = new google.maps.InfoWindow();
            // Recorrido del array de datos para imprimir los marcadores
            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                    map: map
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i]['name']);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }

        // Buscar información del clima
        function searchCity() {
            var modal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                keyboard: false
            })
            // inicializando modal
            var inputValue = $('#city').val();
            // Conexión a api para buscar las ciudades con su ubicación
            window.axios.get('http://dataservice.accuweather.com/locations/v1/cities/search?apikey=' +
                    '{{ env('API_KEY_ACCWEATHER') }}' + '&q=' + inputValue, {})
                .then((response) => {
                    if (inputValue.length <= 1) {
                        swal({
                            icon: "error",
                            text: "Ingresa una ciudad valida",
                        });
                    } else if(inputValue.length >= 2) {
                        if (response.data.length > 1) {
                            $('#body-city').html('') /* Limpiar modal */
                            response.data.forEach(element => {
                                const foundCities = [];
                                var stateLocation = element['Country']['LocalizedName']+'-'+element['AdministrativeArea']['LocalizedName'];
                                var cardInfo = `
                                <button data='${JSON.stringify(element)}' state="${element['Country']['LocalizedName']} - ${element['AdministrativeArea']['LocalizedName']}" city="${element['LocalizedName']}" lat="${element['GeoPosition']['Latitude']}" lng="${element['GeoPosition']['Longitude']}" class="card my-3 p-2 px-3 w-100 border border-2 btn-select-city">
                                    <strong class="h5 m-0">${element['LocalizedName']}</strong>
                                    <small class="m-0">${stateLocation}</small>
                                </button>
                                `;
                                // imprime los resultados encontrados en el modal
                                foundCities.push(cardInfo);
                                $('#count-cities').html('Se han encontrado '+response.data.length+' coincidencias');
                                $('#body-city').append(cardInfo);
                            });
                            $('.btn-select-city').click(function(e) {
                                // inicializo la función para traer los datos del clima
                                searchWeather($(this).attr('lat'), $(this).attr('lng'), $(this).attr('city'), $(this).attr('state'));
                                modal.hide();
                                $.ajax({
                                    type: "POST",
                                    url: "{!! route('record.save') !!}",
                                    data: JSON.parse($(this).attr('data')),
                                    headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
                                    dataType: "dataType",
                                    success: function (response) {
                                        console.log('success');
                                    }
                                });
                            });
                            modal.toggle()
                        }else{
                            stateLocation = response.data[0]['Country']['LocalizedName']+'-'+response.data[0]['AdministrativeArea']['LocalizedName'];
                            searchWeather(response.data[0]['GeoPosition']['Latitude'], response.data[0]['GeoPosition']['Longitude'], response.data[0]['LocalizedName'], stateLocation);
                            modal.hide();
                            $.ajax({
                                type: "POST",
                                url: "{!! route('record.save') !!}",
                                data: response.data[0],
                                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')},
                                dataType: "dataType",
                                success: function (response) {
                                    console.log('success');
                                }
                            });
                        }
                    }
                })
                .catch(function(error) {
                    swal({
                        icon: "error",
                        text: "Ha ocurrido un error con tu busqueda, por favor verifica la ciudad ingresada",
                    });
                })
        }

        // funcion para obtener los datos de la api del clima
        function searchWeather(lat, lng, city, state) {
            // En este apartado utilizo ajax debido a que con axios me arroja un error
            $.ajax({
                type: "get",
                url: 'https://api.open-meteo.com/v1/forecast?latitude=' + lat + '&longitude=' + lng +
                    '&hourly=temperature_2m,relativehumidity_2m&daily=temperature_2m_max,temperature_2m_min&timezone=America%2FBogota',
                dataType: "json",
                success: function(response) {
                    var infoWeather = `
                    <h4 class="text-center" id="title-show-info">${city}</h4>
                    <small class="justify-content-center d-flex mt-n2 mb-3">${state}</small>
                    <hr>
                    <div>
                        <strong class="justify-content-center d-flex mt-n3">${response['hourly']['temperature_2m'][0]}°c</strong>
                        <small class="justify-content-center d-flex mt-n3">Temperatura</small>
                    </div>
                    <div class="row text-center mt-4">
                        <div class="col">
                            <strong class="justify-content-center d-flex mt-n3" id="maxmin">${response['daily']['temperature_2m_max'][0]}°c</strong>
                            <small class="justify-content-center d-flex mt-n2">max</small>
                        </div>
                        <div class="col">
                            <strong class="justify-content-center d-flex mt-n3" id="maxmin">${response['daily']['temperature_2m_min'][0]}°c</strong>
                            <small>min</small>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <strong class="justify-content-center d-flex mt-n3">${response['hourly']['relativehumidity_2m'][0]}%</strong>
                        <small class="justify-content-center d-flex mt-n3">Humedad</small>
                    </div>
                    `;
                    
                    $('.show-info-weather').html(infoWeather);
                    setLocationMap(lat, lng);
                    // agregando marcador despues de busqueda
                    new google.maps.Marker({
                        position: new google.maps.LatLng(parseFloat(lat), parseFloat(lng)),
                        map: map
                    });
                }
            });
        }

        // Seteo de ubiacción según la ciudad
        function setLocationMap(lat, lng) {
            map.setCenter(new google.maps.LatLng(lat, lng));
            map.setZoom(13);
            map.setMapTypeId(google.maps.MapTypeId.ROADMAP)
        }
    </script>
@endsection
