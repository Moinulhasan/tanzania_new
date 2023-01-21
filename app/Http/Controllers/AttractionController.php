<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests = Attraction::all();
        return view('Frontend::page.attraction.all', compact('dests'));
        
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
        return view('Frontend::page.attraction.create')->with($data);
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
            'title' => 'required|unique:events,title',
            'description' => 'required',
            'photo' => 'required',
            'location' => 'required',
            'slug' => "required|alpha_dash|unique:attractions,slug|max:191"
        ]);

        $cat = new Attraction();
        $cat->title = $request->title;
        $cat->location = $request->location;
        $cat->description = $request->description;
        $cat->photo = $request->photo->getClientOriginalName();

        if ($picture = $request->file('photo')) {
            $travelPath = 'attractions/';
            $profilepicture = $picture->getClientOriginalName();
            $picture->move($travelPath, $profilepicture);
            $input['photo'] = "$profilepicture";
        }

         $cat->slug = $request->slug;

        $cat->save();

        return redirect()->route('attraction.list')->with('success', 'New Attraction is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function list()
     {
        $dests = Attraction::all();
        return view('Frontend::page.attraction.list', compact('dests'));
     }

     public function show($id)
    {
        $dest = Attraction::where('slug',$id)->first();
        $travels = Attraction::query()
                    ->where('location',$dest->location)
                    ->orWhere('location', 'LIKE', "%{$dest->location}%")
                    ->get();
        return view('Frontend::page.attraction.single', compact('dest', 'travels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dest = Attraction::find($id);

        $data = [
            'title' => __('Add new post'),
            'new' => true
        ];
        return view('Frontend::page.attraction.edit', compact('dest'))->with($data);
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
            'slug' => "required|alpha_dash|unique:attractions,slug,".$id."|max:191"
        ]);

        $cat = Attraction::find($id);
        $cat->title = $request->title;
        $cat->location = $request->location;
        $cat->description = $request->description;


        if ($request->photo) {
            $cat->photo = $request->photo->getClientOriginalName();
            if ($picture = $request->file('photo')) {
                $travelPath = 'attractions/';
                $profilepicture = $picture->getClientOriginalName();
                $picture->move($travelPath, $profilepicture);
                $input['photo'] = "$profilepicture";
            }
        }

        $cat->slug = $request->slug;

        $cat->update();

        return redirect()->route('attraction.list')->with('success', 'A Attraction is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Attraction::find($id);
        $cat->delete();
        return back()->with('danger', 'Attraction Deleted Successfully');
    }
}
