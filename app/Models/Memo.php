<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    protected $fillable = [
        'Customer_Id',
        'Total_Price',
        'Paid_Amount',
        'Order_Id',
        'User_Id',
        'Item_List',
        'Posted',

    ];
}
