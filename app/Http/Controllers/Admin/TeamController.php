<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::where('type','team')->get();
       

        return view('admin.team.index',compact('teams'));
    }
    public function slider_index()
    {
        $teams = Team::where('type','slider')->get();
       

        return view('admin.team.slider_index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
     $this->validate($request,[
        'title' => 'required',
        'image' => 'required',
        
    ]);
    $slug = Str::slug($request->title);
    $image = $request->file('image');


    if (isset($image)) {

        $destinationPath = 'image/';

        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move($destinationPath, $profileImage);
      
    } else {
        $profileImage = "default.png";
       
    }
    $team = new Team();
    // $team->user_id = Auth::id();
    $team->title = $request->title;
    $team->slug = $slug;
    $team->title_color = $request->title_color;
    $team->description = $request->description;
    $team->experience = $request->experience;
    $team->phone = $request->phone;
    $team->email = $request->email;
    $team->speciality = $request->speciality;
 
  
    $team->image = $profileImage;
    $team->type = $request->type;
    $team->fb_link = $request->fb_link;
    $team->insta_link = $request->insta_link;
    $team->youtube_link = $request->youtube_link;
    $team->twitter_link = $request->twitter_link;
    $team->linkedin_link = $request->linkedin_link;
  
 
    
    // $team->is_approved = true;
    $team->save();

  
    Toastr::success('Successfully Saved :)' ,'Success');
    if ($request->type=='team') {
        # code...
        return redirect()->route('admin.teams.index');
    }else{
        return redirect()->route('admin.slider');

    }
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
        $team=Team::find($id);
     
        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'title' => 'required',
          
        ]);
        $image = $request->file('image');
        $team = Team::find($id);
        $slug = Str::slug($request->title);
  
        if (Team::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            
        }else{
            $team->slug = $slug;
        }
      
   
        if (isset($image)) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);
        $team->image = $profileImage;
          
        } 
      
     
        $team->title = $request->title;
        $team->title_color = $request->title_color;
   
        $team->description = $request->description;
        $team->experience = $request->experience;
        $team->phone = $request->phone;
        $team->email = $request->email;
        $team->speciality = $request->speciality;
        $team->type = $request->type;
        $team->fb_link = $request->fb_link;
        $team->insta_link = $request->insta_link;
        $team->youtube_link = $request->youtube_link;
        $team->twitter_link = $request->twitter_link;
        $team->linkedin_link = $request->linkedin_link;
       
        $team->update();

      
        Toastr::success('Updated Successfully :)' ,'Success');
        if ($request->type=='team') {
            # code...
            return redirect()->route('admin.teams.index');
        }else{
            return redirect()->route('admin.slider');
    
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team=Team::find($id)->delete();
        if (isset($team->image)) {
          unlink(public_path().'/image/'.$team->image);
        }

        // $team->delete();
        Toastr::success('Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
