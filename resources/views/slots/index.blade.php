@extends('layouts.admin')
@section('content-header','')
@section('content-actions')

<a href="{{route('slots.create')}}" class="btn btn-primary">Create Timeslot</a>


@endsection
@section('css')
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content')

<div class="card">
<div class="card-header"style ="background-color:#16213E;">
    <div class="card-title font-weight-bolder text-dark" >
                        <h3 class="card-label "style="font-size: 1.275rem;color: #FFFFFF;">
                            Timeslot list
                            <br>
                            <small style="font-size: 1rem; color: #E8E8E8; webkit-font-smoothing: antialiased;">Available timeslot for booking</small>
                        </h3>
                    </div>
    </div>
    <div class="card-body ">


    @if(count($slots)==0)

    <div style="min-height: 30px;"></div>
    <div><h4 class="text-center m-3" style="min-height: 100px;">No record of timeslot found</h4></div>


    @else




    <table class='table table-hover  '>
    <thead>
        <tr>
            <th>ID</th>
            <th>Time</th>
            
          
           
           
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($slots as $slot) 
        <tr class="tr">
            <td>{{$slot->id}}</td>
            <td>{{$slot->nslot}}</td>
           
            
         
            <td>
                <a class='btn btn-primary'  href="{{route('slots.edit',$slot)}}"><i class="fa-solid fa-pencil"></i></a>
                <button class='btn btn-danger btn-delete' data-url = "{{route('slots.destroy',$slot)}}"> <i class="fa-solid fa-trash-can"></i></button>
            </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
    {{$slots->render()}}
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
                    text: "Do you really want to delete this slots?",
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