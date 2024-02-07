<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Label;
use App\Models\Ticket;
use App\Models\Category;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index',compact('tickets'));
        // return view('index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        $categories = Category::all();
        $labels = Label::all();

        return view('ticket.create', compact('categories','labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {

        $file = $request->file('file'); // Accessing the file correctly
 
        if ($file) {
            $newName = "gallery_" . uniqid() . "." . $file->extension();
            $file->storeAs("public/gallery", $newName);
        } else {

        }
 
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->file = $newName;
        $ticket->priority = $request->priority;
        $ticket->status = $request->status;
        // $ticket->file = $request->file;
        $ticket->save();
        if($request->category_id){
            $ticket->category()->attach($request->category_id);
        }
        if($request->label_id)
        {
            $ticket->label()->attach($request->label_id);
        }
        return redirect()->route('ticket.index')->with('success','Ticket is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $categories = Category::all();
        $labels = Label::all();
        return view('ticket.detail', compact('ticket','categories','labels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $categories = Category::all();
        $labels = Label::all();
        return view('ticket.edit', compact('ticket','categories','labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $file = $request->file('file'); // Accessing the file correctly
 
        if ($file) {
            $newName = "gallery_" . uniqid() . "." . $file->extension();
            $file->storeAs("public/gallery", $newName);
        } else {

        }
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->file = $newName;
        $ticket->priority = $request->priority;
        $ticket->status = $request->status;
        $ticket->update();
        if($request->category_id){
            $ticket->category()->attach($request->category_id);
        }
        if($request->label_id)
        {
            $ticket->label()->attach($request->label_id);
        }
        return redirect()->route('ticket.index')->with('update','Ticket is Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        if($ticket){
            $ticket->delete();
        }
        return redirect()->back()->with('delete','Ticket is Deleted Successfully');
    }
}