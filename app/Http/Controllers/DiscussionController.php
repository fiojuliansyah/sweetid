<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Discussion;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreDiscussionRequest;
use App\Http\Requests\UpdateDiscussionRequest;

class DiscussionController extends Controller
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
      $room = $request->room;

      return view('admin.discussions.index',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $room = $request->room;        

        return view('admin.discussions.create',compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscussionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',            
            'title' => 'required',
            'body' => 'required',
        ]);                        
        
        $discussion = new Discussion;
        $discussion->room_id = $request->room_id;
        $discussion->user_id = Auth::user()->id;
        $discussion->title = $request->title;
        $discussion->body = $request->body;        
        $discussion->save();

        return redirect()->route('discussions.index', ['room' => $request->room_id])
                        ->with('success','Discussion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('admin.discussions.show',compact('discussion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        $rooms = Room::all();
        return view('admin.discussions.create',compact('discussion','rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscussionRequest  $request
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        $request->validate([
            'room_id' => 'required',            
            'title' => 'required',
            'body' => 'required',
        ]);                        
        
        $discussion = Discussion::find($id);

        $discussion->room_id = $request->room_id;
        $discussion->title = $request->title;
        $discussion->body = $request->body;
        
        $discussion->save();
        
        return redirect()->route('discussions.index')
                        ->with('success','Discussion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        $discussion->delete();
        
        return redirect()->route('discussions.index')
                        ->with('success','Discussion deleted successfully');
    }

    public function room($id)
    {
        $discussion = Discussion::find($id);

        return view('admin.discussions.room',compact('discussion'));
    }
}
