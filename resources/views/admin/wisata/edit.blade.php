@extends('layouts.admin')

@section('ckeditor')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var deskripsi_wisata = document.getElementById("deskripsi_wisata");
        CKEDITOR.replace(deskripsi_wisata, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var harga = document.getElementById("harga");
        CKEDITOR.replace(harga, {
            language: 'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="col-sm-10">Data Wisata</h3>
                            <a href="/admin/wisata" class="fa fa-arrow-left btn btn-secondary">&nbsp;Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('wisata.update', $wisata->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Nama Wisata</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="nama_wisata" autocomplete='off'
                                        value="{{ $wisata->nama_wisata }}"
                                        class="form-control @error('nama_wisata') is-invalid @enderror">
                                    @error('nama_wisata')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Kategori Wisata</label>
                                <div class="input-group input-group-outline">
                                    <select name="id_kategori"
                                        class="form-control @error('id_kategori') is-invalid @enderror">
                                        @foreach ($kategori as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $wisata->id_kategori ? 'selected="selected"' : '' }}>
                                                {{ $data->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Lokasi</label>
                                <div class="input-group input-group-outline">
                                    <input type="text" name="lokasi" autocomplete='off' value="{{ $wisata->lokasi }}"
                                        class="form-control @error('lokasi') is-invalid @enderror">
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi Wisata <small class="text-muted">(Minimal 100
                                        karakter)</small></label>
                                <div class="input-group input-group-outline">
                                    <textarea name="deskripsi_wisata" id="deskripsi_wisata" rows="30" cols="50"
                                        class="form-control @error('deskripsi_wisata') is-invalid @enderror">{{ $wisata->deskripsi_wisata }}</textarea>
                                    @error('deskripsi_wisata')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Harga Tiket</label>
                                <div class="input-group input-group-outline">
                                    <textarea name="harga_tiket" id="harga" autocomplete='off'
                                        class="form-control @error('harga_tiket') is-invalid @enderror">{{ $wisata->harga_tiket }}</textarea>
                                    @error('harga_tiket')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Cover</label>
                                <br>
                                <img src="{{ $wisata->cover() }}" height="75" style="padding:10px;" />
                                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="">Status : </label>
                                <div class="row"> <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
                                    <label class="col-sm-2"><input type="checkbox" name="status[]"
                                            {{ $status[0] == 'Rekomendasi' || isset($status[1]) == 'Rekomendasi' ? 'checked' : '' }}
                                            value="Rekomendasi">&nbsp;Rekomendasi</label>
                                    <label><input type="checkbox"
                                            {{ $status[0] == 'Populer' || isset($status[1]) == 'Populer' ? 'checked' : '' }}
                                            name="status[]" value="Populer">&nbsp;Populer</label>
                                    @error('status.*') <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <button type="reset" class="btn btn-danger text-white"><i class="fa fa-sync"></i>
                                    Reset</button>
                                <button type="submit" class="btn btn-info text-white"><i class="fa fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
