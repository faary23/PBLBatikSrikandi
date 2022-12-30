<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    public function Produk()
	{
	      return $this->belongsTo('App\Models\Produk','barang_id', 'id');
	}

	public function Pesanan()
	{
	      return $this->belongsTo('App\Models\Pesanan','pesanan_id', 'id');
	}
}
