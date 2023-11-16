<?php include_once __DIR__ . '/../common/script-tag.php'; ?>
</div>

<script src="<?php echo base_url('');?>include/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/chart.js/Chart.bundle.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/select2/js/select2.min.js"></script>
<script src="<?php echo base_url('');?>include/js/select2.js"></script>
<script src="<?php echo base_url('');?>include/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/sidemenu/sidemenu.js"></script>
<script src="<?php echo base_url('');?>include/plugins/sidebar/sidebar.js"></script>
<script src="<?php echo base_url('');?>include/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/morris.js/morris.min.js"></script>
<script src="<?php echo base_url('');?>include/js/circle-progress.min.js"></script>
<script src="<?php echo base_url('');?>include/js/chart-circle.js"></script>
<script src="<?php echo base_url('');?>include/js/index.js"></script>
<script src="<?php echo base_url('');?>include/js/themeColors.js"></script>
<script src="<?php echo base_url('');?>include/js/sticky.js"></script>
<script src="<?php echo base_url('');?>include/js/custom.js"></script>
<script src="<?php echo base_url('');?>include/switcher/js/switcher.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/jszip.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('');?>include/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="<?php echo base_url('');?>include/js/table-data.js"></script>
<script>
   $(document).ready(function() {
       // Find elements with the 'active' class and replace it with 'nav-item'
       $('.nav-item.active').removeClass('active').addClass('nav-item');
       // Find elements with the 'active' class and replace it with 'nav-link'
       $('.nav-link.active').removeClass('active').addClass('nav-link');
       // Attach a click event handler to the "Back" button
       $("#backButton").click(function() {
               // Use window.history.back() to go back to the previous page
               window.history.back();
           });
   
   
   });
</script>
</body>
</html>