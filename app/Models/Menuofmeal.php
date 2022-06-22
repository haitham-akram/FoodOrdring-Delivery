<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuofmeal extends Model
{
    use HasFactory;
    protected $table = 'menuofmeals';
    protected $fillable = ['MenuID', 'RestaurantID', 'CategoryType'];
    public function meal()
    {
        return $this->belongsTo(Meal::class, 'MealID');
    }
    public function restaurantmanager()
    {
        return $this->belongsTo(Restaurantmanager::class, 'RestManagerID');
    }
    protected $primaryKey = 'MenuID';
    protected $keyType = 'string';
}
