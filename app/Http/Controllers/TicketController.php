<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketCollection;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TicketController extends Controller
{
    /**
     * Show all tickets.
     */
    public function index(): View
    {
        return view('ticket.index', [
            'tickets' => Ticket::all()
        ]);
    }

    /**
     * All tickets return json.
     */
    public function indexJson()
    {
        return new TicketCollection(Ticket::all());
    }

    /**
     * Show the ticket.
     */
    public function show(string $id): View
    {
        return view('ticket.show', [
            'ticket' => Ticket::findOrFail($id)
        ]);
    }

    /**
     * add a new ticket.
     */
    public function create(): View
    {
        return view('ticket.create', [
            'users' => User::all()
        ]);
    }

    /**
     * create the ticket.
     */
    public function post(TicketRequest $request): RedirectResponse
    {
        $req = $request->all();
        Ticket::create($req);

        return Redirect::route('dashboard')->with('status', 'ticket-created');
    }

    /**
     * Display the ticket's form.
     */
    public function edit(Ticket $ticket): View
    {
        return view('ticket.edit', [
            'ticket' => $ticket,
            'users' => User::all()
        ]);
    }

    /**
     * Update the ticket's information.
     */
    public function update(Request $request): RedirectResponse
    {


        return Redirect::route('ticket.edit')->with('status', 'ticket-created');
    }

    /**
     * Delete the ticket.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $ticket = $request->ticket();

        $ticket->delete();

        return Redirect::to('/');
    }
}
