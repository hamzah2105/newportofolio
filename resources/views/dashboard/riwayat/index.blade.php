@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Riwayat</p>
    <div class="pb-3"><a href="{{ route('riwayat.create') }}" class="btn btn-primary">+ Tambah Riwayat</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Akhir</th>
                    <th>Posisi</th>
                    <th>Nama Perusahaan</th>
                    <th class="col-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->info2 }}</td>
                        <td>
                            <a href="{{ route('riwayat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Yakin mau hapus data ini?')"
                                action="{{ route('riwayat.destroy', $item->id) }}" class="d-inline" method="POST">
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
