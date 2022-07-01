<?php

namespace App\Http\Controllers\RestaurantManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resturant\Categoryrequest;
use App\Models\Meal;
use App\Models\Menuofmeal;
use App\Models\Restaurant;
use Illuminate\Http\Request;

// this controller for meal category so I will use Menuofmeal model for it
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $Restaurantmanagerid=auth()->user()->user_id;
        $restaurant = Restaurant::select('RestaurantID')->where('OwnerID','=',$Restaurantmanagerid)->first();
        $restaurant_id =$restaurant->RestaurantID;
        $categories = Menuofmeal::where('RestaurantID','=',$restaurant_id)->get();
        return view('restaurantManager.categories.index')
            ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Categoryrequest $request)
    {
        $Restaurantmanagerid=auth()->user()->user_id;
        $restaurant = Restaurant::select('RestaurantID')->where('OwnerID','=',$Restaurantmanagerid)->first();
        $categoryType = $request->CategoryName;
        $generated_ID = '';
        switch ($categoryType){
            case 'السلطات':
                $generated_ID = 'SL';
                break;
            case 'الحلويات':
                $generated_ID = 'SW';
                break;
            case 'البيتزا':
                $generated_ID = 'PI';
                break;
            case 'الشاورما':
                $generated_ID = 'SH';
                break;
            case 'الساندوتشات':
                $generated_ID = 'SA';
                break;
            case 'المقبلات':
                $generated_ID = 'AP';
                break;
            case 'الوجبات':
                $generated_ID = 'MA';
                break;
            case 'المشروبات':
                $generated_ID = 'DR';
                break;
        }
        for($i = 0; $i < 8; $i++) {
            $generated_ID .= mt_rand(0, 9);
        }
        Menuofmeal::create([
            'MenuID'=>$generated_ID,
            'RestaurantID'=>$restaurant->RestaurantID,
            'CategoryType'=>$categoryType
        ]);
      return redirect()->back()->with(['success_title' => __('admins.success_title'),
        'create_msg_Category_Meal' => __('restaurantManager.create_msg_Category_Meal')]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param Categoryrequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Categoryrequest $request,string $id)
    {
        $categoryType = $request->CategoryName;
        $menu = Menuofmeal::find($id);
        $menu->update([
            'CategoryType'=>$categoryType
        ]);
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'update_msg_Category_Meal' => __('restaurantManager.update_msg_Category_Meal')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( string $id)
    {
//        TODO delete offers that connected with meals
        $meals = Meal::where('MenuID',$id)->get();
        $category_meal = Menuofmeal::find($id);
        if (!$category_meal){
            return redirect()->back()->with(['success_title' => __('admins.success_title'),
                'not_found_msg_Category' => __('restaurantManager.not_found_msg_Category')]);
        }
        foreach ($meals as $meal){
            $meal->delete();
        }
        $category_meal->delete();
        return redirect()->back()->with(['success_title' => __('admins.success_title'),
            'delete_msg_Category' => __('restaurantManager.delete_msg_Category')]);

    }
}
