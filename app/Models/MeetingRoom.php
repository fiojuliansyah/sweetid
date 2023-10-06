<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MeetingRoom extends Model
{
  use HasFactory;

  protected $guarded = [];

  // Accessors
  public function getTimeAttribute()
  {
    return $this->attributes['start_time'] = Carbon::parse($this->attributes['start_time'])->timezone('Asia/Jakarta')->format('Y-m-d H:i:s');
  }


  // Relationship
  public function room()
  {
    return $this->belongsTo(Room::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
