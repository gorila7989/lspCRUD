<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //membuat halaman index
        //select * from jurusan
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //refirect create page
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //fungsi untuk validasi form create
        $request->validate([
            'nama_jurusan' => 'required',
            'keterangan'   => 'required',
        ]);
        //fungsi untuk simpan data
        /*INSERT INTO jurusan SET nama_jurusan = $nam_jurusan,
                                  keterangan = $keterangan    */
        
        Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('Berhasil','Jurusan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(jurusan $jurusan)
    {
        //Menampilkan data yang sudah di edit
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(jurusan $jurusan)
    {
        //Menjalankan perintah edit
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusan $jurusan)
    {
        //function validasi
        $request->validate([
            'nama_jurusan' => 'required',
            'keterangan'   => 'required',
        ]);
        //function update
        $jurusan->update($request->all());
        return redirect()->route('jurusan.index')->with('Berhasil',"Jurusan Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jurusan $jurusan)
    {
        //Menjalankan Perintah Delete
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('Berhasil','Jurusan Berhasil di Delete');
    }
}
