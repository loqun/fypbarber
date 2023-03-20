@extends('layouts.admin')
@section('content-header','')
@section('content-actions')

<a href="{{route('cart.index')}}" class="btn btn-primary">Go to POS</a>


@endsection

@section('content') 
<div class="card" style= "min-height: 400px;">
    <div class="card-header"style ="background-color:#0F3460;">
    <div class="card-title font-weight-bolder text-dark" >
                        <h3 class="card-label "style="font-size: 1.275rem;color: #FFFFFF;">
                            Order list
                            <br>
                            <small style="font-size: 1rem; color: #E8E8E8; webkit-font-smoothing: antialiased;">Order related to me</small>
                        </h3>
                    </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-5">
                <form action= "{{route('orders.index')}}" method='get'>
                    <div class= "row">
                        <div class="col-md-5">
                            <input type="date" name="start_date" class="form-control" value="{{request('start_date')}}" >
                        </div>
                        <div class="col-md-5">
                        <input type="date" name="end_date" class="form-control" value="{{request('end_date')}}" >
                        </div>
                        <div class="col-md-2">
                        <button class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>    
                </form>
            </div>  
        </div>

        @if(count($orders)==0)

            <div style="min-height: 50px;"></div>
            <div><h4 class="text-center m-5" style="min-height: 100px;">No record of sales found</h4></div>


        @else
        <table class='table '>
    <thead>
    
        <tr>
            
            <th>ID</th>
            <th>Customer Name</th>
            <th>Total</th>
            <th>Received Amount</th>
            <th>Status</th>
            <th style="width:30%">Details</th>  
            <th>Created At</th>
            

        </tr>
    </thead>
    <tbody>
    
        @foreach ($orders as $order) 
        <tr height="150px">
            <td>{{$order->id}}</td>
            <td>{{$order->getCustomerName()}}</td>
            
            <td>RM {{$order->formattedTotal()}}</td>
            <td>RM {{$order->formattedReceivedAmount()}}</td>
            <td>
                @if($order->receivedAmount()== 0 )
                <span class="badge badge-danger">Not Paid</span>
                @elseif($order->receivedAmount() < $order->total() )
                <span class="badge badge-warning">Partial Paid </span>
                @elseif($order->receivedAmount() == $order->total() )
                <span class="badge badge-success">Paid       </span> 
                @elseif($order->receivedAmount() > $order->total() )
                <span class="badge badge-success">Change </span>
                @endif
            </td>
           
            <td> @php 

            echo nl2br($order->Details)
@endphp</td>
            
            <td>{{$order->updated_at}} </td>
           
           

    </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr><th></th>
            <th></th>
            <th>RM {{number_format($total, 2)}}</th>
            <th>RM {{number_format($receivedAmount, 2)}}</th>
            <th></th>
            <th></th>  
            <th></th></tr>
    </tfoot>
</table>
    {{$orders->links()}}
    </div>
</div>


        @endif
  

@endsection
