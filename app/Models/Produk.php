<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function PesananDetail() 
	{
	     return $this->hasMany('App\Models\PesananDetail','barang_id', 'id');
	}
}
