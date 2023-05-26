<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Classtype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
