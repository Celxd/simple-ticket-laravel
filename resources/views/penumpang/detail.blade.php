@extends('layouts.main')

@section('content')
    <h4>Penumpang</h4>
    <div class="form-group mb-3">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value=" {{ $penumpang->nama }}" readonly>
    </div>
    <div class="form-group mb-3">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" id="email" value=" {{ $penumpang->email }}" readonly>    
    </div>
    <a type="button" class="btn btn-primary" href="javascript:history.back()" >Back</a>
@endsection