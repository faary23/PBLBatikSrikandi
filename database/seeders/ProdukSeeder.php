<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::insert([
        [   'nama'      => 'Tunik Bolero Perca Biru',
            'gambar'    => '1672319266_2-mega-mendungouter-batik-bolero-perca-biru.jpg',
            'harga'     => '558000',
            'stok'      => '2',
            'keterangan'=> 'Tunik eksklusif ini dibuat dengan kain katun yang dipilih dengan hati-hati dan dibatik dengan 2x proses pembatikan secara tulis, menawarkan kualitas tinggi dan penampilan tanpa cacat.'
        ],

        [   'nama'      => 'Tunik Mega Mendung Cokelat',
            'gambar'    => '1672319284_3-comb-mix-mega-mendung-cokelat.jpg',
            'harga'     => '854000',
            'stok'      => '4',
            'keterangan'=> 'Tunik dengan detail motif batik tulis mega mendung untuk tampilan casual dan formal look.'
        ],

        [   'nama'      => 'Outer mega mendung hitam pink',
            'gambar'    => '1672320096_5-mega-mendung-hitam-pink.jpg',
            'harga'     => '333000',
            'stok'      => '3',
            'keterangan'=> 'Bahan : Katun Premium Jenis Batik : Batik Tulis Mega Mendung  Warna : Biru.'
        ],

        [   'nama'      => 'Batik Mega Mendung Hitam',
            'gambar'    => '1672320131_4-mega-mendung-hitam.jpg',
            'harga'     => '214000',
            'stok'      => '2',
            'keterangan'=> 'Bahan : Katun Premium Jenis Batik : Cap Motif : Mega Mendung Warna : Pink Putih'
        ],

    ]);
    }
}
