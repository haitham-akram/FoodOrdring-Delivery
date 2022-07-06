<?php

namespace App\Http\Controllers;

use App\Http\Requests\Delivery\DeliveryOrequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Deliveryoffice;

class DeliveryController extends Controller
{
    private function call_uploaded_photo($request)
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
        return $data['Logo'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.delivery.index');
    }
    /**
     * show for searched Delivery offices
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_Delivery_Office(Request $request)
    {
        $DeliveryOffices = Deliveryoffice::where('OwnerID','!=',null)->get();;
        if ($request->keyword != '') {
            $DeliveryOffices = Deliveryoffice::where('NameOfDeliveryOffice', 'LIKE', '%' . $request->keyword . '%')
                ->orwhere('Governorate', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Neighborhood', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('StreetName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('NavigationalMark', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('OpiningTime', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('ClosingTime', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('AvailableStatus', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'DeliveryOffices' => $DeliveryOffices
        ]);
    }
    /**
     * Display a listing of the resource for delivery manager.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function DM_index()
    {
        $DeliveryManagerID=auth()->user()->user_id;

        $deliveryOffice = Deliveryoffice::where('OwnerID','=',$DeliveryManagerID)->first();
        $orders_count =  Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->where('ordermeallist.DeliveryOfficeID','=',$deliveryOffice->DeliveryOfficeID)
            ->where('orders.Status','=','Delivering')
            ->count();
        $history_count = Order::join('ordermeallist', 'orders.OrderID', 'ordermeallist.OrderID')
            ->where('ordermeallist.DeliveryOfficeID','=',$deliveryOffice->DeliveryOfficeID)
            ->where('orders.Status','=','Arrived')
            ->count();
        return view('deliveryManager.deliveryOffice.index')
            ->with('orders_count',$orders_count)
            ->with('history_count',$history_count)
            ->with('deliveryOffice',$deliveryOffice);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(string $id)
    {
        $delivery = Deliveryoffice::find($id);
        return view('admin.delivery.create')->with('delivery',$delivery);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DeliveryOrequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DeliveryOrequest $request,string $id)
    {
        $Deliveryoffice= Deliveryoffice::find($id);
        $Deliveryoffice->update([
            'NameOfDeliveryOffice'=>$request->NameOfDeliveryOffice,
            'Governorate'=>$request->Governorate,
            'Neighborhood'=>$request->Neighborhood,
            'StreetName'=>$request->StreetName,
            'NavigationalMark'=>$request->NavigationalMark,
            'OpiningTime'=>$request->OpiningTime,
            'ClosingTime'=>$request->ClosingTime,
            'AvailableStatus'=>$request->AvailableStatus,
            'Logo'=>$this->call_uploaded_photo($request),
        ]);
        return redirect()->route('admin_add_deliviry_manager')->with(['success_title' => __('admins.success_title'),
            'create_msg_delivery' => __('admins.create_msg_delivery')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delivery = Deliveryoffice::find($id);
        return view('admin.delivery.edit')->with('delivery',$delivery);
    }
    /**
     * Show the form for editing the specified resource for Delivery Manager.
     *
     * @param  string  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function DM_edit(string $id)
    {
        $delivery = Deliveryoffice::find($id);
        return view('deliveryManager.deliveryOffice.edit')->with('deliveryOffice',$delivery);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param DeliveryOrequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function update(DeliveryOrequest $request,string $id)
    {
        $Deliveryoffice= Deliveryoffice::find($id);
        $Deliveryoffice->update([
            'NameOfDeliveryOffice'=>$request->NameOfDeliveryOffice,
            'Governorate'=>$request->Governorate,
            'Neighborhood'=>$request->Neighborhood,
            'StreetName'=>$request->StreetName,
            'NavigationalMark'=>$request->NavigationalMark,
            'OpiningTime'=>$request->OpiningTime,
            'ClosingTime'=>$request->ClosingTime,
            'AvailableStatus'=>$request->AvailableStatus,
            'Logo'=>$this->call_uploaded_photo($request)
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_delivery' => __('admins.update_msg_delivery')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DeliveryOrequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function DM_update(DeliveryOrequest $request,string $id){
        $this->update($request,$id);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_delivery' => __('delivery.update_msg_delivery')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deliveryOffices = Deliveryoffice::find($id);
        if (!$deliveryOffices) {
            return redirect()->back()->with(['error_title' => __('admins.error_title'), 'delete_msg_delivery' => __('admins.not_found_msg_delivery')]);
        }
        $deliveryOffices->update([
            'OwnerID'=> null
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'), 'delete_msg_delivery' => __('admins.delete_msg_delivery')]);
    }
}
