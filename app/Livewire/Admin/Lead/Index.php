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
    public $role;
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
    }


    public function render()
    {
        $this->executive = User::where('role_id', '!=', 1)->where('role_id', "!=", 4)->where('role_id', "!=", 3)->get();
        $leads = Lead::orderBy('id', 'desc')->paginate(10);
        return view('livewire.admin.lead.index', compact('leads'))->layout('layouts.admin.app');
    }

    public function roleChange()
    {
        $this->role;
    }
    public function leadStatusSave()
    {
        $this->validate([
            'role' => 'required'
        ]);
        $leadStatus = new LeadStatusChanges();
        $leadStatus->lead_id = $this->lead_id;
        $leadStatus->status = $this->role;
        $leadStatus->appointed_date = $this->appointed_date;
        $leadStatus->appointed_time = $this->appointed_time;
        $leadStatus->appointed_place = $this->appointed_place;
        $leadStatus->professional_fees = $this->professional_fees;
        $leadStatus->select_mode_of_payment = $this->payment_mode;
        $leadStatus->executive_charges = $this->executive_charges;
        $leadStatus->remarks = $this->remarks;
        $leadStatus->select_executive = $this->executive_id;
        $leadStatus->executive_message = $this->executive_message;
        $leadStatus->save();


        if ($this->executive_id) {
            $executive = User::find($this->executive_id);
            $message = 'Lead Status changed to ' . $this->remarks .
                ' and Executive ' . $executive->name . ' is assigned for "' . $this->role . '".';
        } else {
            $message = 'Lead Status changed to ' . $this->role . '.';
        }
        generate_log($this->lead_id,$message,Auth::user()->id);

        $this->reset([
            'role',
            'appointed_date',
            'appointed_time',
            'appointed_place',
            'professional_fees',
            'payment_mode',
            'executive_charges',
            'remarks',
            'executive_id',
            'executive_message'
        ]);

        return redirect()->route('leads.index')->with('success', 'Lead status change successfully!');
    }
}
