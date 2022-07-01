<?php

namespace App\Http\Controllers\RestaurantManager;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RestaurantManagerController;
use App\Http\Requests\Resturant\Offerrequest;
use App\Models\Meal;
use App\Models\Menuofmeal;
use App\Models\Offer;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    private function call_restaurant(){
        $RestaurantManagerID= auth()->user()->user_id;
        $Restaurant = Restaurant::where('OwnerID','=',$RestaurantManagerID)->first();
        return $Restaurant;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurantManager.offer.index');
    }
//    this for offer search with ajax
    public function search_Offer(Request $request){
        $RestaurantID = $this-> call_restaurant()->RestaurantID;
        $offers = Offer::join('meals','Offer.MealID','=','meals.MealID')
            ->join('menuofmeals','Offer.CategoryID','=','menuofmeals.MenuID')
            ->where('Offer.RestaurantID',$RestaurantID)
            ->get(['offer.*','meals.MealName','menuofmeals.CategoryType']);
        if ($request->keyword != '') {
            $offers = Offer::join('meals','Offer.MealID','=','meals.MealID')
                ->join('menuofmeals','Offer.CategoryID','=','menuofmeals.MenuID')
                ->where('Offer.RestaurantID',$RestaurantID)
                ->where('CategoryType', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('MealName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('DiscountPercentage', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('DateOfStart', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('DateOfEnd', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'offers' => $offers
        ]);
    }
    //this function for get meal by its category this used with ajax
    public function getMealsByCategory(Request $request){

        if (!$request->CategoryID) {
          $html = '<option value="">'. trans('restaurantManager.meal-name').'</option>';
        } else {
            $html = '';
            $meals = Meal::where('MenuID', $request->CategoryID)->get();
            foreach ($meals as $meal) {
                $html .= '<option value="'.$meal->MealID.'">'.$meal->MealName.'</option>';
            }
        }
        return response()->json(['html' => $html]);
    }
    //this function for get meal by its category this used with ajax in edit offer page
    public function getMealsByCategoryEdit(Request $request){
//    dd($request->MealID);
        if (!$request->CategoryID) {
            $html = '<option value="">'. trans('restaurantManager.meal-name').'</option>';
        } else {
            $html = '';
            $meals = Meal::where('MenuID', $request->CategoryID)->get();
            foreach ($meals as $meal) {
                if ( $request->MealID != null && $request->MealID == $meal->MealID){
                $html .= '<option value="'.$meal->MealID.'" selected >'.$meal->MealName.'</option>';
                } else{
                    $html .= '<option value="'.$meal->MealID.'">'.$meal->MealName.'</option>';
                }
            }
        }
        return response()->json(['html' => $html]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $categories = Menuofmeal::where('RestaurantID','=',$RestaurantID)->get();
        return view('restaurantManager.offer.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Offerrequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Offerrequest $request)
    {
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $meal = Meal::where('RestId',$RestaurantID)->first();

//        checker is for checking if the meal has an offer or not
      $checker = Offer::where('MealID',$meal->MealID )->first();
      if($checker){
          return redirect()->back()->with(['error_title' => __('admins.error_title'),
              'isFound_msg_Offer' => __('restaurantManager.isFound_msg_Offer')]);
      }else{
          $meal->update([
              'Offer'=>$request->DiscountPercentage
          ]);
          Offer::create([
              'RestaurantID'=>$RestaurantID,
              'CategoryID'=>$request->CategoryID,
              'MealID'=>$request->MealID,
              'DateOfStart'=>$request->DateOfStart,
              'DateOfEnd'=>$request->DateOfEnd,
              'DiscountPercentage'=>$request->DiscountPercentage
          ]);

          return redirect()->back()->with(['success_title' => __('admins.success_title'),
              'create_msg_Offer' => __('restaurantManager.create_msg_Offer')]);
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
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $offer = Offer::where('OfferID',$id)->first();
        $categories = Menuofmeal::where('RestaurantID','=',$RestaurantID)->get();
        return view('restaurantManager.offer.edit')
            ->with('categories',$categories)
            ->with('offer',$offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Offerrequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Offerrequest $request, $id)
    {
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $meal = Meal::where('RestId',$RestaurantID)->first();
        $meal->update([
            'Offer'=>$request->DiscountPercentage
        ]);
        $offer = Offer::where('OfferID',$id)->first();
        $offer->update([
            'CategoryID'=>$request->CategoryID,
            'MealID'=>$request->MealID,
            'DateOfStart'=>$request->DateOfStart,
            'DateOfEnd'=>$request->DateOfEnd,
            'DiscountPercentage'=>$request->DiscountPercentage
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_Offer' => __('restaurantManager.update_msg_Offer')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $offer = Offer::where('OfferID',$id);
        if (!$offer){
            return redirect()->back()->with(['success_title' => __('admins.success_title'),
                'not_found_msg_offer' => __('restaurantManager.not_found_msg_offer')]);
        }
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $meal = Meal::where('RestId',$RestaurantID)->first();
        $meal->update([
            'Offer'=>0
        ]);
        $offer->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'delete_msg_offer' => __('restaurantManager.delete_msg_offer')]);

    }
}
