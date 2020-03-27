<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function index(){

        //HTTP client
        $response_indonesia = Http::get('https://api.kawalcorona.com/indonesia/'); 
        $response_provinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi'); 

        $data_ind     = $response_indonesia->json();
        $data_prov    = $response_provinsi->json();

         return view('home', compact('data_ind','data_prov'));
    }
}
