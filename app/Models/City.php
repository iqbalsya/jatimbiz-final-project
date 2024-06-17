<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function getJumlahMerchantAttribute()
    {
        return $this->merchants()->count();
    }
}
