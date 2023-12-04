<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DurationController extends Controller
{
    public function index()
    {
        $durations = Duration::get();
       

        return view('admin.duration.index',compact('durations'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.duration.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
     $this->validate($request,[
        'duration' => 'required',
        'amount' => 'required',
        
    ]);
    
   
    $duration = new Duration();

    $duration->duration = $request->duration;
    $duration->amount = $request->amount;
   
    $duration->save();

  
    Toastr::success('Successfully Saved :)' ,'Success');
    return redirect()->route('admin.durations.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $duration=Duration::find($id);
     
        return view('admin.duration.edit',compact('duration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'duration' => 'required',
            'amount' => 'required',
          
        ]);
       
        $duration = Duration::find($id);
        
  
       
      
   
       
    $duration->duration = $request->duration;
    $duration->amount = $request->amount;
        $duration->update();

      
        Toastr::success('Updated Successfully :)' ,'Success');
       
            # code...
            return redirect()->route('admin.durations.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $duration=Duration::find($id)->delete();
      

        Toastr::success('Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
