<?php

namespace App\Http\Livewire;

use App\Models\Discussion;
use Livewire\Component;
use Livewire\WithPagination;

class DiscussionsTable extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap' ;

    protected $queryString = ['room'];

    public $search = '';
    public $room = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {        
        if ($this->search != '') {
            $data = Discussion::where('room_id', $this->room)
                ->where('title', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Discussion::where('room_id', $this->room)
                ->paginate(10);
        }

        return view('admin.livewire.discussions-table', compact('data'));
    }
}