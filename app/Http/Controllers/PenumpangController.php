<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penumpang;
use App\Models\Ticket;

class PenumpangController extends Controller
{
    public function index(Request $request) {
        $penumpangs = Penumpang::query();
        $choices = Penumpang::all();
        $tickets = Ticket::all();

        //search by nama
        $penumpangs->when($request->nama, function($query) use ($request) {
            return $query->where('nama', 'like', '%'. $request->nama . '%');
        });

        //filter by email
        $penumpangs->when($request->email, function($query) use ($request) {
            return $query->where('email', 'like', '%'. $request->email . '%');
        });
        
        return view('penumpang.index', ['penumpangs' => $penumpangs->paginate(3)], ['choices' => $choices])->with('tickets', $tickets);
    }

    public function show(Penumpang $penumpang) {
        return view('penumpang.detail', [
            "penumpang" => $penumpang
        ]);
    }
}
