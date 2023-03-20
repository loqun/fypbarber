

@extends('layouts.admin')



@section('content')
@php 

use App\Http\Controllers\ShopstatusController; 
$var=ShopstatusController::getShopstatus();

@endphp



<!-- <div class="col-md-3">
        
        
        <div class="card m-4">
        <h5 class=" card-title ml-4"style="font-weight: bold">Shop status</h5>
            <div class="card-body ">

                    <h4 class= "mb-2">{{$var->string}}</h4>
                        
                        @if($var->string ==="moderate")
                        <img src="{{asset('assets/images/available.jpg')}}" alt="" style="width:100%; height:100%;">
                                
                               
                        <h3 class= "mt-3">less than 2 people waiting</h3>
                        @elseif($var->string ==="empty")
                        <img src="{{asset('assets/images/moderate.jpg')}}" alt="" style="width:100%; height:100%;">
                                
                               
                        <h3 class= "mt-3">about 3-4 people waiting</h3>
                        @elseif($var->string ==="busy")
                        <img src="{{asset('assets/images/longqueue.jpg')}}" alt="" style="width:100%; height:100%;">
                                
                               
                        <h3 class= "mt-3">more than 5 people waiting</h3>
                        @endif   
                        
                           

                          
                            
                                    
                      
                    
                    
                
                
            </div>
            
        </div>
    </div> -->

    <div class= 'row'>
    <div class="col-sm-3 col-xs-6">
    <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                  <div class="info-box-content">
                  <span class="info-box-text"> Today Booking Slot</span>
                  <span class="info-box-number">{{$slotstat}}</span>
                        <div class="progress">
                              <div class="progress-bar" style="width: {{(divnum($slotstat,$tslot)*100)}}%"></div>   
                        </div>
                              <span class="progress-description">
                              {{$slotstat}} of {{$tslot}} slot have been taken
                              </span>
                  </div>

      </div>
      </div>
      <div class="col-sm-3 col-xs-6">
      <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                  <div class="info-box-content">
                        <span class="info-box-text"> Total Booking Record</span>
                        <span class="info-box-number">{{$tbooking}}</span>
                              <div class="progress">
                                    <div class="progress-bar" style="width: {{divnum(($tbr-$tbrd),$tbrd)*100}}%"></div>
                              </div>
                        <span class="progress-description">
                        {{number_format(divnum(($tbr-$tbrd),$tbrd)*100,0)}}% Increase in 30 Days
                        </span>
                  </div>

      </div>
      </div>
      <div class="col-sm-3 col-xs-6">
      <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                  <div class="info-box-content">
                        <span class="info-box-text">Total Customer</span>
                        <span class="info-box-number">{{$custom}}</span>
                              <div class="progress">
                                    <div class="progress-bar" style="width: {{divnum(($tcr-$tcrd),$tcrd)*100}}%"></div>
                              </div>
                        <span class="progress-description">
                        {{   number_format(divnum(($tcr-$tcrd),$tcrd)*100,0)  }}% Increase in 30 Days
                        </span>
                  </div>

      </div>
      </div>
      <div class="col-sm-3 col-xs-6">
      <div class="info-box bg-gradient-primary" style = "height:100px">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                  <div class="info-box-content">
                        <span class="info-box-text">Total Staff</span>
                        <span class="info-box-number">{{$staff}}</span>
                              
                              
                  </div>

      </div>
      </div>

      </div>







    <div class="row" style ="    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;
    box-sizing: border-box;
    margin-right:15px;
    
    margin-left: 15px;">
      <div class="col-md-12">
            <div class="box" style="    -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            box-sizing: border-box;
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);">
                  <div class="box-header with-border" style = "    -webkit-text-size-adjust: 100%;
                        -webkit-tap-highlight-color: rgba(0,0,0,0);
                        font-size: 14px;
                        line-height: 1.42857143;
                        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                        font-weight: 400;
                        box-sizing: border-box;
                        color: #444;
                        display: block;
                        padding: 10px;
                        position: relative;
                        border-bottom: 1px solid #f4f4f4;">

                        <h3 class="box-title">Sales Report</h3>
                              
                  </div>

                  <div class="box-body" style="">
                        <div class="row">
                              <div class="col-md-8">
                                    <p class="text-center">
                                          <strong>Record of Sales</strong>
                                    </p>
                                          <div class="chart m-2">
                                                {!! $salechart->container() !!}
                                                {!! $salechart->script() !!}
                        
                                          </div>

                              </div>

                  <div class="col-md-4" style="margin: -10px;">
                        <p class="text-center">
                              <strong>Goal Completion</strong>
                        </p>
                              <div class="progress-group m-4">
                                    <span class="progress-text">Add Products to Cart</span>
                                    <span class="progress-number"><b>{{$goaladdproduct}}</b>/200</span>
                                          <div class="progress sm">
                                                <div class="progress-bar progress-bar-aqua" style="width: {{$goaladdproduct/2}}%"></div>
                                          </div>
                              </div>

                              <div class="progress-group m-4">
                              <span class="progress-text">Complete Purchase</span>
                              <span class="progress-number"><b>{{$purchase}}</b>/400</span>
                              <div class="progress sm">
                              <div class="progress-bar progress-bar-red" style="width: {{$purchase/4}}%"></div>
                              </div>
                              </div>

                              <div class="progress-group m-4">
                              <span class="progress-text">Target revenue</span>
                              <span class="progress-number"><b> RM {{number_format($revenue,2)}}</b>/RM 10 000</span>
                              <div class="progress sm">
                              <div class="progress-bar progress-bar-green" style="width: {{$revenue/100}}%"></div>
                              </div>
                              </div>

                              

                        </div>

                        </div>

                        </div>

                              <div class="box-footer" style="">
                              <div class="row">
                              <div class="col-sm-4 col-xs-6">
                              <div class="description-block border-right">
                             
                                    
                              @if(divnum(($curevenue-$yesrevenue),($yesrevenue))*100>=0)
                              <span class="description-percentage text-green">
                              <i class="fa fa-caret-up">   </i>
                              @else
                              <span class="description-percentage text-red">
                              <i class="fa fa-caret-down"> </i>
                              @endif
                               {{  number_format(divnum(($curevenue-$yesrevenue),($yesrevenue))*100) }} % </span>
                              <h5 class="description-header">RM {{number_format($curevenue,2) }}</h5>
                              <span class="description-text">TODAY REVENUE</span>
                              </div>

                        </div>

                              <div class="col-sm-4 col-xs-6">
                              <div class="description-block border-right">
                              @if(divnum(($weekrev-$prevweek),($prevweek))*100 >= 0)
                              <span class="description-percentage text-green">
                              <i class="fa fa-caret-up">   </i>
                              @else
                              <span class="description-percentage text-red">
                              <i class="fa fa-caret-down"> </i>
                              @endif
                               {{  number_format(divnum(($weekrev-$prevweek),($prevweek))*100) }}% </span>
                              <!-- percentage
                               number_format(divnum(($weekrev-$prevweek),($weekrev+$prevweek))*100) -->
                              <h5 class="description-header">RM {{ number_format($weekrev,2)}}</h5>
                              <span class="description-text">WEEKLY REVENUE</span>
                              </div>

                              </div>

                              <div class="col-sm-4 col-xs-6">
                              <div class="description-block border-right"> 
                              @if(divnum(($monthrev-$prevmonth),($monthrev))*100 >= 0)
                              <span class="description-percentage text-green">
                              <i class="fa fa-caret-up">   </i>
                              @else
                              <span class="description-percentage text-red">
                              <i class="fa fa-caret-down"> </i>
                              @endif
                               {{  number_format(divnum(($monthrev-$prevmonth),($monthrev))*100) }}% </span>
                              <h5 class="description-header">RM {{number_format($monthrev,2)}}</h5>
                              <span class="description-text">MONTHLY REVENUE</span>
                              </div>

                              </div>

                              
                              </div>

                              </div>

                        </div>

                        </div>

                        </div>

                        <div class="row" style ="    -webkit-text-size-adjust: 100%;
                        -webkit-tap-highlight-color: rgba(0,0,0,0);
                        font-size: 14px;
                        line-height: 1.42857143;
                        color: #333;
                        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                        font-weight: 400;
                        box-sizing: border-box;
                        margin-right:15px;
                        width:100%;
                        margin-left: 15px;">
                        <div class="col-md-8">
                              <div class="box" style="    -webkit-text-size-adjust: 100%;
                              -webkit-tap-highlight-color: rgba(0,0,0,0);
                              font-size: 14px;
                              line-height: 1.42857143;
                              color: #333;
                              font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                              font-weight: 400;
                              box-sizing: border-box;
                              position: relative;
                              border-radius: 3px;
                              background: #ffffff;
                              border-top: 3px solid #d2d6de;
                              margin-bottom: 20px;
                              width: 100%;
                              box-shadow: 0 1px 1px rgba(0,0,0,0.1);">
                                    <div class="box-header with-border" style = "    -webkit-text-size-adjust: 100%;
                                          -webkit-tap-highlight-color: rgba(0,0,0,0);
                                          font-size: 14px;
                                          line-height: 1.42857143;
                                          font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                                          font-weight: 400;
                                          box-sizing: border-box;
                                          color: #444;
                                          display: block;
                                          padding: 10px;
                                          position: relative;
                                          border-bottom: 1px solid #f4f4f4;">

                                          <h3 class="box-title">Product Report</h3>
                                                
                                    </div>

                              <div class="box-body" style="">
                                    <div class="row">
                                          <div class="col-md-12">
                                                <p class="text-center">
                                                      <strong>Product Stock</strong>
                                                </p>
                                                      <div class="chart m-2">
                                                      {!! $chart->container() !!}
                                                      {!! $chart->script() !!}
                                    
                                                      </div>

                                          </div>

                                          <div class="col-md-4" style="margin: -10px;">
                                    

                                          

                                          </div>

                                     </div>

                                    </div>

                              

                        </div>

                        </div>
                        <div class="col-md-4">
                              <div class="box" style="    -webkit-text-size-adjust: 100%;
                              -webkit-tap-highlight-color: rgba(0,0,0,0);
                              font-size: 14px;
                              line-height: 1.42857143;
                              color: #333;
                              font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                              font-weight: 400;
                              box-sizing: border-box;
                              position: relative;
                              border-radius: 3px;
                              background: #ffffff;
                              border-top: 3px solid #d2d6de;
                              margin-bottom: 20px;
                              width: 100%;
                              box-shadow: 0 1px 1px rgba(0,0,0,0.1);">
                                    <div class="box-header with-border" style="    -webkit-text-size-adjust: 100%;
                                          -webkit-tap-highlight-color: rgba(0,0,0,0);
                                          font-size: 14px;
                                          line-height: 1.42857143;
                                          font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                                          font-weight: 400;
                                          box-sizing: border-box;
                                          color: #444;
                                          display: block;
                                          padding: 10px;
                                          position: relative;
                                          border-bottom: 1px solid #f4f4f4;">

                                          <h3 class="box-title">Comodity Report</h3>
                                                
                                    </div>

                              <div class="box-body" style="">
                                    <div class="row">
                                          <div class="container-fluid">
                                                <p class="text-center">
                                                      <strong>Comodity type</strong>
                                                </p>
                                                      <div class="chart m-2"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                      {!! $Typechart->container() !!}
                                                       {!! $Typechart->script() !!}
                                    
                                                      </div>

                                          </div>

                              <div class="col-md-4" style="margin: -10px;">
                                    

                                          

                                    </div>

                                    </div>

                                    </div>

                              <div class="box-footer" style="">
                              





                              </div>

                        </div>

                        </div>
                        </div>

                        <!-- top 3 product -->
            <div class="row" style ="    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;
    box-sizing: border-box;
    margin-right:15px;
    
    margin-left: 15px;">
      <div class="col-md-12">
            <div class="box" style="    -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            box-sizing: border-box;
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);">
                  <div class="box-header with-border" style = "    -webkit-text-size-adjust: 100%;
                        -webkit-tap-highlight-color: rgba(0,0,0,0);
                        font-size: 14px;
                        line-height: 1.42857143;
                        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                        font-weight: 400;
                        box-sizing: border-box;
                        color: #444;
                        display: block;
                        padding: 10px;
                        position: relative;
                        border-bottom: 1px solid #f4f4f4;">

                        <h3 class="box-title">Top 3 Best Selling Comodity</h3>
                              
                  </div>

                  <div class="box-body" style="">
                        <div class="row">
                              <div class="col-md-12">
                                    <p class="text-center">
                                          <strong>Top 3 Comodity</strong>
                                    </p>
                                          <div class="chart m-2">
                                          {!! $top3chart->container() !!}
                                          {!! $top3chart->script() !!} 
                        
                                          </div>

                              </div>

                  <div class="col-md-4" style="margin: -10px;">
                        
                              

                        </div>

                        </div>

                        </div>

                              <div class="box-footer" style="">
                              <div class="row">
                              <div class="col-sm-4 col-xs-6">
                              <div class="description-block border-right">
                             
                                    
                              
                              </div>

                        </div>

                              <div class="col-sm-4 col-xs-6">
                              
                              </div>

                              </div>

                              <div class="col-sm-4 col-xs-6">
                              
                              </div>

                              </div>

                              
                              </div>

                              </div>

                        </div>

