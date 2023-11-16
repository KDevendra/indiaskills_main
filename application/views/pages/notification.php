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
                    <button type="button" data-bs-target="#modelCreateNotification" data-bs-toggle="modal" class="btn btn-primary my-2 btn-icon-text"><i class="ti-plus me-2"></i> Create Page</button>
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
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">
                                                        Title
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">
                                                        Notification For
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">
                                                        Internal Link
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">
                                                        Datetime
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">
                                                        Active
                                                    </th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="exportexample" rowspan="1" colspan="1">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        <div class="table-loader text-center">
                                            <div class="loader-content">
                                                <div class="loader"></div>
                                                <div class="loader-text">
                                                    Loading...
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
</div>
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
<!-- add model -->
<div class="modal fade" id="modelCreateNotification">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create Page Contant</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form action="#" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                    <div class="">
                        <div class="row row-sm">
                            <div class="col-lg-6 form-group">
                                <label class="form-label">Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" id="title" placeholder="Enter Title" name="title" />
                                <span id="error_notification_title" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form-label">Notification for: <span class="tx-danger">*</span></label>
                                <select name="NotificationFor" id="notificationFor" class="select select2">
                                    <option value="">
                                        ----Select----
                                    </option>
                                    <option value="Events">
                                        Events
                                    </option>
                                    <option value="Top Notice">
                                        Top Notice
                                    </option>
                                    <option value="Notice Board">
                                        Notice Board
                                    </option>
                                    <option value="Latest Updates">
                                        Latest Updates
                                    </option>
                                    <option value="News Highlights">
                                        News Highlights
                                    </option>
                                </select>
                                <span id="error_notification_for" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form-label">Internal Page Link: </label>
                                <select class="form-control select select2" id="menu_name" name="menu_name" aria-label="Default select example"> </select>
                                <span id="error_menu_name" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="form-label">Attachment:</label>
                                <input class="form-control" id="attachment" type="file" placeholder="Enter Title" name="title" />
                                <span id="error_attachment " class="text-danger"></span>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label class="form-label">Description: </label>
                                <textarea name="description" style="width: 100%;" class="form-control" placeholder="Enter description" id="description" width="100%"></textarea>
                                <span id="error_description" class="text-danger"></span>
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
                <h6 class="modal-title">View notification</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <div id="page_content_hi_view"></div>
                <div id="page_content_en_view"></div>
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
     $("#savechanges, #updatenotification").prop("disabled", true).html('<span class="loader"></span>');
 }

 function hideLoader() {
     $(".loader").hide();
     $("#savechanges, #updatenotification").prop("disabled", false).html("<span>Save changes</span>");
 }

 function showLoaderInTable() {
     $(".table-loader").show();
 }

 function hideLoaderInTable() {
     $(".table-loader").hide();
 }

 function getnotificationName(id) {
     $.ajax({
         url: "<?php echo base_url('get-notification-data'); ?>",
         type: "post",
         data: {
             id: id,
         },
         dataType: "json",
         success: function(response) {
             if (response.data && response.data.length > 0) {
                 var notificationData = response.data[0];
                 var notificationName = notificationData.notification_name;
                 var elementId = "notification_id_" + id;
                 var targetElement = $("#" + elementId);
                 targetElement.html(notificationName);
             }
         },
         error: function(xhr, textStatus, errorThrown) {
             console.error(xhr.statusText);
         },
     });
 }

 function parent_menu() {
     $.ajax({
         url: "<?php echo base_url('fetch-page-menu'); ?>",
         type: "get",
         dataType: "json",
         success: function(response) {
             var optionsHtml = '<option value="">----Select Menu----</option>';
             $.each(response.data, function(index, item) {
                 var menu_name = item.menu_name;
                 var id = item.id;

                 optionsHtml += `<option value='${id}'>${menu_name}</option>`;
             });
             $("#menu_name").html(optionsHtml);
         },
         error: function(xhr, textStatus, errorThrown) {
             console.error(xhr.statusText);
         },
     });
 }
 parent_menu();

 function fetchNotification() {
     showLoaderInTable();
     $.ajax({
         url: "<?php echo base_url('fetch-notification'); ?>",
         type: "get",
         dataType: "json",
         success: function(response) {
             hideLoaderInTable();
             var tableBody = $("#exportexample tbody");
             if ($.fn.DataTable.isDataTable("#exportexample")) {
                 $("#exportexample").DataTable().destroy();
             }
             var rowsHtml = ""; // Store the HTML content of rows
             $.each(response.data, function(index, item) {
                 var createdDate = new Date(item.CreateDate);
                 var currentDate = new Date();
                 var timeDifference = currentDate - createdDate;
                 var timeAgo = formatTimeAgo(timeDifference);
                 var newRow =
                     "<tr>" +
                     '<td id="notification_id_' +
                     item.Id +
                     '">' +
                     item.Title +
                     "</td>" +
                     '<td class="text-center">' +
                     (item.NotificationFor ? '<a href="javascript:void(0)">' + item.NotificationFor + "</a>" : "No Link") +
                     "</td>" +
                     '<td class="text-center">' +
                     (item.HasInternalPageLink ? '<a href="javascript:void(0)">' + item.HasInternalPageLink + "</a>" : "No Link") +
                     "</td>" +
                     '<td class="text-center">' +
                     timeAgo +
                     "</td>" +
                     '<td class="text-center">' +
                     '<label class="custom-switch">' +
                     '<input type="checkbox" name="is_enabled" id="' +
                     item.id +
                     '" class="is_enabled custom-switch-input"  ' +
                     (item.is_enabled == 1 ? "checked" : "") +
                     ">" +
                     '<span class="custom-switch-indicator"></span>' +
                     "</label>" +
                     "</td>" +
                     "<td>" +
                     '<div class="btn-icon-list d-flex justify-content-center">' +
                     '<button type="button" id="' +
                     item.id +
                     '" class="btn ripple btn-sm btn-success btn-icon btnUpdate" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Edit" data-bs-target="#modelUpdatePage"><i class="fa fa-edit tx-15"></i></button>' +
                     '<button type="button" id="' +
                     item.id +
                     '" class="btn ripple btn-sm btn-danger btn-icon btnDelete" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Delete"><i class="fa fa-trash tx-15"></i></button>' +
                     "</div>" +
                     "</td>" +
                     "</tr>";
                 rowsHtml += newRow;
             });
             tableBody.html(rowsHtml);
             var table = $("#exportexample").DataTable({
                 lengthChange: false,
                 buttons: ["excel", "pdf", "colvis"],
             });
             table.buttons().container().appendTo("#exportexample_wrapper .col-md-6:eq(0)");
         },
         error: function(xhr, textStatus, errorThrown) {
             hideLoaderInTable();
             console.error(xhr.statusText);
         },
     });
 }
 fetchNotification();

 function formatTimeAgo(timeDifference) {
     var secondsDifference = Math.floor(timeDifference / 1000);

     var intervals = [{
             label: "year",
             seconds: 31536000,
         },
         {
             label: "month",
             seconds: 2592000,
         },
         {
             label: "day",
             seconds: 86400,
         },
         {
             label: "hour",
             seconds: 3600,
         },
         {
             label: "minute",
             seconds: 60,
         },
     ];

     for (var i = 0; i < intervals.length; i++) {
         var interval = intervals[i];
         var count = Math.floor(secondsDifference / interval.seconds);
         if (count >= 1) {
             return count + " " + interval.label + (count > 1 ? "s" : "") + " ago";
         }
     }

     return "just now";
 }

 function generateUrl(title) {
     const url = title.toLowerCase().replace(/ /g, "-");
     return url.replace(/[^a-z0-9-]/g, "");
 }

 function openUpdateModal() {
     $("#modelUpdatePage").modal("show");
 }

 function openViewHindiModal() {
     $("#modelViewContent").modal("show");
 }
 $(document).on("click", ".btnUpdate", function() {
     var id = $(this).attr("id");
     $.ajax({
         url: "<?php echo base_url('get-page-content'); ?>",
         type: "post",
         dataType: "json",
         data: {
             id: id,
         },
         success: function(response) {
             if (response.data && response.data.length > 0) {
                 var pageContent = response.data[0];
                 $("#page_content_id").val(pageContent.id);
                 CKEDITOR.instances.txtEnglish_update.setData(pageContent.english_content);
                 CKEDITOR.instances.txtHindi_update.setData(pageContent.hindi_content);
                 openUpdateModal();
             }
         },
         error: function(xhr, textStatus, errorThrown) {
             console.error(xhr.statusText);
         },
     });
 });
 $(document).on("click", ".btnViewHi, .btnViewEn", function() {
     var id = $(this).attr("id");
     var isHindiButton = $(this).hasClass("btnViewHi"); // Check if it's the Hindi button
     $.ajax({
         url: "<?php echo base_url('get-page-content'); ?>",
         type: "post",
         dataType: "json",
         data: {
             id: id,
         },
         success: function(response) {
             if (response.data && response.data.length > 0) {
                 var notificationData = response.data[0];
                 if (isHindiButton) {
                     $("#page_content_hi_view").html(notificationData.hindi_content);
                     $("#page_content_en_view").html("");
                 } else {
                     $("#page_content_hi_view").html("");
                     $("#page_content_en_view").html(notificationData.english_content);
                 }

                 openViewHindiModal();
             }
         },
         error: function(xhr, textStatus, errorThrown) {
             console.error(xhr.statusText);
         },
     });
 });
 $(document).on("click", "#updatePageContent", function() {
     var id = $("#page_content_id").val();
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
             type: "post",
             data: postData,
             beforeSend: showLoader(),
             success: function(response) {
                 hideLoader();
                 $("#modelUpdatePage").modal("hide");
                 Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                 }).then((result) => {
                     if (result.isConfirmed) {
                         fetchNotification();
                     }
                 });
             },
             error: function(xhr, textStatus, errorThrown) {
                 hideLoader();
                 Swal.fire({
                     icon: "error",
                     title: "Error",
                     text: xhr.statusText,
                 });
             },
         });
     }
 });

 $("#reloadButton").click(function() {
     fetchNotification();
 });
 $("#parent_notification").on("change", function() {
     $("#error_parent_notification").text("");
 });
 $(document).on("click", "#savechanges", function() {
     var isValid = true;

     var title = $("#title").val();
     var notificationFor = $("#notificationFor").val();
     var menuName = $("#menu_name").val();
     var description = $("#description").val();

     $(".text-danger").text("");

     if (!title) {
         $("#error_notification_title").text("Title is required.");
         isValid = false;
     }

     if (!notificationFor) {
         $("#error_notification_for").text("Notification is required.");
         isValid = false;
     }

     if (isValid) {
         var formData = new FormData(); // Create a FormData object

         // Append form data to the FormData object
         formData.append("title", title);
         formData.append("notificationFor", notificationFor);
         formData.append("menuName", menuName);
         formData.append("description", description);

         // Append the file input (attachment) to FormData
         var attachmentInput = $("#attachment")[0];
         formData.append("attachment", attachmentInput.files[0]); // Get the first selected file

         $.ajax({
             url: "<?php echo base_url('post-notification'); ?>",
             type: "post",
             data: formData, // Use FormData object for data
             contentType: false, // Set contentType to false for FormData
             processData: false, // Set processData to false for FormData
             beforeSend: showLoader(),
             success: function(response) {
                 hideLoader();
                 $("#title, #menu_name, #attachment").val("");
                 $("#modelCreateNotification").modal("hide");

                 Swal.fire({
                     icon: "success",
                     title: "Success",
                     text: response.message,
                 }).then((result) => {
                     if (result.isConfirmed) {
                         fetchNotification();
                     }
                 });
             },
             error: function(xhr, textStatus, errorThrown) {
                 hideLoader();

                 Swal.fire({
                     icon: "error",
                     title: "Error",
                     text: xhr.statusText,
                 });
             },
         });
     }
 });

 $(document).on("click", ".btnDelete", function() {
     var id = $(this).attr("id");
     Swal.fire({
         title: "Are you confident delete notification?",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Yes, delete it!",
     }).then((result) => {
         if (result.isConfirmed) {
             $.ajax({
                 url: "<?php echo base_url('delete-page-content'); ?>",
                 type: "POST",
                 data: {
                     id: id,
                 },
                 success: function(response) {
                     Swal.fire({
                         icon: "success",
                         title: "Success",
                         text: response.message,
                     }).then((result) => {
                         if (result.isConfirmed) {
                             fetchNotification();
                         }
                     });
                 },

                 error: function(xhr, textStatus, errorThrown) {
                     Swal.fire({
                         icon: "error",
                         title: "Error",
                         text: "Somethibg want to wrong",
                     });
                 },
             });
         }
     });
 });
 $(document).on("click", ".is_enabled", function() {
     var id = $(this).attr("id");
     var is_enabled = $(this).prop("checked") ? 1 : 0;
     Swal.fire({
         title: "Are you confident to change the page content?",
         icon: "warning",
         showCancelButton: true,
         confirmButtonColor: "#3085d6",
         cancelButtonColor: "#d33",
         confirmButtonText: "Yes, change it!",
     }).then((result) => {
         if (result.isConfirmed) {
             $.ajax({
                 url: "<?php echo base_url('change-page-content'); ?>",
                 type: "POST",
                 data: {
                     id: id,
                     is_enabled: is_enabled,
                 },
                 success: function(response) {
                     Swal.fire({
                         icon: "success",
                         title: "Success",
                         text: response.message,
                     }).then((result) => {
                         if (result.isConfirmed) {
                             fetchNotification();
                         }
                     });
                 },
                 error: function(xhr, textStatus, errorThrown) {
                     Swal.fire({
                         icon: "error",
                         title: "Error",
                         text: "An error occurred while changing the notification status.",
                     });
                 },
             });
         }
         fetchNotification();
     });
 });
</script>
