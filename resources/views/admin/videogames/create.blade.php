@extends('layouts.app')

@section('content')
  <form class="mt-5" method="POST" action="{{ route('admin.videogames.store') }}">
    @csrf
    <div class="mb-3 col-6">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea rows="5" class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="mb-3 col-1">
      <label for="year" class="form-label">Year</label>
      <input type="text" class="form-control" id="year" name="year">
    </div>
    <div class="mb-3">
      <label for="cover" class="form-label">Cover</label>
      <input type="text" class="form-control" id="cover" name="cover">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
