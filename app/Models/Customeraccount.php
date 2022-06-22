<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Customeraccount extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $table = 'customeraccount';
    protected $fillable = [
        'CustomerID', 'FirstName', 'LastName', 'Email', 'PhoneNumber1', 'PhoneNumber2', 'Password', 'Gender', 'BanStatus', 'Governorate', 'Neighborhood', 'HouseNumber',
        'NavigationalMark', 'BanEndDate', 'created_at',
        'token', 'updated_at', 'DateOfBirth'
    ];
    protected $primaryKey = 'CustomerID';
    protected $keyType = 'string';
    public function feedback()
    {
        return $this->belongsTo(feedback::class, 'FeedbackID');
    }
    public function orderlists()
    {
        return $this->hasMany(Orderlist::class, 'OrderListID');
    }
}
