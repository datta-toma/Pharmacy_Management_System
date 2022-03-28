<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'Medicine_Name',
        'Generic_Name',
        'Company',
        'Price_Rate',
        'Quantity',
        'Placed_On',
        'Status',
        'User_Id'
    ];
}
