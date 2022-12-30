@extends('layout.navbar')
@section('content')
@section('title', 'Keranjang')
<br><br><br><br>
<div class="container">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3><hr>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesans as $key=> $pesanan_detail)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ url('assets/img/barang') }}/{{ $pesanan_detail->produk->gambar }}" width="50" alt="...">
                                </td>
                                <td>{{ $pesanan_detail->produk->nama }}</td>
                                <td>{{ $pesanan_detail->jumlah }} Buah</td>
                                <td align="right">Rp. {{ number_format($pesanan_detail->produk->harga) }}</td>
                                <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('Barang/delete',  $pesanan_detail->id) }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="bi bi-trash"></i></button>
                                    </form>                                
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Jumlah Total  :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('Barang/konfirmasi') }}" class="btn btn-warning" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="bi bi-cart-check-fill"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
    </div>
</div>