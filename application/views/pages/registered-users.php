<div class="main-container container-fluid">
   <div class="inner-body">
      <div class="page-header">
         <div>
            <h2 class="main-content-title tx-24 mg-b-5">
               <?php
                  $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
            </h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard');?>">Dashboard</a></li>
               <li class="breadcrumb-item active" aria-current="page">
                  <?php
                     $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
               </li>
            </ol>
         </div>
         <div class="d-flex">
            <div class="justify-content-center">
               <button type="button" class="btn btn-white btn-icon-text my-2 me-2" id="backButton"><i class="ti-arrow-left me-2"></i> Back</button>
               <button type="button" class="btn btn-white btn-icon-text my-2 me-2" id="reloadButton"><i class="ti-reload me-2"></i> Reload</button>
               
            </div>
         </div>
      </div>
      <div class="row row-sm">
         <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
               <div class="card-body">
                  <div class="table-responsive">
                     <div id="exportexample_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                           <div class="col-sm-12">
                              <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100 dataTable no-footer" role="grid" aria-describedby="exportexample_info" style="width: 1307px;">
                                 <thead>
                                    <tr role="row ">
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">S.No.</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">User Id</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">User Name</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Contact No</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Status</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i = 1;
                                       foreach ($registeredUsers as $list) {
                                          ?>
                                    <tr>
                                       <td><?php echo $i++?></td>
                                       <td><?php echo $list['UserId']?></td>
                                       <td><?php echo $list['UserName']?></td>
                                       <td><?php echo $list['ContactNo']?></td>
                                       <td><?php if ($list['IsActive'] === '0') 
                                       {
                                          echo '<span class="badge bg-pill bg-warning">Not Verified</span>';
                                       }
                                       elseif ($list['IsActive'] === '1') {
                                          echo '<span class="badge bg-pill bg-success">Verified</span>';
                                       }
                                       else {
                                          echo '<span class="badge bg-pill bg-info">Unkwon</span>';
                                       }
                                       
                                       ?></td>
                                      

                                       <td>
                                          <div class="btn-icon-list d-flex justify-content-center">
                                             <button type="button" id="<?php echo $list['LoginId'];?>" class="btn ripple btn-sm btn-success btn-icon " data-bs-placement="bottom" data-bs-toggle="tooltip" title="View"> <a href="<?php echo base_url('user-detail/').$list['LoginId'];?>"><i class="fa fa-eye tx-15 text-white"></i></a></button>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php
                                       }
                                       
                                       ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
$(document).ready(function() {
     var table = $('#exportexample').DataTable({
      lengthChange: false,
         buttons: ['excel', 'pdf']
   });
   table.buttons().container()
      .appendTo('#exportexample_wrapper .col-md-6:eq(0)');
   });
 </script> 