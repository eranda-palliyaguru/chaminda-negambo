<!DOCTYPE html>
<html>
<?php 
include("head.php");
include("connect.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<?php 
include_once("auth.php");
$r=$_SESSION['SESS_LAST_NAME'];

if($r =='Cashier'){

header("location:./../../../index.php");
}
if($r =='admin'){

include_once("sidebar.php");
}
?>




<link rel="stylesheet" href="datepicker.css"
        type="text/css" media="all" />
    <script src="datepicker.js" type="text/javascript"></script>
    <script src="datepicker.ui.min.js"
        type="text/javascript"></script>
 <script type="text/javascript">
     
		 $(function(){
        $("#datepicker1").datepicker({ dateFormat: 'yy/mm/dd' });
        $("#datepicker2").datepicker({ dateFormat: 'yy/mm/dd' });
       
    });

    </script>




    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile 
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
       
        <li class="active">Profile</li>
      </ol>
    </section>
	
	
	
	<?php
	$g = $_GET['id'];
                $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$g' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		$name=$row['customer_name'];
		$vehicle_no=$row['vehicle_no'];
			$color=$row['color'];
			$model=$row['model'];
			$bye_date=$row['bye_date'];
			$chassis_no=$row['chassis_no'];
			$engine_no=$row['engine_no'];
			$birthday=$row['birthday'];
			$gend=$row['gend'];
			
			
		
		}
	  
	  $result = $db->prepare("SELECT * FROM model WHERE name='$model' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		$parth=$row['parth'];
		}
	  
	?>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

      <!-- SELECT2 EXAMPLE -->
			<img class="img-responsive " src="<?php echo $parth;?>" alt="User profile picture">
      <div class="box box-primary">
            <div class="box-body box-profile">
              

              <h3 class="profile-username text-center"><?php echo $vehicle_no;?></h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Vehicle Number</b> <a class="pull-right"><?php echo $vehicle_no;?></a>
                </li>
				<li class="list-group-item">
                  <b>Model</b> <a class="pull-right"><?php echo $model;?></a>
                </li>
				<li class="list-group-item">
                  <b>color</b> <a class="pull-right"><?php echo $color;?></a>
                </li>
                <li class="list-group-item">
                  <b>Engine Number</b> <a class="pull-right"><?php echo $engine_no;?></a>
                </li>
				  <li class="list-group-item">
                  <b>Chassis Number</b> <a class="pull-right"><?php echo $chassis_no;?></a>
                </li>
				  <li class="list-group-item">
                  <b>Bye Date</b> <a class="pull-right"><?php echo $bye_date;?></a>
                </li>
              </ul>

              <a href="cus_view.php" class="btn btn-primary btn-block"><b>Back</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box about me -->
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
	$g = $_GET['id'];
                $result = $db->prepare("SELECT * FROM customer WHERE customer_id='$g' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){	
	?>
				
				
				
				<ul class="list-group list-group-unbordered">
				 <li class="list-group-item">
                  <b>Name:</b> <i><?php echo $gend.$name=$row['customer_name'];?></i>
                </li>
                <li class="list-group-item">
                  <b>Address:</b>  <i><?php echo $row['address'];?></i>
                </li>
				<li class="list-group-item">
                  <b>Contact:</b>  <i><?php echo $contact=$row['contact'];?></i>
                </li>
				<li class="list-group-item">
                  <b>Birthday:</b>  <i><?php echo $birthday;?></i>
                </li>
				<li class="list-group-item">
                  <b>Email:</b>  <i><?php echo $row['email'];?></i>
                </li>
				<?php } ?>
				
				</ul>
            </div>
            <!-- /.box-body -->
          </div>
       </div>
        <!-- /.col (left) -->
       

         <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">About</a></li>
              
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
               
			   
			   
			   <?php
	
       $result1 = $db->prepare("SELECT * FROM sales WHERE vehicle_no='$vehicle_no' ORDER by transaction_id DESC ");
		$result1->bindParam(':userid', $res);
		$result1->execute();
		for($i=0; $row = $result1->fetch(); $i++){
	?>
			   <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-blue">
                          <?php echo $row['date'];?>
                        </span>
                  </li>
				<li>
					<i class="fa fa-check bg-green"></i>
                    </i>
                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row['date'];?></span>
                      <h3 class="timeline-header"><a href="#">Invoice no:</a> <?php echo $row['invoice_number'];?></h3>
                      <div class="timeline-body">
						<a class="btn btn-warning btn-xs"><?php echo $row['comment']; ?></a>  
					  <a class="btn btn-success btn-xs"><?php echo $row['km']; ?> Km</a><br>
                      <table id="example2" class="table table-bordered table-hover ">
			<tr>
                <th>Product Name</th>
				<th>QTY</th>
				<th>Dic (Rs.)</th>
                <th>Price (Rs.)</th>
              </tr>
				 <?php $invo=$row['invoice_number'];
			$total=0;
                $result = $db->prepare("SELECT * FROM sales_list WHERE invoice_no = '$invo' ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row1 = $result->fetch(); $i++){
	?>
				 <tr>
				     <td><?php echo $row1['name']; ?></td>
					 <td><?php echo $row1['qty']; ?></td>
					 <td><?php echo $row1['dic']; ?></td>
					 <td><?php echo $row1['price']; ?></td>
				 </tr>
				 <?php
			
		}	?>
			 </table>
					  </div>
                      <div class="timeline-footer">
						  <a class="btn btn-success btn-xs">Rs.<?php echo $row['amount']; ?></a> 
                      </div>
                    </div>
                  </li>
				
		<?php }		?>
				
				</ul>
				

               
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form  method="post" action="profile_save.php" class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="inputName">
                    </div>
                  </div>
					 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Contact</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>" id="inputName"data-inputmask='"mask": "(999)-9999999"' data-mask>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Vehicle No</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="vehicle_no" value="<?php echo $vehicle_no ;?>" id="inputEmail" placeholder="Vehicle No"data-inputmask='"mask": "AAA-9999"' data-mask required>
                    </div>
                  </div>
                  
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">color</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="color" value="<?php echo $color; ?>" id="inputName" placeholder="color">
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Engine No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="engine_no" value="<?php echo $engine_no; ?>" id="inputName" placeholder="Engine No"> 
                    </div>
                  </div>
					
					<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Chassis No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="chassis_no" value="<?php echo $chassis_no; ?>" id="inputName" placeholder="Engine No">
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    </div>
                  </div>
				  
				  
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to  <a href="#">Submit</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
            <!-- /.box-body -->
            
            
          <!-- /.box -->
        
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
    <?php
  include("dounbr.php");
?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("YYYY/MM/DD", {"placeholder": "YYYY/MM/DD"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("YYYY/MM/DD", {"placeholder": "YYYY/MM/DD"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
	$('#datepicker').datepicker({  autoclose: true, datepicker: true,  format: 'yyyy/mm/dd '});
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
