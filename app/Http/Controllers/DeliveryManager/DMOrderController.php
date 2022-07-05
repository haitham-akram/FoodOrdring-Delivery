<?php

namespace App\Http\Controllers\DeliveryManager;

use App\Http\Controllers\Controller;
use App\Models\Deliveryoffice;
use App\Models\Order;
use App\Models\OrderMealList;
use Illuminate\Http\Request;

class DMOrderController extends Controller
{

    private function call_delivery_office(){
        $deliveryManagerID = auth()->user()->user_id;
        $deliveryOffice = Deliveryoffice::where('OwnerID','=',$deliveryManagerID)->first();
        return $deliveryOffice;
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryOfficeID = $this->call_delivery_office()->DeliveryOfficeID;//DO66695869-DO66695869
        $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
           ->join('customeraccount','orders.CustomerID','customeraccount.CustomerID')
            ->join('restaurants','ordermeallist.RestaurantID','restaurants.RestaurantID')
            ->where('ordermeallist.DeliveryOfficeID','=',$deliveryOfficeID)
            ->where('orders.Status','=','Not arrived')
            ->get(['ordermeallist.*', 'orders.*','customeraccount.*','restaurants.RestaurantName']);
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
        return view('deliveryManager.order.index')
            ->with('count',$order_count)
            ->with('orders',$orders);
    }
    public function delivering_order(Request $request,string $id){
        $orderID = $id;
        $order = Order::where('OrderID',$orderID)->first();
        $order->update([
            'Status'=>'Arrived'
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delivering_order_msg' => __('delivery.delivering_order_msg')]);
    }

    public function history()
    {
        return view('deliveryManager.order.history');
    }

    public function search_orders(Request $request)
    {
        $deliveryOfficeID = $this->call_delivery_office()->DeliveryOfficeID;
        $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->join('customeraccount', 'orders.CustomerID', 'customeraccount.CustomerID')
            ->join('restaurants', 'ordermeallist.RestaurantID', 'restaurants.RestaurantID')
            ->where('ordermeallist.DeliveryOfficeID', '=', $deliveryOfficeID)
            ->where('orders.Status', '!=', 'Not arrived')
            ->get(['ordermeallist.*', 'orders.*', 'customeraccount.*', 'restaurants.RestaurantName']);
        $total_price = 0.0;
        foreach ($orders as $order) {
            $meals = json_decode($order->MealList, true);
            foreach ($meals as $meal) {
                $total_price += $meal['Price'] * $meal['Count'];
            }
            $order->MealList = $meals;
            $order['total_price'] = $total_price;
        }
        if ($request->keyword != '') {
            $orders = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
                ->join('customeraccount', 'orders.CustomerID', 'customeraccount.CustomerID')
                ->join('restaurants', 'ordermeallist.RestaurantID', 'restaurants.RestaurantID')
                ->where('ordermeallist.DeliveryOfficeID', '=', $deliveryOfficeID)
                ->where('orders.Status', '!=', 'Not arrived')
                ->where('CustomerName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Logs', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('RestaurantName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('orders.OrderID', 'LIKE', '%' . $request->keyword . '%')
                ->get(['ordermeallist.*', 'orders.*','customeraccount.*' , 'restaurants.RestaurantName']);
            foreach ($orders as $order) {
                $meals = json_decode($order->MealList, true);
                foreach ($meals as $meal) {
                    $total_price += $meal['Price'] * $meal['Count'];
                }
                $order->MealList = $meals;
                $order['total_price'] = $total_price;
            }

        }
        return response()->json([
            'orders' => $orders
        ]);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Return the History of the orders.
     *
     * @return \Illuminate\Http\Response
     */


}
