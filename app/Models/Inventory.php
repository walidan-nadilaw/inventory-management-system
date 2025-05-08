<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factory\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Inventory extends Model
{
    use HasFactory;
    protected $fillable = ['item', 'category', 'quantity', 'price'];

}
