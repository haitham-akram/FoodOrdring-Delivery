<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $table = 'restaurants';
    protected $fillable = [
        'RestaurantID', 'RestaurantName',
        'Governorate', 'Neighborhood', 'StreetName', 'NavigationalMark', 'Rate', 'CategoriesID', 'Logo', 'OpiningTime', 'OwnerID', 'ClosingTime', 'AvailableStatus', 'CustomerFeedBackID'
    ];
    public function restaurantmanager()
    {
        return $this->belongsTo(Restaurantmanager::class, 'OwnerID');
    }
    public function menuofmeal()
    {
        return $this->belongsTo(Menuofmeal::class, 'MenuID');
    }
    public function offer()
    {
        return $this->hasMany(Offer::class, 'OfferID');
    }
    public function orderhistory()
    {
        return $this->belongsTo(Orderhistory::class, 'OrderID');
    }
    protected $primaryKey = 'RestaurantID';
    protected $keyType = 'string';
}
