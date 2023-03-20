@extends('layouts.admin')
@section('content-header','')
@section('content-actions')




<a href="{{route('bookings.create')}}" class="btn btn-primary">Create Booking</a>




@endsection

@section('css')
<link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('content') 
<div class="card mb-1" style="min-width 600px;">
<div class="card-header"style ="background-color:#404258;">
    <div class="card-title font-weight-bolder text-dark" >
                        <h3 class="card-label "style="font-size: 1.275rem;color: #FFFFFF;font-family: 'Source Sans Pro',sans-serif;">
                            Booking list
                            <br>
                            <small style="font-size: 1rem; color: #E8E8E8; webkit-font-smoothing: antialiased;">List of your appointment</small>
                        </h3>
                    </div>
                    
    </div>
    <div class="card-body">
    <div class="float-end"> 
        <div class="form-group mx-sm-3 mb-2">
           
            <form class="form-inline" id="selectform" action="{{route('bookings.index')}}" method="GET">
            <label for="form-select mr-4">Filter by barber</label>
                <select class="form-select"  name= 'sfilter'  value="{{old('sfilter')}}" >

                    <option style="display:none">Barber name</option>
                        @foreach($staff as $data)
            
                    <option value="{{ $data->id }}"  @if( old("sfilter")  == $data->id) selected="selected"  @endif >{{ $data->name }}</option>
            
                        @endforeach
            
        
                </select>
            
        
            </form>
        </div>
    </div>


    <form class="form-inline" action="{{route('bookings.index')}}" method="GET">
        <div class="form-group mx-sm-3 mb-2">
            <label for="form-control mr-4">Search by name</label>
                <input type="text" class="form-control ml-2" id="inputPassword2" placeholder="Name" name= 'search' value="{{old('search')}}">
        </div>
            <button type="submit" class="btn btn-primary m-2">Search</button>
             <a href="{{route('bookings.index')}}" class="btn btn-outline-primary">Reset</a>
    </form>
</div>
   <!-- <form action="{{route('bookings.index')}}" method="GET">
    <input type="search" id="inputPassword5" name= 'search'class="form-control m-2" aria-describedby="passwordHelpBlock">
    </form> -->

    @if(count($bookings)==0)

        <div style="min-height: 30px;"></div>
        <div><h4 class="text-center m-3" style="min-height: 100px;">No record of booking found</h4></div>


    @else
    

    <table class='table '>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Slot</th>
            <th>User</th>
            <th>Staff</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody class="mt-2">
        @foreach ($bookings as $booking) 
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{$booking->name}}</td>
            <td>{{$booking->date}}</td>
            <td>{{$booking->slot->nslot}}</td>
            <td>{{$booking->user->name}}</td>
            <td>{{$booking->staff->name}}</td>
           
            <td>
                <a class='btn btn-primary'  href="{{route('bookings.edit',$booking)}}"><i class="fa-solid fa-pencil"></i></a>
                <button class='btn btn-danger btn-delete' data-url = "{{route('bookings.destroy',$booking)}}"> <i class="fa-solid fa-trash-can"></i></button>
            </td>
        
    </tr>
    @endforeach
    </tbody>
</table>
    {{$bookings->links()}}
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
                    text: "Do you really want to delete this bookings?",
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


        
//  $(function() {
//        $("select").each(function (index, element) {
//                 const val = $(this).data('value');
//                 if(val !== '') {
//                     $(this).val(val);
//                 }
//         });
//  })

 $(".form-select").on("change", function (e) {
    $('#selectform').submit();
    
    
});
</script>
    </script>
@endsection