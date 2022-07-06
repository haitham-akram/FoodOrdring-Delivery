<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\NotificationRequest;
use App\Models\Adminnotification;
use App\Models\Deliveryoffice;
use App\Models\Deliveryofficemanager;
use App\Models\Restaurant;
use App\Models\Restaurantmanager;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $RestaurantManagers = Restaurant::join('restaurantmanager','restaurants.OwnerID','restaurantmanager.RestManagerID')
            ->get(['restaurantmanager.RestManagerID','restaurantmanager.FirstName','restaurantmanager.LastName']);
        $DeliveryManagers = Deliveryoffice::join('deliveryofficemanager','deliveryoffice.OwnerID','deliveryofficemanager.DeliManagerID')
            ->get(['deliveryofficemanager.DeliManagerID','deliveryofficemanager.FirstName','deliveryofficemanager.LastName']);
        return view('admin.notification.create')->with('RestaurantManagers',$RestaurantManagers)->with('DeliveryManagers',$DeliveryManagers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NotificationRequest $request)
    {
        $ReceiverID = json_encode($request->ReceiverID);
        Adminnotification::create([
//           'NotificationID'=>1000,
            'ReceiverID'=>$ReceiverID,
            'Header'=> $request->Header,
            'Description'=>$request->Description,
            'TypeOfNotification'=>$request->TypeOfNotification,
            'LogDate'=>Carbon::now(),
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'create_msg_notification' => __('admins.create_msg_notification')]);

    }

    /**
     * show for searched notification
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_Notification(Request $request)
    {
        $notifications = Adminnotification::all();
        if ($request->keyword != '') {
            $notifications = Adminnotification::where('Header', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('TypeOfNotification', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Description', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'notifications' => $notifications
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $RestaurantManagers = Restaurant::join('restaurantmanager','restaurants.OwnerID','restaurantmanager.RestManagerID')
            ->get(['restaurantmanager.RestManagerID','restaurantmanager.FirstName','restaurantmanager.LastName']);
        $DeliveryManagers = Deliveryoffice::join('deliveryofficemanager','deliveryoffice.OwnerID','deliveryofficemanager.DeliManagerID')
            ->get(['deliveryofficemanager.DeliManagerID','deliveryofficemanager.FirstName','deliveryofficemanager.LastName']);
        $Notification = Adminnotification::find($id);
        $selected_ids = json_decode($Notification->ReceiverID,true);
        $Notification->ReceiverID = $selected_ids;
        return view('admin.notification.edit')
            ->with('Notification',$Notification)
            ->with('RestaurantManagers',$RestaurantManagers)
            ->with('DeliveryManagers',$DeliveryManagers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NotificationRequest $request, $id)
    {

        $notification = Adminnotification::find($id)->first();
        if(!$notification){
            return redirect()->back()->with(['error_title' => __('admins.error_title'), ' not_found_msg_notification' => __('admins.not_found_msg_notification')]);
        }

        Adminnotification::update([
            'ReceiverID'=>$request->ReceiverID,
            'Header'=>$request->Header,
            'Description'=>$request->Description,
            'TypeOfNotification'=>$request->TypeOfNotification,
            'LogDate'=>Carbon::now(),
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'update_msg_notification' => __('admins.update_msg_notification')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Adminnotification::find($id);
        if (!$notification) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), ' not_found_msg_notification' => __('admins.not_found_msg_notification')]);
        }
        $notification->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_notification' => __('admins.delete_msg_notification')]);
    }


    public function notifications_for_user($receiver_id)
    {
        $notifications = Adminnotification::where('ReceiverID', '=', $receiver_id)->first();
        return response()->json([
            'notifications' => $notifications
        ]);
    }
}
