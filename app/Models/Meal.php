<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $table = 'meals';
    protected $fillable = [
        'MealID', 'MealName',
        'MealLogo', 'MenuID', 'Price', 'Offer', 'Ingredients', 'EstimateFinishTime', 'AbilityToOrder', 'Description', 'CustomerFeedBackID', 'Rate', 'CategorytypeID'
    ];
    public function feedback()
    {
        return $this->belongsTo(feedback::class, 'FeedbackID');
    }
    public function menuofmeal()
    {
        return $this->belongsTo(Menuofmeal::class, 'MenuID');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'CategorytypeID');
    }
    protected $primaryKey = 'MealID';
    protected $keyType = 'string';


    //     public function restaurantmanager(){
    //     return $this->belongsTo(Restaurantmanager::class,'RestManagerID');
    // }
}
