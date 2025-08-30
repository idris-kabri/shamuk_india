 <div class="container-fluid py-2">
     {{-- @include('livewire.admin.lead.change-status-popup') --}}
     <div class="row">
         <div class="col-12">
             <div class="card my-4">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <h4>My leads</h4>
                 </div>
                 <div class="card-body px-0 pb-2">
                     <div class="table-responsive p-0">
                         <table class="table align-items-center mb-0">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Lead Id</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Lead Date/Time</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Duration</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Client Name</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Service Name</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Purpose</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Borrower's Name</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Status</th>
                                     <th
                                         class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if ($leads->count() > 0)
                                     @php
                                         $i = 1;
                                     @endphp
                                     @foreach ($leads as $lead)
                                         <tr>
                                             <td>
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <h6 class="mb-0 text-sm">
                                                             {{ config('app.lead_suffix') }}{{ str_pad($lead->id, 4, 0, STR_PAD_LEFT) }}
                                                         </h6>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <h6 class="mb-0 text-sm">
                                                             {{ \Carbon\Carbon::parse($lead->created_at)->format('d-m-Y') }}
                                                         </h6>
                                                     </div>
                                                 </div>
                                             </td>
                                             @php
                                                 $start = \Carbon\Carbon::parse($lead->created_at);
                                                 $end = \Carbon\Carbon::now();
                                                 $duration = $start->diffInHours($end);
                                             @endphp
                                             <td class="text-center font-weight-bolder text-sm">
                                                 {{ number_format($duration, 2) }}</td>
                                             <td>
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <h6 class="mb-0 text-sm">{{ $lead->getClient->name }}</h6>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <h6 class="mb-0 text-sm">
                                                             {{ $lead->getServiceType->service_type_parent_id }}</h6>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <h6 class="mb-0 text-sm">{{ $lead->purpose }}</h6>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td>
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <h6 class="mb-0 text-sm">{{ $lead->borrower_name }}</h6>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td class="">
                                                 <div class="d-flex px-2 py-1">
                                                     <div class="d-flex flex-column justify-content-center">
                                                         <span
                                                             class="badge badge-sm bg-gradient-{{ config('app.leads_color')[$lead->status] }} cursor-pointer blink"
                                                             data-bs-toggle="modal"
                                                             data-bs-target="#leadStatusSaveModal"
                                                             wire:click="setLead({{ $lead->id }})">{{ config('app.leads')[$lead->status] }}</span>
                                                     </div>
                                                 </div>
                                             </td>
                                             <td class="text-center">
                                                 <a href="{{ route('leads.logs', $lead->id) }}"
                                                     class="text-dark mb-0 me-2"><i class="fas fa-cogs"></i></a>
                                             </td>
                                         </tr>
                                     @endforeach
                                 @else
                                     <tr>
                                         <td colspan="9" class="text-center">No Current Leads are there</td>
                                     </tr>
                                 @endif
                             </tbody>
                         </table>
                     </div>
                     <div class="d-flex justify-content-end">
                         {{ $leads->links() }}
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <footer class="footer py-4  ">
         <div class="container-fluid">
             <div class="row align-items-center justify-content-lg-between">
                 <div class="col-lg-6 mb-lg-0 mb-4">
                     <div class="copyright text-center text-sm text-muted text-lg-start">
                         ©
                         <script>
                             document.write(new Date().getFullYear())
                         </script>,
                         made with <i class="fa fa-heart"></i> by
                         <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                             Tim</a>
                         for a better web.
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                         <li class="nav-item">
                             <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                 Tim</a>
                         </li>
                         <li class="nav-item">
                             <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                 target="_blank">About Us</a>
                         </li>
                         <li class="nav-item">
                             <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                 target="_blank">Blog</a>
                         </li>
                         <li class="nav-item">
                             <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                 target="_blank">License</a>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
     </footer>


     <div class="row">
         <div class="col-md-11 mx-auto">
             <div class="leads-cards">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="card custom-card my-4">
                             <div
                                 class="card-header card-header-custom d-flex justify-content-between align-items-center">
                                 <h4 class="m-0">Customer Details</h4>
                             </div>
                             <div class="card-body px-4 py-3">
                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Client Name</span>
                                     <span class="mb-0 lead-info-second-span">John Deo</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Service Type</span>
                                     <span class="mb-0 lead-info-second-span">Valuation Of Car</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Borrower Name</span>
                                     <span class="mb-0 lead-info-second-span">Mukesh Sharma</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Contact Name</span>
                                     <span class="mb-0 lead-info-second-span">Mukesh Sharma</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Contact No.</span>
                                     <span class="mb-0 lead-info-second-span">+91 9820054986</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center py-3">
                                     <span class="mb-0 lead-info-first-span">Registration No.</span>
                                     <span class="mb-0 lead-info-second-span">MH02AP0296</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="card custom-card my-4">
                             <div
                                 class="card-header card-header-custom d-flex justify-content-between align-items-center">
                                 <h4 class="m-0">lead Details</h4>
                             </div>
                             <div class="card-body px-4 py-3">
                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">City</span>
                                     <span class="mb-0 lead-info-second-span">Mumbai</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Purpose</span>
                                     <span class="mb-0 lead-info-second-span">Loan Purpose</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Documents</span>
                                     <a href="#"><span class="mb-0 lead-info-second-span"> View <i
                                                 class="fas fa-eye"></i></span></a>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Created At</span>
                                     <span class="mb-0 lead-info-second-span">2025-08-28</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Status</span>
                                     <span class="mb-0 lead-info-second-span">Request</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center py-3">
                                     <span class="mb-0 lead-info-first-span">Remarks</span>
                                     <span class="mb-0 lead-info-second-span">We need valuation Urgently</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>

     <div class="row">
         <div class="col-11 mx-auto">
             <div class="card custom-card my-4">
                 <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                     <h4 class="m-0">lead Logs</h4>
                 </div>
                 <div class="card-body px-0 py-0">
                     <div class="table-scroll p-0">
                         <table class="table align-items-center mb-0 lead-logs-table">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase">
                                         Lead Id</th>
                                     <th class="text-uppercase">
                                         Lead Date/Time</th>
                                     <th class="text-uppercase">
                                         Message</th>
                                     <th class="text-uppercase">
                                         Executer Id</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>
                                         1
                                     </td>
                                     <td>
                                         2025-08-28 16:56:53
                                     </td>
                                     <td>
                                         Lead Status changed to Case Urgent and Executive Deepesh is assigned for
                                         "Executive Appointed".
                                     </td>
                                     <td>
                                         4
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         4
                                     </td>
                                     <td>
                                         2025-08-28 16:56:53
                                     </td>
                                     <td>
                                         Lead Created
                                     </td>
                                     <td>
                                         4
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         5
                                     </td>
                                     <td>
                                         2025-08-29 16:35:35
                                     </td>
                                     <td>
                                         Lead Status changed. Remarks: Urgent Please and Executive Deepesh is assigned
                                         for "Executive Appointed". Status
                                     </td>
                                     <td>
                                         4
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-11 mx-auto">
             <div class="card custom-card my-4">
                 <div class="card-header card-header-custom d-flex justify-content-between align-items-center">
                     <h4 class="m-0">lead Status</h4>
                 </div>
                 <div class="card-body px-0 py-0">
                     <div class="table-scroll p-0">
                         <table class="table align-items-center mb-0 lead-logs-table">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase">
                                         Lead Id</th>
                                     <th class="text-uppercase">
                                         Lead Status</th>
                                     <th class="text-uppercase">
                                         Appointed Date & Time</th>
                                     <th class="text-uppercase">
                                         Apointed Place</th>
                                     <th class="text-uppercase">
                                         Fees(Rs)</th>
                                     <th class="text-uppercase">
                                         Payment Mode</th>
                                     <th class="text-uppercase">
                                         Charges(Rs)</th>
                                     <th class="text-uppercase">
                                         Remarks</th>
                                     <th class="text-uppercase">
                                         Executive</th>
                                     <th class="text-uppercase">
                                         Executive Message</th>
                                     <th class="text-uppercase">
                                         Created At</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>
                                         1
                                     </td>
                                     <td>
                                         5
                                     </td>
                                     <td>
                                         2025-08-30 16:28:00
                                     </td>
                                     <td>
                                         Goregaon Mumbai
                                     </td>
                                     <td>
                                         1180rs
                                     </td>
                                     <td>
                                         Banker Bill
                                     </td>
                                     <td>
                                         200 rs
                                     </td>
                                     <td>
                                         Case Urgent
                                     </td>
                                     <td>
                                         4
                                     </td>
                                     <td>
                                         Please call and visit.
                                     </td>
                                     <td>
                                         2025-08-29 16:32:45
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         1
                                     </td>
                                     <td>
                                         5
                                     </td>
                                     <td>
                                         2025-08-30 16:28:00
                                     </td>
                                     <td>
                                         Goregaon Mumbai
                                     </td>
                                     <td>
                                         1180rs
                                     </td>
                                     <td>
                                         Banker Bill
                                     </td>
                                     <td>
                                         200 rs
                                     </td>
                                     <td>
                                         Case Urgent
                                     </td>
                                     <td>
                                         4
                                     </td>
                                     <td>
                                         Please call and visit.
                                     </td>
                                     <td>
                                         2025-08-29 16:32:45
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         1
                                     </td>
                                     <td>
                                         5
                                     </td>
                                     <td>
                                         2025-08-30 16:28:00
                                     </td>
                                     <td>
                                         Goregaon Mumbai
                                     </td>
                                     <td>
                                         1180rs
                                     </td>
                                     <td>
                                         Banker Bill
                                     </td>
                                     <td>
                                         200 rs
                                     </td>
                                     <td>
                                         Case Urgent
                                     </td>
                                     <td>
                                         4
                                     </td>
                                     <td>
                                         Please call and visit.
                                     </td>
                                     <td>
                                         2025-08-29 16:32:45
                                     </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @section('scripts')
     <script>
         window.addEventListener('leadStatusSaveModal-model-close', event => {
             $('#leadStatusSaveModal').modal('hide');
         });
     </script>
 @endsection
