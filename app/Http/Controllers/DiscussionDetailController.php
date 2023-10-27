<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\DiscussionDetail;
use App\Models\Discussion;
use App\Models\User;

use App\Notifications\DiscussionReply;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreDiscussionDetailRequest;
use App\Http\Requests\UpdateDiscussionDetailRequest;

class DiscussionDetailController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:discussion-list|product-create|discussion-edit|discussion-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:discussion-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:discussion-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:discussion-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscussionDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'discussion_id' => 'required',                        
            'body' => 'required',
        ]);                        
        
        $discussion = new DiscussionDetail;
        $discussion->discussion_id = $request->discussion_id;
        $discussion->user_id = Auth::user()->id;
        $discussion->body = $request->body;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = Str::random(9).'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/discussion', $filename);
            $discussion->attachment = $filename;
        }

        $discussion->save();
        
        $discusionData = Discussion::find($request->discussion_id);
        User::find($discusionData->user_id)->notify(new DiscussionReply($discussion));

        $admins = User::role('Admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new DiscussionReply());
        }        

        return redirect()->route('discussions.room',$request->discussion_id)
                        ->with('success','Chat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiscussionDetail  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionDetail $discussion)
    {
        return view('admin.discussions.show',compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiscussionDetail  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscussionDetail $discussion)
    {
        $rooms = Room::all();
        return view('admin.discussions.create',compact('discussion','rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscussionDetailRequest  $request
     * @param  \App\Models\DiscussionDetail  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscussionDetail $discussion)
    {
        $request->validate([
            'room_id' => 'required',            
            'title' => 'required',
            'body' => 'required',
        ]);                        
        
        $discussion = DiscussionDetail::find($id);

        $discussion->room_id = $request->room_id;
        $discussion->title = $request->title;
        $discussion->body = $request->body;
        
        $discussion->save();
        
        return redirect()->route('discussions.index')
                        ->with('success','DiscussionDetail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiscussionDetail  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionDetail $discussion)
    {
        $discussion->delete();
        
        return redirect()->route('discussions.index')
                        ->with('success','DiscussionDetail deleted successfully');
    }

    public function room($id)
    {
        $discussion = DiscussionDetail::find($id);

        return view('admin.discussions.room',compact('discussion'));
    }
}
