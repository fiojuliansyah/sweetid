<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class RoomsTable extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap' ;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        if ($this->search != '') {
            $data = Room::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('detail', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Room::paginate(10);
        }

        return view('admin.livewire.rooms-table', compact('data'));
    }
}
