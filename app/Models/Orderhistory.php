<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderhistory extends Model
{
    use HasFactory;
    protected $table = 'orderhistory';
    protected $fillable = ['OrderID','Date','RestaurantID','MealList'];
    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'RestaurantID');
    }
    protected $primaryKey = 'OrderID';

}
