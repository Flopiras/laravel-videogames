@if ($console->exists)
    <form method="POST" action="{{ route('admin.consoles.update', $console) }}">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.consoles.store') }}">
@endif
@csrf

<div class="row">

    {{-- Name Field --}}
    <div class="col-8">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="name..." value="{{ old('name', $console->name) }}">
            @error('name')
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
                    <option class="text-bg-{{ $color_class }}" @if ($color_class === old('color', $console->color ?? 'info')) selected @endif>
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
