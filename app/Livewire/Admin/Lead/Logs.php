<?php

namespace App\Livewire\Admin\Lead;

use App\Models\LeadsLog;
use Livewire\Component;

class Logs extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $logs = LeadsLog::where('lead_id', $this->id)->orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.lead.logs', compact('logs'))->layout('layouts.admin.app');
    }
}
