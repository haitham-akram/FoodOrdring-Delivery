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
//        this for first three status ['Not arrived', 'In preparation', 'Ready']
        $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->where('ordermeallist.RestaurantID', $RestaurantID)
            ->where('ordermeallist.DeliveryOfficeID','=',null)
            ->where('orders.Status','!=','Arrived')
            ->get(['ordermeallist.*', 'orders.CustomerID', 'orders.CustomerName', 'orders.OrderType', 'orders.status']);
        $total_price = 0.0;
        foreach ($orders as $order){
            if ($total_price != 0.0)
            {$total_price = 0.0;}
           $meals = json_decode ($order->MealList , true);
           foreach ($meals as $meal){
              $total_price +=$meal['Price'] * $meal['Count'];
           }
            $order->MealList = $meals;
            $order['total_price'] = $total_price;
        }
        $order_count = $orders->count();
//        this is for Delivering state
        $Delivering_orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->where('orders.Status','=','Delivering')
            ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
            ->where('ordermeallist.RestaurantID', $RestaurantID)
            ->get(['ordermeallist.*', 'orders.CustomerID', 'orders.CustomerName', 'orders.OrderType', 'orders.status','deliveryoffice.NameOfDeliveryOffice']);
        $total_price_ = 0.0;
        foreach ($Delivering_orders as $delivering_order){
            if ($total_price != 0.0)
            {$total_price = 0.0;}
            $meals = json_decode ($delivering_order->MealList , true);
            foreach ($meals as $meal){
                $total_price_ +=$meal['Price'] * $meal['Count'];
            }
            $delivering_order->MealList = $meals;
            $delivering_order['total_price'] = $total_price_;
        }
        $delivering_order_count = $Delivering_orders->count();
//        get delivery offices
        $deliveryOffices = Deliveryoffice::select('DeliveryOfficeID','NameOfDeliveryOffice')
            ->where('OwnerID','!=',null)->get();
//        To Make all orders in one delivery office if  a customer have orders with more than one restaurant,
//        so I will search in current orders to find Delivery Office
            $on_delivery_orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
                ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
//                ->where('orders.Status','!=','Arrived')
                ->where('orders.Status','=','Delivering')
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
        return view('restaurantManager.order.index')
            ->with('count',$order_count)
            ->with('orders',$orders)
            ->with('delivering_orders',$Delivering_orders)
            ->with('delivering_order_count',$delivering_order_count)
            ->with('deliveryOffices',$deliveryOffices);
    }
    public function take_order(Request $request,string $id){
//        first check for order type
    $DeliveryOfficeID = $request->deliveryOffice_id;
    $orderID = $id;
        $order = Order::where('OrderID',$orderID)->first();
        $ordermeal = ordermeallist::where('OrderID',$orderID)->first();
        if ($order->OrderType == 'Receipt'){
            $order->update([
                'Status'=>'Arrived'
            ]);
            return redirect()->back()->with(['success_title' => __('admins.success_title'), 'order_Booked_msg' => __('restaurantManager.order_Booked_msg')]);
        }else{
            $ordermeal->update([
                'DeliveryOfficeID'=>$DeliveryOfficeID
            ]);
            $order->update([
                'Status'=>'Delivering'
            ]);
            return redirect()->back()->with(['success_title' => __('admins.success_title'), 'order_Delivering_msg' => __('restaurantManager.order_Delivering_msg')]);
        }
    }
    public function prepare (string $id)
    {
//        dd($id);
        $order = Order::where('OrderID','=',$id)->first();
        $order->update([
             'Status'=>'In preparation'
            ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'order_Prepare_msg' => __('restaurantManager.order_Prepare_msg')]);
    }
    public function ready (string $id)
    {
        $order = Order::where('OrderID','=',$id)->first();
        $order->update([
            'Status'=>'Ready'
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'order_Ready_msg' => __('restaurantManager.order_Ready_msg')]);
    }

//    public function current_orders(){
//        $RestaurantID = $this->call_restaurant()->RestaurantID;
//        $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
//            ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
//            ->where('ordermeallist.RestaurantID', $RestaurantID)
//            ->where('orders.Status','!=','Arrived')
//            ->get(['ordermeallist.*', 'orders.CustomerID', 'orders.CustomerName', 'orders.OrderType', 'orders.status','deliveryoffice.NameOfDeliveryOffice']);
//        $total_price = 0.0;
//        foreach ($orders as $order){
//            $meals = json_decode ($order->MealList , true);
//            foreach ($meals as $meal){
//                $total_price +=$meal['Price'] * $meal['Count'];
//            }
//            $order->MealList = $meals;
//            $order['total_price'] = $total_price;
//        }
//        $order_count = $orders->count();
//        return view('restaurantManager.order.Ongoing')
//            ->with('count',$order_count)
//            ->with('orders',$orders);
//    }
    public function search_Orders(Request $request){

        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $orders = Order::where('orders.Status','=','Arrived')
            ->join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
            ->where('ordermeallist.RestaurantID', $RestaurantID)
            ->orderBy('orders.Logs', 'DESC')
            ->get(['ordermeallist.*', 'orders.*','deliveryoffice.NameOfDeliveryOffice']);
        $total_price = 0.0;
        foreach ($orders as $order) {
            $meals = json_decode($order->MealList, true);
            if ($total_price != 0.0)
            {$total_price = 0.0;}
            foreach ($meals as $meal) {
                $total_price += $meal['Price'] * $meal['Count'];
            }
            $order->MealList = $meals;
            $order['total_price'] += $total_price;
        }

        if ($request->keyword != '') {
            $orders = Order::where('orders.Status','=','Arrived')
                ->join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
                ->join('deliveryoffice','ordermeallist.DeliveryOfficeID','deliveryoffice.DeliveryOfficeID')
                ->where('ordermeallist.RestaurantID', $RestaurantID)
                ->where('CustomerName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('NameOfDeliveryOffice', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Status', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Logs', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('OrderType', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('orders.OrderID', 'LIKE', '%' . $request->keyword . '%')
                ->orderBy('orders.Logs', 'DESC')
                ->get(['ordermeallist.*', 'orders.*','deliveryoffice.NameOfDeliveryOffice']);

            foreach ($orders as $order) {
                $meals = json_decode($order->MealList, true);
                if ($total_price != 0.0)
                {$total_price = 0.0;}
                foreach ($meals as $meal) {
                    $total_price += $meal['Price'] * $meal['Count'];
                }
                $order->MealList = $meals;
                $order['total_price'] += $total_price;
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
