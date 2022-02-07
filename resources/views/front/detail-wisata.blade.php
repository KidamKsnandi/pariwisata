@extends('layouts.partials.link')

@section('content')
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Wisata {{ $wisata->nama_wisata }} </h4>
                <h4><a class="badge badge-info text-uppercase float-right font-weight-semi-bold p-2 mr-2 mt-2"
                        href="/{{ $wisata->slug }}/galeriwisata"><i class="fa fa-image"></i>&nbsp;Galeri</a></h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3"> {{-- 700x435 --}}
                        <img class="img-fluid w-100" src="{{ $wisata->cover() }}"
                            style="width: 700px; height: 460px; object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4 text-dark">
                            <div class="mb-3">
                                <small class="text-body border-right">Kategori :
                                    {{ $wisata->kategori->nama_kategori }} </small><small class="text-body">
                                    &nbsp;{{ $wisata->lokasi }}</small>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $wisata->nama_wisata }}
                            </h1>
                            <p>{!! $wisata->deskripsi_wisata !!}</p>
                            <h4>Harga Tiket : </h4>
                            <p>{!! $wisata->harga_tiket !!}</p>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>
            </div>
        </div>
    </div>
@endsection
