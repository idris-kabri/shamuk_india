<?php

namespace App\Livewire\Admin\Lead;

use App\Models\Lead;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $executive = [];
    public function render()
    {
        $this->executive = User::where('role_id', '!=',1)->where('role_id', "!=", 4)->where('role_id', "!=", 3)->get();
        $leads = Lead::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.lead.index', compact('leads'))->layout('layouts.admin.app');
    }
}
