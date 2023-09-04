@extends('layouts.app')

@section('content')

<table class="table">
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
            {{-- show --}}
            <a href="#" class="btn btn-primary">Show</a>
            {{-- edit --}}
            <a href="#" class="btn btn-warning">Edit</a>
            {{-- delete --}}
            <form action="">
                <button class="btn btn-danger">Delete</button>
            </form>
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