<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = 'offer';
    protected $fillable = ['OfferID','RestaurantID',
    'DateOfStart','DateOfEnd','MealID','CategoryID','DiscountPercentage'];
    public function restaurant(){
    return $this->belongsTo(Restaurant::class,'RestaurantID');
}
protected $primaryKey = 'OfferID';

}
