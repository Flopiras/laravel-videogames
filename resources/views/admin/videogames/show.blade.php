@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center mt-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-4">
                    <img src="{{ $videogame->cover ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp41IWFGc4DITJ1TKcUvwLnSavXinocukcMc2y5fXEAtCWDx4bQFOU1srExMJLtp3Aklo&usqp=CAU' }}"
                        class="img-fluid h-100" alt="{{ $videogame->title }}">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $videogame->title }}</h5>
                        <p class="card-text"><small class="text-body-secondary">{{ $videogame->year }}</small></p>
                        <p class="card-text">{{ $videogame->description }}</p>
                        <p class="card-text text-body-secondary">Created at: {{ $videogame->created_at }}</p>
                        <p class="card-text text-body-secondary">Updated at: {{ $videogame->updated_at }}</p>
                        <div class="buttons">
                            <a class="btn btn-primary" href="{{ route('admin.videogames.index') }}">Back</a>
                            <a class="btn btn-warning" href="#">Edit</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
