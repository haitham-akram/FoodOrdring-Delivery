<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Restaurantmanager;
use Illuminate\Http\Request;

class RestaurantManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.restaurantManager.index');
    }

    /**
     * show for searched Restaurant_Manager
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function search_Restaurant_Manager(Request $request)
    {
        $RestaurantManagers = Restaurantmanager::all();
        if ($request->keyword != '') {
            $RestaurantManagers = Restaurantmanager::where('FirstName', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('LastName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Email', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber1', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber2', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'RestaurantManagers' => $RestaurantManagers
        ]);
    }

    /**
     * Display a listing of the resource for restaurant Manager.
     *
     * @return \Illuminate\Http\Response
     */
    public function RM_Profile()
    {
        return view('restaurantManager.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurantManager.create');
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
        return view('admin.restaurantManager.edit');
    }
    /**
     * Show the form for editing the specified resource for restaurantManager.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RM_Edit_Profile($id)
    {
        return view('restaurantManager.profile.edit');
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

        $restaurantManager = Restaurantmanager::find($id);
        if (!$restaurantManager) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), ' not_found_msg_restaurantManager' => __('admins.not_found_msg_restaurantManager')]);
        }
        $restaurant = Restaurant::where('ManagerRestaurantID', '=', $id);
        if ($restaurant) {
            $restaurant->delete();
        }
        $restaurantManager->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_restaurantManager' => __('admins.delete_msg_restaurantManager')]);
    }
}
