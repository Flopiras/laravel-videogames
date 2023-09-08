@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-4">

        {{-- create --}}
        <a href="{{ route('admin.consoles.create') }}" class="btn btn-success me-4">Create new Console</a>
        {{-- trash --}}
        <a href="{{ route('admin.consoles.trash') }}" class="btn btn-danger">Trash</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($consoles as $console)
                <tr>
                    <th scope="row">{{ $console->id }}</th>
                    <td>{{ $console->name }}</td>
                    <td>{{ $console->color }}</td>
                    {{-- buttons --}}
                    <td>
                        <div class="d-flex justify-content-between">
                            {{-- show --}}
                            <a href="{{ route('admin.consoles.show', $console) }}" class="btn btn-primary">Show</a>
                            {{-- edit --}}
                            <a href="{{ route('admin.consoles.edit', $console) }}" class="btn btn-warning">Edit</a>

                            {{-- delete --}}
                            <form action="{{ route('admin.consoles.destroy', $console) }}" method="POST">
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
                        <h3>Sorry, there are not consoles!</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
