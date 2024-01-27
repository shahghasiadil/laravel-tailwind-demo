<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index', [
            'tickets' => Ticket::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('tickets.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreTicketRequest $request)
    {
        $attributes = $request->validated();

        $attributes['created_by'] = auth()->id();

        $ticket = Ticket::create(Arr::except($attributes, 'categories'));

        $ticket->categories()->attach($attributes['categories']);

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', [
            'ticket' => $ticket,
        ]);
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $attributes = $request->validated();

        $ticket->update($attributes);

        return redirect()->route('tickets.index')->with('success', 'Ticket edited successfully');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully');
    }
}
