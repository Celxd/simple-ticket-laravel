@extends('layouts.main')

@section('content')
<div class="pt-5">
    <h4>Ticket</h4>
    <div class="form-group mb-3">
        <label for="">Kode</label>
        <input type="text" class="form-control" name="nama_kereta" id="nama_kereta" value=" {{ $ticket->kode }}" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="">Nama Kereta</label>
        <input type="text" class="form-control" name="nama_kereta" id="nama_kereta" value=" {{ $ticket->nama_kereta }}" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="">Asal</label>
        <input type="text" class="form-control" name="asal" id="asal" value=" {{ $ticket->asal }}" readonly>    
    </div>
    <div class="form-group mb-3">
        <label for="">Tujuan</label>
        <input type="text" class="form-control" name="tujuan" id="tujuan" value=" {{ $ticket->tujuan }}" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="">Tanggal Berangkat</label>
        <input type="text" class="form-control" name="tanggal_berangkat" id="tanggal_berangkat" value=" {{ $ticket->tanggal_berangkat }}" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="">Pemilik Ticket</label>
        <input type="text" class="form-control" name="penumpang_id" id="penumpang_id" value=" {{ $penumpang->nama }}" readonly>
    </div>

    <a type="button" class="btn btn-primary" href="javascript:history.back()" >Back</a>

</div>
@endsection