<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Session;
use Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'unique' => 'Data sudah ada!! ganti yang lain ngab!!!',
        ];

        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
            'nama_kategori.*' => 'required',
        ], $messages);
        // $kategori = new Kategori();
        // $kategori->nama_kategori = $request->nama_kategori;
        // $slug = Str::slug($kategori->nama_kategori);
        // $kategori->slug = $slug;
        // $kategori->deskripsi_kategori = $request->deskripsi_kategori;
        // $kategori->save();
        if (is_countable($request['nama_kategori']) && count($request['nama_kategori']) > 0) {
            foreach ($request['nama_kategori'] as $item => $value) {
                $kategori = new Kategori();
                $kategori->nama_kategori = $request['nama_kategori'][$item];
                $slug = Str::slug($request['nama_kategori'][$item]);
                $kategori->slug = $slug;
                $kategori->save();
            }
        }
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan Kategori Baru",
        ]);
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'unique' => 'Data sudah ada!! ganti yang lain ngab!!',
        ];

        // Validasi data
        $validated = $request->validate([
            'nama_kategori' => 'required|unique:kategoris',
        ], $messages);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan $kategori->nama_kategori",
        ]);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Kategori::destroy($id)) {return redirect()->back();} else {
            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil Menghapus ",
            ]);
            return redirect()->route('kategori.index');
        }
    }
}
