<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MeetingRoom;
use App\Models\Room;

use Zoom;
use Carbon\Carbon;

class MeetingRoomController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.meetingrooms.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $rooms = Room::all();

    return view('admin.meetingrooms.create', compact('rooms'));
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
      'room_id' => 'required',
      'agenda' => 'required',
      'topic' => 'required',
      'duration' => 'required',
      'password' => 'required',
      'date' => 'required',
    ]);

    $meeting = $this->createMeeting(
      $request->agenda,
      $request->topic,
      $request->duration,
      $request->password,
      $request->date,
      $request->room_id
    );

    if ($meeting) {
      return redirect()->route('meetingrooms.index')
        ->with('message', 'Meeting created successfully.');
    } else {
      return redirect()->route('meetingrooms.index')
        ->with('message', 'Something went wrong, please try again.');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $meeting = MeetingRoom::findOrFail($id);

    return view('admin.meetingrooms.show', compact('meeting'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $meeting = MeetingRoom::findOrFail($id);

    $this->deleteMeeting($meeting->meeting_id);

    $meeting->delete();

    return redirect()->route('meetingrooms.index')
      ->with('message', 'Meeting deleted successfully.');
  }

  /**
   * Redirects the user to the join URL of the meeting room with the given ID.
   *
   * @param int $id The ID of the meeting room to join.
   * @return \Illuminate\Http\RedirectResponse The redirect response to the join URL.
   * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the meeting room with the given ID is not found.
   */
  public function join($id)
  {
    $meeting = MeetingRoom::findOrFail($id);

    return redirect()->away($meeting->join_url);
  }

  /**
   * Create a new Zoom meeting and store the details in the database.
   *
   * @param string $agenda The agenda of the meeting.
   * @param string $topic The topic of the meeting.
   * @param int $duration The duration of the meeting in minutes.
   * @param string $password The password for the meeting.
   * @param string $date The date and time of the meeting in ISO 8601 format.
   * @param int $room_id The ID of the meeting room.
   *
   * @return mixed Returns the MeetingRoom object if the meeting was created successfully, otherwise returns false.
   */
  private function createMeeting(
    $agenda,
    $topic,
    $duration,
    $password,
    $date,
    $room_id
  ) {

    // change date into asia/jakarta timezone
    $date = Carbon::parse($date)->setTimezone('Asia/Jakarta')->format('Y-m-d\TH:i:s');

    $meeting = Zoom::createMeeting([
      "agenda" => $agenda, // set your agenda
      "topic" => $topic, // set your topic
      "type" => 2, // 1 => instant, 2 => scheduled, 3 => recurring with no fixed time, 8 => recurring with fixed time
      "duration" => $duration, // in minutes
      "timezone" => 'Asia/Jakarta', // set your timezone
      "password" => $password, // set your password
      "created_at" => $date, // set your created_at
      "start_time" => $date, // set your start time
      "start_url" => url('/') . "/meeting", // set your start url if you have
      "pre_schedule" => false,  // set true if you want to create a pre-scheduled meeting
      "schedule_for" => '', // set your schedule for
      "settings" => [
        'join_before_host' => false, // if you want to join before host set true otherwise set false
        'host_video' => false, // if you want to start video when host join set true otherwise set false
        'participant_video' => false, // if you want to start video when participants join set true otherwise set false
        'mute_upon_entry' => false, // if you want to mute participants when they join the meeting set true otherwise set false
        'waiting_room' => false, // if you want to use waiting room for participants set true otherwise set false
        'audio' => 'both', // values are 'both', 'telephony', 'voip'. default is both.
        'auto_recording' => 'none', // values are 'none', 'local', 'cloud'. default is none.
        'approval_type' => 1, // 0 => Automatically Approve, 1 => Manually Approve, 2 => No Registration Required
      ],
    ]);

    if ($meeting['status'] == true) {
      $meetingRoom = new MeetingRoom;
      $meetingRoom->user_id = auth()->user()->id;
      $meetingRoom->room_id = $room_id;
      $meetingRoom->meeting_uuid = $meeting['data']['uuid'];
      $meetingRoom->meeting_id = $meeting['data']['id'];
      $meetingRoom->topic = $meeting['data']['topic'];
      $meetingRoom->description = $meeting['data']['agenda'];
      $meetingRoom->start_time = $meeting['data']['start_time'];
      $meetingRoom->created_time = $meeting['data']['created_at'];
      $meetingRoom->join_url = $meeting['data']['join_url'];
      $meetingRoom->start_url = $meeting['data']['start_url'];
      $meetingRoom->custom_url = $meeting['data']['start_url'];
      $meetingRoom->password = $meeting['data']['password'];
      $meetingRoom->duration = $meeting['data']['duration'];
      $meetingRoom->payload = json_encode($meeting['data']);
      $meetingRoom->save();

      return $meetingRoom;
    } else {
      return false;
    }
  }

  private function deleteMeeting(
    $id
  ) {
    $meeting = Zoom::deleteMeeting($id);

    if ($meeting['status'] == true) {
      return true;
    } else {
      return false;
    }
  }

  private function getMeeting(
    $id
  ) {
    $meeting = Zoom::getMeeting($id);

    if ($meeting['status'] == true) {
      return $meeting;
    } else {
      return false;
    }
  }
}
