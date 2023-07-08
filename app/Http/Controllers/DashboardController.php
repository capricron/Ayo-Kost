<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;


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
        return view('pages.dashboard.penghuni');
    }

    public function pembayaran(){
        return view('pages.dashboard.pembayaran');
    }

    public function detailPembayaran(){
        return view('pages.dashboard.detail-pembayaran');
    }

}