<!-- booking -->
                        <div class="row" style ="    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;
    box-sizing: border-box;
    margin-right:15px;
    
    margin-left: 15px;">
      <div class="col-md-12">
            <div class="box" style="    -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
            box-sizing: border-box;
            position: relative;
            border-radius: 3px;
            background: #ffffff;
            border-top: 3px solid #d2d6de;
            margin-bottom: 20px;
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);">
                  <div class="box-header with-border" style = "    -webkit-text-size-adjust: 100%;
                        -webkit-tap-highlight-color: rgba(0,0,0,0);
                        font-size: 14px;
                        line-height: 1.42857143;
                        font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
                        font-weight: 400;
                        box-sizing: border-box;
                        color: #444;
                        display: block;
                        padding: 10px;
                        position: relative;
                        border-bottom: 1px solid #f4f4f4;">

                        <h3 class="box-title">Booking Report</h3>
                              
                  </div>

                  <div class="box-body" style="">
                        <div class="row m-4">
                              <div class="col-md-12 ">
                                    <p class="text-center">
                                          <strong>Total Monthly Booking</strong>
                                    </p>
                                          <div class="chart m-4">
                                          {!! $Bookchart->container() !!}
                                          {!! $Bookchart->script() !!}  

                                          </div>

                              </div>

                  

                              <div class="box-footer" style="">
                              <div class="row">
                              <div class="col-sm-6 col-xs-6">
                              <p class="text-center">
                                          <strong>Average Booking per Day</strong>
                                    </p>
                              <div class="description-block border-right">
                             
                              {!! $dbookchart->container() !!}
                              {!! $dbookchart->script() !!} 
                              
                              </div>

                        </div>

                              

                              <div class="col-sm-6 col-xs-6">
                              <p class="text-center">
                                          <strong>Booking by barber</strong>
                                    </p>
                              <div class="description-block border-right"> 
                               
                              <!-- graph here -->
                              {!! $sbookchart->container() !!}
                              {!! $sbookchart->script() !!} 
                              </div>

                              </div>

                              
                              </div>

                              </div>

                        </div>

                        </div>

                        </div>



            
                        </div>

                        </div>
















                        

      

     
      <!-- <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="card card-primary">
                        <div class="card-header">
                              <h3 class="card-title">Booking </h3>
                                    <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                          <i class="fas fa-minus"></i>
                                          </button>
                                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                                          <i class="fas fa-times"></i>
                                          </button>
                                    </div>            
                         </div>


                         <div class="card-body">

                              <div class="chart">
                                    <div class ="flex">
                                      {!! $Bookchart->container() !!}
                                     {!! $Bookchart->script() !!}
                                     </div>

                               </div>
                         </div>

                  </div>
            </div>
            
             -->



      

         
            

      <!--  sepatator -->
     
      
                 






                  
                  





                  










    
    

@endsection

