@extends('layouts.dashboard')

@section('content')

<?php

if (isset($_REQUEST['asal'])) {

    $selected_choice = $_REQUEST['asal'];
} else {

    $selected_choice = "none";
}

$options = array_unique($choices->pluck('asal')->toArray());
?>

<!-- make table for ticket -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif

            <h1 align="center" class="mt-4 mb-4">Ticket Table</h1>
            <div class="row">
                <div class="col-sm-2 align-self-end">
                    <a href="tickets/create" class="btn btn-primary float-end mb-3">Add ticket</a>
                </div>
                <div class="col-10 text-right">
                    <form action="/dashboard/tickets" method="get">
                        @csrf
                        <div class="row">
                            <div class="col align-self-center text-left">
                                <label class="text-left">Filter kedatangan</label>
                                <select class="form-select" name="asal" id="asal" style="width:100%;">
                                    <option @if(old('asal')=='Semua kedatangan' ) selected @endif value="">Semua kedatangan</option>
                                    @foreach ($options as $option)
                                    <option value="{{ $option }}" @if($selected_choice==$option) selected @endif>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col align-self-center text-left" style="width:100%">
                                <label class="text-left">Cari nama kereta</label>
                                <input name="nama_kereta" type="text" class="form-control" placeholder="Cari..." value="{{isset($_GET['nama_kereta']) ? $_GET['nama_kereta'] : ''}}">
                            </div>
                            <div class="col align-self-center">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama Kereta</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Tanggal Berangkat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if($tickets->count())
                <tbody>
                    @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->kode }}</td>
                        <td>{{ $ticket->nama_kereta }}</td>
                        <td>{{ $ticket->asal }}</td>
                        <td>{{ $ticket->tujuan }}</td>
                        <td>{{ $ticket->tanggal_berangkat }}</td>
                        <td>
                            <a href="{{ url('/dashboard/tickets/'.$ticket->id.'/detail') }}" class="btn btn-primary d-inline">Detail</a>
                            <a href="{{ url('/dashboard/tickets/'.$ticket->id.'/edit') }}" class="btn btn-success d-inline">Edit</a>
                            <form action="{{ url('/dashboard/tickets/'.$ticket->id) }}" method="POST" class="d d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                @else
                <tr>
                    <td colspan="6" class="text-center">No data found</td>
                </tr>
                @endif
            </table>
            <div class="row">
                <div class="col-12 d-flex justify-content-center pt-4">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection