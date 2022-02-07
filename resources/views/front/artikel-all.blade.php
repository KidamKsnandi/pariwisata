@extends('layouts.main')

@section('content')

    {{-- <section id="catagorie">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-heading">
                            <h2>Artikel</h2>
                        </div>
                        @foreach ($artikel as $data)
                            <br><br><br>
                            <div class="card mb-6">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <a class="catagotie-head" href="/{{ $data->slug }}/selengkapnya">
                                            <img src=" {{ $data->cover() }}" style="width:350px; height:220px;"
                                                alt="Cover">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h2 class="card-title">{{ $data->judul }}</h2>
                                            </a>
                                            <p class="card-text">Penulis : {{ $data->user->name }} <br>
                                                {!! substr($data->konten, 0, 200) !!}....</p>

                                            <a href="/{{ $data->slug }}/selengkapnya"
                                                class="btn btn-default btn-transparent" role="button">
                                                <span>Lihat Selengkapnya...</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- End of /.block -->
                </div> <!-- End of /.col-md-12 -->
            </div> <!-- End of /.row -->
        </div> <!-- End of /.container -->
    </section> --}}

    <!-- News With Sidebar Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold"> Semua Artikel</h4>
                            </div>
                        </div>
                        @foreach ($artikel as $data)
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="{{ $data->cover() }}"
                                        style="object-fit: cover; width:350px; height:220px;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <small class="text-body border-right">Author : {{ $data->user->name }}
                                                &nbsp;</small>
                                            <small> {{ $data->created_at->format('d, M Y') }}</small>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="/{{ $data->slug }}/selengkapnya">{{ $data->judul }}</a>
                                        <p class="m-0">{!! substr($data->konten, 0, 100) !!}....</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
