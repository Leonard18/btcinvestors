<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Traits;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SupportTicketController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->except(['store', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = SupportTicket::all();
        return view('user.ticket', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->message);
        // Validate the form... 
        $validatedData = $this->validate($request, [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'phone' => 'required|numeric',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:3|max:2000',
        ]);

        // create a new record... 
        $ticket = SupportTicket::create($validatedData);

        // check if the ticket was created successfully... 
        if (!$ticket) {
            // send an error flash meassage... 
            Session::flash('error', ' There was an error submitting your support ticket. Please check to make you filled all fields correctly.');
        } else {
            // send a success flash meassage... 
            Session::flash('success', ' Form submitted. We will get back at you shortly.');
        }

        // Redirect back to the same page...
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function show(SupportTicket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTicket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportTicket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportTicket $ticket)
    {
        // delete the ticket... 
        $deleted = $ticket->delete();

        // check if that was successful... 
        if (!$deleted) {
            // Send an error message... 
            Session::flash('error', ' Whoops! There was an error deleting the ticket. Please check and try again');
        } else {
            // Send a success message... 
            Session::flash('success', ' Ticket deleted successfully.');
        }

        // redirect the user back to the index page... 
        return back();
    }
}
