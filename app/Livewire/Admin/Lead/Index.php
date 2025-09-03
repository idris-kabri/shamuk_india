<?php

namespace App\Livewire\Admin\Lead;

use App\Models\Lead;
use App\Models\LeadStatusChanges;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $executive = [];
    public $lead_id;
    public $status;
    public $appointed_date;
    public $appointed_time;
    public $appointed_place;
    public $professional_fees;
    public $payment_mode;
    public $executive_charges;
    public $remarks;
    public $executive_id;
    public $executive_message;

    public function setLead($id)
    {
        $this->lead_id = $id;
        $lead = Lead::find($id);
        $this->executive = User::where('assigned_products', 'like', '%' . $lead->service_type . '%')->where('role_id', '!=', 1)->where('role_id', "!=", 4)->where('role_id', "!=", 3)->get();
    }


    public function render()
    {
        $leads = Lead::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.lead.index', compact('leads'))->layout('layouts.admin.app');
    }

    public function statusChange()
    {
        $this->status;
    }

    public function leadStatusSave()
    {
        $this->validate([
            'status' => 'required'
        ]);
        $leadStatus = new LeadStatusChanges();
        $leadStatus->lead_id = $this->lead_id;
        $leadStatus->status = array_search($this->status, config('app.leads'));
        $leadStatus->appointed_date_time = $this->appointed_date;
        $leadStatus->appointed_place = $this->appointed_place;
        $leadStatus->professional_fees = $this->professional_fees;
        $leadStatus->mode_of_payment = $this->payment_mode;
        $leadStatus->executive_charges = $this->executive_charges;
        $leadStatus->remarks = $this->remarks;
        $leadStatus->executive_id = $this->executive_id;
        $leadStatus->executive_message = $this->executive_message;
        $leadStatus->save();

        $lead = Lead::find($this->lead_id);
        $lead->status = array_search($this->status, config('app.leads'));
        if($this->executive_id != null && $this->executive_id != ''){
            $lead->executer_id = $this->executive_id;
        }
        $lead->save();


        if ($this->executive_id) {
            $executive = User::find($this->executive_id);
            $message = 'Lead Status changed. Remarks: ' . $this->remarks .
                ' and Executive ' . $executive->name . ' is assigned for "' . $this->status . '". Status';
        } else {
            $message = 'Lead Status changed to ' . $this->status . '.';
        }
        generate_log($this->lead_id,$message,Auth::user()->id);
        return redirect()->route('leads.index')->with('success', 'Lead status change successfully!');
    }
}
