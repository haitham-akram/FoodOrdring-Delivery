<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resturant\Resturantrequest;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Menuofmeal;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.restaurant.index');
    }
    /**
     * show for searched Restaurant
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_Restaurant(Request $request)
    {
        $Restaurants = Restaurant::where('OwnerID','!=',null)->get();
        if ($request->keyword != '') {
            $Restaurants = Restaurant::where('RestaurantName', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('Governorate', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Neighborhood', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('StreetName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('NavigationalMark', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Rate', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('OpiningTime', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('ClosingTime', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('AvailableStatus', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'Restaurants' => $Restaurants
        ]);
    }
    /**
     * Display a listing of the resource for restaurant manager.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function RM_index()
    {
        $categories= Category::select('CategorytypeID','CategoryName')->get();
        $id = Auth::user()->user_id;
        $restaurant = Restaurant::where('OwnerID',$id)->first();
        $offers_count = Offer::where('RestaurantID',$restaurant->RestaurantID)->count();
        $meal_count = Meal::where('RestId',$restaurant->RestaurantID)->count();
        $categories_count = Menuofmeal::where('RestaurantID',$restaurant->RestaurantID)->count();
        $orders_count = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->where('orders.Status','=','Not arrived')
            ->where('ordermeallist.RestaurantID', $restaurant->RestaurantID)->count();

        return view('restaurantManager.restaurant.index')
            ->with( 'restaurant',$restaurant)
            ->with('offers_count',$offers_count)
            ->with('categories_count',$categories_count)
            ->with('categories',$categories)
            ->with('meal_count',$meal_count)
            ->with('orders_count',$orders_count);
    }

    /**
     * @param
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function Create(string $id)
    {
        $categories= Category::select('CategorytypeID','CategoryName')->get();
        $restaurant= Restaurant::find($id);
        return view('admin.restaurant.create')
            ->with('restaurant',$restaurant)
            ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Resturantrequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Resturantrequest $request,string $id)
    {
        $file = $request->file('Logo');
//        code for uploading photos in imgur
        $file_path = $file->getPathName();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'authorization' => 'Client-ID ' . 'd05f17a6dec5c4a',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('Logo')->path($file_path)))
            ],
        ]);
        $data['Logo'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
        $restaurant= Restaurant::find($id);
        $restaurant->update([
            'RestaurantName'=>$request->RestaurantName,
            'Governorate'=>$request->Governorate,
            'Neighborhood'=>$request->Neighborhood,
            'StreetName'=>$request->StreetName,
            'NavigationalMark'=>$request->NavigationalMark,
            'CategoriesID'=>$request->CategoriesID,
            'OpiningTime'=>$request->OpiningTime,
            'ClosingTime'=>$request->ClosingTime,
            'AvailableStatus'=>$request->AvailableStatus,
            'Logo'=>$data['Logo']
        ]);
        return redirect()->route('admin_add_res_manager')->with(['success_title' => __('admins.success_title'),
            'create_msg_restaurantManager' => __('admins.create_msg_restaurantManager')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $categories= Category::select('CategorytypeID','CategoryName')->get();
        $restaurant= Restaurant::find($id);
        return view('admin.restaurant.edit')
            ->with('restaurant',$restaurant)
            ->with('categories',$categories);
    }

    /**
     * Show the form for editing the specified resource for restaurant manager.
     *
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function RM_edit( string $id)
    {
        $categories= Category::select('CategorytypeID','CategoryName')->get();
        $restaurant= Restaurant::find($id);
        return view('restaurantManager.restaurant.edit')
            ->with('restaurant',$restaurant)
            ->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Resturantrequest $request,string $id)
    {

        $file = $request->file('Logo');
//        code for uploading photos in imgur
        $file_path = $file->getPathName();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'authorization' => 'Client-ID ' . 'd05f17a6dec5c4a',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('Logo')->path($file_path)))
            ],
        ]);
        $data['Logo'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
        $restaurant= Restaurant::find($id);
        $restaurant->update([
            'RestaurantName'=>$request->RestaurantName,
            'Governorate'=>$request->Governorate,
            'Neighborhood'=>$request->Neighborhood,
            'StreetName'=>$request->StreetName,
            'NavigationalMark'=>$request->NavigationalMark,
            'CategoriesID'=>$request->CategoriesID,
            'OpiningTime'=>$request->OpiningTime,
            'ClosingTime'=>$request->ClosingTime,
            'AvailableStatus'=>$request->AvailableStatus,
            'Logo'=>$data['Logo']
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_restaurant' => __('admins.update_msg_restaurant')]);
    }

    public function RM_update(Resturantrequest $request, $id){
        $this->update($request,$id);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_restaurant' => __('admins.update_msg_restaurant')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), ' not_found_msg_restaurant' => __('admins.not_found_msg_restaurant')]);
        }
        $restaurant->update([
           'OwnerID'=> null
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_restaurant' => __('admins.delete_msg_restaurant')]);
    }
}
