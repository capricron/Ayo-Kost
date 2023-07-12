<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){

        // return $kost->get();

        $kost = Kost::where('disetujui', 'diterima')->get();

        return view('pages.home', [
            'kost' => $kost,
        ]);
    }
}
