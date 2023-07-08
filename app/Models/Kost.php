<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relasi many to one ke user

    public function user(){
        return $this->belongsTo(User::class);
    }

}
