<?php

namespace App\Http\Controllers\RestaurantManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resturant\Mealrequest;
use App\Models\Meal;
use App\Models\Menuofmeal;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MealController extends Controller
{

    private function call_restaurant(){
        $RestaurantManagerID = auth()->user()->user_id;
        $restaurant = Restaurant::where('OwnerID', '=', $RestaurantManagerID)->first();
        return $restaurant;
    }

    private function call_uploaded_photo($request)
    {
        $file = $request->file('MealLogo');
//        code for uploading photos in imgur
        $file_path = $file->getPathName();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'authorization' => 'Client-ID ' . 'd05f17a6dec5c4a',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('MealLogo')->path($file_path)))
            ],
        ]);
       return $data['MealLogo'] = data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant_id = $this->call_restaurant()->RestaurantID;
        $menu = Menuofmeal::where('RestaurantID', $restaurant_id)->get();
        return view('restaurantManager.meal.index')->with('menus', $menu);
    }
    /**
     * show for searched Meals
     *
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search_Meals(Request $request){
        $restaurant_id = $this->call_restaurant()->RestaurantID;
        $Meals= Meal::where('RestId',$restaurant_id)
            ->join('menuofmeals','meals.MenuID','=','menuofmeals.MenuID')
            ->get(['meals.*','menuofmeals.CategoryType']);
        if ($request->keyword != '') {
            $Meals = Meal::where('RestId',$restaurant_id)
                ->join('menuofmeals','meals.MenuID','=','menuofmeals.MenuID')
                ->where('MealName', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('CategoryType', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Price', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Offer', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Ingredients', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('Description', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('AbilityToOrder', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('EstimateFinishTime', 'LIKE', '%' . $request->keyword . '%')
                ->get();
        }
        return response()->json([
            'Meals' => $Meals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $restaurant_id = $this->call_restaurant()->RestaurantID;
        $menu = Menuofmeal::where('RestaurantID', $restaurant_id)->get();
        return view('restaurantManager.meal.create')->with('menus', $menu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Mealrequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store (Mealrequest $request)
    {
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $RestaurantCategoryID = $this->call_restaurant()->CategoriesID;
        $MealID = 'M';
        for ($i = 0; $i < 9; $i++) {
            $MealID .= mt_rand(0, 9);
        }
        Meal::create([
            'MealID' => $MealID,
            'MealName' => $request->MealName,
            'MenuID' => $request->MenuID,
            'Price' => $request->Price,
            'Offer' => $request->Offer,
            'Ingredients' => $request->Ingredients,
            'Description' => $request->Description,
            'EstimateFinishTime' => $request->EstimateFinishTime,
            'AbilityToOrder' => $request->AbilityToOrder,
            'MealLogo' => $this->call_uploaded_photo($request),
            'RestId' => $RestaurantID,
            'CategorytypeID' =>$RestaurantCategoryID,
            'Rate'=>5
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'create_msg_Meal' => __('restaurantManager.create_msg_Meal')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $RestaurantID = $this->call_restaurant()->RestaurantID;
        $Meal= Meal::where('MealID','=',$id)
            ->join('menuofmeals','meals.MenuID','=','menuofmeals.MenuID')
            ->first(['meals.*','menuofmeals.CategoryType']);
//         dd($Meal->toArray());
         $menu = Menuofmeal::where('RestaurantID', $RestaurantID)->get();
        return view('restaurantManager.meal.edit')->with(['meal'=>$Meal , 'menus'=>$menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Mealrequest $request,string $id)
    {
        $meal = Meal::find($id);
        $meal->update([
            'MealName' => $request->MealName,
            'MenuID' => $request->MenuID,
            'Price' => $request->Price,
            'Offer' => $request->Offer,
            'Ingredients' => $request->Ingredients,
            'Description' => $request->Description,
            'EstimateFinishTime' => $request->EstimateFinishTime,
            'AbilityToOrder' => $request->AbilityToOrder,
            'MealLogo' => $this->call_uploaded_photo($request),
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_Meal' => __('restaurantManager.update_msg_Meal')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $meal = Meal::where('MealID',$id);
        if (!$meal){
            return redirect()->back()->with(['success_title' => __('admins.success_title'),
                'not_found_msg_Meal' => __('restaurantManager.not_found_msg_Meal')]);
        }
        $meal->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'delete_msg_Meal' => __('restaurantManager.delete_msg_Meal')]);
    }
}
