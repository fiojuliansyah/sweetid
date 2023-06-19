<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class TransactionsTable extends Component
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
            $data = Transaction::whereRelation('classtype', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('user', 'name', 'like', '%' . $this->search . '%')
                ->orWhereRelation('room', 'title', 'like', '%' . $this->search . '%')
                ->orWhere('invoice_id', 'like', '%' . $this->search . '%')
                ->paginate(6);
        } else {
            $data = Transaction::paginate(6);
        }

        return view('admin.livewire.transactions-table', compact('data'));
    }
}
