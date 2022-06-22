<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deliveryoffice;
use App\Models\Deliveryofficemanager;

class DeliviryManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deliviryManager.index');
    }

    /**
     * show for searched Restaurant_Manager
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function search_Delivery_Manager(Request $request)
    {
        $DeliveryOfficeManagers = Deliveryofficemanager::all();
        if ($request->keyword != '') {
            $DeliveryOfficeManagers = Deliveryofficemanager::where('FirstName', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('LastName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Email', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber1', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber2', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'DeliveryOfficeManagers' => $DeliveryOfficeManagers
        ]);
    }

    /**
     * Display a listing of the resource for profile page.
     *
     * @return \Illuminate\Http\Response
     */
    public function DM_Profile()
    {
        return view('deliveryManager.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliviryManager.create');
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
        return view('admin.deliviryManager.edit');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DM_Edit_Profile($id)
    {
        return view('deliveryManager.profile.edit');
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
        $deliveryManager = Deliveryofficemanager::find($id);
        if (!$deliveryManager) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), 'delete_msg_delivery' => __('admins.not_found_msg_delivery_manager')]);
        }
        $deliveryOffices = Deliveryoffice::where('ManagerOfDeliveryOfficeID', '=', $id);
        if ($deliveryOffices) {
            $deliveryOffices->delete();
        }
        $deliveryManager->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_delivery' => __('admins.delete_msg_delivery_manager')]);
    }
}
