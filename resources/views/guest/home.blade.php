@extends('layouts.app')
@section('content')
    {{-- GUEST HOME --}}
    <main id="guest-home">
        <div class="row mb-5">
            <div class="col-12 text-center mt-5">
                <h1>Videogames</h1>
            </div>
            @foreach ($videogames as $videogame)
                <div class="col-3 gy-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $videogame->cover ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp41IWFGc4DITJ1TKcUvwLnSavXinocukcMc2y5fXEAtCWDx4bQFOU1srExMJLtp3Aklo&usqp=CAU' }}"
                            alt="{{ $videogame->title }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-center mt-2">
                                <h5 class="card-title">{{ $videogame->title }}</h5>
                            </div>
                            <div class="d-flex justify-content-center my-2">
                                <a href="{{ route('admin.videogames.show', $videogame) }}" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
