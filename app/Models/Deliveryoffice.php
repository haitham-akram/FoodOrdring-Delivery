<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryoffice extends Model
{
    use HasFactory;
    protected $table = 'deliveryoffice';
    protected $fillable = [
        'DeliveryOfficeID', 'NameOfDeliveryOffice',
        'Governorate', 'Neighborhood', 'NavigationalMark', 'ManagerOfDeliveryOfficeID', 'Logo', 'OpiningTime', 'OwnerID', 'ClosingTime', 'AvailableStatus', 'CustomerFeedBackID'
    ];
    public function deliveryofficemanager()
    {
        return $this->belongsTo(Deliveryofficemanager::class, 'OwnerID');
    }
    protected $primaryKey = 'DeliveryOfficeID';
    protected $keyType = 'string';
}
