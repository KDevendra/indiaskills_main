<div class="main-container container-fluid">
    <div class="inner-body">
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">
                    <?php
                    $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
                </h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
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
                    <button type="button" data-bs-target="#modelCreatePage" data-bs-toggle="modal" class="btn btn-primary my-2 btn-icon-text"><i class="ti-plus me-2"></i> Create Page</button>
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
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Menu Name</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">Hindi Content</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">English Content</th>
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
<div class="modal fade" id="modelCreatePage">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create Page Contant</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
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
                <form action="#" data-parsley-validate="" novalidate="">
                    <div class="">
                        <div class="row row-sm">
                            <div class="col-lg-4 form-group">
                                <label class="form-label">Menu Name: <span class="tx-danger">*</span></label>
                                <select class="form-control select select2" id="menu_name" name="menu_name" aria-label="Default select example"> </select>
                                <span id="error_menu_name" class="text-danger"></span>
                            </div>
                            <?php if ($showEnglish): ?>
                            <div class="col-lg-12 form-group">
                                <label class="form-label">Content English:</label>

                                <textarea id="txtEnglish" name="txtEnglish"></textarea>

                                <span id="error_content_english" class="text-danger"></span>
                            </div>
                            <?php endif; ?>
                            <?php if ($showHindi): ?>
                            <div class="col-lg-12 form-group">
                                <label class="form-label">Content Hindi:</label>
                                <textarea id="txtHindi" name="txtHindi"></textarea>
                                <span id="error_content_hindi" class="text-danger"></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"><button class="btn ripple btn-primary" type="button" id="savechanges">Save changes</button> <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button></div>
        </div>
    </div>
</div>
<!-- update model -->
<div class="modal fade" id="modelUpdatePage">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Update Page Content</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form action="#" data-parsley-validate="" novalidate="">
                    <div class="">
                        <div class="row row-sm">
                            <input type="hidden" id="page_content_id" name="page_content_id" />
                            <?php if ($showEnglish): ?>
                            <div class="col-lg-12 form-group">
                                <label class="form-label">Content English:</label>
                                <textarea id="txtEnglish_update" name="txtEnglish"></textarea>
                                <span id="error_content_english_update" class="text-danger"></span>
                            </div>
                            <?php endif; ?>
                            <?php if ($showHindi): ?>
                            <div class="col-lg-12 form-group">
                                <label class="form-label">Content Hindi:</label>
                                <textarea id="txtHindi_update" name="txtHindi"></textarea>
                                <span id="error_content_hindi_update" class="text-danger"></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-primary" type="button" id="updatePageContent">Update Page Content</button>
                <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- view model -->
