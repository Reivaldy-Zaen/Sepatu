<?php

// app/Models/Item.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stocks'; // Ubah dari 'stock' menjadi 'stocks'

    public function kategori_item()
    {
        return $this->belongsTo(Kategori_Item::class, 'kategori_id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}