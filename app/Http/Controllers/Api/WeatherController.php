<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function defaultCountry($city = null){
        $cities = config('app.cities');
        $arrWeather = array();
        try {
            foreach ($cities as $city) {
                $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude='.$city['lat'].'&longitude='.$city['lng'].'&hourly=temperature_2m,relativehumidity_2m&daily=temperature_2m_max,temperature_2m_min&timezone=America%2FBogota');
                if ($response->successful()) {
                    // $arrWeather[$city['name']] = $response->json('hourly');
                    // dd($response->json('daily'));
                    $arrActualyWeather = [
                        'city'        => $city['name'],
                        'date'        => date('Y-m-d', strtotime($response->json('hourly')['time'][0])),
                        'temperature' => $response->json('hourly')['temperature_2m'][0],
                        'humidity'    => $response->json('hourly')['relativehumidity_2m'][0],
                        'image'       => $city['urlImg'],
                        'location'    => [
                            'lat'     => $city['lat'],
                            'lng'     => $city['lng']
                        ],
                        'maxmintemp'  => [
                            'max'     => $response->json('daily')['temperature_2m_max'][0],
                            'min'     => $response->json('daily')['temperature_2m_min'][0],
                        ]
                    ];
                    // dd($arrActualyWeather);
                    array_push($arrWeather, $arrActualyWeather);
                }
            }
            return json_encode($arrWeather);    
        } catch (\Throwable $th) {
            return 'ha ocurrido un error: '.$th;
        }
    }
}
