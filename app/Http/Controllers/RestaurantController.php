<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resturant\Resturantrequest;
use App\Models\Category;
use App\Models\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function RM_index()
    {
        return view('restaurantManager.restaurant.index');
    }

    /**
     * @param
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RM_edit($id)

    {

        return view('restaurantManager.restaurant.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
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
            'update_msg_restaurant' => __('admins.update_msg_restaurant')]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
