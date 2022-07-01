<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\EditResManagersRequest;
use App\Http\Requests\Resturant\ResturaMrequest;
use App\Models\Restaurant;
use App\Models\Restaurantmanager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_Restaurant_Manager(Request $request)
    {

        $RestaurantManagers = RestaurantManager::join('restaurants','restaurantmanager.RestManagerID','=','restaurants.ownerID')
            ->get(['restaurantmanager.*','restaurants.RestaurantName']);

        if ($request->keyword != '') {
            $RestaurantManagers = Restaurantmanager::join('restaurants','restaurantmanager.RestManagerID','=','restaurants.ownerID')
                ->where('FirstName', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('LastName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Email', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber1', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber2', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('RestaurantName', 'LIKE', '%' . $request->keyword . '%')
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
        $Restaurantmanagerid=auth()->user()->user_id;
        $Restaurantmanager = RestaurantManager::where('RestManagerID',$Restaurantmanagerid)->join('restaurants','restaurantmanager.RestManagerID','=','restaurants.ownerID')
            ->first(['restaurantmanager.*','restaurants.RestaurantName']);
        return view('restaurantManager.profile.index')->with('Restaurantmanager',$Restaurantmanager);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ResturaMrequest $request)
    {
        $RestaurantManagerGeneratedID = 'RM';
        for($i = 0; $i < 8; $i++) {
            $RestaurantManagerGeneratedID .= mt_rand(0, 9);
        }
        $password = Hash::make($request->Password);
        $RestaurantGeneratedID = 'R';
        for($i = 0; $i < 9; $i++) {
            $RestaurantGeneratedID.= mt_rand(0, 9);
        }
        //create Restaurant Manager
       Restaurantmanager::create([
           'RestManagerID'=>$RestaurantManagerGeneratedID,
           'FirstName'=>$request->FirstName,
           'LastName'=>$request->LastName,
           'Email'=>$request->Email,
           'PhoneNumber1'=>$request->PhoneNumber1,
           'PhoneNumber2'=>$request->PhoneNumber2,
           'Password'=>$password,
       ]);
        //create user
        User::create([
            'name'=>$request->FirstName.' '.$request->LastName,
            'email'=>$request->Email,
            'password'=>$password,
            'user_id'=>$RestaurantManagerGeneratedID,
        ]);
        //this in case if Restaurant manager deleted and need to create new one with same Restaurant
        $Restaurant = Restaurant::where('RestaurantName','=',$request->RestaurantName)
            ->where('OwnerID',null)
            ->first();
        if(!$Restaurant){ // in this case will create new Delivery office with new manager
            //create Restaurant
            Restaurant::create([
                'RestaurantID'=>$RestaurantGeneratedID,
                'RestaurantName'=>$request->RestaurantName,
                'OwnerID'=>$RestaurantManagerGeneratedID,
            ]);
            return redirect()->route('admin_add_resaturant',['id'=>$RestaurantGeneratedID]);
        }else{
            $Restaurant->update([
                'OwnerID'=>$RestaurantManagerGeneratedID,
            ]);
            return redirect()->back()->with(['success_title' => __('admins.success_title'),
                'create_msg_Manager_with_ExistingRestaurant' => __('admins.create_msg_Manager_with_ExistingRestaurant')]);
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {

        $Restaurantmanager = RestaurantManager::where('RestManagerID',$id)->join('restaurants','restaurantmanager.RestManagerID','=','restaurants.ownerID')
            ->first(['restaurantmanager.*','restaurants.RestaurantName']);
        return view('admin.restaurantManager.edit')->with('Restaurantmanager',$Restaurantmanager);
    }
    /**
     * Show the form for editing the specified resource for restaurantManager.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RM_Edit_Profile($id)
    {
        $Restaurantmanager = RestaurantManager::where('RestManagerID',$id)->join('restaurants','restaurantmanager.RestManagerID','=','restaurants.ownerID')
        ->first(['restaurantmanager.*','restaurants.RestaurantName']);
        return view('restaurantManager.profile.edit')->with('Restaurantmanager',$Restaurantmanager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditResManagersRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditResManagersRequest $request, $id)
    {
        $Restaurantmanager = RestaurantManager::find($id);
        $Restaurantmanager->update([
            'FirstName'=>$request->FirstName,
            'LastName'=>$request->LastName,
            'Email'=>$request->Email,
            'PhoneNumber1'=>$request->PhoneNumber1,
            'PhoneNumber2'=>$request->PhoneNumber2,
        ]);
        $user= User::where('user_id','=',$id)->first();
        $user->update(['email'=>$request->Email]);
        $Restaurant=Restaurant::where('OwnerID','=',$id);
        $Restaurant->update(['RestaurantName'=>$request->RestaurantName]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'update_msg_restaurantManager' => __('admins.update_msg_restaurantManager')]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function RM_Update_Profile(ResturaMrequest $request,string $id)
    {
        $Restaurantmanager = RestaurantManager::where('RestManagerID',$id);
        $password = Hash::make($request->Password);
        $Restaurantmanager->update([
            'FirstName'=>$request->FirstName,
            'LastName'=>$request->LastName,
            'Email'=>$request->Email,
            'PhoneNumber1'=>$request->PhoneNumber1,
            'PhoneNumber2'=>$request->PhoneNumber2,
            'Password'=>$password,
        ]);
        $user= User::where('user_id','=',$id)->first();
        $user->update(
            [
            'name'=>$request->FirstName.' '.$request->LastName,
            'email'=>$request->Email,
            'password'=>$password
            ]);
        $Restaurant=Restaurant::where('OwnerID','=',$id);
        $Restaurant->update(['RestaurantName'=>$request->RestaurantName]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'update_msg_profile' => __('restaurantManager.update_msg_profile')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $restaurantManager = Restaurantmanager::where('RestManagerID',$id);
        if (!$restaurantManager) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), ' not_found_msg_restaurantManager' => __('admins.not_found_msg_restaurantManager')]);
        }
        $restaurant = Restaurant::where('OwnerID', '=', $id);
        if ($restaurant) {
            $restaurant->update([
                'OwnerID'=> null
            ]);
        }
        $user = User::where('user_id','=',$restaurantManager->RestManagerID);
        $user->delete();
        $restaurantManager->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_restaurantManager' => __('admins.delete_msg_restaurantManager')]);
    }
}
