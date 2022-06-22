<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = ['FeedbackID','CustomerID',
    'RatedObjectID','LogDate','Header'
    ,'Description','Rate'];
    public function customer(){
    return $this->belongsTo(Customeraccount::class,'CustomerID');
}
    public function Meal(){
        return $this->belongsTo(Meal::class,'MealID');
    }
    protected $primaryKey = 'FeedbackID';

}
