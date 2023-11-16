<div class="main-container container-fluid">
   <?php
      $languages = checkLanguage();
      $showEnglish = false;
      $showHindi = false;
      foreach ($languages as $language) {
         if ($language['language_code'] === 'en' && $language['status'] == 1) {
            $showEnglish = true;
         } elseif ($language['language_code'] === 'hi' && $language['status'] == 1) {
            $showHindi = true;
         }
      }
      ?>
   <div class="inner-body">
      <div class="page-header">
         <div>
            <h2 class="main-content-title tx-24 mg-b-5">
               <?php
                  $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
            </h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
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
               <button type="button" data-bs-target="#modelCreateMenu" data-bs-toggle="modal" class="btn btn-primary my-2 btn-icon-text"><i class="ti-plus me-2"></i> Create New</button>
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
                                       <?php if ($showEnglish): ?>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Menu English</th>
                                       <?php endif; ?>
                                       <?php if ($showHindi): ?>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Menu Hindi</th>
                                       <?php endif; ?>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Parent Menu</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Page URL</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Position</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Datetime</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Active</th>
                                       <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody></tbody>
                              </table>
                              <div class="table-loader text-center">
                                 <div class="loader-content">
                                    <div class="loader"></div>
                                    <div class="loader-text">Loading...</div>
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
   </div>
</div>
<!-- add model -->
<div class="modal fade" id="modelCreateMenu">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <div class="modal-header">
            <h6 class="modal-title">Create New Menu</h6>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
         </div>
         <div class="modal-body">
            <form action="#" data-parsley-validate="" novalidate="">
               <div class="">
                  <div class="row row-sm">
                     <?php if ($showEnglish): ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Menu English: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="menu_name" id="menu_name" placeholder="Enter Menu English" type="text" />
                        <span id="error_menu_name" class="text-danger"></span>
                     </div>
                     <?php endif; ?>
                     <?php if ($showHindi): ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Menu Hindi:</label>
                        <input class="form-control" name="menu_name_hindi" id="menu_name_hindi" placeholder="Enter Menu Hindi" type="text" />
                        <span id="error_menu_name_hindi" class="text-danger"></span>
                     </div>
                     <?php endif; ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Page URL: <span class="tx-danger">*</span></label> <input class="form-control" readonly name="page_url" id="page_url" placeholder="Enter Page URL" type="text" />
                        <span id="error_page_url" class="text-danger"></span>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Menu Position: <span class="tx-danger">*</span></label> <input class="form-control" name="menu_position" id="menu_position" placeholder="Enter Menu Position" type="text" />
                        <span id="error_menu_position" class="text-danger"></span>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Parent Menu: <span class="tx-danger">*</span></label>
                        <select class="form-control select select2" id="parent_menu" name="parent_menu" aria-label="Default select example">
                           <option selected>Open this select menu</option>
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                        </select>
                        <span id="error_parent_menu" class="text-danger"></span>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer"><button class="btn ripple btn-primary" type="button" id="savechanges">Save changes</button> <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button></div>
      </div>
   </div>
</div>
<!-- update model -->
<div class="modal fade" id="modelUpdateMenu">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <div class="modal-header">
            <h6 class="modal-title">Update Menu</h6>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
         </div>
         <div class="modal-body">
            <form action="#" data-parsley-validate="" novalidate="">
               <div class="">
                  <div class="row row-sm">
                     <input type="hidden" id="menu_id" name="menu_id" />
                     <?php if ($showEnglish): ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Menu English: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="menu_name" id="menu_name_update" placeholder="Enter Menu English" type="text" />
                        <span id="error_menu_name_update" class="text-danger"></span>
                     </div>
                     <?php endif; ?>
                     <?php if ($showHindi): ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Menu Hindi:</label>
                        <input class="form-control" name="menu_name_hindi" id="menu_name_hindi_update" placeholder="Enter Menu Hindi" type="text" />
                        <span id="error_menu_name_hindi_update" class="text-danger"></span>
                     </div>
                     <?php endif; ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Page URL: <span class="tx-danger">*</span></label>
                        <input class="form-control" readonly name="page_url" id="page_url_update" placeholder="Enter Page URL" type="text" />
                        <span id="error_page_url_update" class="text-danger"></span>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Menu Position: <span class="tx-danger">*</span></label>
                        <input class="form-control" name="menu_position" id="menu_position_update" placeholder="Enter Menu Position" type="text" />
                        <span id="error_menu_position_update" class="text-danger"></span>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label">Parent Menu: <span class="tx-danger">*</span></label>
                        <select class="form-control select select2" id="parent_menu_update" name="parent_menu" aria-label="Default select example"> </select>
                        <span id="error_parent_menu_update" class="text-danger"></span>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn ripple btn-primary" type="button" id="updateMenu">Update Menu</button>
            <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- view model -->
