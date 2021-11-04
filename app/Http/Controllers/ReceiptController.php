<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  Get the user receipts and all the receipt from the DB
        $receipts = Receipt::all();
        $userReceipts = auth()->user()->receipts()->get();

        // return all the receipts... 
        return view('user.receipt', compact('receipts', 'userReceipts'));
        
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
              
        // validate the incoming request... 
        $this->validate($request, [
            'type' => 'required',
            'image' => 'nullable|sometimes|required|image|mimes:jpg,jpeg,png,git',       
        ]);

        // Save the data... 
        $receipt = new Receipt();
        $receipt->user_id = auth()->id();
        $receipt->type = $request->type;
        $receipt->type_name = $this->getReceiptTypeName($request->type);

        // check if the data has a file and save... 
        if ($request->hasFile('image')) {
            
            $image = $request->file('image');

            // Create the file name... 
            $receiptname = uniqid('receipt_image', true) . "." . time() . "." . $image->getClientOriginalName() . "." . $image->getClientOriginalExtension();

            // create a storage location...
            $location = storage_path('app/public/receipts/receipt' . $receiptname);

            // Resize and save the image... 
            Image::make($image)->resize(600, 250)->save($location);

            // save the image to the database... 
            $receipt->image = $receiptname;

        }
        $receipt->approved = false;

        // save the data and return back... 
        $receipt->save();

        // check for errors and return proper messages... 
        if (!$receipt) {
            // Send and error message... 
            Session::flash('error', ' There was an error submitting your receipt. Please try some more time.');
        } else {
            Session::flash('success', ' Your ticket has been submitted successfully');
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        $updated = $receipt->update([
            'approved' => true,
        ]);

        if(!$updated) {
            // Send an error message.... 
            Session::flash('error', ' There was an error updating receipt. Please check and try again.');
        } else {
            // Send a success message... 
            Session::flash('success', ' Receipt successfully updated.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        // delete the receipt image from the filesystem...
        Storage::delete('public/receipts/receipt' . $receipt->image);

        // now delete the receipt... 
        $deleted = $receipt->delete();

        // check if that was successfull... 
        if (!$deleted) {
            // send an error message... 
            Session::flash('error', ' There was an error deleting this receipt. Please check and try again.');
        } else {
            // send a success message... 
            Session::flash('success', ' Receipt successfully deleted.');
        }

        // redirect back to the receipt page...
        return back(); 
        // return redirect()->back();
    }


    /**
     * Simple login to set the receipt type_name... 
     */
    public function getReceiptTypeName($receipt) {
        switch ($receipt) {
            case 1:
                return $receipt = "Bank Slip";
                break;
            case 2:
                return $receipt = "E-slip";
                break;
            case 3:
                return $receipt = "Bank Teller";
                break;
            case 4:
                return $receipt = "Online Transactional Receipt";
                break;
            case 5:
                return $receipt = "Others";
                break;
        }
    }
}
