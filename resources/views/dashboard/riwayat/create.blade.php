@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('riwayat.index') }}" class="btb=n btn-secondary">
            << Kembali</a>
    </div>
    <form action="{{ route('riwayat.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="cal-auto">Tanggal Mulai</div>
                <div class="cal-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai"
                        placeholder="dd/mm/yyy" value="{{ Session::get('tgl_mulai') }}"></div>
                <div class="cal-auto">Tanggal Akihir</div>
                <div class="cal-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir"
                        placeholder="dd/mm/yyy" value="{{ Session::get('tgl_akhir') }}"></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Posisi</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1"
                aria-describedby="helpId" placeholder="Posisi" value="{{ Session::get('info1') }}" />
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2"
                aria-describedby="helpId" placeholder="Nama Perusahaan" value="{{ Session::get('info2') }}" />
        </div>
        {{-- <div class="mb-3">
            <label for="isi" class="form-label">ISi</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{ Session::get('isi') }}</textarea>
        </div> --}}
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
