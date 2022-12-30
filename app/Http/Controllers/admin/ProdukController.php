<?php

namespace App\Http\Controllers\admin;

use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function ProdukView()
    {
    $data['allDataProduk']=Produk::all();
    return view("admin.produk.view", $data);
    }

  public function ProdukAdd()
  {
        return view('admin.produk.tambah');
  }


  public function ProdukStore(Request $request)
  {
        $request->validate([
        'name' =>'required',
        'gambar' =>'required|mimes:jpg,png,jpeg|image|max:2048',
        ]);
        
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() .'_'. $slug;
        $gambar->move('assets/img/barang/', $new_gambar);


        $data=new Produk();

        $data->nama=$request->name;
        $data->gambar =$new_gambar;
        $data->harga=$request->harga;
        $data->stok=$request->stok;
        $data->keterangan=$request->keterangan;
        
        $data->save();

        return redirect()->route('produk.view');

    }

    public function ProdukEdit($id)
    {
    $editData =Produk::find($id);
    return view("admin.produk.edit", compact('editData'));
    }

      public function ProdukUpdate(Request $request, $id)
      {
            $request->validate([
                  'name' =>'required',
                  ]);

                  $data=Produk::find($id);

                  if($request->File('gambar')){
                        $request->validate([
                              'gambar' =>'required|mimes:jpg,png,jpeg|image|max:2048',
                        ]);
                  
                  File::delete($data->gambar);
                  $gambar = $request->gambar;
                  $slug = Str::slug($gambar->getClientOriginalName());
                  $new_gambar = time() .'_'. $slug;
                  $gambar->move('assets/img/barang/', $new_gambar);
                  $data->gambar = $new_gambar;
            }
                  $data->nama=$request->name;
                  $data->harga=$request->harga;
                  $data->stok=$request->stok;
                  $data->keterangan=$request->keterangan;
                              
                  $data->save();
                  return redirect()->route('produk.view');

            }

            public function ProdukDelete($id)
            {
                  $data= Produk::find($id);
                  File::delete($data->gambar);
                  $data->delete();
                  
                  return redirect()->route('produk.view');
            }


  }





