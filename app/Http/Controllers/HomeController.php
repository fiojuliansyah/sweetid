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

    public function productShow(Room $room)
    {
        return view('mobile.products.show',compact('room'));
    }
}