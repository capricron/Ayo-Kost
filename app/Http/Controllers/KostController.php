<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Penghuni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // cari kost berdasarkan id user
        $kost = Kost::where('id_user', auth()->user()->id)->get();

        return view('pages.dashboard.index', [
            'kost' => $kost
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Kost $kost)
    {


        // save image foto to images/kost
        $image = $request->file('foto');
        $extension = $image->getClientOriginalExtension();
        $filename = Str::slug($request->nama) . '.' . $extension;
        $image->move(public_path('images/kost'), $filename);
        $filenameToStore = '/images/kost/' . $filename;

        // id user
        $data['id_user'] = auth()->user()->id;

        $data['nama'] = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['deskripsi'] = $request->deskripsi;
        $data['foto'] = $filenameToStore;
        $data['fasilitas'] = $request->fasilitas;
        $data['harga'] = $request->harga;
        $data['jumlah_kamar'] = $request->jumlah_kamar;
        $data['slug'] = Str::slug($request->nama);
        $data['bank'] = $request->bank;
        $data['no_rekening'] = $request->no_rekening;

        $kost->create($data);

        return redirect('dashboard')->with('success', 'Kost berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Kost $kost)
    {


        // cari kost berdasarkan slug url dan sekaligus user yang berelasi
        $kost = Kost::where('slug', $slug)->firstOrFail();
        $user = User::where("id", $kost->id_user)->first();

        // cari semua penghuni yang sesuai dengan kost
        $penghuni = Penghuni::where('id_kost', $kost->id)->get();

        $kamar = collect($penghuni)->pluck('kamar')->toArray();

        $fasilitas = explode(",", $kost->fasilitas);

        if(auth()->check() && auth()->user()->role == "pemilik"){
            return view('pages.dashboard.kost.detail-kost', [
                'kost' => $kost,
                'fasilitas' => $fasilitas
            ]);
        } else {
            return view('pages.kost', [
                'kost' => $kost,
                'fasilitas' => $fasilitas,
                'user' => $user,
                'kamar' => $kamar
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, Kost $kost)
    {

        // cari berdasarkan slug url
        $kost = Kost::where('slug', $slug)->firstOrFail();

        return view('pages.dashboard.kost.edit-kost', [
            'kost' => $kost
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function update($slug, Request $request, Kost $kost)
    {

        // cari berdasarkan slug url
        $kost = Kost::where('slug', $slug)->firstOrFail();

        // jika ada foto baru
        if($request->hasFile('foto')){

            // delete foto lama
            unlink(public_path($kost->foto));

            // save image foto to images/kost
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            $filename = Str::slug($request->nama) . '.' . $extension;
            $image->move(public_path('images/kost'), $filename);
            $filenameToStore = '/images/kost/' . $filename;

            $data['foto'] = $filenameToStore;
        }

        $data['nama'] = $request->nama;
        $data['alamat'] = $request->alamat;
        $data['deskripsi'] = $request->deskripsi;
        $data['fasilitas'] = $request->fasilitas;
        $data['harga'] = $request->harga;
        $data['jumlah_kamar'] = $request->jumlah_kamar;
        $data['slug'] = Str::slug($request->nama);
        $data['bank'] = $request->bank;
        $data['no_rekening'] = $request->no_rekening;

        $kost->where('slug', $slug)->update($data);

        return redirect('/dashboard/kost-ku/'.$request->slug)->with('success', 'Kost berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kost $kost)
    {
        //
    }
}
