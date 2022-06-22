<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminnotification extends Model
{
    use HasFactory;
    protected $table = 'adminnotification';
    protected $fillable = ['NotificationID', 'ReceiverID','Header','Description'
    ,'TypeOfNotification','LogDate','FeedBackOfNotification'];
    protected $primaryKey = 'NotificationID';

}
