<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::get();
       

        return view('admin.company.index',compact('companies'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
     $this->validate($request,[
        'name' => 'required',
        'image' => 'required',
        
    ]);
    
    $image = $request->file('image');


    if (isset($image)) {

        $destinationPath = 'image/';

        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move($destinationPath, $profileImage);
      
    } else {
        $profileImage = "default.png";
       
    }
    $company = new Company();

    $company->name = $request->name;
   
 
  
    $company->image = $profileImage;
   
 
    
    // $company->is_approved = true;
    $company->save();

  
    Toastr::success('Successfully Saved :)' ,'Success');
    return redirect()->route('admin.companies.index');
    
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
        $company=Company::find($id);
     
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required',
          
        ]);
        $image = $request->file('image');
        $company = Company::find($id);
        
  
       
      
   
        if (isset($image)) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);
        $company->image = $profileImage;
          
        } 
      
     
        $company->name = $request->name;

       
        $company->update();

      
        Toastr::success('Updated Successfully :)' ,'Success');
       
            # code...
            return redirect()->route('admin.companies.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company=Company::find($id)->delete();
        if (isset($company->image)) {
          unlink(public_path().'/image/'.$company->image);
        }

        // $company->delete();
        Toastr::success('Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
