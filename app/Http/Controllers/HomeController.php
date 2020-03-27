<?php

namespace App\Http\Controllers;

use App\Charts\CovidChart;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(){

        //HTTP client
        $response_indonesia = Http::get('https://api.kawalcorona.com/indonesia/'); 
        $response_provinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi'); 
        // $suspects = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        $suspects = collect($response_provinsi->json())->take(10);

        $labels = $suspects->flatten(1)->pluck('Provinsi');
        $data   = $suspects->flatten(1)->pluck('Kasus_Posi');

        $colors = $labels->map(function($item) {
            return $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
        });

        $chart = new CovidChart;
        $chart->labels($labels);
        $chart->dataset('Kasus Positif', 'pie', $data)->backgroundColor($colors);


        $data_ind     = $response_indonesia->json();
        $data_prov    = $response_provinsi->json();

         return view('home', compact('data_ind','data_prov','chart'));
    }
}
