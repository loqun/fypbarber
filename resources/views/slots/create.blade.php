@extends('layouts.admin')
@section('title','Create Slots')
@section('content')

<div class="card">
        <div class="card-body">

            <form action="{{ route('slotintervals') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- <div class="form-group">
                    <label for="nslot"> Slot</label>
                    <input type="text" name="nslot" class="form-control @error('nslot') is-invalid @enderror"
                           id="name"
                           placeholder=" Slot" value="{{ old('nslot') }}">
                    @error('nslot')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> -->

                <div class="form-group">
                    <label for="starttime"> Start time </label>
                    <input type="time" name="starttime" class="form-control @error('starttime') is-invalid @enderror"
                           id="starttime"
                           placeholder=" Start time" value="{{ old('starttime') }}"
                           
                           
                           >
                    @error('starttime')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="interval"> Interval (minutes)</label>
                    <input type="number" name="interval" min="0" class="form-control @error('interval') is-invalid @enderror"
                           id="interval"
                           placeholder=" Interval" value="{{ old('intervalt') }}">
                    @error('interval')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="endtime"> End time</label>
                    <input type="time" name="endtime" class="form-control @error('endtime') is-invalid @enderror"
                           id="endtime"
                           placeholder=" End time" value="{{ old('endtime') }}">
                    @error('endtime')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <button class="btn btn-primary" type="submit">Create</button>
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