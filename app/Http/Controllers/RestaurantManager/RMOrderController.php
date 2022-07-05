<?php

namespace App\Http\Controllers\RestaurantManager;

use App\Http\Controllers\Controller;
use App\Models\Deliveryoffice;
use App\Models\Order;
use App\Models\OrderMealList;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RMOrderController extends Controller
{
    private function call_restaurant(){
        $RestaurantManagerID= auth()->user()->user_id;
        $Restaurant = Restaurant::where('OwnerID','=',$RestaurantManagerID)->first();
        return $Restaurant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->where('ordermeallist.RestaurantID', $RestaurantID)
            ->where('ordermeallist.DeliveryOfficeID','=',null)
            ->where('orders.Status','=','Not arrived')
            ->get(['ordermeallist.*', 'orders.CustomerID', 'orders.CustomerName', 'orders.OrderType', 'orders.status']);

        $deliveryOffices = Deliveryoffice::select('DeliveryOfficeID','NameOfDeliveryOffice')
            ->where('OwnerID','!=',null)->get();
//        dd($deliveryOffices->toArray());
        $total_price = 0.0;
        foreach ($orders as $order){
           $meals = json_decode ($order->MealList , true);
           foreach ($meals as $meal){
              $total_price +=$meal['Price'] * $meal['Count'];
           }
            $order->MealList = $meals;
            $order['total_price'] = $total_price;
        }
        $order_count = $orders->count();
//         dd($deliveryOffices->toArray());

//        To Make all orders in one delivery office if  a customer have orders with more than one restaurant,
//        so I will search in current orders to find Delivery Office
            $on_delivery_orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
                ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
                ->where('orders.Status','!=','Arrived')
                ->get(['ordermeallist.*', 'orders.CustomerID', 'orders.CustomerName', 'orders.OrderType', 'orders.status','deliveryoffice.NameOfDeliveryOffice']);
        foreach ($orders as $order){

            foreach ($on_delivery_orders as $on_delivery_order){
                if ($on_delivery_order->CustomerID == $order->CustomerID){
                    $deliveryOffices =
                    [   0 => (Object)["DeliveryOfficeID" => $on_delivery_order->DeliveryOfficeID,
                            "NameOfDeliveryOffice"=>$on_delivery_order->NameOfDeliveryOffice
                        ]
                    ];
                }
            }
        }
//    dd($deliveryOffices);
        return view('restaurantManager.order.index')
            ->with('count',$order_count)
            ->with('orders',$orders)
            ->with('deliveryOffices',$deliveryOffices);
    }
    public function take_order(Request $request,string $id){
//        first check for order type
    $DeliveryOfficeID = $request->deliveryOffice_id;
    $orderID = $id;
        $order = Order::where('OrderID',$orderID)->first();
//        TODO remember to check first() and what will happened with get()
        $ordermeal = ordermeallist::where('OrderID',$orderID)->first();
        if ($order->OrderType == 'Receipt'){
            $ordermeal->update([
                'Status'=>'Arrived'
            ]);
            return redirect()->back()->with(['success_title' => __('admins.success_title'), 'order_Booked_msg' => __('restaurantManager.order_Booked_msg')]);
        }else{
            $ordermeal->update([
                'DeliveryOfficeID'=>$DeliveryOfficeID
            ]);
            return redirect()->back()->with(['success_title' => __('admins.success_title'), 'take_order_msg' => __('restaurantManager.take_order_msg')]);
        }
    }

    public function current_orders(){
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
            ->where('ordermeallist.RestaurantID', $RestaurantID)
            ->where('orders.Status','!=','Arrived')
            ->get(['ordermeallist.*', 'orders.CustomerID', 'orders.CustomerName', 'orders.OrderType', 'orders.status','deliveryoffice.NameOfDeliveryOffice']);
        $total_price = 0.0;
        foreach ($orders as $order){
            $meals = json_decode ($order->MealList , true);
            foreach ($meals as $meal){
                $total_price +=$meal['Price'] * $meal['Count'];
            }
            $order->MealList = $meals;
            $order['total_price'] = $total_price;
        }
        $order_count = $orders->count();
        return view('restaurantManager.order.Ongoing')
            ->with('count',$order_count)
            ->with('orders',$orders);
    }
    public function search_Orders(Request $request){

        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $orders = Order::where('orders.Status','!=','Not arrived')
            ->join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
            ->where('ordermeallist.RestaurantID', $RestaurantID)
            ->get(['ordermeallist.*', 'orders.*','deliveryoffice.NameOfDeliveryOffice']);
        $total_price = 0.0;
        foreach ($orders as $order){
            $meals = json_decode ($order->MealList , true);
            foreach ($meals as $meal){
                $total_price +=$meal['Price'] * $meal['Count'];
            }
            $order->MealList = $meals;
            $order['total_price'] = $total_price;
        }

        if ($request->keyword != '') {
            $orders = Order::where('orders.Status','!=','Not arrived')
                ->join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
                ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
                ->where('ordermeallist.RestaurantID', $RestaurantID)
                ->where('CustomerName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('NameOfDeliveryOffice', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Status', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Logs', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('OrderType', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('orders.OrderID', 'LIKE', '%' . $request->keyword . '%')
                ->get(['ordermeallist.*', 'orders.*','deliveryoffice.NameOfDeliveryOffice']);
            foreach ($orders as $order){
                $meals = json_decode ($order->MealList , true);
                foreach ($meals as $meal){
                    $total_price +=$meal['Price'] * $meal['Count'];
                }
                $order->MealList = $meals;
                $order['total_price'] = $total_price;
            }
        }
        return response()->json([
            'orders' => $orders
        ]);
    }

    public function history()
    {
        return view('restaurantManager.order.history');
    }

}
