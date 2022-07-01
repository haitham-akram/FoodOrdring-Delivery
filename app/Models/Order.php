<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['OrderID','CustomerID',
    'OrderType','Status','Logs','CustomerName'];
    public function customers(){
        return $this->hasMany(Customeraccount::class,'CustomerID');
    }
    protected $primaryKey = 'OrderID';
    protected $keyType = 'string';
    public $timestamps = false;
}
