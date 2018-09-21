<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketsRequest;
use App\Http\Requests\UpdateTicketsRequest;

class TicketsController extends Controller
{
    /**
     * Display a listing of Ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('ticket_access')) {
            return abort(401);
        }

        $tickets = Ticket::all();
		$title = "Ticket";
        return view('tickets.index', compact('tickets','title'));
    }

    /**
     * Show the form for creating new Ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('ticket_create')) {
            return abort(401);
        }
        $events = \App\Event::get()->pluck('title', 'id')->prepend('Please select', '');
		$title = "Ticket";
        return view('tickets.create', compact('events','title'));
    }

    /**
     * Store a newly created Ticket in storage.
     *
     * @param  \App\Http\Requests\StoreTicketsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketsRequest $request)
    {
        if (! Gate::allows('ticket_create')) {
            return abort(401);
        }
        $ticket = Ticket::create($request->all());
        return redirect()->route('tickets.index');
    }


    /**
     * Show the form for editing Ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('ticket_edit')) {
            return abort(401);
        }
        $events = \App\Event::get()->pluck('title', 'id')->prepend('Please select', '');

        $ticket = Ticket::findOrFail($id);
		$title = "Ticket";
        return view('tickets.edit', compact('ticket', 'events', 'title'));
    }

    /**
     * Update Ticket in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketsRequest $request, $id)
    {
        if (! Gate::allows('ticket_edit')) {
            return abort(401);
        }
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        return redirect()->route('tickets.index');
    }


    /**
     * Display Ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('ticket_view')) {
            return abort(401);
        }
        $ticket = Ticket::findOrFail($id);
		$title = "Ticket";
        return view('tickets.show', compact('ticket','title'));
    }


    /**
     * Remove Ticket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('ticket_delete')) {
            return abort(401);
        }
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index');
    }

    /**
     * Delete all selected Ticket at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('ticket_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Ticket::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
