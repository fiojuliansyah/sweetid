<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesTable extends Component
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
            $data = Course::where('title', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $data = Course::paginate(10);
        }

        return view('admin.livewire.courses-table', compact('data'));
    }
}