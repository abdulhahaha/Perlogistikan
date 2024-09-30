<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'receive_date',
        'location',
        'plt_id',
        'material',
        'material_description',
        'uom',
        'unrestricted',
        'blocked',
        'remarks'
    ];
}

