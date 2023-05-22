<?php

namespace App\Http\Controllers;

use App\Models\Classtype;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClasstypeRequest;
use App\Http\Requests\UpdateClasstypeRequest;

class ClasstypeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:classtype-list|product-create|classtype-edit|classtype-delete', ['only' => ['index','show']]);
         $this->middleware('permission:classtype-create', ['only' => ['create','store']]);
         $this->middleware('permission:classtype-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:classtype-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.classtypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClasstypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'detail' => 'required',
        ]);

        $path = $request->file('icon')->store('public/classtypes-icon');
        
        $class = new Classtype;
        $class->icon = $path;
        $class->name = $request->name;
        $class->detail = $request->detail;
        $class->save();
        // Crud::create($request->all());
        return redirect()->route('classtypes.index')
                        ->with('success','Class Type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classtype  $classtype
     * @return \Illuminate\Http\Response
     */
    public function show(Classtype $classtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classtype  $classtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Classtype $classtype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClasstypeRequest  $request
     * @param  \App\Models\Classtype  $classtype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClasstypeRequest $request, Classtype $classtype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classtype  $classtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classtype $classtype)
    {
        $classtype->delete();
        \Storage::delete($classtype->icon);

        return redirect()->route('classtypes.index')
                        ->with('message','Class type deleted successfully');
    }
}
