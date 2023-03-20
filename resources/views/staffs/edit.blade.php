@extends('layouts.admin')
@section('title','Update Staff')
@section('content')

<div class="card">
        <div class="card-body">

            <form action="{{ route('staffs.update', $staff) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           placeholder=" Name" value="{{ old('name',$staff->name) }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                           placeholder="Phone" value="{{ old('phone',$staff->phone) }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                           id="address"
                           placeholder="Address" value="{{ old('address',$staff->address) }}">
                    @error('address')
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