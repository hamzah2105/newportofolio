@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Profile</p>
    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profile</h3>
                @if (get_meta_value('_foto'))
                    <img style="max-width:100px;max-height:100px" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}">
                @endif
                <div class="mb-3">
                    <label for="_foto">Foto</label>
                    <input type="file" class="form-control" name="_foto" id="_foto">
                </div>
                <div class="mb-3">
                    <label for="_nama" class="form-label">Nama</label>
                    <input type="text" class="form-control form-control-sm" name="_nama" id="_nama"
                        value="{{ get_meta_value('_nama') }}">
                </div>
                <div class="mb-3">
                    <label for="_title" class="form-label">Title</label>
                    <input type="text" class="form-control form-control-sm" name="_title" id="_title"
                        value="{{ get_meta_value('_title') }}">
                </div>
                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-sm" name="_email" id="_email"
                        value="{{ get_meta_value('_email') }}">
                </div>
                <div class="mb-3">
                    <label for="_alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control form-control-sm" name="_alamat" id="_alamat"
                        value="{{ get_meta_value('_alamat') }}">
                </div>
                <div class="mb-3">
                    <label for="_nohp" class="form-label">No Hp</label>
                    <input type="text" class="form-control form-control-sm" name="_nohp" id="_nohp"
                        value="{{ get_meta_value('_nohp') }}">
                </div>
                @if (get_meta_value('_pdf'))
                    <a href="{{ asset('pdf/' . get_meta_value('_pdf')) }}" target="_blank">View PDF</a>
                @endif
                <div class="mb-3">
                    <label for="_pdf" class="form-label">Dokumen PDF</label>
                    <input type="file" class="form-control" name="_pdf" id="_pdf" accept=".pdf">
                </div>
            </div>
            <div class="col-5">
                <h3>Akun Media Sosial</h3>
                <div class="mb-3">
                    <label for="_ig" class="form-label">Istagram</label>
                    <input type="text" class="form-control form-control-sm" name="_ig" id="_ig"
                        value="{{ get_meta_value('_ig') }}">
                </div>
                <div class="mb-3">
                    <label for="_tw" class="form-label">Twiter</label>
                    <input type="text" class="form-control form-control-sm" name="_tw" id="_tw"
                        value="{{ get_meta_value('_tw') }}">
                </div>
                <div class="mb-3">
                    <label for="_in" class="form-label">Linkedin</label>
                    <input type="text" class="form-control form-control-sm" name="_in" id="_in"
                        value="{{ get_meta_value('_in') }}">
                </div>
                <div class="mb-3">
                    <label for="_github" class="form-label">Github</label>
                    <input type="text" class="form-control form-control-sm" name="_github" id="_github"
                        value="{{ get_meta_value('_github') }}">
                </div>
            </div>
        </div>

        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection
