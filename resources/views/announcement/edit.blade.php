@extends('layouts.admin')
@section('title','Update Announcement')
@section('content')

<div class="card">
        <div class="card-body">

            <form action="{{ route('announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name"> Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           placeholder=" Title" value="{{ old('title',$announcement->title) }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textarea" name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                           placeholder="Description" value="{{ old('description',$announcement->description) }}">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date"
                           placeholder="Date" value="{{ old('date',$announcement->date) }}">
                    @error('date')
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