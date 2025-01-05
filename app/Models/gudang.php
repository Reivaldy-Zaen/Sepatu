<?php

// app/Models/Warehouse.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudang extends Model
{
    use HasFactory;

    protected $table = 'gudang';

    protected $fillable = [
        'name', 'location' ,'stock','barang_id',
    ];

    // Relasi dengan tabel 'items'
    public function items()
    {
        return $this->hasMany(stock::class);
    }

    public function barang()
    {
        return $this->belongsTo(kategori_item::class , 'barang_id');
    }
}

