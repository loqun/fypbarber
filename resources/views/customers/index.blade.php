@extends('layouts.admin')
@section('content-header','')
@section('content-actions')

<a href="{{route('customers.create')}}" class="btn btn-primary">Create Customer</a>

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content') 
<div class="card">
<div class="card-header"style ="background-color:#404258;">
    <div class="card-title font-weight-bolder text-dark" >
                        <h3 class="card-label "style="font-size: 1.275rem;color: #FFFFFF;font-family: 'Source Sans Pro',sans-serif;">
                            Customer list
                            <br>
                            <small style="font-size: 1rem; color: #E8E8E8; webkit-font-smoothing: antialiased;">List of your loyal customer</small>
                        </h3>
                    </div>
    </div>
    <div class="card-body">

    <form class="form-inline" action="{{route('customers.index')}}" method="GET">
        <div class="form-group mx-sm-3 mb-2">
            <label for="form-control mr-4">Search by name</label>
                <input type="text" class="form-control ml-2" id="inputPassword2" placeholder="Name" name= 'search' value="{{old('search')}}">
        </div>
            <button type="submit" class="btn btn-primary m-2">Search</button>
             <a href="{{route('customers.index')}}" class="btn btn-outline-primary">Reset</a>
    </form>
    
    @if(count($customers)==0)

        <div style="min-height: 30px;"></div>
        <div><h4 class="text-center m-5" style="min-height: 100px;">No record of customer found</h4></div>


    @else

    <table class='table '>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer) 
        <tr>
            <td>{{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->email}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->address}}</td>
           
            <td>
                <a class='btn btn-primary'  href="{{route('customers.edit',$customer)}}"><i class="fa-solid fa-pencil"></i></a>
                <button class='btn btn-danger btn-delete' data-url = "{{route('customers.destroy',$customer)}}"> <i class="fa-solid fa-trash-can"></i></button>
            </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
    {{$customers->render()}}
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
                    text: "Do you really want to delete this customer?",
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