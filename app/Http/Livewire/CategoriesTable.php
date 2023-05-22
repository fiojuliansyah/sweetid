<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoriesTable extends Component
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
            $data = Category::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('detail', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Category::paginate(10);
        }

        return view('admin.livewire.categories-table', compact('data'));
    }
}
