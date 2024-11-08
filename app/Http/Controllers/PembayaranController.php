<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Penghuni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PembayaranController extends Controller
{

    public function index($slug, $id, Kost $kost){

        if(auth()->user()->role == 'penghuni'){
            $kost = Kost::where('slug', $slug)->firstOrFail();
            $user = User::where("id", $kost->id_user)->first();

            return view('pages.pembayaran', [
                'kost' => $kost,
                'user' => $user,
                'slug' => $slug,
                'id' => $id
            ]);
        }else{
            return redirect('/');
        }
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

        if(Penghuni::where('id_kost', $kost->id)
        ->where('kamar', $id)
        ->exists()){
            $perpanjang = Penghuni::where('id_kost', $kost->id)
            ->where('kamar', $id)
            ->first();
            $perpanjang->update([
                'acc' => null,
                'bukti' => $filenameToStore,
                'lama_sewa' => $request->lamasewa,
                'tanggal_masuk' => null
            ]);
        }else{
            $penghuni->create([
                'id_kost' => $kost->id,
                'id_penghuni' => auth()->user()->id,
                'kamar' => $id,
                'bukti' => $filenameToStore,
                'lama_sewa' => $request->lamasewa,
            ]);        }



        return redirect('/dashboard')->with("Pembayaran Telah Berhasil");

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

    public function pembayaran(){

        $menghuni = Kost::where('id_user', auth()->user()->id)->get();

        foreach ($menghuni as $kost) {
            $kost->penghuni = Penghuni::where('id_kost', $kost->id)->get();
            foreach ($kost->penghuni as $penghuni) {
                $penghuni->user = User::where('id', $penghuni->id_penghuni)->first();
            }
        }

        $menghuni = $menghuni->sortBy(function ($item) {
            $disetujuiOrder = [
                null, // Urutan null (belum disetujui)
                "tolak",    // Urutan ditolak (biasanya menggunakan 0 atau nilai negatif)
                "terima"     // Urutan diterima (biasanya menggunakan 1 atau nilai positif)
            ];
            $disetujuiValue = $item->penghuni->pluck('disetujui')->first();
            return array_search($disetujuiValue, $disetujuiOrder);
        });

        // return $menghuni;



        return view('pages.dashboard.pembayaran', [
            'menghuni' => $menghuni
        ]);
    }

    public function detailPembayaran($id){


        $bukti = Penghuni::where('id', $id)->first();
        return view('pages.dashboard.detail-pembayaran', [
            'bukti' => $bukti
        ]);
    }

    public function updatePembayaran($id, $status){

        if(auth()->user()->role == 'pemilik'){
            $penghuni = Penghuni::where('id', $id)->first();

            $auth_kost = Kost::where('id', $penghuni->id_kost)->first();
            // update status menjadi true dan tanggal_masuk sekarang\

            if($status == "terima"){
                $penghuni->update([
                    'acc' => "diterima",
                    'tanggal_masuk' => date("Y-m-d")
                ]);
            }else{
                $penghuni->update([
                    'acc' => "ditolak",
                ]);
            }

            return redirect('/dashboard/pembayaran')->with('success', 'Pembayaran Berhasil Dikonfirmasi');

        }elseif(auth()->user()->role == 'admin'){

            $kost = Kost::where('id', $id)->first();

            $filePath = public_path('images/transfer/' . $kost->bukti);

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            if($status == 'terima'){
                $kost->update([
                    'disetujui' => 'diterima',
                    'bukti' => null
                ]);
            }else if($status == 'hapus')
                $kost->delete();
            else{
                $kost->update([
                    'disetujui' => 'ditolak',
                    'bukti' => null
                ]);
            }

            return redirect('/dashboard/')->with('success', 'Pembayaran Berhasil Dikonfirmasi');

        }else{
            return redirect('/dashboard');
        }
    }

}
