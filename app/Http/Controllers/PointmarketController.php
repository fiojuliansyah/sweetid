<?php

namespace App\Http\Controllers;

use App\Models\Pointmarket;
use Illuminate\Http\Request;
use App\Http\Requests\StorePointmarketRequest;
use App\Http\Requests\UpdatePointmarketRequest;

class PointmarketController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:pointmarket-list|product-create|pointmarket-edit|pointmarket-delete', ['only' => ['index','show']]);
         $this->middleware('permission:pointmarket-create', ['only' => ['create','store']]);
         $this->middleware('permission:pointmarket-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pointmarket-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pointmarkets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pointmarkets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePointmarketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required',
            'point' => 'required',
        ]);
        $path = $request->file('image')->store('public/images/pointmarkets');
        
        $pointmarket = new Pointmarket;
        $pointmarket->name = $request->name;
        $pointmarket->image = $path;
        $pointmarket->description = $request->description;
        $pointmarket->point = $request->point;
        $pointmarket->save();
        // pointmarket::create($request->all());
        return redirect()->route('pointmarkets.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pointmarket  $pointmarket
     * @return \Illuminate\Http\Response
     */
    public function show(Pointmarket $pointmarket)
    {
        return view('admin.pointmakrkets.show',compact('pointmakrket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pointmarket  $pointmarket
     * @return \Illuminate\Http\Response
     */
    public function edit(Pointmarket $pointmarket)
    {
        return view('admin.pointmarkets.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePointmarketRequest  $request
     * @param  \App\Models\Pointmarket  $pointmarket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pointmarket $pointmarket)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'point' => 'required',
        ]);
        
        $pointmarket = Pointmarket::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images/pointmarkets');
            $pointmarket->image = $path;
        }


        $pointmarket->name = $request->name;
        $pointmarket->description = $request->description;
        $pointmarket->point = $request->point;
        
        $pointmarket->save();
        // $pointmarket->update($request->all());
        return redirect()->route('pointmarkets.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pointmarket  $pointmarket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pointmarket $pointmarket)
    {
        $pointmarket->delete();
        \Storage::delete($pointmarket->image);

        return redirect()->route('pointmarkets.index')
                        ->with('success','Product deleted successfully');
    }
}
