<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\EditDelManagersRequest;
use App\Http\Requests\Delivery\DeliveryOMrequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Deliveryoffice;
use App\Models\Deliveryofficemanager;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_Delivery_Manager(Request $request)
    {
        $DeliveryOfficeManagers = Deliveryofficemanager::join('deliveryoffice', 'deliveryofficemanager.DeliManagerID','=','deliveryoffice.OwnerID')
           ->get(['deliveryofficemanager.*','deliveryoffice.NameOfDeliveryOffice']);
        if ($request->keyword != '') {
            $DeliveryOfficeManagers = Deliveryofficemanager::join('deliveryoffice', 'deliveryofficemanager.DeliManagerID','=','deliveryoffice.OwnerID')
                ->where('FirstName', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('LastName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Email', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber1', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber2', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('NameOfDeliveryOffice', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'DeliveryOfficeManagers' => $DeliveryOfficeManagers
        ]);
    }

    /**
     * Display a listing of the resource for profile page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function DM_Profile()
    {
        $DeliveryManagerID= auth()->user()->user_id;
        $deliveryOfficeManager = Deliveryofficemanager::where('DeliManagerID',$DeliveryManagerID)->join('deliveryoffice', 'deliveryofficemanager.DeliManagerID','=','deliveryoffice.OwnerID')
            ->first(['deliveryofficemanager.*','deliveryoffice.NameOfDeliveryOffice']);
//      dd($DeliveryManagerID,$deliveryOfficeManager->toArray());
        return view('deliveryManager.profile.index')->with('deliveryManager',$deliveryOfficeManager);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliviryManager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DeliveryOMrequest $request)
    {
        $DeliveryManagerGeneratedID = 'DOM';
        for($i = 0; $i < 7; $i++) {
            $DeliveryManagerGeneratedID .= mt_rand(0, 9);
        }
        $password = Hash::make($request->Password);
        $DeliveryGeneratedID = 'DO';
        for($i = 0; $i < 8; $i++) {
            $DeliveryGeneratedID.= mt_rand(0, 9);
        }
        //create Delivery Manager
        Deliveryofficemanager::create([
            'DeliManagerID'=>$DeliveryManagerGeneratedID,
            'FirstName'=>$request->FirstName,
            'LastName'=>$request->LastName,
            'Email'=>$request->Email,
            'PhoneNumber1'=>$request->PhoneNumber1,
            'PhoneNumber2'=>$request->PhoneNumber2,
            'Password'=>$password,
        ]);
        //create user for login
        User::create([
            'name'=>$request->FirstName.' '.$request->LastName,
            'email'=>$request->Email,
            'password'=>$password,
            'user_id'=>$DeliveryManagerGeneratedID,
        ]);
        //this in case if Delivery manager deleted and need to create new one with same delivery office
        $Deliveryoffice = Deliveryoffice::where('NameOfDeliveryOffice','=',$request->NameOfDeliveryOffice)
            ->where('OwnerID',null)
            ->first();
        if(!$Deliveryoffice){ // in this case will create new Delivery office with new manager
            //create Delivery office
            Deliveryoffice::create([
                'DeliveryOfficeID'=>$DeliveryGeneratedID,
                'NameOfDeliveryOffice'=>$request->NameOfDeliveryOffice,
                'OwnerID'=>$DeliveryManagerGeneratedID,
            ]);
            return redirect()->route('admin_add_delivery',['id'=>$DeliveryGeneratedID]);
        }else{
            $Deliveryoffice->update([
                'OwnerID'=>$DeliveryManagerGeneratedID,
            ]);
            return redirect()->back()->with(['success_title' => __('admins.success_title'),
                'create_msg_Manager_with_ExistingDelivery' => __('admins.create_msg_Manager_with_ExistingDelivery')]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deliveryofficemanager = Deliveryofficemanager::where('DeliManagerID',$id)->join('deliveryoffice', 'deliveryofficemanager.DeliManagerID','=','deliveryoffice.OwnerID')
            ->first(['deliveryofficemanager.*','deliveryoffice.NameOfDeliveryOffice']);

        return view('admin.deliviryManager.edit')->with('deliveryofficemanager',$deliveryofficemanager);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function DM_Edit_Profile( string $id)
    {
        $deliveryOfficeManager = Deliveryofficemanager::where('DeliManagerID',$id)->join('deliveryoffice', 'deliveryofficemanager.DeliManagerID','=','deliveryoffice.OwnerID')
            ->first(['deliveryofficemanager.*','deliveryoffice.NameOfDeliveryOffice']);
        return view('deliveryManager.profile.edit')->with('deliveryManager',$deliveryOfficeManager);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditDelManagersRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditDelManagersRequest $request, $id)
    {

        $deliveryManager = Deliveryofficemanager::where('DeliManagerID',$id);
        $deliveryManager->update([
            'FirstName'=>$request->FirstName,
            'LastName'=>$request->LastName,
            'Email'=>$request->Email,
            'PhoneNumber1'=>$request->PhoneNumber1,
            'PhoneNumber2'=>$request->PhoneNumber2,
        ]);
        $user= User::where('user_id','=',$id)->first();
        $user->update(['email'=>$request->Email]);
        $deliveryoffice = Deliveryoffice::where('OwnerID','=',$id);

        $deliveryoffice->update(['NameOfDeliveryOffice'=> $request->NameOfDeliveryOffice]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'update_msg_deliveryManager' => __('admins.update_msg_deliveryManager')]);
    }
    public function DM_Update_Profile(DeliveryOMrequest $request, $id)
    {
        $password = Hash::make($request->Password);
        $deliveryManager = Deliveryofficemanager::where('DeliManagerID',$id);
        $deliveryManager->update([
            'FirstName'=>$request->FirstName,
            'LastName'=>$request->LastName,
            'Email'=>$request->Email,
            'PhoneNumber1'=>$request->PhoneNumber1,
            'PhoneNumber2'=>$request->PhoneNumber2,
            'Password'=>$password,
        ]);
        $user= User::where('user_id','=',$id)->first();
        $user->update([
            'name'=>$request->FirstName.' '.$request->LastName,
            'email'=>$request->Email,
            'password'=>$password
        ]);
        $deliveryOffice = Deliveryoffice::where('OwnerID','=',$id);
        $deliveryOffice->update(['NameOfDeliveryOffice'=> $request->NameOfDeliveryOffice]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'update_msg_profile' => __('delivery.update_msg_profile')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deliveryManager = Deliveryofficemanager::where('DeliManagerID',$id);
        if (!$deliveryManager) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), 'delete_msg_delivery' => __('admins.not_found_msg_delivery_manager')]);
        }
        $deliveryOffices = Deliveryoffice::where('OwnerID', '=', $id);
        if ($deliveryOffices) {
            $deliveryOffices->update([
                'OwnerID'=> null
            ]);
        }
        $user = User::where('user_id','=',$deliveryManager->DeliManagerID);
        $user->delete();
        $deliveryManager->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_delivery' => __('admins.delete_msg_delivery_manager')]);
    }
}
