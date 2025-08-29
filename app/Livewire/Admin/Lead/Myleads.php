<?php

namespace App\Livewire\Admin\Lead;

use App\Models\Lead;
use App\Models\LeadStatusChanges;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Myleads extends Component
{
    public function render()
    {
        $unique_lead_id = LeadStatusChanges::where('select_executive', Auth::user()->id)->pluck('lead_id')->unique()->toArray();
        $leads = Lead::whereIn('id', $unique_lead_id)->orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.lead.myleads', compact('leads'))->layout('layouts.admin.app');
    }
}
