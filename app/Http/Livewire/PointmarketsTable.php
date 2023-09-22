<?php

namespace App\Http\Livewire;

use App\Models\Pointmarket;
use Livewire\Component;
use Livewire\WithPagination;

class PointmarketsTable extends Component
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
            $data = Pointmarket::whereRelation('name', 'like', '%' . $this->search . '%')
                ->orWhere('point', 'like', '%' . $this->search . '%')
                ->paginate(6);
        } else {
            $data = Pointmarket::paginate(6);
        }

        return view('admin.livewire.pointmarkets-table', compact('data'));
    }
}
