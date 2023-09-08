@extends('layouts.app')


@section('content')
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Deleted at</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($consoles as $console)
                <tr>
                    <th scope="row">{{ $console->id }}</th>
                    <td>{{ $console->name }}</td>
                    <td>{{ $console->deleted_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            {{-- delete --}}
                            <form method="POST" action="{{ route('admin.consoles.drop', $console) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger me-4">Delete</button>
                            </form>

                            {{-- restore --}}
                            <form method="POST" action="{{ route('admin.consoles.restore', $console) }}">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success">Restore</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <h3>Sorry, there are not consoles!</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
