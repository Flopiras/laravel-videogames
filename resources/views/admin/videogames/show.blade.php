@extends('layouts.app')

@section('content')
    @include('includes.modal')
    <div class="d-flex justify-content-center mt-5">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-4">

                    {{-- Image --}}
                    <img src="{{ $videogame->cover ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSp41IWFGc4DITJ1TKcUvwLnSavXinocukcMc2y5fXEAtCWDx4bQFOU1srExMJLtp3Aklo&usqp=CAU' }}"
                        class="img-fluid h-100" alt="{{ $videogame->title }}">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        {{-- Title --}}
                        <h5 class="card-title">{{ $videogame->title }}</h5>

                        {{-- Consoles --}}
                        <div class="mb-3">
                            @forelse ($videogame->consoles as $console)
                                <span class="badge text-bg-{{ $console->color }}">

                                    {{ $console->name }}
                                </span>
                            @empty
                                -
                            @endforelse
                        </div>

                        {{-- Publisher --}}
                        <p class="card-text">
                            <small class="text-body-secondary"><strong>Publisher: </strong></small>
                            @if ($videogame->publisher)
                                <span class="badge" style="background-color: {{ $videogame->publisher->color }};">

                                    {{ $videogame->publisher->label }}
                                </span>
                            @else
                                -
                            @endif
                        </p>

                        {{-- Year --}}
                        <p class="card-text"><small class="text-body-secondary"><strong>Year:
                                </strong>{{ $videogame->year }}</small></p>

                        {{-- Description --}}
                        <p class="card-text">{{ $videogame->description }}</p>

                        {{-- Created at --}}
                        <p class="card-text text-body-secondary"><strong>Created At: </strong>{{ $videogame->created_at }}
                        </p>

                        {{-- Updated at --}}
                        <p class="card-text text-body-secondary"><strong>Updated At: </strong>{{ $videogame->updated_at }}
                        </p>

                        {{-- Actions --}}
                        <div class="buttons d-flex gap-1">
                            <a class="btn btn-primary" href="{{ route('admin.videogames.index') }}">Back</a>
                            <a class="btn btn-warning" href="{{ route('admin.videogames.edit', $videogame) }}">Edit</a>
                            <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                data-bs-target="#{{ $videogame->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
