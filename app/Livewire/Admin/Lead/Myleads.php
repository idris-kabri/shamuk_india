<?php

namespace App\Livewire\Admin\Lead;

use App\Models\Lead;
use App\Models\LeadStatusChanges;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Myleads extends Component
{
    use WithFileUploads;
    public $type = '';
    public $files = [];
    public $id = '';

    public function settype($type, $id){
        $this->type = $type;
        $this->id = $id;
    }

    public function addFiles(){
        if(isset($this->files) && count($this->files) > 0){
            $files_name = [];
            foreach($this->files as $file){
                $lead = Lead::find($this->id);
                
            }
        }
    }
    
    public function render()
    {
        $unique_lead_id = LeadStatusChanges::where('executive_id', Auth::user()->id)->pluck('lead_id')->unique()->toArray();
        $leads = Lead::whereIn('id', $unique_lead_id)->orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.lead.myleads', compact('leads'))->layout('layouts.admin.app');
    }
}
