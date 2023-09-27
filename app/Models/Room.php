<?php
  
namespace App\Models;
  
use App\Models\Category;
use App\Models\Classtype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
  
class Room extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $guarded = [];

    public function classtype()
    {
        return $this->belongsTo(Classtype::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'room_id');
    }

}