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
            @forelse($publishers as $publisher)
                <tr>
                    <th scope="row">{{ $publisher->id }}</th>
                    <td>{{ $publisher->label }}</td>
                    <td>{{ $publisher->deleted_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            {{-- delete --}}
                            <form method="POST" action="{{ route('admin.publishers.drop', $publisher) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger me-4">Delete</button>
                            </form>

                            {{-- restore --}}
                            <form method="POST" action="{{ route('admin.publishers.restore', $publisher) }}">
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
                        <h3>Sorry, there are not publishers!</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
