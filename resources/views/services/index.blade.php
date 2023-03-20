@extends('layouts.admin')
@section('content-header','')
@section('content-actions')

<a href="{{route('services.create')}}" class="btn btn-primary">Create Services</a>


@endsection
@section('css')
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content') 
<div class="card">
    
<div class="card-header"style ="background-color:#C69749;">
    <div class="card-title font-weight-bolder text-dark" >
                        <h3 class="card-label "style="font-size: 1.275rem;color: #FFFFFF;">
                            Services List
                            <br>
                            <small style="font-size: 1rem; color: #E8E8E8; webkit-font-smoothing: antialiased;">Services related to me</small>
                        </h3>
                    </div>
    </div>
    <div class="card-body">

    <form class="form-inline" action="{{route('services.index')}}" method="GET">
        <div class="form-group mx-sm-3 mb-2">
            <label for="form-control mr-4">Search by name</label>
                <input type="text" class="form-control ml-2" id="inputPassword2" placeholder="Name" name= 'search' value="{{old('search')}}">
        </div>
            <button type="submit" class="btn btn-primary m-2">Search</button>
             <a href="{{route('services.index')}}" class="btn btn-outline-primary">Reset</a>
    </form>

    @if(count($services)==0)

    <div style="min-height: 30px;"></div>
    <div><h4 class="text-center m-3" style="min-height: 100px;">No record of services found</h4></div>


    @else

    <table class='table '>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            
            <th>Barcode</th>
            <th>Status</th>
           
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service) 
        <tr>
            <td>{{$service->id}}</td>
            <td>{{$service->name}}</td>
            <td><img  src="{{ Storage::url($service->image) }}" alt="" width= "100" height="100px" style="object-fit: contain"></td>
            <td>{{$service->price}}</td>
            
            <td>{{$service->barcode}}</td>
            <td>
                <span
                    class="right badge badge-{{ $service->status ? 'success' : 'danger' }}">{{$service->status ? 'Active' : 'Inactive'}}</span>
            </td>
         
            <td>
                <a class='btn btn-primary'  href="{{route('services.edit',$service)}}"><i class="fa-solid fa-pencil"></i></a>
                <button class='btn btn-danger btn-delete' data-url = "{{route('services.destroy',$service)}}"> <i class="fa-solid fa-trash-can"></i></button>
            </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
    {{$services->render()}}
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
                    text: "Do you really want to delete this services?",
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