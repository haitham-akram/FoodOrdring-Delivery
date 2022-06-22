<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customeraccount;

class CustomerManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index');
    }
    /**
     * show for searched customer
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function search_customer(Request $request)
    {
        $customers = Customeraccount::get();

        if ($request->keyword != '') {
            $customers = Customeraccount::where('FirstName', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('LastName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Email', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Gender', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('BanStatus', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Governorate', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Neighborhood', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('HouseNumber', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('NavigationalMark', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('BanEndDate', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber1', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('PhoneNumber2', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('created_at', 'LIKE', '%' . $request->keyword . '%') // this for date of join
                ->get();
        }
        return response()->json([
            'customers' => $customers
        ]);
    }
    /**
     * Ban or Unban customer for  .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ban_unbad_customer($id)
    {
        $customer = Customeraccount::where('CustomerID', '=', $id)->first();
        if ($customer->BanStatus == 'Banned') {
            $customer->BanStatus = 'Unbanned';
            $customer->update(['BanStatus' => $customer->BanStatus, 'BanEndDate' => NULL]);
            $states = __('admins.unban_msg');
        } else {
            $customer->BanStatus = 'Banned';
            $date =  Carbon::now()->addMonth();
            $date = substr($date, 0, 19);
            $customer->update(['BanStatus' => $customer->BanStatus, 'BanEndDate' => $date]);
            $states = __('admins.ban_msg');
        }
        $success_title = __('admins.success_title');
        return redirect()->back()->with(['success' => $states, 'success-title' => $success_title]);
        // ->with(['success-title' => __('adnims.success-title')])
        // dd($customer->toArray());
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
    }
}
