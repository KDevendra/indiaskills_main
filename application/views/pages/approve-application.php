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
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Name</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Company Name</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Contact No</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Applying As</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Status</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i = 1;                          
                                       foreach ($applicationList as $list) {
                                       ?>
                                    <tr>
                                       <td><?php echo $i++?></td>
                                       <td><?php echo $list['user_id']?></td>
                                       <td><?php echo $list['name']?></td>
                                       <td><?php echo $list['company_name']?></td>
                                       <td><?php echo $list['contact_no']?></td>
                                       <td><?php echo $list['applying_as_an']?></td>
                                       <td><?php
                                          switch ($list['application_status']) {
                                          case '1':
                                          echo '<span class="badge bg-pill bg-warning">Pending</span>';
                                          break;
                                          case '2':
                                          echo '<span class="badge bg-pill bg-success">Approved</span>';
                                          break;
                                          case '3':
                                          echo '<span class="badge bg-pill bg-danger">Rejected</span>';
                                          break;
                                          case '4':
                                          echo '<span class="badge bg-pill bg-info">Winner</span>';
                                          break;
                                          default:
                                          echo 'Unknown';
                                          }
                                          ?></td>
                                       <td>
                                          <div class="btn-icon-list d-flex justify-content-center">
                                          <!-- <?php
                                                if ($list['application_status'] == 1) {
                                                echo '<button type="button" id="' . $list['user_id'] . '" class="btn ripple btn-sm btn-primary btn-icon approveBtn" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Approve"><i class="fa fa-check tx-15"></i></button>';
                                                } elseif ($list['application_status'] == 2) {
                                                echo '<button type="button" id="' . $list['user_id'] . '" class="btn ripple btn-sm btn-danger btn-icon rejectBtn" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Reject" data-bs-target="#modelUpdateMenu"><i class="fa fa-times tx-15"></i></button>';
                                                } elseif ($list['application_status'] == 3) {
                                                              echo '<button type="button" id="' . $list['user_id'] . '" class="btn ripple btn-sm btn-primary btn-icon approveBtn" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Approve"><i class="fa fa-check tx-15"></i></button>';
                                                } elseif ($list['application_status'] == 4) {
                                                
                                                }
                                                ?>
        -->
                                        <button type="button" id="<?php echo $list['user_id'];?>" class="btn ripple btn-sm btn-success btn-icon " data-bs-placement="bottom" data-bs-toggle="tooltip" title="View"> <a href="<?php echo base_url('application-preview/').$list['login_id'];?>"><i class="fa fa-eye tx-15 text-white"></i></a></button>
                                       
                                       
                                        
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
       $('#reloadButton').click(function () {
      location.reload();
   });
   $(document).on("click", ".approveBtn", function (){
      var user_id = $(this).attr('id');
      Swal.fire({
             title: 'Approve this application?',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Approve it!'
          }).then((result) => {
             if (result.isConfirmed) {
                $.ajax({
                   url: "<?php echo base_url('post-approve-application') ?>",
                   type: "POST",
                   data: {user_id: user_id},
                   success: function (response) {
                  Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                  }).then((result) => {
                     if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url('application-list');?>";
   
                     }
                  });
                  },
                  error: function (xhr, textStatus, errorThrown) {
                     Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: 'Somethibg want to wrong',
                     });
            }
                });
             }
          });
   });
   $(document).on("click", ".rejectBtn", function (){
      var user_id = $(this).attr('id');
      Swal.fire({
             title: 'Reject this application?',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Reject it!'
          }).then((result) => {
             if (result.isConfirmed) {
                $.ajax({
                   url: "<?php echo base_url('post-reject-application') ?>",
                   type: "POST",
                   data: {user_id: user_id},
                   success: function (response) {
                  Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                  }).then((result) => {
                     if (result.isConfirmed) {
                            window.location.href = "<?php echo base_url('application-list');?>";
   
                     }
                  });
                  },
                  error: function (xhr, textStatus, errorThrown) {
                     Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: 'Somethibg want to wrong',
                     });
            }
                });
             }
          });
   });
   });
</script>