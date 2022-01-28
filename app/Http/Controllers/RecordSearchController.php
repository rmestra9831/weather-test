<?php

namespace App\Http\Controllers;

use App\Models\RecordSearch;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class RecordSearchController extends Controller
{
    public function index(){
        $records = RecordSearch::get();
        return view('records', compact('records'));
    }
    public function saveSearch(Request $request){
        if ($request->ajax()) {
            $agent = new Agent();

            $dataDevice = [
                'ip'        => $request->ip(),
                'device'    => $agent->platform(),
                'navigator' => $agent->browser(),
                'version'   => $agent->version($agent->platform()),
                'searchCity' => $request['LocalizedName'],
                'searchCountryState' => $request['Country']['LocalizedName'].'-'.$request['AdministrativeArea']['LocalizedName'],
                'countryId' => $request['Country']['ID'],
            ];

            RecordSearch::create($dataDevice);

            return $dataDevice;
        }
    }
}
