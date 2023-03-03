@extends('layouts.dashboard')

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
                <div class="col-sm-2 align-self-end">
                    <a href="/dashboard/penumpang/create" class="btn btn-primary float-end mb-3">Add Penumpang</a>
                </div>
                <div class="col-10 text-right">
                    <form action="/dashboard/penumpang" method="get">
                    @csrf
                        <div class="row">
                            <!-- <div class="col align-self-center text-left">
                                <label class="text-left">Filter kedatangan</label>
                                <select class="form-select" name="asal" id="asal" style="width:100%;">
                                    <option @if(old('asal') == 'Semua kedatangan') selected @endif value="">Semua kedatangan</option>
                                    @foreach ($choices as $choice)
                                        <option value="{{ $choice->asal }}" @if($selected_choice == $choice->asal) selected @endif>{{ $choice->asal }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                            <div class="col align-self-center text-left" style="width:100%">
                                <label class="text-left">Cari nama</label>
                                <input name="nama" type="text" class="form-control" placeholder="Cari..." value="{{isset($_GET['nama']) ? $_GET['nama'] : ''}}">  
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
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if($penumpangs->count())
                <tbody>
                    <p hidden>{{ $no = 1 }}</p>
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
                                <a href="{{ url('/dashboard/penumpang/'.$penumpang->id.'/detail') }}" class="btn btn-primary d-inline">Detail</a>
                                <a href="{{ url('/dashboard/penumpang/'.$penumpang->id.'/edit') }}" class="btn btn-success d-inline">Edit</a>
                                <form action="{{ url('/dashboard/penumpang/'.$penumpang->id) }}" method="POST" class="d d-inline">
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
                    {{ $penumpangs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection