 <div class="container-fluid py-2">
     <div class="row">
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
