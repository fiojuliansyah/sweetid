<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Category;
use App\Models\Classtype;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $classtype = Classtype::all();
        $rooms = Room::paginate(15);
        return view('home',compact('classtype','category', 'rooms'));
    }

    public function productList()
    {
        $allCategory = Category::all();
        $rooms = Room::paginate(15);
        return view('mobile.products.product-list',compact('rooms','allCategory'));
    }

    public function productShow(Room $room)
    {
        return view('mobile.products.show',compact('room'));
    }

    public function productByCat($slug)
    {
        $allCategory = Category::all();
        $categories = Category::where('slug', $slug)->first();
        $rooms = Room::where('category_id', $categories->id)->paginate(10);
        return view('mobile.products.category',compact('rooms','categories','allCategory'));
    }
}