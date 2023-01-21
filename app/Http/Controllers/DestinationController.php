<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Destination;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Sidebar;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use function PHPUnit\Framework\fileExists;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests = \App\Models\Destination::all();
        return view('Frontend::page.destination.all', compact('dests'));
        
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
        return view('Frontend::page.destination.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|unique:destinations,title',
            'photo' => 'required',
            'overview' => 'required',
             'slug' => "required|alpha_dash|unique:destinations,slug|max:191"
        ]);

        $cat = new Destination();
        $cat->title = $request->title;
        $cat->overview = $request->overview;
      /*  $cat->wildlife = $request->wildlife;
        $cat->birds = $request->birds;
        $cat->best_time = $request->best_time;
        $cat->weather = $request->weather;
        $cat->scenery = $request->scenery;
        $cat->getting_there = $request->getting_there;
        $cat->elevation = $request->elevation;
        $cat->wildlife_title = $request->wildlife_title;
        $cat->scenery_title = $request->scenery_title;
        $cat->birds_title = $request->birds_title;
        $cat->best_time_title = $request->best_time_title;
        $cat->weather_title = $request->weather_title;
        $cat->getting_there_title = $request->getting_there_title;
        $cat->elevation_title = $request->elevation_title;*/
        $cat->photo = $request->photo->getClientOriginalName();

        if ($picture = $request->file('photo')) {
            $destinationPath = 'destinations/';
            $profilepicture = $picture->getClientOriginalName();
            $picture->move($destinationPath, $profilepicture);
            $input['photo'] = "$profilepicture";
        }

        $cat->slug = $request->slug;

        $cat->save();

        return redirect()->route('destination.list')->with('success', 'New Destination is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function list()
     {
        $dests = Destination::all();
        return view('Frontend::page.destination.list', compact('dests'));
     }

     public function show($id)
    {
        $dest = Destination::where('slug', $id)->first();
        if ($dest != null) {
            $hotels = Hotel::query()
            ->where('location_address',$dest->title)
            ->orWhere('location_address', 'LIKE', "%{$dest->title}%")
            ->get();

            $events = Event::query()
                    ->where('location',$dest->title)
                    ->orWhere('location', 'LIKE', "%{$dest->title}%")
                    ->get();

            $attractions = Attraction::query()
                    ->where('location',$dest->title)
                    ->orWhere('location', 'LIKE', "%{$dest->title}%")
                    ->get();

            $list_tours = Tour::query()
                        ->where('location_address',$dest->title)
                        ->orWhere('location_address', 'LIKE', "%{$dest->title}%")
                        ->get();

            $sidebars = Sidebar::where('destination_id', $dest->id)->get();


            return view('Frontend::page.destination.single', compact('dest', 'hotels', 'events', 'attractions', 'list_tours', 'sidebars'));
        } else {
            return view('Frontend::errors.404');
        }
    }

    public function showByid($id,$temp)
    {
        // dd($temp);
        $dest = Destination::where('slug', $id)->first();
        // dd($dest);
        

        if ($dest != null) {
            $hotels = Hotel::query()
            ->where('location_address',$dest->title)
            ->orWhere('location_address', 'LIKE', "%{$dest->title}%")
            ->get();

            $events = Event::query()
                    ->where('location',$dest->title)
                    ->orWhere('location', 'LIKE', "%{$dest->title}%")
                    ->get();

            $attractions = Attraction::query()
                    ->where('location',$dest->title)
                    ->orWhere('location', 'LIKE', "%{$dest->title}%")
                    ->get();

            $list_tours = Tour::query()
                        ->where('location_address',$dest->title)
                        ->orWhere('location_address', 'LIKE', "%{$dest->title}%")
                        ->get();

        /*$data = $dest->{$temp};

        if ($temp == 'wildlife') {
            $title = $dest->wildlife_title;
        } elseif ($temp == 'birds') {
            $title = $dest->birds_title;
        } elseif ($temp == 'best_time') {
            $title = $dest->best_time_title;
        } elseif ($temp == 'overview') {
            return view('Frontend::page.destination.single', compact('dest', 'hotels', 'events', 'attractions', 'list_tours', 'temp', 'data'));
        } elseif ($temp == 'weather') {
            $title = $dest->weather_title;
        } elseif ($temp == 'scenery') {
            $title = $dest->scenery_title;
        } elseif ($temp == 'elevation') {
            $title = $dest->elevation_title;
        } elseif ($temp == 'getting_there') {
            $title = $dest->getting_there_title;
        } else{
            $title = '';
        }*/
            $sidebar = Sidebar::where('slug', $temp)->first();
            $sidebars = Sidebar::where('destination_id', $dest->id)->get();

// dd($title);
            return view('Frontend::page.destination.single1', compact('dest', 'hotels', 'events', 'attractions', 'list_tours', 'temp', 'sidebar', 'sidebars'));
        } else {
            return view('Frontend::errors.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dest = Destination::find($id);

        $data = [
            'title' => __('Add new post'),
            'new' => true
        ];
        return view('Frontend::page.destination.edit', compact('dest'))->with($data);
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
                'slug' => "required|alpha_dash|unique:destinations,slug,".$id."|max:191"
        ]);

        $cat = Destination::find($id);
        $cat->title = $request->title;
        $cat->slug = $request->slug;
        $cat->overview = $request->overview;
       /* $cat->wildlife = $request->wildlife;
        $cat->birds = $request->birds;
        $cat->best_time = $request->best_time;
        $cat->weather = $request->weather;
        $cat->scenery = $request->scenery;
        $cat->getting_there = $request->getting_there;
        $cat->elevation = $request->elevation;
        $cat->wildlife_title = $request->wildlife_title;
        $cat->scenery_title = $request->scenery_title;
        $cat->birds_title = $request->birds_title;
        $cat->best_time_title = $request->best_time_title;
        $cat->weather_title = $request->weather_title;
        $cat->getting_there_title = $request->getting_there_title;
        $cat->elevation_title = $request->elevation_title;*/


        if ($request->photo) {
            $cat->photo = $request->photo->getClientOriginalName();
            if ($picture = $request->file('photo')) {
                $destinationPath = 'destinations/';
                $profilepicture = $picture->getClientOriginalName();
                $picture->move($destinationPath, $profilepicture);
                $input['photo'] = "$profilepicture";
            }
        }

       /* $cat->slug = Str::slug($request->title);*/

        $cat->update();

        return redirect()->route('destination.list')->with('success', 'A Destination is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Destination::find($id);
        $cat->delete();
        return back()->with('danger', 'Destination Deleted Successfully');
    }
}
