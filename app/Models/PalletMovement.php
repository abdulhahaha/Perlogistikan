<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PalletMovement extends Model
{
    use HasFactory;
    protected $table = 'pallet_movement';
    protected $fillable = [
        'date',
        'from_plt_id',
        'to_plt_id',
        'material_id',
        'location_id',
        'qty',
    ];

    public function fromPlt()
    {
        return $this->belongsTo(InventoryDetail::class, 'from_plt_id');
    }

    public function toPlt()
    {
        return $this->belongsTo(InventoryDetail::class, 'to_plt_id');
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
