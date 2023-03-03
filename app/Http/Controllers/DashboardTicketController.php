<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Penumpang;

class DashboardTicketController extends Controller
{
    public function index(Request $request) {
        $tickets = Ticket::query();
        $choices = Ticket::orderBy('asal')->get();

        //search by nama_kereta
        $tickets->when($request->nama_kereta, function($query) use ($request) {
            return $query->where('nama_kereta', 'like', '%'. $request->nama_kereta . '%');
        });

        //filter by asal
        $tickets->when($request->asal, function($query) use ($request) {
            return $query->where('asal', 'like', '%'. $request->asal . '%');
        });
        
        return view('dashboard.ticket.index', ['tickets' => $tickets->paginate(3)], ['choices' => $choices]);
    }

    public function create() {
        return view('dashboard.ticket.create', ['penumpangs' => Penumpang::all()]);
    }

    public function store(Request $request) {
        Ticket::create([
            'penumpang_id' => $request->penumpang_id,
            'kode' => $request->kode,
            'nama_kereta' => $request->nama_kereta,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'tanggal_berangkat' => $request->tanggal_berangkat
        ]);

        return redirect('/dashboard/tickets')->with('message', 'Ticket created successfully!');
    }

    public function destroy(Ticket $ticket) {
        $ticket->delete();
        return redirect('/dashboard/tickets')->with('message', 'Ticket deleted successfully!');
    }

    public function edit(Ticket $ticket) {
        $penumpangs = Penumpang::all();

        return view('dashboard.ticket.edit', compact('ticket'), compact('penumpangs'));
    
    }

    public function update(Ticket $ticket, Request $request) {
        $ticket->update([
            'penumpang_id' => $request->penumpang_id,
            'kode' => $request->kode,
            'nama_kereta' => $request->nama_kereta,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'tanggal_berangkat' => $request->tanggal_berangkat
        ]);

        return redirect('/dashboard/tickets')->with('message', 'Ticket updated successfully!');
    }

    public function show(Ticket $ticket) {
        $penumpang = Penumpang::where('id', $ticket->penumpang_id)->first();
        return view('dashboard.ticket.detail', [
            "ticket" => $ticket,
            "penumpang" => $penumpang
        ]);
    }
}
