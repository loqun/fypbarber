<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'date',
        'user_id',
        'staff_id',
        'slot_id',
        'created_at',
        'updated_at',
        
    ];


public function user(){
    return $this->belongsTo(User::class);
 }

 public function staff(){
    return $this->belongsTo(Staff::class);
 }

 public function slot(){
    return $this->belongsTo(Slot::class);
 }
}