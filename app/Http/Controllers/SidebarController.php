<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function index($id){
        $dests = Sidebar::where('destination_id', $id)->get();
        $destination = Destination::find($id);
        return view('Frontend::page.sidebars.list', compact('dests', 'destination'));
    }


    public function create($id)
    {
        $destination = Destination::find($id);
        return view('Frontend::page.sidebars.create', compact('destination'));
    }

    public function store(Request $request, $id){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => "required|alpha_dash|unique:sidebars,slug|max:191"
        ]);

        $sidebar = new Sidebar();
        $sidebar->title = $request->title;
        $sidebar->description = $request->description;
        $sidebar->slug = $request->slug;
        $sidebar->destination_id = $id;
        $sidebar->save();

        return redirect('destination/sidebar/'. $id)->with('success', 'New Sidebar item is created successfully');
    }


    public function edit($id)
    {
        $sidebar = Sidebar::find($id);
        $destination = Destination::find($sidebar->destination_id);

        return view('Frontend::page.sidebars.edit', compact('destination', 'sidebar'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => "required|alpha_dash|unique:sidebars,slug,".$id."|max:191"
        ]);

        $sidebar = Sidebar::find($id);
        $sidebar->title = $request->title;
        $sidebar->description = $request->description;
        $sidebar->slug = $request->slug;
        $sidebar->save();

        return redirect()->to('destination/sidebar/'. $sidebar->destination_id)->with('success', 'New Sidebar item is updated successfully');
    }


    public function destroy($id)
    {
        $cat = Sidebar::find($id);
        $cat->delete();
        return back()->with('danger', 'Sidebar Item Deleted Successfully');
    }
}
