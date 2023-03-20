@extends('layouts.admin')
@section('content-header','')
@section('content-actions')

<a href="{{route('announcements.create')}}" class="btn btn-primary">Create Announcement</a>


@endsection
@section('css')
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content')
 
<div class="card">


<div class="card-header"style ="background-color:#16213E;">

    <div class="card-title font-weight-bolder text-dark" >
                        <h3 class="card-label "style="font-size: 1.275rem;color: #FFFFFF;">
                            Announcement list
                            <br>
                            <small style="font-size: 1rem; color: #E8E8E8; webkit-font-smoothing: antialiased;">Announcement for you</small>
                        </h3>
                    </div>
    </div>

    <form class="form-inline" action="{{route('announcements.index')}}" method="GET">
        <div class="form-group mx-sm-3 m-4">
            <label for="form-control mr-4">Search by title</label>
                <input type="text" class="form-control ml-2" id="inputPassword2" placeholder="Title" name= 'search' value="{{old('search')}}">
        </div>
            <button type="submit" class="btn btn-primary mr-2">Search</button>
             <a href="{{route('announcements.index')}}" class="btn btn-outline-primary">Reset</a>
    </form>




    <div class="card-body ">


    @if(count($announcements)==0)

    <div style="min-height: 30px;"></div>
    <div><h4 class="text-center m-5" style="min-height: 100px;">No record of announcement found</h4></div>


    @else

    <table class='table table-hover  '>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th style= "width:20%" >Date</th>
          
           
           
            <th >Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($announcements as $announcement) 
        <tr class="tr">
            <td>{{$announcement->id}}</td>
            <td>{{$announcement->title}}</td>
            <td>{{$announcement->description}}</td>
            <td>{{$announcement->date}}</td>
            
         
            <td>
                <a class='btn btn-primary'  href="{{route('announcements.edit',$announcement)}}"><i class="fa-solid fa-pencil"></i></a>
                <button class='btn btn-danger btn-delete' data-url = "{{route('announcements.destroy',$announcement)}}"> <i class="fa-solid fa-trash-can"></i></button>
            </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
    {{$announcements->render()}}
    </div>
</div>


    @endif




    
@endsection
@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.btn-delete', function () {
                $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this announcement?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
                            $this.closest('tr').fadeOut(500, function () {
                                $(this).remove();
                            })
                        })
                    }
                })
            })
        })
    </script>
@endsection