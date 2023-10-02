<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MeetingRoom;
use Livewire\WithPagination;

class MeetingroomsTable extends Component
{
  use withPagination;
  protected $paginationTheme = 'bootstrap';

  public $search = '';

  public function updatingSearch()
  {
    $this->resetPage();
  }

  public function render()
  {
    if ($this->search != '') {
      $data = MeetingRoom::where('topic', 'like', '%' . $this->search . '%')
        ->orWhere('description', 'like', '%' . $this->search . '%')
        ->paginate(10);
    } else {
      $data = MeetingRoom::paginate(10);
    }

    return view('admin.livewire.meetingrooms-table', compact('data'));
  }
}
