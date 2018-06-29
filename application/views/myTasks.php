<html>
	<head>
		<title>Kernel - My Tasks</title>
		<link rel = "stylesheet" href = "<?php echo base_url("/assets/css/myTasksStyle.css")?>">
	</head>
	<body class="hold-transition skin-red sidebar-mini">
		<?php require("frame.php"); ?>

			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						My Tasks
						<small>What do I need to do</small>
					</h1>
					<ol class="breadcrumb">
						<li class ="active"><a href="<?php echo base_url("index.php/controller/myTasks"); ?>"><i class="fa fa-dashboard"></i> My Tasks</a></li>
						<!-- <li class="active">Here</li> -->
					</ol>
				</section>

				<!-- Main content -->
				<section class="content container-fluid">
					<!-- <div id="filterButtons">
						<h5>Arrange by</h5>
					</div> -->
							<div class="box">
								<div class="box-header">
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<table id="taskList" class="table table-bordered table-hover">
										<thead>
										<tr>
											<th>Task</th>
											<th>Project</th>
											<th>Start Date</th>
											<th>Target End Date</th>
											<th>Period</th>
											<th>Status</th>
											<th></th>
											<th></th>
											<th></th>
										</tr>
										</thead>
										<tbody>
											<?php foreach($tasks as $row):?>
											<tr>
												<?php // to fix date format
												$taskstartdate = date_create($row['TASKSTARTDATE']);
												$taskenddate = date_create($row['TASKENDDATE']);
												?>

												<td><?php echo $row['TASKTITLE'];?></td>
												<td><?php echo $row['PROJECTTITLE'];?></td>
												<td><?php echo date_format($taskstartdate, "M d, Y");?></td>
												<td><?php echo date_format($taskenddate, "M d, Y");?></td>
												<td align = "center"><?php echo $row['taskDuration'];?> Days</td>
												<td><?php echo $row['TASKSTATUS'];?></td>
												<?php if($_SESSION['usertype_USERTYPEID'] != '5' && $row['users_USERID'] == $_SESSION['USERID']):?>
													<td align="center"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-delegate"><i class="fa fa-users"></i> Delegate</button></td>
												<?php else:?>
													<td></td>
												<?php endif;?>
												<td align="center"><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-request"><i class="fa fa-exclamation"></i> RFC</button></td>
												<td align="center"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-done"><i class="fa fa-check"></i> Done</button></td>
											</tr>
										<?php endforeach;?>
										</tbody>
									</table>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->

		        </div>

						<div class="modal fade" id="modal-request" tabindex="-1">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header">
		                <h4 class="modal-title">Request for Change</h4>
		              </div>
		              <div class="modal-body">
		                <form>
											<div class="form-group">
			                  <label>Request Type</label>
			                  <select class="form-control">
													<option disabled selected value> -- Select Request Type -- </option>
			                    <option>Change Task Performer</option>
			                    <option>Change Task Dates</option>
			                  </select>
			                </div>

											<!-- DISPLAY IF CHANGE TASK DATE OPTION -->
											<!-- IF()...AJAX? -->
											<div class="form-group">
				                <label>New Start Date</label>

				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control pull-right" id="startDate" name="startDate" required>
				                </div>
				                <!-- /.input group -->
				              </div>
				              <!-- /.form group -->
				              <div class="form-group">
				                <label>New Target End Date</label>

				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="text" class="form-control pull-right" id="endDate" name ="endDate" required>
				                </div>
				                <!-- /.input group -->
				              </div>

											<!-- DISPLAY ON BOTH OPTIONS -->
											<div class="form-group">
			                  <label>Reason</label>
			                  <textarea class="form-control" placeholder="State your reason here"></textarea>
			                </div>
										</form>
		              </div>
		              <div class="modal-footer">
		                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
		                <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Submit Request</button>
		              </div>
		            </div>
		            <!-- /.modal-content -->
		          </div>
		          <!-- /.modal-dialog -->
		        </div>
		        <!-- /.modal -->

						<!-- DELEGATE MODAL -->
						<div class="modal fade" id="modal-delegate">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Delegate Task to a Team Member</h4>
									</div>
									<div class="modal-body">
										<form>
											<div class="form-group" style="text-align:center">
												<!-- <label>Select a Team Member</label> -->
												<select class="form-control select2" style="width: 100%;" data-placeholder=" -- Select a Team Member -- ">
													<option disabled selected value> -- Select a Team Member -- </option>
													<?php foreach($users as $user):?>
														<?php if($user['users_SUPERVISORS'] == $_SESSION['USERID']):?>
															<option><?php echo $user['FIRSTNAME'];?> <?php echo $user['LASTNAME'];?></option>
														<?php endif;?>
													<?php endforeach;?>
												</select>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
										<button type="button" class="btn btn-success"><i class="fa fa-check"></i> Delegate Task</button>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->

						<div class="modal fade" id="modal-done" tabindex="-1">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header">
		                <h4 class="modal-title">Task Finished</h4>
		              </div>
		              <div class="modal-body">
										<!-- DISPLAY IF CURRDATE>TASKENDDATE -->
										<h3 style="color:red">Task is Delayed</h3>
		                <form>
											<div class="form-group">
			                  <textarea class="form-control" placeholder="State the reason for the delay"></textarea>
			                </div>
										</form>
										<p>Are you sure that this task is done?</p>

		              </div>
		              <div class="modal-footer">
		                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
		                <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Confirm</button>
		              </div>
		            </div>
		            <!-- /.modal-content -->
		          </div>
		          <!-- /.modal-dialog -->
		        </div>
		        <!-- /.modal -->
				</section>
					</div>
			<?php require("footer.php"); ?>
		</div>
		<script>
			$("#myTasks").addClass("active");

			$('.select2').select2();

			$(function ()
			{
				//Date picker
 	     $('#startDate').datepicker({
				 format: 'yyyy-mm-dd',
 	       autoclose: true
 	     })

 	     $('#endDate').datepicker({
				 format: 'yyyy-mm-dd',
 	       autoclose: true
 	     })
		 });

		 $(document).ready(function()
		 {
		 	$("#filterProject").click(function()
		 	{
				$(".filterID").html("<input type='hidden' name='filterID' value='projects.PROJECTTITLE'>");
				$("#arrangeForm").submit();
		 	});

			$("#filterPriority").click(function()
			{
				$(".filterID").html("<input type='hidden' name='filterID' value='tasks.TASKSTARTDATE'>");
				$("#arrangeForm").submit();
			});

			$("#filterStatus").click(function()
			{
				$(".filterID").html("<input type='hidden' name='filterID' value='tasks.TASKSTATUS'>");
				$("#arrangeForm").submit();
			});
		 });

		 $(function () {
			 $('#taskList').DataTable({
				 'paging'      : false,
				 'lengthChange': false,
				 'searching'   : true,
				 'ordering'    : true,
				 'info'        : false,
				 'autoWidth'   : false
			 });
		 })
		</script>
	</body>
</html>