<div class="modal fade" id="modelViewContent">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">View Menu</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
               <div id="page_content_hi_view">

               </div>
               <div id="page_content_en_view">

               </div>
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
     function getMenuName(id) {
        $.ajax({
            url: "<?php echo base_url('get-menu-data'); ?>",
            type: 'post',
            data: { id: id },
            dataType: 'json',
            success: function (response) {
                if (response.data && response.data.length > 0) {
                    var menuData = response.data[0];
                    var menuName = menuData.menu_name;
                    var elementId = 'menu_id_' + id;
                    var targetElement = $('#' + elementId);
                    targetElement.html(menuName);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error(xhr.statusText);
            }
        });
    }
     function fetchPageContent () {
         showLoaderInTable();
         $.ajax({
             url: "<?php echo base_url("fetch-page-content"); ?>",
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
                       '<td id="menu_id_' + item.menu_id + '">'+getMenuName(item.menu_id)+'</td>'+
                         '<td class="text-center"><a href="javascript:void(0)"  id="' + item.id + '" class="btnViewHi" >View Content</a></td>' +
                         '<td class="text-center"><a href="javascript:void(0)"  id="' + item.id + '" class="btnViewEn" >View Content</a></td>' +
                         '<td class="text-center">' + timeAgo + '</td>' + // Display time ago here
                         '<td class="text-center">' +
                         '<label class="custom-switch">' +
                         '<input type="checkbox" name="is_enabled" id="' + item.id + '" class="is_enabled custom-switch-input"  ' + (item.is_enabled == 1 ? 'checked' : '') + '>' +
                         '<span class="custom-switch-indicator"></span>' +
                         '</label>' +
                         '</td>' +
                         '<td>' +
                         '<div class="btn-icon-list d-flex justify-content-center">' +
                         '<button type="button" id="' + item.id + '" class="btn ripple btn-sm btn-success btn-icon btnUpdate" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit" data-bs-target="#modelUpdatePage"><i class="fa fa-edit tx-15"></i></button>'+
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
    fetchPageContent();
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
           url: "<?php echo base_url('fetch-page-menu'); ?>",
           type: 'get',
           dataType: 'json',
           success: function (response) {
              var optionsHtml = '<option value="">----Select Menu----</option>';
              $.each(response.data, function (index, item) {
                 var menu_name = item.menu_name;
                 var id = item.id;

                 optionsHtml += `<option value='${id}'>${menu_name}</option>`;
              });
              $("#menu_name").html(optionsHtml);
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
         $('#modelUpdatePage').modal('show');
     }
     function openViewHindiModal() {
         $('#modelViewContent').modal('show');
     }
     $(document).on('click', '.btnUpdate', function () {
        var id = $(this).attr('id');
        $.ajax({
           url: "<?php echo base_url('get-page-content'); ?>",
           type: 'post',
           dataType: 'json',
           data: {id: id},
           success: function (response) {
             if (response.data && response.data.length > 0) {
                 var pageContent = response.data[0];
                 $('#page_content_id').val(pageContent.id);
                 CKEDITOR.instances.txtEnglish_update.setData(pageContent.english_content);
                 CKEDITOR.instances.txtHindi_update.setData(pageContent.hindi_content);
                 openUpdateModal();
             }
           },
           error: function (xhr, textStatus, errorThrown) {
              console.error(xhr.statusText);
           }
        });
     });
     $(document).on('click', '.btnViewHi, .btnViewEn', function () {
            var id = $(this).attr('id');
            var isHindiButton = $(this).hasClass('btnViewHi'); // Check if it's the Hindi button
            $.ajax({
                url: "<?php echo base_url('get-page-content'); ?>",
                type: 'post',
                dataType: 'json',
                data: {id: id},
                success: function (response) {
                    if (response.data && response.data.length > 0) {
                        var menuData = response.data[0];
                        if (isHindiButton) {
                            $('#page_content_hi_view').html(menuData.hindi_content);
                            $('#page_content_en_view').html('');
                        } else {
                            $('#page_content_hi_view').html('');
                            $('#page_content_en_view').html(menuData.english_content);
                        }

                        openViewHindiModal();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error(xhr.statusText);
                }
            });
    });
     $(document).on('click', '#updatePageContent', function () {
        var id = $('#page_content_id').val();
        var isValid = true;
        if (isValid) {
           var txtEnglish = CKEDITOR.instances.txtEnglish_update.getData();
           var txtHindi = CKEDITOR.instances.txtHindi_update.getData();
           var postData = {
              id: id || null,
              txtEnglish: txtEnglish || null,
              txtHindi: txtHindi || null,
           };
           $.ajax({
              url: "<?php echo base_url('update-page-content'); ?>",
              type: 'post',
              data: postData,
              beforeSend: showLoader(),
              success: function (response) {
                 hideLoader();
                 $("#modelUpdatePage").modal('hide');
                    Swal.fire({
                       icon: "success",
                       title: "Success",
                       text: response.message,
                    }).then((result) => {
                       if (result.isConfirmed) {
                          fetchPageContent ();

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
        fetchPageContent ();
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
        if (isValid) {
           var menuName = $("#menu_name").val();
           var txtEnglish = CKEDITOR.instances.txtEnglish.getData();
           var txtHindi = CKEDITOR.instances.txtHindi.getData();
           var postData = {
              menuName: menuName || null,
              txtEnglish: txtEnglish || null,
              txtHindi: txtHindi || null,
           };
           $.ajax({
              url: "<?php echo base_url('post-page-contant'); ?>",
              type: 'post',
              data: postData,
              beforeSend: showLoader(),
              success: function (response) {
                 hideLoader();
                 $("#menu_name").val("");
                 $("#txtEnglish").val("");
                 $("#txtHindi").val("");
                 $("#modelCreatePage").modal('hide');
                    Swal.fire({
                       icon: "success",
                       title: "Success",
                       text: response.message,
                    }).then((result) => {
                       if (result.isConfirmed) {
                          fetchPageContent ();
                       }
                    });
                    },
              error: function (xhr, textStatus, errorThrown) {
                 hideLoader();
                 Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: xhr.textStatus,
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
                     url: "<?php echo base_url('delete-page-content'); ?>",
                     type: "POST",
                     data: {id: id},
                     success: function (response) {
                    Swal.fire({
                       icon: "success",
                       title: "Success",
                       text: response.message,
                    }).then((result) => {
                       if (result.isConfirmed) {
                          fetchPageContent ();

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
          title: 'Are you confident to change the page content?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, change it!'
        }).then((result) => {
           if (result.isConfirmed) {
              $.ajax({
                 url: "<?php echo base_url('change-page-content'); ?>",
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
                          fetchPageContent ();

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
           fetchPageContent ();
        });
     });
    CKEDITOR.replace('txtHindi');
    CKEDITOR.replace('txtEnglish');
    CKEDITOR.replace('txtHindi_update');
    CKEDITOR.replace('txtEnglish_update');
</script>
