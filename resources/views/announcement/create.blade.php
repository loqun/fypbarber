@extends('layouts.admin')
@section('title','Create Announcement')
@section('content')

<div class="card">
        <div class="card-body">

            <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title"> Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           placeholder=" Title" value="{{ old('title') }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"name="description" id="description"
                    rows="3"   placeholder="Description" value="{{ old('description') }}"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date"
                           placeholder="Date" value="{{ old('date') }}">
                    @error('date')
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