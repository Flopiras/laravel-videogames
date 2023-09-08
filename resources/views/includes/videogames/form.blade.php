@if ($videogame->exists)
    <form method="POST" action="{{ route('admin.videogames.update', $videogame) }}">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.videogames.store') }}">
@endif
@csrf

<div class="row">

    {{-- Title --}}
    <div class="col-8">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text"
                class="form-control @error('title') is-invalid @elseif(old('title')) is-valid @enderror"
                id="title" name="title" placeholder="Title..." value="{{ old('title', $videogame->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Year --}}
    <div class="col-4">
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text"
                class="form-control @error('year') is-invalid @elseif(old('year')) is-valid @enderror"
                id="year" name="year" value="{{ old('year', $videogame->year) }}">
            @error('year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Cover --}}
    <div class="col-6">
        <div class="mb-3">
            <label for="cover" class="form-label">Cover</label>
            <input type="url"
                class="form-control @error('cover') is-invalid @elseif(old('cover')) is-valid @enderror"
                id="cover" name="cover" value="{{ old('cover', $videogame->cover) }}">
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Publisher --}}
    <div class="col-6">
        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <select class="form-select" name="publisher_id" id="publisher">
                <option value="">None publisher</option>
                @foreach ($publishers as $publisher)
                    <option @if (old('publisher_id', $videogame->publisher_id) == $publisher->id) selected @endif value="{{ $publisher->id }}">
                        {{ $publisher->label }}</option>
                @endforeach
            </select>
            @error('publisher')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Description --}}
    <div class="col-12">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @elseif(old('description')) is-valid @enderror"
                name="description" id="description" rows="20">{{ old('description', $videogame->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-12 text-end mt-3">
        <button class="btn btn-success" type="submit">Submit</button>
    </div>

</div>
</form>
