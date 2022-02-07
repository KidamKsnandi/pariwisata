<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Session;
use Str;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::with('kategori')->get();
        return view('admin.wisata.index', compact('wisata'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('admin.wisata.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
        ];

        $request->validate([
            'nama_wisata' => 'required|unique:wisatas',
            'lokasi' => 'required',
            'cover' => 'required',
            'nama_wisata.*' => 'required',
            'lokasi.*' => 'required',
            'cover.*' => 'required|image|max:2048',
        ], $messages);

        // $wisata = new Wisata();
        // $wisata->nama_wisata = $request->nama_wisata;
        // $slug = Str::slug($wisata->nama_wisata);
        // $wisata->slug = $slug;
        // $wisata->id_kategori = $request->id_kategori;
        // $wisata->lokasi = $request->lokasi;
        // $wisata->deskripsi_wisata = "Belum Ada Deskripsi, Maaf :( ";
        // if($request->harga_tiket ==  "0") {
        //     $wisata->harga_tiket = "Gratis";
        // } else {
        // $wisata->harga_tiket = $request->harga_tiket;
        // }
        // if ($request->hasFile('cover')) {
        //     $image = $request->file('cover');
        //     $name = rand(1000, 9999) . $image->getClientOriginalName();
        //     $image->move('images/cover/', $name);
        //     $wisata->cover = $name;
        // }
        // $wisata->status = $request->status;
        // $wisata->save();
        if (is_countable($request['nama_wisata']) && count($request['nama_wisata']) > 0) {
            foreach ($request['nama_wisata'] as $item => $value) {
                // $data = array(
                //     'nama_wisata' => $request['nama_wisata'][$item],
                //     'slug' => Str::slug($request['nama_wisata'][$item]),
                //     'id_kategori' => $request['id_kategori'][$item],
                //     'lokasi' => $request['lokasi'][$item],
                //     'deskripsi_wisata' => 'Belum Ada Deskripsi, Maaf :(',
                //     'harga_tiket' => $request['harga_tiket'][$item],
                //     ''
                // );
                // Kategori::create($data);
                $wisata = new Wisata();
                $wisata->nama_wisata = $request['nama_wisata'][$item];
                $slug = Str::slug($request['nama_wisata'][$item]);
                $wisata->slug = $slug;
                $wisata->id_kategori = $request['id_kategori'][$item];
                $wisata->lokasi = $request['lokasi'][$item];
                $wisata->deskripsi_wisata = "Belum Ada Deskripsi, Maaf :( ";
                $wisata->harga_tiket = "Belum Ditentukan";
                if ($request->hasFile('cover')) {
                    $image = $request['cover'][$item];
                    $name = rand(1000, 9999) . $image->getClientOriginalName();
                    $image->move('images/cover/', $name);
                    $wisata->cover = $name;
                }
                $wisata->status = "Normal";
                $wisata->save();
            }
        }
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan Wisata Baru",
        ]);
        return redirect()->route('wisata.index');
    }

    public function deskripsi(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('admin.wisata.deskripsi', compact('wisata'));
    }

    public function simpandeskripsi(Request $request, Wisata $wisata)
    {
        $messages = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya ngab!!!',
        ];

        $request->validate([
            'deskripsi_wisata' => 'required|min:100',
        ], $messages);

        $wisata = Wisata::findOrFail($wisata->id);
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        $wisata->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan Deskripsi Wisata $wisata->nama_wisata",
        ]);
        return redirect()->route('wisata.index');
    }

    public function harga(Wisata $wisata)
    {
        $wisata = Wisata::find($wisata->id);
        return view('admin.wisata.harga', compact('wisata'));
    }

    public function simpanharga(Request $request, Wisata $wisata)
    {
        $messages = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
        ];

        $request->validate([
            'harga_tiket' => 'required|string',
        ], $messages);

        $wisata = Wisata::findOrFail($wisata->id);
        $wisata->harga_tiket = $request->harga_tiket;
        $wisata->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan Harga Tiket $wisata->nama_wisata",
        ]);
        return redirect()->route('wisata.index');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        $status = json_decode($wisata->status);
        $kategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        return view('admin.wisata.edit', compact('wisata', 'kategori', 'status'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Data tidak boleh kosong!! wajib diisi ngab!!!',
            'min' => ':attribute minimal :min karakter ya ngab!!',
        ];

        $request->validate([
            'nama_wisata' => 'required',
            'id_kategori' => 'required',
            'lokasi' => 'required',
            'deskripsi_wisata' => 'required|min:100',
            'harga_tiket' => 'required',
        ], $messages);

        $wisata = Wisata::findOrFail($id);
        $wisata->nama_wisata = $request->nama_wisata;
        $slug = Str::slug($wisata->nama_wisata);
        $wisata->slug = $slug;
        $wisata->id_kategori = $request->id_kategori;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi_wisata = $request->deskripsi_wisata;
        $wisata->harga_tiket = $request->harga_tiket;
        // upload cover
        if ($request->hasFile('cover')) {
            $wisata->deleteCover();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/cover/', $name);
            $wisata->cover = $name;
        }
        if ($request->status == "") {
            $wisata->status = "Normal";
        } else {
            $wisata->status = $request->status;
        }
        $wisata->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan $wisata->nama_wisata",
        ]);
        return redirect()->route('wisata.index');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        if (!Wisata::destroy($id)) {return redirect()->back();} else {
            $wisata->deleteCover();
            Session::flash("flash_notification", [
                "level" => "success",
                "message" => "Berhasil Menghapus ",
            ]);
            return redirect()->route('wisata.index');
        }
    }
}
