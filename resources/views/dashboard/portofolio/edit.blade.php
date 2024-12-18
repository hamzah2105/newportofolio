@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('portofolio.index') }}" class="btb=n btn-secondary">
            << Kembali</a>
    </div>
    <form action="{{ route('portofolio.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="image">Gambar Utama</label>
            <input type="file" class="form-control" name="image">
            <small>Current Image: 
                @if($data->image)
                    <img src="{{ asset($data->image) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                @else
                    No image uploaded.
                @endif
            </small>
        </div>
        
        <div class="form-group">
            <label for="gambar">Gambar Tambahan</label>
            <input type="file" class="form-control" name="gambar">
            <small>Current Image: 
                @if($data->gambar)
                    <img src="{{ asset($data->gambar) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                @else
                    No image uploaded.
                @endif
            </small>
        </div>
        
        <div class="form-group">
            <label for="lukisan">Lukisan</label>
            <input type="file" class="form-control" name="lukisan">
            <small>Current Image: 
                @if($data->lukisan)
                    <img src="{{ asset($data->lukisan) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                @else
                    No image uploaded.
                @endif
            </small>
        </div>
    
        <div class="mb-3">
            <label for="title" class="form-label">Nama Project</label>
            <input type="text" class="form-control form-control-sm" name="title" id="title"
                placeholder="Nama Project" value="{{ $data->title }}" />
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="description">{{ $data->description }}</textarea>
        </div>
    
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
