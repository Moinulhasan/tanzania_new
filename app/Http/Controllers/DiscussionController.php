<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\DiscussCategory;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;



class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        Paginator::useBootstrap();

        $cat_id = DiscussCategory::where('slug', $id)->first();

        $disc = Discussion::where('category',$cat_id->id)->paginate(10);

        $ans = Answer::where('discussion_id',$cat_id->id)->get();

        $cats = DiscussCategory::all();

        $cat = DiscussCategory::where('slug', $id)->first();

        // dd($ans);
        return view('Frontend::page.discussion.index', compact('cats', 'disc', 'ans', 'cat'));
    }


    public function answer($id)
    {
        Paginator::useBootstrap();

        $disc = Discussion::where('slug',$id)->first();

        $ans = Answer::where('discussion_id',$disc->id)->paginate(10);
        $cats = DiscussCategory::all();
        $category = DiscussCategory::find($disc->category);

        // $discussion_id = Answer::where('category',$id)->get();

        // dd($ans);
        return view('Frontend::page.discussion.question.answer', compact('cats', 'disc', 'ans', 'category'));
    }

    public function answerStore(Request $request, $id)
    {        
        $validated = $request->validate([
            'answer' => 'required',
        ]);

        $disc = Discussion::where('id',$id)->first();


        $cat = new Answer();
        $cat->answer = $request->answer;
        $cat->discussion_id = $disc->id;
        $cat->user_id = auth()->user()->id;

        $cat->slug = Str::slug($request->title);

        $cat->save();
        return back()->with('success', 'You Replied in a Discussion Successfully');
    }
    

    public function quest()
    {
        Paginator::useBootstrap();

        $cats = DiscussCategory::all();
        $quests = Discussion::paginate(10);
        return view('Frontend::page.discussion.questions', compact('cats', 'quests'));
    }
    
    public function questStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'question' => 'required',
        ]);


        $cat = new Discussion();
        $cat->title = $request->title;
        $cat->category = $request->category;
        $cat->question = $request->question;
        $cat->posted_by = auth()->user()->id;

        $cat->slug = Str::slug($request->title);

        $cat->save();
        return redirect()->route('quest')->with('success', 'New Discussion is Started successfully');
    }

    public function questCreate()
    {
        $cats = DiscussCategory::all();
        return view('Frontend::page.discussion.question.create', compact('cats'));
    }

    public function list()
    {
        $cats = Discussion::with('categoryList','owner')->paginate(20);
        Paginator::useBootstrap();
        return view('Frontend::page.discussion.category.list', compact('cats'));
    }

    public function statusUpdate(Request $request)
    {
        $data = json_decode(base64_decode($request->post('params', [])), true);
        $dis = Discussion::find($data['discussion_id']);
        if ($dis)
        {
            $dis->status = $dis->status == 1 ? 0:1;
            $dis->save();
            return [
                'status' => 1,
                'title' => __(__('System Alert')),
                'message' => __('Updated Successfully'),
            ];
        }else{
            return [
                'status' => 0,
                'title' => __(__('System Alert')),
                'message' => __('Can not update this item')
            ];
        }
    }

    public function deleteDiscussion(Request $request)
    {
        $data = json_decode(base64_decode($request->post('params', [])), true);
        $dis = Discussion::find($data['discussion_id']);
        if ($dis)
        {
            $dis->delete();
            return [
                'status' => 1,
                'title' => __(__('System Alert')),
                'message' => __('Delete Successfully'),
            ];
        }else{
            return [
                'status' => 0,
                'title' => __(__('System Alert')),
                'message' => __('Can not update this item')
            ];
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Frontend::page.discussion.category.index');
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
            'title' => 'required|unique:discuss_categories,title'
        ]);

        $cat = new DiscussCategory();
        $cat->title = $request->title;
        $cat->description = $request->description;

        $cat->slug = Str::slug($request->title);

        $cat->save();

        // return redirect()->back();

        return redirect()->route('discuss.list')->with('success', 'New Category is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = DiscussCategory::find($id);
        // dd($cat);
        return view('Frontend::page.discussion.category.edit', compact('cat'));
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
        $cat = DiscussCategory::find($id);
        $cat->title = $request->title;
        $cat->description = $request->description;

        $cat->slug = Str::slug($request->title);

        $cat->update();



        // return redirect()->back();

        return redirect()->route('discuss.list')->with('success', 'A Category is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = DiscussCategory::find($id);
        $cat->delete();

        return redirect()->route('discuss.list')->with('danger', 'A Category is Deleted Successfully');
    }
}
