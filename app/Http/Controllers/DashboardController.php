<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;
use App\Models\Penghuni;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.dashboard.index');
    }

    public function addKost(){
        return view('pages.dashboard.kost.add-kost');
    }

    public function detailKost(){
        return view('pages.dashboard.kost.detail-kost');
    }

    public function penghuni(){

        // $kosts = Kost::where('id_user', auth()->user()->id)->get();

        // $penghuni = Penghuni::where('id_kost', $kosts->id)->get();
        $menghuni = Kost::where('id_user', auth()->user()->id)
        ->where('disetujui', 'diterima')
        ->get();

        foreach ($menghuni as $kost) {
            $kost->penghuni = Penghuni::where('id_kost', $kost->id)->get();
            foreach( $kost->penghuni as $penghuni){
                $penghuni->user = User::where('id', $penghuni->id_penghuni)->first();
            }
        }

        // return $menghuni;

        return view('pages.dashboard.penghuni',
        [
            'menghuni' => $menghuni
        ]);
    }



}
