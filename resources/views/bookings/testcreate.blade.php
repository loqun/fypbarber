@extends('layouts.admin')
@section('title','Create test Booking ')
@section('content')

<div class="card">
        <div class="card-body">

            <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           placeholder=" Name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control date @error('date') is-invalid @enderror" id="date"
                           placeholder="Date" value="{{ old('date') }}">
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                <label for="slot">Timeslot</label>
                <select name="slot" id="slot" class="form-control slot-list  @error('slot') is-invalid @enderror" id="slot"
                           placeholder="Slot" value="{{ old('slot') }}" style="" >                                                                  
                  
                       
                    </select>
                    @error('slot')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
               

                <div class="controls">
                <label for="staff">Staff</label>
                <select name="staff" required     id="staff" class="form-control  @error('staff') is-invalid @enderror" id="staff"
                           placeholder="Staff" value="{{ old('staff') }}" >                                                                  
                    @foreach($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->name }}
                        </option>                                                                                               
                    @endforeach
                    </select>
                    @error('staff')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="controls">
                <label for="user">User</label>
                <select name="user" id="user" class="form-control @error('user') is-invalid @enderror" id="user"
                           placeholder="User" value="{{ old('user') }}" >                                                                  
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}
                        </option>                                                                                               
                    @endforeach
                    </select>
                    @error('user')
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  
    <script type="text/javascript">
        
    
        $(document).ready(function(){
            $(".date").on('change',function(){
                var _date=$(this).val();
                $.ajax({
                    url:"{{url('admin/bookings')}}/available-slots/"+_date,
                    dataType:'json',
                    beforeSend:function(){
                    $(".slot-list").html('<option>--- Loading ---</option>');
                     },
                    success:function(res){ 
                        
                    var _html='';
                    $.each(res.data,function(index,row){
                        _html+='<option value="'+row.id+'">'+row.nslot+'</option>';
                    });
                    $(".slot-list").html(_html);
                    
                    
                    }
                });
                
            });
        });
        
        // $(document).ready(function(){
        //     $(".date")on('blur',function(){
        //         var _date=$(this).val();
        //         //ajax
        //         $.ajax({
        //             url:"{{url('admin/booking')}}/available_slots"+ _date,  
        //             dataType:'json',
        //                 success:function(res){
        //                     var _html='';
        //                     $.each(res)
        //                 }    
        //         });
        //     });
        // });
       
       
    </script>

@endsection