@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Project</p>
    <div class="pb-3"><a href="{{ route('portofolio.create') }}" class="btn btn-primary">+ Tambah Riwayat</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Nama Project</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                    <th>Gambar</th>
                    <th>Gambar</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td><img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                        <td><img src="{{ asset($item->gambar) }}" alt="{{ $item->title }}">
                        <td><img src="{{ asset($item->lukisan) }}" alt="{{ $item->title }}">
                        </td>
                        <td>
                            <a href="{{ route('portofolio.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                action="{{ route('portofolio.destroy', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
