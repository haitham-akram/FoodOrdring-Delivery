<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Deliveryofficemanager;
use App\Models\Restaurantmanager;

class check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $prefix = $request->route()->getPrefix();
        $id = auth()->user()->user_id;
        $admin = Admin::where('AdminID', '=', $id)->first();
        $restaurantManager = Restaurantmanager::where('RestManagerID', '=', $id)->first();
        $deliveryOfficeManager = Deliveryofficemanager::where('DeliManagerID', '=', $id)->first();
        if ($admin) {
            if ($prefix == 'ar/admin') {
                return $next($request);
            } else if ($prefix == 'en/admin') {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else if ($restaurantManager) {
            if ($prefix == 'ar/Restaurant-Manager') {
                return $next($request);
            } else if ($prefix == 'en/Restaurant-Manager') {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else if ($deliveryOfficeManager) {
            if ($prefix == 'ar/Delivery-Manager') {
                return $next($request);
            } else if ($prefix == 'en/Delivery-Manager') {
                return $next($request);
            } else {
                return redirect()->back();
            }
        }
    }
}
