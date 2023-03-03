@extends('layouts.dashboard')

@section('content')

<!-- make table for ticket -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 align="center">Add Ticket</h1>
                </div>
                <div class="card_body p-5">
                    <form action="{{ url('/dashboard/tickets') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Penumpang</label> <br>
                            <select class="form-select" name="penumpang_id" id="penumpang_id">
                                <option value="" selected>Pilih penumpang</option>
                                @foreach ($penumpangs as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Kode</label>
                            <input type="text" name="kode" maxlength="4" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nama Kereta</label>
                            <input type="text" name="nama_kereta" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Asal</label>
                            <input type="text" name="asal" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Berangkat</label>
                            <input type="date" name="tanggal_berangkat" class="form-control">
                        </div>                        
                        <div class="mb-3">
                            <a href="javascript:history.back()" class="btn btn-danger float-end ">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection