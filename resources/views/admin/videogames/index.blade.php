@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-4">

        {{-- search bar  --}}
        <form action="{{ route('admin.videogames.index') }}" method="GET" class="d-flex me-4" role="search">
            <input class="form-control me-2" type="search" name="title" placeholder="Search" aria-label="Search"
                value="{{ $search_value ?? '' }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        {{-- create --}}
        <a href="{{ route('admin.videogames.create') }}" class="btn btn-success me-4">Create new Videogame</a>
        {{-- trash --}}
        <a href="{{ route('admin.videogames.trash') }}" class="btn btn-danger">Trash</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Publisher</th>
                <th scope="col">Consoles</th>
                <th scope="col">Year</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($videogames as $videogame)
                @include('includes.modal')
                <tr>
                    <th scope="row">{{ $videogame->id }}</th>
                    <td>{{ $videogame->title }}</td>
                    <td>
                        @if ($videogame->publisher)
                            <span class="badge" style="background-color: {{ $videogame->publisher->color }};">

                                {{ $videogame->publisher->label }}
                            </span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @forelse ($videogame->consoles as $console)
                            <span class="badge text-bg-{{ $console->color }}">

                                {{ $console->name }}
                            </span>
                        @empty
                            -
                        @endforelse

                    </td>
                    <td>{{ $videogame->year }}</td>

                    <td>{{ $videogame->created_at }}</td>
                    <td>{{ $videogame->updated_at }}</td>
                    {{-- buttons --}}
                    <td>
                        <div class="d-flex justify-content-between">
                            {{-- show --}}
                            <a href="{{ route('admin.videogames.show', $videogame) }}" class="btn btn-primary">Show</a>
                            {{-- edit --}}
                            <a href="{{ route('admin.videogames.edit', $videogame) }}"
                                class="btn btn-warning ms-2">Edit</a>

                            {{-- delete --}}
                            <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                                data-bs-target="#{{ $videogame->id }}">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        <h3>Sorry, there are not videogames!</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
