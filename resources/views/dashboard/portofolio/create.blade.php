@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('portofolio.index') }}" class="btb=n btn-secondary">
            << Kembali</a>
    </div>
    <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Gambar Utama</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Tambahan</label>
            <input type="file" class="form-control" name="gambar" value="{{ old('gambar') }}">
            @error('gambar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lukisan">Lukisan</label>
            <input type="file" class="form-control" name="lukisan" value="{{ old('lukisan') }}">
            {{-- @error('lukisan')
                <div class="text-danger">{{ $message }}</div>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Nama Project</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title"
                aria-describedby="helpId" placeholder="Nama Project" value="{{ old('title') }}" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="description">{{ old('description') }}</textarea>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
