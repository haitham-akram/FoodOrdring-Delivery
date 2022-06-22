<?php

namespace App\Http\Controllers;

use App\Models\Adminnotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.notification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
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
     * show for searched notification
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function search_Notification(Request $request)
    {
        $notifications = Adminnotification::all();
        if ($request->keyword != '') {
            $notifications = Adminnotification::where('Header', 'LIKE', '%' . $request->keyword . '%')
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.notification.edit');
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
