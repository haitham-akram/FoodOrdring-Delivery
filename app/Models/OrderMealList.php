<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderMealList extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['OrderID','RestaurantID', 'MealList'];
    protected $primaryKey = 'OrderID';
    protected $keyType = 'string';
    public $timestamps = false;

}
