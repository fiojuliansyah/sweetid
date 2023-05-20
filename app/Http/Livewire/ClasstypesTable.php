<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Classtype;
use Livewire\WithPagination;

class ClasstypesTable extends Component
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
            $data = Classtype::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('detail', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Classtype::paginate(10);
        }

        return view('admin.livewire.classtypes-table', compact('data'));
    }
}
