<?php
    
namespace App\Http\Controllers;
    
use DB;
use Hash;
use App\Models\Room;
use App\Models\User;
use App\Models\Competition;
use Illuminate\Support\Arr;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
    
class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|product-create|user-edit|user-delete', ['only' => ['index','show']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.users.index');
    }

    public function listClass($id)
    {
        $user = User::find($id);
        $competitions = Competition::where('user_id', $id)->get();
        return view('admin.users.class',compact('competitions', 'user'));
    }

    public function createClass($id)
    {
        $user = User::find($id);
        $rooms = Room::all();
        $userRoomIds = Competition::where('user_id', $id)->pluck('room_id')->toArray();
        return view('admin.users.create-class', compact('user', 'rooms', 'userRoomIds'));
    }    

    public function storeClass(Request $request)
    {
        $user_id = $request->user_id;
        $room_ids = $request->room_id;
    
        // Ensure room_ids is an array
        if ($room_ids && is_array($room_ids)) {
            // First, detach all current rooms for the user to handle deselections
            Competition::where('user_id', $user_id)->delete();
    
            // Loop through the selected rooms
            foreach ($room_ids as $room_id) {
                // Check if the competition entry already exists
                $competition = Competition::firstOrNew(['user_id' => $user_id, 'room_id' => $room_id]);
    
                // Save the competition entry if it is newly created
                if (!$competition->exists) {
                    $competition->save();
                }
            }
        }
    
        return redirect()->route('users.class', $user_id)
                        ->with('success', 'User class updated successfully');
    }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles','rooms'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);
    
        // Extract input
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
        // Create user
        $user = User::create($input);
        
        // Assign role to user
        $user->assignRole($request->input('roles'));
        
        // Assign rooms if any are selected
        $room_ids = $request->input('room_id');
        if ($room_ids && is_array($room_ids)) {
            // First, detach all current rooms for the user to handle deselections
            Competition::where('user_id', $user->id)->delete();
    
            // Loop through the selected rooms and save new competitions
            foreach ($room_ids as $room_id) {
                Competition::create([
                    'user_id' => $user->id,
                    'room_id' => $room_id,
                ]);
            }
        }
    
        return redirect()->route('users.index')
                         ->with('success', 'User created successfully');
    }    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('admin.users.edit',compact('user','roles','userRole'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
               
        return back();
    }
}