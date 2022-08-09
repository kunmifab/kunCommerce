<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() {
        return $this-> belongsTo(Category::class);
    }

    public function user() {
        return $this-> belongsTo(User::class);
    }

    public function currency() {
        return $this-> belongsTo(Currency::class);
    }


    public function orders() {
        return $this-> belongsToMany(Order::class)->withPivot('quantity');
    }

    public function transactions() {
        return $this-> belongsTo(Transaction::class);
    }

    public function reviews() {
        return $this-> hasMany(Review::class);
    }
}
