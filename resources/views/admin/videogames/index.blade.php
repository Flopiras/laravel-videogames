@extends('layouts.app')

@section('content')

    {{-- create --}}
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('admin.videogames.create')}}" class="btn btn-success">Create new Videogame</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Year</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($videogames as $videogame)
                <tr>
                    <th scope="row">{{ $videogame->id }}</th>
                    <td>{{ $videogame->title }}</td>
                    <td>{{ $videogame->year }}</td>
                    <td>{{ $videogame->created_at }}</td>
                    <td>{{ $videogame->updated_at }}</td>
                    {{-- buttons --}}
                    <td>
                        <div class="d-flex justify-content-between">
                            {{-- show --}}
                             <a href="{{ route('admin.videogames.show', $videogame) }}" class="btn btn-primary">Show</a>
                            {{-- edit --}}
                            <a href="{{route('admin.videogames.edit', $videogame)}}" class="btn btn-warning">Edit</a>

                            {{-- delete --}}
                            <form action="{{ route('admin.videogames.destroy', $videogame) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h3>Sorry, there are not videogames!</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
