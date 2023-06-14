<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class MarketsTable extends Component
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
            $data = Room::whereRelation('classtype', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('category', 'name', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('short_description', 'like', '%' . $this->search . '%')
                ->paginate(6);
        } else {
            $data = Room::paginate(6);
        }

        return view('livewire.markets-table', compact('data'));
    }
}

