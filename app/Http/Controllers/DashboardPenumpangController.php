<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penumpang;
use App\Models\Ticket;

class DashboardPenumpangController extends Controller
{
    public function index(Request $request) {
        $penumpangs = Penumpang::query();
        $choices = Penumpang::all();
        $tickets = Ticket::all();

        //search by nama
        $penumpangs->when($request->nama, function($query) use ($request) {
            return $query->where('nama', 'like', '%'. $request->nama . '%');
        });
        
        return view('dashboard.penumpang.index', ['penumpangs' => $penumpangs->paginate(3)], ['choices' => $choices])->with('tickets', $tickets);
    }

    public function create() {
        return view('dashboard.penumpang.create');
    }

    public function store(Request $request) {
        Penumpang::create([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect('/dashboard/penumpang')->with('message', 'Penumpang created successfully!');
    }

    public function destroy(Penumpang $penumpang) {
        $penumpang->delete();
        return redirect('/dashboard/penumpang')->with('message', 'Penumpang deleted successfully!');
    }

    public function edit(Penumpang $penumpang) {
        return view('dashboard.penumpang.edit', compact('penumpang'));
    
    }

    public function update(Penumpang $penumpang, Request $request) {
        $penumpang->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect('/dashboard/penumpang')->with('message', 'Penumpang updated successfully!');
    }

    public function show(Penumpang $penumpang) {
        return view('dashboard.penumpang.detail', [
            "penumpang" => $penumpang
        ]);
    }
}
