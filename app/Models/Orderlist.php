<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderlist extends Model
{
    use HasFactory;
    protected $table = 'orderlist';
    protected $fillable = ['OrderListID','CustomerID',
    'DeliveryType','Status','logs','ListOfMeals','TotalPrice'];
    public function customers(){
        return $this->hasMany(Customeraccount::class,'CustomerID');
    }
    protected $primaryKey = 'OrderListID';

}
