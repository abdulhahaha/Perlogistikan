<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationMovement extends Model
{
    use HasFactory;
    protected $table = 'location_movement';
    protected $fillable = [
        'date', 'from_location', 'material_id', 'material_description', 'plt_id', 'qty', 'to_location'
    ];
    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location');
    }

    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function inventory()
    {
        return $this->belongsTo(InventoryDetail::class, 'plt_id');
    }
}

