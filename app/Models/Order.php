<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Order extends Model
{
    use HasFactory, softDeletes;

    protected $table = "orders";

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'total_amount',
        'expenses'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
