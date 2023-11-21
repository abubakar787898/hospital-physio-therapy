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
    public function home()
    {
        $home=Page::find(2);
     
        return view('admin.pages.home',compact('home'));
    }
    public function updateHome(Request $request)
    {
        // dd($request->image);
        $this->validate($request,[
            'title' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ]);
       
        $home = Page::find(2);
       
        $home->title = $request->title;
      
        $home->description = $request->description;
       
       
        $home->meta_title = $request->meta_title;
        $home->meta_description = $request->meta_description;
      
        $home->save();

      
        Toastr::success('Home Updated Successfully :)' ,'Success');
        return redirect()->route('admin.home');
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
        $about->description_1 = $request->description_1;
        $about->description_2 = $request->description_2;
        $about->description_3 = $request->description_3;
        $about->description_4 = $request->description_4;
        $about->meta_title = $request->meta_title;
        $about->meta_description = $request->meta_description;
      
        $about->save();

      
        Toastr::success('About Updated Successfully :)' ,'Success');
        return redirect()->route('admin.about');
    }
    
}
