<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Admin extends Model
//  Model
{
    use HasFactory;

    protected $guard = 'admin';
    protected $table = 'admin';
    protected $fillable = [
        'AdminID', 'FirstName', 'LastName', 'Email', 'Password',
        'PhoneNumber1', 'PhoneNumber2'
    ];
    protected $primaryKey = 'AdminID';
    protected $keyType = 'string';
}
