<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Penghuni;
use Illuminate\Http\Request;

class MyKostController extends Controller
{

    public function index()
    {
        $idUser = auth()->user()->id;

        $menghuni = Penghuni::where('id_penghuni', $idUser)
        ->join('kosts', 'penghunis.id_kost', '=', 'kosts.id')
        ->get();

        return view('pages.mykost', [
            'menghuni' => $menghuni
        ]);
    }

}
