<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(Kost $kost){

        // return $kost->get();

        return view('pages.home', [
            'kost' => $kost->get()
        ]);
    }
}
