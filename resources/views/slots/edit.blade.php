@extends('layouts.admin')
@section('title','Update Slot')
@section('content')

<div class="card">
        <div class="card-body">

            <form action="{{ route('slots.update', $slot) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nslot"> Slot</label>
                    <input type="time" name="nslot" class="form-control @error('nslot') is-invalid @enderror"
                           id="nslot"
                           placeholder=" Slot" value="{{ old('nslot',$slot->nslot) }}">
                    @error('nslot')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection