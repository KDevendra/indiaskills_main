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
                              <form class="custom-wizard" method="post" action="<?php echo base_url('export-report')?>" enctype="multipart/form-data">
                                 <div class="row row-sm">
                                    <div class="col-lg-3 form-group">
                                       <label class="form-label">Problem Statements: </label>
                                       <select class="form-control select select2" id="problem_statements" name="problem_statements" aria-label="Problem Statements">
                                              <option selected value="">Problem Statements</option>
                                              <option value="Develop a robust framework to get Real time location of mobile users with Internal authentication App (permissions)" >i. Develop a robust framework to get Real time location of mobile users with Internal authentication App (permissions)</option>
                                              <option value="3D Capturing (AR / VR / XR) of crime scenes using 5G enabled devices also used for capacity building & operations" >ii. 3D Capturing (AR / VR / XR) of crime scenes using 5G enabled devices also used for capacity building & operations</option>
                                              <option value="App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML" >iii. App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML</option>
                                              <option value="Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D (AR / VR)" >iv. Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D (AR / VR)</option>
                                              <option value="Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing" >v. Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing</option>
                                              <option value="APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications" >vi. APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications</option>
                                              <option value="APP for 5G enabled Drones ( control and data ) for surveillance,security and safety" >vii. APP for 5G enabled Drones ( control and data ) for surveillance,security and safety</option>
                                              <option value="Create Software routing security framework for private network for 5G communication network" >viii. Create Software routing security framework for private network for 5G communication network</option>
                                              <option value="Complaints are received at police stations. The gist of the complaint is typed into CCTNS" >ix. Complaints are received at police stations. The gist of the complaint is typed into CCTNS</option>
                                           </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                       <label class="form-label">Company wise: </label>
                                       <select class="form-control select select2" id="company_wise" name="company_wise" aria-label="Company wise">
                                          <option selected>Company wise</option>
                                          <option value="ASC" >A-Z (ASC)</option>
                                          <option value="DESC" >Z-A (DESC)</option>
                                       </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                       <label class="form-label">Name wise: </label>
                                       <select class="form-control select select2" id="name_wise" name="name_wise" aria-label="Name wise">
                                          <option selected>Title wise</option>
                                          <option value="ASC" >A-Z (ASC)</option>
                                          <option value="DESC" >Z-A (DESC)</option>
                                       </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                       <label class="form-label">Date wise: </label>
                                       <input type="date" class="form-control" id="date_wise" name="date_wise" aria-label="Date wise">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                       <label class="form-label">Application Status: </label>
                                       <select class="form-control select select2" id="status" name="status" aria-label="Status">
                                          <option value="" selected>Application Status</option>
                                          <option value="1" >Pending</option>
                                          <option value="2" >Approved</option>
                                          <option value="3" >Rejected</option>
                                         
                                       </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary">Download</button>
                                    </div>
                                 </div>
                              </form>
                              <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100 dataTable no-footer" role="grid" aria-describedby="exportexample_info" style="width: 1307px;">
                                 <thead>
                                    <tr role="row ">
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Company </th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Name </th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Applying as an </th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Date </th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">User </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                       foreach ($applicationList as $list) {
                                                    
                                                                  ?>
                                    <tr>
                                       <td><?php echo $list['company_name'];?></td>
                                       <td><?php echo $list['name'];?></td>
                                       <td><?php echo $list['applying_as_an'];?></td>
                                       <td><?php echo $list['create_datetime'];?></td>
                                       <td><?php echo $list['UserName'];?></td>
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
   //       buttons: ['excel', 'pdf']
   });
   table.buttons().container()
      .appendTo('#exportexample_wrapper .col-md-6:eq(0)');
   });
   $('#reloadButton').click(function() {
         location.reload();
     });
</script>
