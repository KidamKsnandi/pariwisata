<?php

namespace App\Models;

use Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori', 'slug'];
    public $timestamps = true;

    public function wisata()
    {
        return $this->hasMany('App\Models\Wisata', 'id_kategori');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($kategori) {
            //mengecek apakah penulis masih punya wisata
            if ($kategori->wisata->count() > 0) {
                Alert::error('Gagal', 'Data tidak bisa di hapus karena memiliki wisata')->autoclose(3000);

                // menyiapkan pesan error
                // $html = 'Kategori tidak bisa dihapus karena memilik wisata : ';
                // $html .= '<ul>';
                //     foreach ($kategori->wisata as $data) {
                //         $html .= "<li>$data->nama_wisata</li>";
                //     }
                //         $html .= '</ul>';
                //     Session::flash("flash_notification", [
                //         "level" => "danger",
                //         "message" => $html
                //     ]);
                //     // membatalkan proses penghapusan
                return false;
            }
        });
    }
}
