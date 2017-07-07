	<footer class="main-footer">
		<div class="pull-right hidden-xs">
	 
		</div>
		<strong>Copyright &copy; <?=date("Y")?> </strong>
	</footer>
 </div>
</div>
<!-- jQuery 2.2.3 -->
<script src="<?=base_url('assets')?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('assets')?>/bootstrap/js/bootstrap.min.js"></script>

<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>assets/plugins/sweetAlert/dist/sweetalert.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets')?>/dist/js/app.min.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="<?=base_url('assets')?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/plugins/sweetAlert/dist/sweetalert.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=base_url('assets')?>/plugins/chartjs/Chart.min.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?=base_url('assets')?>/dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets')?>/dist/js/demo.js"></script>
<script src="<?=base_url('assets')?>/dist/js/custom.js"></script>
<?php if($this->session->flashdata('error')) {?>
	<script type="text/javascript">
		swal('Error Message',"<?=$this->session->flashdata('error')?>",'error');
	</script>
<?php } if($this->session->flashdata('success')) {?>
<script type="text/javascript">
	swal('Success Message',"<?=$this->session->flashdata('success')?>",'success');
</script> 
<?php }?>
</body>
</html>