<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Charts\SalesChart;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Shopstatus;
use App\Models\Booking;
use App\Models\Slot;
use App\Models\Staff;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request )
    {
         $quantity=Product::where('type', 'like', 'Product')->pluck('quantity','name');
         $chart= new SalesChart;    
         $chart->labels($quantity->keys());
         $chart->dataset('Quantity', 'bar',$quantity->values())->options([
            
            'backgroundColor'=> [
                'rgba(255, 99, 132, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(255, 205, 86, 0.7)'],
                
            'borderColor'=> [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
            'borderWidth'=> 1,
        ]);
           
           
        $saledate= DB::table('transactions') 
        ->distinct()
        ->groupBy('created_at')
        ->pluck('created_at');
        $simpledate = array();
        foreach($saledate as $value){
            $value=substr($value,0,10);
            $simpledate[]=$value;
            

        }
        
        
        $saleitem=DB::table('transactions')
                  ->selectRaw("SUM(amount) as total")
                  ->groupBy('created_at')
                  ->pluck('total');
         $salechart= new SalesChart; 
         
         $salechart->labels($simpledate)->options([

            'font-family'=> 'Montserrat',



         ]);
         $salechart->dataset('sale', 'line',$saleitem)->options([
            
            'backgroundColor'=> [
                'rgba(255, 99, 132, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(255, 205, 86, 0.7)'],
                
            'borderColor'=> [   
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
            'borderWidth'=> 1,
            
        ]);

        
        $cusdate=DB::table('customers')
        ->distinct()
        ->orderBy('created_at')
        ->pluck('created_at');
        $query= DB::table('customers')

        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
        ->groupBy('date')
        
        ->pluck('views');

        $Custchart= new SalesChart;    
        $Custchart->labels($cusdate->values());
        $Custchart->dataset('customer', 'line',$query)->options([

            
           'borderColor'=> ['rgba(0, 188, 212, 0.75)'],
            "backgroundColor"=> ['rgba(0, 188, 212, 0.2)'],
            "pointBorderColor"=> ['rgba(0, 188, 212, 1)'],
            "pointBackgroundColor"=> ['rgba(0, 188, 212, 0.9)'],
            "pointBorderWidth"=> 3,
        ]);
       
        $bookdate=DB::table('bookings')
        ->select(DB::raw('date_format(date,"%M") as month,count(*) as total'))
        ->whereRaw('year(date) = year(curdate())')
        ->groupByRaw('year(date),month(date)')
        ->orderByRaw('year(date),month(date)')
        ->pluck('total','month');

        // select date_format(order_date,'%M'),sum(sale)
    //   from sales
    //   group by year(order_date),month(order_date)
    //   order by year(order_date),month(order_date);


       
        
        $Bookchart= new SalesChart;    
        $Bookchart->labels($bookdate->keys());
        $Bookchart->dataset('booking', 'bar',$bookdate->values())->options([

            
           'borderColor'=> ['rgba(0, 188, 212, 0.75)'],
            "backgroundColor"=> ['rgba(0, 188, 212, 0.2)'],
            "pointBorderColor"=> ['rgba(0, 188, 212, 1)'],
            "pointBackgroundColor"=> ['rgba(0, 188, 212, 0.9)'],
            "pointBorderWidth"=> 3,
        ]);

        $type=DB::table('products')
        ->distinct()
        ->pluck('type');
        $tquery= DB::table('products')
        // SELECT type, COUNT(*) FROM products GROUP BY type ORDER BY COUNT(*);
        ->select('type', DB::raw('count(*) as views'))
        ->groupBy('type')
        
        ->pluck('views');

        $Typechart= new SalesChart;    
        $Typechart->labels($type->values());
        $Typechart->dataset('type', 'doughnut',$tquery)->options([

            'backgroundColor'=> [
                'rgba(226,135,67, 0.7)',
                'rgba(6,57,112, 0.7)',
                ],
           
            
            "pointBorderColor"=> ['rgba(0, 188, 212, 1)'],
            "pointBackgroundColor"=> ['rgba(0, 188, 212, 0.9)'],
            "pointBorderWidth"=> 3,
        ]);



       
        
        // SELECT DAYNAME(date), COUNT(*) FROM bookings GROUP BY DAYNAME(date) ORDER BY `DAYNAME(date)` DESC

        //top booked staff

        $sbook=DB::table('bookings')
        ->selectRaw('staff.name as name, count(staff_id) as TSB')
        ->distinct()
        ->join('staff', 'bookings.staff_id', '=', 'staff.id')
        ->groupByRaw('bookings.staff_id')
        ->pluck('TSB','name');


        $sbookchart= new SalesChart;    
        $sbookchart->labels($sbook->keys());
        $sbookchart->dataset('Total booking by barber ', 'bar',$sbook->values())->options([

            'backgroundColor'=> 
                
                'rgba(255, 159, 64, 0.7)',
              
            'borderColor'=> [   
                    
                    'rgb(255, 159, 64)',
                    
                  ],
            'borderWidth'=> 1,
        ]);
        
        // SELECT DAYNAME(date), COUNT(*) FROM bookings GROUP BY DAYNAME(date) ORDER BY `DAYNAME(date)` DESC
        $dbook=DB::table('bookings')
        ->selectRaw('DAYNAME(date) as day, COUNT(*) as total')
        ->groupByRaw('DAYNAME(date)')
        ->orderByRaw('"DAYNAME(date)" DESC' )
        ->pluck('total','day');


        $dbookchart= new SalesChart;    
        $dbookchart->labels($dbook->keys());
        $dbookchart->dataset('Average Booking ', 'bar',$dbook->values())->options([

            'backgroundColor'=> 
                
                'rgba(255, 159, 64, 0.7)',
              
            'borderColor'=> [   
                    
                    'rgb(255, 159, 64)',
                    
                  ],
            'borderWidth'=> 1,
        ]);

       
      

        // SQL for percentage diff 

        $totalbookings = Booking::all()->count();
        $currstats = Booking::whereRaw('date =  CURDATE()')->count();
        $yeststats = Booking::whereRaw('date = DATE_SUB(CURDATE(),INTERVAL 1 DAY)')->count();

        $perincre = number_format((divnum(($currstats-$yeststats),($currstats+$yeststats)))*100,2);


    //   kod tuk graph monthly sale by tahun
    //  select date_format(created_at,'%M'),COUNT(*)
    //   from bookings
    //   group by year(created_at),month(created_at)
    //   order by year(created_at),month(created_at);




    // kod dapatkan current month sale sahaja 
    // select COUNT(*) as currentmonthsales 
	//    from bookings
    //    where MONTH(created_at) = MONTH(now())
    //    and YEAR(created_at) = YEAR(now());


    // select COUNT(*) from bookings
    // where created_at =  CURDATE()    

    // top 3 product
    // SELECT b.name, sum(a.quantity) FROM order_items a JOIN products b ON b.id = a.product_id
    // group by b.name 
    //    order by sum(a.quantity) desc 
    //    limit 3;


    //  order_items
    $goaladdproduct = OrderItem::whereRaw('MONTH(created_at) = MONTH(now())and YEAR(created_at) = YEAR(now())')->count();
    $purchase = Transaction::whereRaw('MONTH(created_at) = MONTH(now())and YEAR(created_at) = YEAR(now())')->count();
    $revenue = Transaction::whereRaw('MONTH(created_at) = MONTH(now())and YEAR(created_at) = YEAR(now())')->sum('amount');
    $curevenue = Transaction::whereRaw('created_at =  CURDATE()')->sum('amount');
    $yesrevenue = Transaction::whereRaw('created_at = DATE_SUB(CURDATE(),INTERVAL 1 DAY)')->sum('amount');
    $weekrev = Transaction::whereRaw('week(created_at)=week(now())')->sum('amount');
    $prevweek = Transaction::whereRaw('WEEKOFYEAR(created_at)=WEEKOFYEAR(CURDATE())-1')->sum('amount');
    $monthrev = Transaction::whereRaw('MONTH(created_at)=MONTH(curdate());')->sum('amount');
    $prevmonth = Transaction::whereRaw('MONTH(created_at)=MONTH(CURDATE())-1')->sum('amount');
  

    //Booking Section

    $slotstat = Booking::whereRaw(' date = CURRENT_DATE')->count();
    $tslot = Slot::all()->count();
    $tbooking = Booking::all()->count();
    $tbr = Booking::whereRaw(' date >  current_date - interval 1 month')->count();
    $tbrd = Booking::whereRaw(' date > now() - interval 2 month and date < now() - interval 1 month')->count();


    //Customer Section 

    $custom = Customer::all()->count();
    $tcr =  Customer::whereRaw(' created_at >  current_date - interval 1 month')->count();
    $tcrd = Customer::whereRaw(' created_at > now() - interval 2 month and created_at < now() - interval 1 month')->count();
    

    //staff section

    $staff = Staff::all()->count();


    //top 3 product

        $top3p = DB::table('order_items')
        ->selectRaw(' products.name as name, sum(order_items.quantity) as total')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->groupByRaw('products.name ')
        ->orderByRaw('sum(order_items.quantity) desc ' )
        ->limit(3)
        ->pluck('total','name');

        $top3chart= new SalesChart;    
        $top3chart->labels($top3p->keys());
        $top3chart->dataset('Top 3 Commodity', 'bar', $top3p->values())->options([

            'backgroundColor'=> 
                
                'rgba(255, 159, 64, 0.7)',
              
            'borderColor'=> [   
                    
                    'rgb(255, 159, 64)',
                    
                  ],
            'borderWidth'=> 1,
        ]);
       







         
        return view('admindashboard',compact('chart','salechart','Custchart','Bookchart','Typechart','totalbookings',
        'perincre','goaladdproduct','purchase','revenue','curevenue','yesrevenue','weekrev','prevweek', 'monthrev','prevmonth',
        'slotstat','tslot','tbooking', 'tbr','tbrd','custom','tcr','tcrd','staff','dbookchart','sbookchart','top3chart' ));
    }




    public function userhome()
    {
        return view('userhome');
    }
    

}
