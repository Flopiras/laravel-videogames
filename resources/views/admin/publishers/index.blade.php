@extends('layouts.app')

@section('title', 'Publishers')

@section('content')
    <div class="d-flex justify-content-end my-4">

        {{-- search bar  --}}
        <form action="{{ route('admin.publishers.index') }}" method="GET" class="d-flex me-4" role="search">
            <input class="form-control me-2" type="search" name="title" placeholder="Search" aria-label="Search"
                value="{{ $search_value ?? '' }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        {{-- create --}}
        <a href="{{ route('admin.publishers.create') }}" class="btn btn-success me-4">Create new publisher</a>
        {{-- trash --}}
        <a href="{{ route('admin.publishers.trash') }}" class="btn btn-danger">Trash</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($publishers as $publisher)
                <tr>
                    <th scope="row">{{ $publisher->id }}</th>
                    <td>{{ $publisher->label }}</td>
                    <td>{{ $publisher->created_at }}</td>
                    <td>{{ $publisher->updated_at }}</td>
                    {{-- buttons --}}
                    <td>
                        <div class="d-flex justify-content-between">
                            {{-- show --}}
                            <a href="{{ route('admin.publishers.show', $publisher) }}" class="btn btn-primary">Show</a>
                            {{-- edit --}}
                            <a href="{{ route('admin.publishers.edit', $publisher) }}" class="btn btn-warning">Edit</a>

                            {{-- delete --}}
                            <form action="{{ route('admin.publishers.destroy', $publisher) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h3>Sorry, there are not publishers!</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
