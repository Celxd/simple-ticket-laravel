<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
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
        
        return view('ticket.index', ['tickets' => $tickets->paginate(3)], ['choices' => $choices]);
    }
    
    public function show(Ticket $ticket) {
        $penumpang = Penumpang::find($ticket->penumpang_id);

        return view('ticket.detail', [
            "ticket" => $ticket,
            "penumpang" => $penumpang
        ]);
    }
}
