<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TravelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests = Travel::all();
        return view('Frontend::page.travel.all', compact('dests'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => __('Add new post'),
            'new' => true
        ];
        return view('Frontend::page.travel.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:travel,title',
            'description' => 'required',
            'photo' => 'required',
            'slug' => "required|alpha_dash|unique:travel,slug|max:191"
        ]);

        $cat = new Travel();
        $cat->title = $request->title;
        $cat->description = $request->description;
        $cat->photo = $request->photo->getClientOriginalName();

        if ($picture = $request->file('photo')) {
            $travelPath = 'travels/';
            $profilepicture = $picture->getClientOriginalName();
            $picture->move($travelPath, $profilepicture);
            $input['photo'] = "$profilepicture";
        }

       $cat->slug = $request->slug;

        $cat->save();

        return redirect()->route('travelguide.list')->with('success', 'New Travel Guide is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function list()
     {
        $dests = Travel::all();
        return view('Frontend::page.travel.list', compact('dests'));
     }

     public function show($id)
    {
        $travels = Travel::all();
        $dest = Travel::where('slug',$id)->first();
        return view('Frontend::page.travel.single', compact('dest', 'travels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dest = Travel::find($id);

        $data = [
            'title' => __('Add new post'),
            'new' => true
        ];
        return view('Frontend::page.travel.edit', compact('dest'))->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'slug' => "required|alpha_dash|unique:travel,slug,".$id."|max:191"
        ]);

        $cat = Travel::find($id);
        $cat->title = $request->title;
        $cat->description = $request->description;


        if ($request->photo) {
            $cat->photo = $request->photo->getClientOriginalName();
            if ($picture = $request->file('photo')) {
                $travelPath = 'travels/';
                $profilepicture = $picture->getClientOriginalName();
                $picture->move($travelPath, $profilepicture);
                $input['photo'] = "$profilepicture";
            }
        }

        $cat->slug = $request->slug;

        $cat->update();

        return redirect()->route('travelguide.list')->with('success', 'A Travel Guide is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Travel::find($id);
        $cat->delete();
        return back()->with('danger', 'Travel Guide Deleted Successfully');
    }
}
