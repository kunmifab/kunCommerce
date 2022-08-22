<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function order() {
        return $this-> belongsTo(Order::class);
    }
    public function product() {
        return $this-> belongsTo(Product::class);
    }
    public function review() {
        return $this-> belongsTo(Review::class);
    }
    public function user() {
        return $this-> belongsTo(User::class);
    }
}
