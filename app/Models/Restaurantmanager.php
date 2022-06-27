<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurantmanager extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'restaurantmanager';
    protected $fillable = [
        'RestManagerID', 'FirstName',
        'LastName', 'Email', 'PhoneNumber1', 'PhoneNumber2', 'Password', 'token', 'created_at', 'updated_at','deleted_at'
    ];
    protected $primaryKey = 'RestManagerID';
    protected $keyType = 'string';

}
