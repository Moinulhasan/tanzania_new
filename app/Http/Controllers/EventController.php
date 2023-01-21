<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests = Event::all();
        return view('Frontend::page.event.all', compact('dests'));
        
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
        return view('Frontend::page.event.create')->with($data);
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
            'start_date' => 'required',
            'end_date' => 'required',
            'slug' => "required|alpha_dash|unique:events,slug|max:191"
        ]);

        $cat = new Event();
        $cat->title = $request->title;
        $cat->location = $request->location;
        $cat->start_date = $request->start_date;
        $cat->end_date = $request->end_date;
        $cat->description = $request->description;
        $cat->photo = $request->photo->getClientOriginalName();

        if ($picture = $request->file('photo')) {
            $travelPath = 'events/';
            $profilepicture = $picture->getClientOriginalName();
            $picture->move($travelPath, $profilepicture);
            $input['photo'] = "$profilepicture";
        }

        $cat->slug = $request->slug;


        $cat->save();

        return redirect()->route('event.list')->with('success', 'New Event is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function list()
     {
        $dests = Event::all();
        return view('Frontend::page.event.list', compact('dests'));
     }

     public function show($id)
    {
        $travels = Event::all();
        $dest = Event::where('slug', $id)->first();
        return view('Frontend::page.event.single', compact('dest', 'travels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dest = Event::find($id);

        $data = [
            'title' => __('Add new post'),
            'new' => true
        ];
        return view('Frontend::page.event.edit', compact('dest'))->with($data);
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
            'slug' => "required|alpha_dash|unique:events,slug,".$id."|max:191"
        ]);

        $cat = Event::find($id);
        $cat->title = $request->title;
        $cat->location = $request->location;
        $cat->start_date = $request->start_date;
        $cat->end_date = $request->end_date;
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

        return redirect()->route('event.list')->with('success', 'A Event is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Event::find($id);
        $cat->delete();
        return back()->with('danger', 'Event Deleted Successfully');
    }
}
