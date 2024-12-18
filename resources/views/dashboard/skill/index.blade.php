@extends('dashboard.layout')

@section('konten')
    <p class="card-title">Skill</p>
    <form action="{{ route('skill.update') }}" method="POST">
        @csrf
        <div class="row justify-content-between">
            <div class="mb-3">
                <label for="_language" class="form-label">Programan Language & Tools</label>
                <input type="text" class="form-control form-control-sm skill" name="_language" id="_language"
                    aria-describedby="helpId" placeholder="Programan Language & Tools"
                    value="{{ get_meta_value('_language') }}" />
            </div>
        </div>
        <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
    </form>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            $('.skill').tokenfield({
                autocomplete: {
                    source: [{!! $skill !!}],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });
        });
    </script>
@endpush
