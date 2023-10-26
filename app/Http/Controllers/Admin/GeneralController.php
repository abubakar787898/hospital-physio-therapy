<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function about()
    {
        $about=Page::find(1);
     
        return view('admin.pages.about',compact('about'));
    }
    public function updateAbout(Request $request)
    {
        // dd($request->image);
        $this->validate($request,[
            'title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);
       
        $about = Page::find(1);
       
        $about->title = $request->title;
      
        $about->description = $request->description;
        $about->meta_title = $request->meta_title;
        $about->meta_description = $request->meta_description;
      
        $about->save();

      
        Toastr::success('About Updated Successfully :)' ,'Success');
        return redirect()->route('admin.about');
    }
    
}
