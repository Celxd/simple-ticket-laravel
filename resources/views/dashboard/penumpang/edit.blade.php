@extends('layouts.dashboard')

@section('content')

<!-- make table for penumpang -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 align="center">Edit Penumpang</h1>
                    
                </div>
                <div class="card_body p-3">
                    <form action="{{ url('/dashboard/penumpang/'.$penumpang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4>Penumpang</h4>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" value="{{ $penumpang->nama }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ $penumpang->email }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <a href="javascript:history.back()" class="btn btn-danger float-end ">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection