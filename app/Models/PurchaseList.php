<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseList extends Model
{
    use HasFactory;
    protected $fillable = [
        'Medicine_Name',
        'Quantity',
        'Price',
        'Order_Id'
    ];
}
