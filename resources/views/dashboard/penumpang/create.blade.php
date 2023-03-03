@extends('layouts.dashboard')

@section('content')

<!-- make table for ticket -->
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h1 align="center">Add Penumpang</h1>
                </div>
                <div class="card_body p-5">
                    <form action="{{ url('/dashboard/penumpang') }}" method="POST">
                        @csrf
                        <h4>Penumpang</h4>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
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