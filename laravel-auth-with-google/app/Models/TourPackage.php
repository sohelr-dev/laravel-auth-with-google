<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    protected $fillable = ['title', 'description', 'price', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
