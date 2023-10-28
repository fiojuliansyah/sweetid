<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\User;
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
        $user = User::find(auth()->user()->id);
        $competitionId = $user->competition->pluck('id');      

        if ($this->search != '') {
            $data = Room::whereRelation('classtype', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('category', 'name', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('short_description', 'like', '%' . $this->search . '%')
                ->paginate(6);
        } else {
            $data = Room::paginate(6);
        }
        
        foreach ($data as $key => $value) {
            if ($competitionId->contains($value->id)) {
                $data[$key]['is_joined'] = true;
            } else {
                $data[$key]['is_joined'] = false;
            }
        }        

        return view('livewire.markets-table', compact('data'));
    }
}

