<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

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
        $Restaurants = Restaurant::all();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
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
        return view('admin.restaurant.edit');
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
        $restaurant = Restaurant::find($id);
        if (!$restaurant) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), ' not_found_msg_restaurant' => __('admins.not_found_msg_restaurant')]);
        }

        $restaurant->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_restaurant' => __('admins.delete_msg_restaurant')]);
    }
}
