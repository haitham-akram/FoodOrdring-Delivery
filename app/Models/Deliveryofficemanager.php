<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Deliveryofficemanager extends Model
{
    use HasFactory;

    protected $table = 'deliveryofficemanager';
    protected $fillable = [
        'DeliManagerID', 'FirstName',
        'LastName', 'Email', 'PhoneNumber1', 'PhoneNumber2', 'Password', 'token', 'created_at', 'updated_at'
    ];
    protected $primaryKey = 'DeliManagerID';
    protected $keyType = 'string';
  
}
