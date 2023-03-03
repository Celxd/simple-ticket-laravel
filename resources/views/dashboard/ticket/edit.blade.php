@extends('layouts.dashboard')

@section('content')

<!-- make table for ticket -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 align="center">Edit Ticket</h1>
                    
                </div>
                <div class="card_body p-3">
                    <form action="{{ url('/dashboard/tickets/'.$ticket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4>Ticket</h4>
                        <div class="mb-3">
                            <label>Kode</label>
                            <input type="text" name="kode" maxlength="4" value="{{ $ticket->kode }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nama Kereta</label>
                            <input type="text" name="nama_kereta" value="{{ $ticket->nama_kereta }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Asal</label>
                            <input type="text" name="asal" value="{{ $ticket->asal }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tujuan</label>
                            <input type="text" name="tujuan" value="{{ $ticket->tujuan }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Berangkat</label>
                            <input type="date" name="tanggal_berangkat" value="{{ $ticket->tanggal_berangkat }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Pemilik Ticket</label>
                            <select class="form-select form-select-lg" name="penumpang_id" id="penumpang_id" style="width:100%">
                                @foreach ($penumpangs as $item)
                                    <option value="{{ $item->id }}" style="display:none;" @if($ticket->penumpang_id == $item->id) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                                @foreach ($penumpangs as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <a href="javascript:history.back()" class="btn btn-danger float-end mr-3">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                         
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection