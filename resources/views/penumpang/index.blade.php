@extends('layouts.main')

@section('content')

<?php

    if (isset($_REQUEST['asal'])) {

        $selected_choice = $_REQUEST['asal'];

    }
    else {

        $selected_choice = "none";

    }

?>

<!-- make table for penumpang -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif

            <h1 align="center" class="mt-4 mb-4">Penumpang Table</h1>
            <div class="row">
                <div class="col-12 text-right">
                    <form action="/penumpangs" method="get">
                    @csrf
                        <div class="row">
                            <div class="col align-self-center text-left" style="width:100%">
                                <label class="text-left">Cari nama</label>
                                <input name="nama" type="text" class="form-control" placeholder="Cari..." value="{{isset($_GET['nama']) ? $_GET['nama'] : ''}}">  
                            </div>
                            <div class="col align-self-end">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if($penumpangs->count())
                <tbody>
                    <p hidden>{{ $no = 1}}</p>
                    @foreach ($penumpangs as $penumpang)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $penumpang->nama }}</td>
                            <td>{{ $penumpang->email }}</td>
                            <td>
                                @foreach ($tickets as $ticket)
                                    @if($ticket->penumpang_id == $penumpang->id)
                                        <li>{{ $ticket->kode }}</li>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('penumpang/'.$penumpang->id.'/detail') }}" class="btn btn-primary d-inline">Detail</a>

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
                    {{ $penumpangs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection