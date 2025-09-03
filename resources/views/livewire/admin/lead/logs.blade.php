 <div class="container-fluid py-2">
     {{--<div class="row">
         <div class="col-12">
             <div class="card my-4">
                 <div class="card-header d-flex justify-content-between align-items-center">
                     <h4>Leads Logs</h4>
                 </div>
                 <div class="card-body px-0 pb-2">
                     <div class="table-responsive p-0">
                         <table class="table align-items-center mb-0">
                             <thead>
                                 <tr>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Lead Id</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Action Time</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Message</th>
                                     <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                         Executer Name</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if ($logs->count() > 0)
                                 @php
                                 $i = 1;
                                 @endphp
                                 @foreach ($logs as $log)
                                 <tr>
                                     <td>
                                         <div class="d-flex px-2 py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-0 text-sm">{{ config('app.lead_suffix') }}{{ str_pad($log->lead_id, 4, 0, STR_PAD_LEFT) }}</h6>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="d-flex px-2 py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-0 text-sm">{{ \Carbon\Carbon::parse($log->created_at)->format('d-m-Y h:i:s a') }}</h6>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="d-flex px-2 py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-0 text-sm">{{ $log->message }}</h6>
                                             </div>
                                         </div>
                                     </td>
                                     <td>
                                         <div class="d-flex px-2 py-1">
                                             <div class="d-flex flex-column justify-content-center">
                                                 <h6 class="mb-0 text-sm">{{ $log->getExecuter->name }}</h6>
                                             </div>
                                         </div>
                                     </td>
                                 </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                     <td colspan="9" class="text-center">No Logs found</td>
                                 </tr>
                                 @endif
                             </tbody>
                         </table>
                     </div>
                     <div class="d-flex justify-content-end">
                         {{ $logs->links() }}
                     </div>
                 </div>
             </div>
         </div>
     </div>--}}

     <!-- customer details div  -->
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
                                     <span class="mb-0 lead-info-second-span">{{$leads->getClient->name}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Service Type</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->getServiceType->service_type_parent_id}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Borrower Name</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->borrower_name}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Contact Name</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->contact_name}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Contact No.</span>
                                     <span class="mb-0 lead-info-second-span">+91 {{$leads->contact_number}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center py-3">
                                     <span class="mb-0 lead-info-first-span">Registration No.</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->registration_number}}</span>
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
                                     <span class="mb-0 lead-info-second-span">{{$leads->getCity->name}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Purpose</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->purpose}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Documents</span> 
                                     @php 
                                        $documents = json_decode($leads->documents,true);
                                     @endphp 
                                     @foreach($documents as $document)
                                        <a href="{{Storage::url($document)}}" target="_blank"><span class="mb-0 lead-info-second-span"> View <i
                                                    class="fas fa-eye"></i></span></a> 
                                    @endforeach
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Created At</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->created_at->format('Y-m-d')}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center border-division py-3">
                                     <span class="mb-0 lead-info-first-span">Status</span> 
                                     @php 
                                        $status = config('app.leads'); 
                                        $leadStatusName = $status[$leads->status];
                                     @endphp
                                     <span class="mb-0 lead-info-second-span">{{$leadStatusName}}</span>
                                 </div>

                                 <div class="d-flex justify-content-between align-items-center py-3">
                                     <span class="mb-0 lead-info-first-span">Remarks</span>
                                     <span class="mb-0 lead-info-second-span">{{$leads->remarks}}</span>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>

     <!-- lead logs div  -->
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
                                @if ($logs->count() > 0)
                                    @foreach ($logs as $log)
                                        <tr>
                                            <td>
                                                {{ config('app.lead_suffix') }}{{ str_pad($log->lead_id, 4, 0, STR_PAD_LEFT) }}
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($log->created_at)->format('d-m-Y h:i:s a') }}
                                            </td>
                                            <td>
                                                {{ $log->message }}
                                            </td>
                                            <td>
                                                {{ $log->getExecuter->name }}
                                            </td>
                                        </tr> 
                                    @endforeach 
                                @else
                                 <tr>
                                    <td colspan="9" class="text-center">No Logs found</td>
                                 </tr>
                                @endif
                             </tbody>
                         </table>
                     </div> 
                     <div class="d-flex justify-content-end">
                         {{ $logs->links() }}
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
                                @if ($lead_status->count() > 0)
                                    @foreach($lead_status as $status)
                                        <tr>
                                            <td>
                                                {{ config('app.lead_suffix') }}{{ str_pad($status->lead_id, 4, 0, STR_PAD_LEFT) }}
                                            </td>
                                            <td> 
                                                @php 
                                                    $loop_lead_status = config('app.leads'); 
                                                    $loop_lead_status_name = $loop_lead_status[$status->status];
                                                 @endphp
                                                {{$loop_lead_status_name}}
                                            </td>
                                            <td>
                                                {{$status->appointed_date_time}}
                                            </td>
                                            <td>
                                                {{$status->appointed_place}}
                                            </td>
                                            <td>
                                                {{$status->professional_fees}}rs
                                            </td>
                                            <td>
                                               {{$status->mode_of_payment}}
                                            </td>
                                            <td>
                                                {{$status->executive_charges}} rs
                                            </td>
                                            <td>
                                                {{$status->remarks}}
                                            </td>
                                            <td>
                                                {{$status->getExecutive->name}}
                                            </td>
                                            <td>
                                                {{$status->executive_message}}
                                            </td>
                                            <td>
                                                {{$status->created_at}}
                                            </td>
                                        </tr> 
                                    @endforeach 
                                @else
                                 <tr>
                                    <td colspan="12" class="text-center">No Lead Status found!</td>
                                 </tr>
                                @endif
                             </tbody>
                         </table>
                     </div> 
                     <div class="d-flex justify-content-end">
                         {{ $lead_status->links() }}
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
 </div>