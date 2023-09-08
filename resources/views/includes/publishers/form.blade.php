@if ($publisher->exists)
    <form method="POST" action="{{ route('admin.publishers.update', $publisher) }}">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.publishers.store') }}">
@endif
@csrf

<div class="row">

    {{-- Name Field --}}
    <div class="col-8">
        <div class="mb-3">
            <label for="label" class="form-label">Name</label>
            <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label"
                placeholder="name..." value="{{ old('label', $publisher->label) }}">
            @error('label')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- Color Field --}}
    <div class="col-4">
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <select class="form-select @error('color') is-invalid @enderror" name="color" id="color">
                @foreach ($color_classes as $color_class)
                    <option class="text-bg-{{ $color_class }}" @if ($color_class === old('color', $publisher->color ?? 'info')) selected @endif>
                        {{ $color_class }}</option>
                @endforeach
            </select>
            @error('color')
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
