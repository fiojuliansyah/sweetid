<?php
    
namespace App\Http\Controllers;
    
use App\Models\Room;
use App\Models\Image;
use App\Models\Category;
use App\Models\Classtype;
use Illuminate\Http\Request;
    
class RoomController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:course-list|product-create|course-edit|course-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:course-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:course-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rooms.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classtype = Classtype::all();
        $category = Category::all();
        return view('admin.rooms.create', compact('classtype','category'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'classtype_id' => 'required',
            'category_id' => 'required',
            'images.*' => 'required|image', // Pastikan semua gambar diunggah adalah file gambar
        ]);
    
        $path2 = $request->file('trailer')->store('public/trailers');
    
        $classroom = new Room;
        $classroom->classtype_id = $request->classtype_id;
        $classroom->category_id = $request->category_id;
        $classroom->title = $request->title;
        $classroom->slug = $request->slug;
        $classroom->short_description = $request->short_description;
        $classroom->description = $request->description;
        $classroom->duration = $request->duration;
        $classroom->point = $request->point;
        $classroom->price = $request->price;
        $classroom->disc_price = $request->disc_price;
        $classroom->trailer = $path2;
        $classroom->is_featured = $request->is_featured;
        $classroom->is_recommended = $request->is_recommended;
        $classroom->is_active = $request->is_active;
        $classroom->meta_keyword = $request->meta_keyword;
        $classroom->save();
    
        foreach ($request->file('images') as $imagefile)
        {
            if ($imagefile->isValid()) { // Pastikan file yang diunggah valid
                $image = new Image;
                $path = $imagefile->store('public/covers');
    
                $image->image = $path;
                $image->room_id = $classroom->id; // Menggunakan $classroom->id bukan $room->id
                $image->save();
            }
        }

        $imageData = [];

        if($files = $request->file('images'))
        {
            foreach($files as $file){
                $path = $imagefile->store('public/covers');
                $imageData[] = [
                    'room_id' => $classroom->id,
                    'image' => $path,
                ];
            }
        }

        Image::insert($imageData);
    
        return redirect()->route('rooms.index')
                        ->with('success','Class Room created successfully.');
    
    }    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('admin.rooms.show',compact('room'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $course)
    {
        return view('courses.edit',compact('course'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update($request->all());
    
        return redirect()->route('rooms.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
    
        return redirect()->route('rooms.index')
                        ->with('success','Product deleted successfully');
    }
}
