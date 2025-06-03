<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id', 'item', 'action', 'old_quantity', 'new_quantity', 'user_id', 'username'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}