@extends('layout.navbar')
@section('content')
@section('title', 'Konfirmasi Pembayaran')
<br><br><br><br>


<div class="container pt-6">
    <div class="card p-4 shadow-lg p-3 mb-5 bg-body rounded">
        <h3><i class="bi bi-building-check"></i> Konfirmasi Pembayaran</h3><hr>
        <p class="fst-normal">Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp.  </strong></p>
        <p class="fst-normal">Kami tahu kalau Anda telah melakukan pembayaran jika Anda melakukan konfirmasi pembayaran dan melampiran bukti transfer pada kolom upload bukti dibawah ini</p>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Unggah Bukti</label>
          </div><br>
          <p class="fst-normal">Jika Barang Belum dikirim dalam 1 minggu, mohon menghubungi nomor dibawah ini dengan menyertakan bukti transfer</p>

    </div>
    
</div>

@endsection