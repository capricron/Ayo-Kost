<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Penghuni;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{

    public function index($slug, $id, Kost $kost){

        $kost = Kost::where('slug', $slug)->firstOrFail();
        $user = User::where("id", $kost->id_user)->first();

        return view('pages.pembayaran', [
            'kost' => $kost,
            'user' => $user,
            'slug' => $slug,
            'id' => $id
        ]);
    }

    public function bayar($slug, $id, Kost $kost, Request $request, Penghuni $penghuni){


        $kost = Kost::where('slug', $slug)->firstOrFail();
        $user = User::where("id", $kost->id_user)->first();

        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->bukti->extension();
        $filenameToStore = '/images/transfer/' . $imageName;

        $request->bukti->move(public_path('images/transfer'), $imageName);

        $penghuni->create([
            'id_kost' => $kost->id,
            'id_penghuni' => auth()->user()->id,
            'kamar' => $id,
            'bukti' => $filenameToStore
        ]);

        return redirect('/mykost')->with("Pembayaran Telah Berhasil");

        // $kost->update([
        //     'status' => 1,
        //     'bukti' => $imageName
        // ]);

        // return view('pages.pembayaran', [
        //     'kost' => $kost,
        //     'user' => $user,
        //     'slug' => $slug,
        //     'id' => $id
        // ]);

    }

}
