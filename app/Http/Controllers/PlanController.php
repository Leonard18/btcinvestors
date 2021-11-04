<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DepositController;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $plans = Plan::latest()->get();
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

        // validate the data...
        $validatedData = $this->validate($request, [
            'name' => 'bail|required|string|min:2|unique:plans,name,|max:255',
            'percentage' => 'required|numeric|max:255',
            'interval' => 'required|numeric',
            'description' => 'required|string|min:2|max:300',
            'duration' => 'required|string',
            'background_color' => 'required|string',
            'text_color' => 'required|string',
        ]);

        $plan = new Plan();
	$plan->name = $request->name;
	$plan->percentage = $request->percentage;
	$plan->interval = $request->interval;
	$plan->interval_name = $this->getIntervalName($request->interval);
	$plan->description = $request->description;
	$plan->duration = $request->duration;
	$plan->background_color = $request->background_color;
	$plan->text_color = $request->text_color;

	//Save the plan now... 
	$plan->save();

        // check if the plan was created successfully..
        if (!$plan) {
	    // send an error flash message
            Session::flash('error', ' OOOPS! There was an error creating plan.');
        } else {
           // send a success flash message
            Session::flash('success', 'Plan added successfully');
        }

        // redirect to the dashboard page...

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {

        // validate the data...
        $this->validate($request, [
            'name' => 'required|string|min:2|max:255',
            'percentage' => 'required|numeric',
            'interval' => 'required|numeric',
            'description' => 'required|string',
            'duration' => 'required|string',
            'background_color' => 'required|string',
            'text_color' => 'required|string',
        ]);

        // Update the plan ...
        $plan->update([
            $plan->name = $request->name,
            $plan->percentage = $request->percentage,
            $plan->interval = $request->interval,
	    $plan->interval_name = $this->getIntervalName($request->interval),
            $plan->description = $request->description,
            $plan->duration = $request->duration,
            $plan->background_color = $request->background_color,
            $plan->text_color = $request->text_color,
        ]);

        // check if that was successful and send a flash message...
        if ($plan) {
            // Send a success flass message
            Session::flash('success', ' Plan updated successfully.');
        } else {
            // Send a success flass message
            Session::flash('error', ' There was an error updating his plan.');
        }

        // redirect to the same page...
        return back();
	//return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        // Delete the plan...
        $deleted = $plan->delete();

        // check if this was successfully...
        if ($deleted) {
            // send a success flash message...
            Session::flash('success', ' Plan deleted successfully.');
        } else {
            // send an error message when the plan was unable o delee
            Session::flash('error', '  There was a problem deleting plan. Please try again and see if the proble persist');
        }

        // redirect to the same page...
        return back();
	//return redirect()->back();


    }


     public function getIntervalName($name) {

        switch ($name) {
            case 1:
                return $name = "Weekly";
                break;
            case 2:
                return $name = "Two Weekly";
                break;
            case 3:
                return $name = "Monthly";
                break;
            case 4:
                return $name = "Two Months";
                break;
            case 5:
                return $name = "Three Months";
                break;
            case 6:
                return $name = "Six Months";
                break;
            case 7:
                return $name = "Ten Months";
                break;
            case 8:
                return $name = "Twelve Months";
                break;
        }

    }


}
