<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Alert;
use App\Models\Produk;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{

  public function Detail($id)
  {
    $Produk = Produk::find($id);
    return view("Produk/Detail", compact('Produk'));
  }
  
  

  public function PesananDetail(Request $request, $id)
  {
    $Produk = Produk::find($id);
    $tanggal = Carbon::now();


    //cek stok apakah melebihi atau tidak
    if ($request->jumlah_pesan > $Produk->stok) {
      return redirect('Produk/Detail/' .$id);
    }

    //cek apakah user sama
    $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

    if(empty($cek_pesanan)) {
              $pesanan = new Pesanan;

              $pesanan->user_id = Auth::user()->id;
              $pesanan->tanggal = $tanggal;
              $pesanan->kode_produk = 0;
              $pesanan->status = 0;
              $pesanan->harga = 0;
              $pesanan->save();
          }

    $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

    $cek_pesananDetail = PesananDetail::where('barang_id', $Produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesananDetail)) {
                $pesanan_detail = new PesananDetail;
                $pesanan_detail->barang_id = $Produk->id;
                $pesanan_detail->pesanan_id = $pesanan_baru->id;
                $pesanan_detail->jumlah = $request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $Produk->harga * $request->jumlah_pesan;
                $pesanan_detail->save();
        }else{
          $pesanan_detail = PesananDetail::where('barang_id', $Produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
                $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;


                $harga_pesanan_detail_baru = $Produk->harga * $request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
                $pesanan_detail->update();
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->harga = $pesanan->harga + $Produk->harga * $request->jumlah_pesan;
        $pesanan->update();

        Alert::success('Pesanan Berhasil Masuk Keranjang');
        return redirect('Barang/Detail/' .$id);

  }

      public function CekOut()
      {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_detail = [];

        if (!empty($pesanan)) {
          $pesans = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view("Produk/cekout", compact('pesanan', 'pesans'));
      }


      public function DeleteKeranjang($id)
      {
          $pesan = PesananDetail::where('id', $id)->first();

          $pesanan = Pesanan::where('id', $pesan->pesanan_id)->first();
          $pesanan->harga = $pesanan->harga - $pesan->jumlah_harga;
          $pesanan->update();


          $pesan->delete();

          Alert::success('Pesanan Berhasil dihapus');
          return redirect('Barang/cekout');
      }


      public function Konfirmasi()
      {
        return view("Produk/konfirmasi");

      }

    }

  
   