<div class="modal fade" id="modelViewMenu">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <div class="modal-header">
            <h6 class="modal-title">View Menu</h6>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
         </div>
         <div class="modal-body">
            <form action="#" data-parsley-validate="" novalidate="">
               <div class="">
                  <div class="row row-sm">
                     <input type="hidden" id="menu_id" name="menu_id" />
                     <?php if ($showEnglish): ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label"><b>Menu English:</b> <span id="menu_name_view"></span> </label>
                     </div>
                     <?php endif; ?>
                     <?php if ($showHindi): ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label"><b>Menu Hindi:</b> <span id="menu_name_hindi_view"></span></label>
                     </div>
                     <?php endif; ?>
                     <div class="col-lg-6 form-group">
                        <label class="form-label"><b>Page URL:</b> <span id="page_url_view"></span></label>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label"><b>Menu Position:</b> <span id="menu_position_view"></span></label>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label"><b>Parent Menu:</b> <span id="parent_menu_view"></span></label>
                     </div>
                     <div class="col-lg-6 form-group">
                        <label class="form-label"><b>Menu Status:</b> <span id="status_menu_view"></span></label>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
         </div>
      </div>
   </div>
</div>
<script>
   function showLoader() {
      $(".loader").show();
      $('#savechanges, #updateMenu').prop("disabled", true).html('<span class="loader"></span>');
   }
   
   function hideLoader() {
      $(".loader").hide();
      $('#savechanges, #updateMenu').prop("disabled", false).html('<span>Save changes</span>');
   }
   
   function showLoaderInTable() {
      $(".table-loader").show();
   }
   
   function hideLoaderInTable() {
      $(".table-loader").hide();
   }
   
 function fetchMenu() {
    showLoaderInTable();
    $.ajax({
        url: "<?php echo base_url("fetch-menu")?>",
        type: 'get',
        dataType: 'json',
        success: function (response) {
            hideLoaderInTable();
            var tableBody = $('#exportexample tbody');
            if ($.fn.DataTable.isDataTable('#exportexample')) {
                $('#exportexample').DataTable().destroy();
            }
            var rowsHtml = ''; // Store the HTML content of rows
            $.each(response.data, function (index, item) {
                var createdDate = new Date(item.created_date);
                var currentDate = new Date();
                var timeDifference = currentDate - createdDate;
                var timeAgo = formatTimeAgo(timeDifference);
                var newRow = '<tr>' +
                    <?php if ($showEnglish): ?>
                    '<td>' + item.menu_name + '</td>' +
                    <?php endif; ?>
                    <?php if ($showHindi): ?>
                    '<td>' + item.menu_name_hindi + '</td>' +
                    <?php endif; ?>
                    '<td class="text-center">' + (item.parent_menu === '0' ? '<span class="badge bg-pill bg-primary">Parent</span>' : '<span class="badge bg-pill text-white bg-warning">Child</span>') + '</td>' +
                    '<td>' + (item.page_url === '#' || item.page_url === null ? '<span class="text-danger">No Page URL</span>' : '<a target="_blank" href="content/' + item.page_url + '">' + item.page_url + '</a>') + '</td>' +
                    '<td class="text-center">' + (item.menu_position !== null ? item.menu_position : '<span class="text-danger">No Position</span>') + '</td>' +
                    '<td class="text-center">' + timeAgo + '</td>' +
                    '<td class="text-center">' +
                    '<label class="custom-switch">' +
                    '<input type="checkbox" name="is_enabled" id="' + item.id + '" class="is_enabled custom-switch-input"  ' + (item.is_enabled == 1 ? 'checked' : '') + '>' +
                    '<span class="custom-switch-indicator"></span>' +
                    '</label>' +
                    '</td>' +
                    '<td>' +
                    '<div class="btn-icon-list d-flex justify-content-center">' +
                    '<button type="button" id="' + item.id + '" class="btn ripple btn-sm btn-primary btn-icon btnView" data-bs-placement="bottom" data-bs-toggle="tooltip" title="View"><i class="fa fa-eye tx-15"></i></button>' +
                    '<button type="button" id="' + item.id + '" class="btn ripple btn-sm btn-success btn-icon btnUpdate" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit" data-bs-target="#modelUpdateMenu"><i class="fa fa-edit tx-15"></i></button>'+
                    '<button type="button" id="' + item.id + '" class="btn ripple btn-sm btn-danger btn-icon btnDelete" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash tx-15"></i></button>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';
                rowsHtml += newRow; 
            });
            tableBody.html(rowsHtml);
            var table = $('#exportexample').DataTable({
                lengthChange: false,
                buttons: ['excel', 'pdf', 'colvis']
            });
            table.buttons().container().appendTo('#exportexample_wrapper .col-md-6:eq(0)');
        },
        error: function (xhr, textStatus, errorThrown) {
            hideLoaderInTable();
            console.error(xhr.statusText);
        }
    });
}
fetchMenu();
    fetchMenu();
   function formatTimeAgo(timeDifference) {
       var secondsDifference = Math.floor(timeDifference / 1000);
   
       var intervals = [
           { label: 'year', seconds: 31536000 },
           { label: 'month', seconds: 2592000 },
           { label: 'day', seconds: 86400 },
           { label: 'hour', seconds: 3600 },
           { label: 'minute', seconds: 60 }
       ];
   
       for (var i = 0; i < intervals.length; i++) {
           var interval = intervals[i];
           var count = Math.floor(secondsDifference / interval.seconds);
           if (count >= 1) {
               return count + ' ' + interval.label + (count > 1 ? 's' : '') + ' ago';
           }
       }
   
       return 'just now';
   }
   
   function parent_menu() {
      $.ajax({
         url: "<?php echo base_url('fetch-menu')?>",
         type: 'get',
         dataType: 'json',
         success: function (response) {
            var optionsHtml = '<option value="0">No Parent Menu</option>';
   
            $.each(response.data, function (index, item) {
               var menu_name = item.menu_name;
               var id = item.id;
   
               optionsHtml += `<option value='${id}'>${menu_name}</option>`;
            });
   
   
            $("#parent_menu, #parent_menu_update").html(optionsHtml);
         },
         error: function (xhr, textStatus, errorThrown) {
            console.error(xhr.statusText);
         }
      });
   }
   parent_menu();
   
   function generateUrl(title) {
      const url = title.toLowerCase().replace(/ /g, '-');
      return url.replace(/[^a-z0-9-]/g, '');
   }
   function openUpdateModal() {
       $('#modelUpdateMenu').modal('show');
   }
   function openViewModal() {
       $('#modelViewMenu').modal('show');
   }
   $(document).on('click', '.btnUpdate', function () {
      var id = $(this).attr('id');
   
      $.ajax({
         url: "<?php echo base_url('get-menu-data')?>",
         type: 'post',
         dataType: 'json',
         data: {id: id},
         success: function (response) {
            if (response.data && response.data.length > 0) {
               var menuData = response.data[0];
               $('#menu_id').val(menuData.id);
               $('#menu_name_update').val(menuData.menu_name);
               $('#menu_name_hindi_update').val(menuData.menu_name_hindi);
               $('#page_url_update').val(menuData.page_url);
               $('#menu_position_update').val(menuData.menu_position);
               $('#parent_menu_update').val(menuData.parent_menu).trigger('change');
               openUpdateModal();
            }
         },
         error: function (xhr, textStatus, errorThrown) {
            console.error(xhr.statusText);
         }
      });
   });
   $(document).on('click', '.btnView', function () {
      var id = $(this).attr('id');
      $.ajax({
         url: "<?php echo base_url('get-menu-data')?>",
         type: 'post',
         dataType: 'json',
         data: {id: id},
         success: function (response) {
            if (response.data && response.data.length > 0) {
               var menuData = response.data[0];
               $('#menu_name_view').text(menuData.menu_name);
               $('#menu_name_hindi_view').text(menuData.menu_name_hindi);
               $('#page_url_view').text(menuData.page_url);
               $('#menu_position_view').text(menuData.menu_position);
               $('#parent_menu_view').text(menuData.parent_menu === 0 ? 'Parent' : 'Child');
               $('#status_menu_view').text(menuData.is_enabled === 1 ? 'Active' : 'Inactive');
               openViewModal();
            }
         },
         error: function (xhr, textStatus, errorThrown) {
            console.error(xhr.statusText);
         }
      });
   });
   $(document).on('click', '#updateMenu', function () {
      var id = $('#menu_id').val();
      var isValid = true;
      var menu_name = $("#menu_name_update").val();
      if (!menu_name) {
         $("#error_menu_name_update").text("Menu Name is required.");
         isValid = false;
      } else {
         $("#error_menu_name_update").text("");
      }
      var page_url = $("#page_url_update").val();
      if (!page_url) {
         $("#error_page_url_update").text("Page URL is required.");
         isValid = false;
      } else {
         $("#error_page_url_update").text("");
      }
      var menu_position = $("#menu_position_update").val();
      if (!menu_position) {
         $("#error_menu_position_update").text("Menu Position is required.");
         isValid = false;
      } else {
         $("#error_menu_position_update").text("");
      }
      var parent_menu = $("#parent_menu_update").val();
      if (!parent_menu) {
         $("#error_parent_menu_update").text("Parent Menu is required.");
         isValid = false;
      } else {
         $("#error_parent_menu_update").text("");
      }
      if (isValid) {
         var menuName = $("#menu_name_update").val();
         var menuNameHindi = $("#menu_name_hindi_update").val();
         var pageUrl = $("#page_url_update").val();
         var menuPosition = $("#menu_position_update").val();
         var parentMenu = $("#parent_menu_update").val();
         var postData = {
            id: id,
            menu_name: menuName || null,
            menu_name_hindi: menuNameHindi || null,
            page_url: pageUrl || null,
            menu_position: menuPosition || null,
            parent_menu: parentMenu || null
         };
         $.ajax({
            url: "<?php echo base_url('update-menu-name')?>",
            type: 'post',
            data: postData,
            beforeSend: showLoader(),
            success: function (response) {
               hideLoader();
               $("#modelUpdateMenu").modal('hide');
                  Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                  }).then((result) => {
                     if (result.isConfirmed) {
                        fetchMenu();
   
                     }
                  });
                  },
            error: function (xhr, textStatus, errorThrown) {
               hideLoader();
               Swal.fire({
                  icon: "error",
                  title: "Error",
                  text: xhr.statusText,
               });
            }
         });
      }
   
   });
   
   $("#reloadButton").click(function () {
      fetchMenu();
   });
   $('#menu_name').on('input', function () {
      const menu_name = $(this).val();
      const url = generateUrl(menu_name);
      $('#page_url').val(url);
   });
   $('#menu_name').on('input', function () {
      const inputValue = $(this).val();
      const sanitizedValue = inputValue.replace(/[^a-zA-Z0-9\s-]/g, '');
      if (inputValue !== sanitizedValue) {
         $('#error_menu_name').text("Special characters are not allowed.");
      } else {
         $('#error_menu_name').text("");
      }
      $(this).val(sanitizedValue);
   });
   $('#menu_name').on('input', function () {
      var menu_name = $(this).val();
      $.ajax({
         url: "<?php echo base_url('check-menu-name')?>",
         type: 'post',
         dataType: 'json',
         data: {
            menu_name: menu_name
         },
         success: function (response) {
            if (response.exists) {
               $('#error_menu_name').text(response.message);
               $('#savechanges').prop('disabled', true);
            } else {
               $('#error_menu_name').text("");
               $('#savechanges').prop('disabled', false);
            }
         },
         error: function (xhr, textStatus, errorThrown) {
            console.error(xhr.statusText);
         }
      });
   });
   $('#menu_position').on('input', function () {
      var inputText = $(this).val();
      var numericText = inputText.replace(/\D/g, '');
   
      if (inputText !== numericText) {
         $('#error_menu_position').text("Only numbers are allowed.");
         $(this).val(numericText);
      } else {
         $('#error_menu_position').text("");
      }
   });
   $("#parent_menu").on("change", function () {
      $("#error_parent_menu").text("");
   });
   $(document).on("click", "#savechanges", function () {
      var isValid = true;
      var menu_name = $("#menu_name").val();
      if (!menu_name) {
         $("#error_menu_name").text("Menu Name is required.");
         isValid = false;
      } else {
         $("#error_menu_name").text("");
      }
      var page_url = $("#page_url").val();
      if (!page_url) {
         $("#error_page_url").text("Page URL is required.");
         isValid = false;
      } else {
         $("#error_page_url").text("");
      }
      var menu_position = $("#menu_position").val();
      if (!menu_position) {
         $("#error_menu_position").text("Menu Position is required.");
         isValid = false;
      } else {
         $("#error_menu_position").text("");
      }
      var parent_menu = $("#parent_menu").val();
      if (!parent_menu) {
         $("#error_parent_menu").text("Parent Menu is required.");
         isValid = false;
      } else {
         $("#error_parent_menu").text("");
      }
      if (isValid) {
         var menuName = $("#menu_name").val();
         var menuNameHindi = $("#menu_name_hindi").val();
         var pageUrl = $("#page_url").val();
         var menuPosition = $("#menu_position").val();
         var parentMenu = $("#parent_menu").val();
         var postData = {
            menu_name: menuName || null,
            menu_name_hindi: menuNameHindi || null,
            page_url: pageUrl || null,
            menu_position: menuPosition || null,
            parent_menu: parentMenu || null
         };
         $.ajax({
            url: "<?php echo base_url('post-menu-name')?>",
            type: 'post',
            data: postData,
            beforeSend: showLoader(),
            success: function (response) {
               hideLoader();
               $("#menu_name").val("");
               $("#menu_name_hindi").val("");
               $("#page_url").val("");
               $("#menu_position").val("");
               $("#parent_menu").val("");
               $("#modelCreateMenu").modal('hide');
                  Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                  }).then((result) => {
                     if (result.isConfirmed) {
                        fetchMenu();
   
                     }
                  });
                  },
            error: function (xhr, textStatus, errorThrown) {
               hideLoader();
               Swal.fire({
                  icon: "error",
                  title: "Error",
                  text: response.message,
               });
            }
         });
      }
   });
   $(document).on("click", ".btnDelete", function (){
      var id = $(this).attr('id');
      Swal.fire({
             title: 'Are you confident delete menu?',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
             if (result.isConfirmed) {
                $.ajax({
                   url: "<?php echo base_url('delete-menu-name') ?>",
                   type: "POST",
                   data: {id: id},
                   success: function (response) {
                  Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                  }).then((result) => {
                     if (result.isConfirmed) {
                        fetchMenu();
   
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
   $(document).on("click", ".is_enabled", function (){
      var id = $(this).attr('id');
      var is_enabled = $(this).prop('checked') ? 1 : 0;
      Swal.fire({
        title: 'Are you confident to change the menu status?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               url: "<?php echo base_url('change-menu-status') ?>",
               type: "POST",
               data: {
                 id: id,
                 is_enabled: is_enabled
               },
               success: function (response) {
                  Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                  }).then((result) => {
                     if (result.isConfirmed) {
                        fetchMenu();
   
                     }
                  });
               },
               error: function (xhr, textStatus, errorThrown) {
                  Swal.fire({
                     icon: "error",
                     title: "Error",
                     text: "An error occurred while changing the menu status.",
                  });
               }
            });
         }
         fetchMenu();
      });
   });
</script>