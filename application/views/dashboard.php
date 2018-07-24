<html>
	<head>
		<title>Kernel - Dashboard</title>
		<link rel = "stylesheet" href = "<?php echo base_url("/assets/css/dashboardStyle.css")?>">
	</head>
	<body>
		<?php require("frame.php"); ?>

		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Welcome, <b><?php echo $_SESSION['FIRSTNAME'] . " " . $_SESSION['LASTNAME']; ?>!</b>
				</h1>
			</section>

			<section class="content container-fluid">
				<!-- <div>
					<button id="success" type="button" class="btn btn-success">Test Success</button>
					<button id="warning" type="button" class="btn btn-warning">Test Warning</button>
					<button id="danger" type="button" class="btn btn-danger">Test Danger</button>
					<button id="info" type="button" class="btn btn-info">Test Info</button>
				</div>
				<br> -->

				<div class="row">
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-blue" style="padding-top:20px;"><i class="fa fa-check"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">My Completeness</span>
	              <span class="info-box-number">10.99%</span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-blue" style="padding-top:20px;"><i class="fa fa-clock-o"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">My Timeliness</span>
	              <span class="info-box-number">99%</span>
	            </div>

	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-light-blue" style="padding-top:20px;"><i class="fa fa-check"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">DeptName<br>Completeness</span>
								<span class="info-box-number">10.99%</span>
							</div>
							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="info-box">
							<span class="info-box-icon bg-light-blue" style="padding-top:20px;"><i class="fa fa-clock-o"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">DeptName<br>Timeliness</span>
								<span class="info-box-number">99%</span>
							</div>

							<!-- /.info-box-content -->
						</div>
						<!-- /.info-box -->
					</div>
					<!-- /.col -->
				</div>

				<!-- MANAGE TABLE -->
				<!-- Main row -->
				<?php if($ongoingProjects != null):?>
					<div class="row">
						<div class="col-md-12">
							<div class="box box-danger">
								<div class="box-header with-border">
									<h3 class="box-title">Projects I'm Working On</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="table-responsive">
										<table class="table table-hover no-margin" id="projWeeklyProgress">
											<thead>
											<tr>
												<th>Name</th>
												<th class="text-center">Last Week's Progress</th>
												<th class="text-center">Current Progress</th>
												<th class="text-center">Target End Date</th>
												<th class="text-center">Days Remaining</th>
											</tr>
											</thead>
											<tbody>
												<?php foreach($ongoingProjects as $key => $ongoingProject): ?>
													<tr class = "projects clickable" data-id="<?php echo $ongoingProject['PROJECTID'];?>">

														<form class='projectForm' action = 'projectGantt' method="POST">
															<input type ='hidden' name='dashboard' value='0'>
														</form>

														<td><?php echo $ongoingProject['PROJECTTITLE'];?></td>
														<td align="center">
															<?php // TODO: NAMI FIX ?>
															<?php
																foreach ($lastWeekProgress as $row)
																{
																	if ($ongoingProject['PROJECTID'] == $row['projects_PROJECTID'])
																	{
																		echo $row['PROGRESS'];
																	}
																} ?>%</h2>

														</td>
														<td align="center">
															<?php
			                          foreach ($ongoingProjectProgress as $row)
			                          {
			                            if ($ongoingProject['PROJECTID'] == $row['projects_PROJECTID'])
			                            {
			                              echo $row['projectProgress'];
			                            }
			                          } ?>%
														</td>
														<?php
														if($ongoingProject['PROJECTADJUSTEDENDDATE'] == "") // check if end date has been previously adjusted
															$endDate = date_create($ongoingProject['PROJECTENDDATE']);
														else
															$endDate = date_create($ongoingProject['PROJECTADJUSTEDENDDATE']);
														?>
														<td align="center"><?php echo date_format($endDate, "M d, Y");?></td>

														<td align="center"><?php echo $ongoingProject['datediff'];?>
														</td>
													</tr>
												<?php endforeach;?>
											</tbody>
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
								<!-- /.box-body -->
								<!-- /.box-footer -->
							</div>
							<!-- /.box -->
						</div>
					</div>
					<?php endif;?>


				<!-- END MANAGE TABLE -->

				<!-- TASK TABLE -->
				<!-- Main row -->
				<div class="row">
					<!-- Left col -->
					<?php if($delayedTaskPerUser != NULL || $tasks3DaysBeforeDeadline != NULL): ?>
					<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Deadlines</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
									<table class="table table-hover no-margin" id="logsList">
										<thead>
											<th>Project</th>
											<th>Task</th>
											<th>Task End Date</th>
											<th>Status</th>
										</thead>
										<tbody>
										<?php
											foreach ($delayedTaskPerUser as $row)
											{
												if($row['TASKADJUSTEDENDDATE'] == "") // check if end date has been previously adjusted
													$endDate = date_create($row['TASKENDDATE']);
												else
													$endDate = date_create($row['TASKADJUSTEDENDDATE']);

												echo "<tr class='clickable' style='color:red'>";
													echo "<td>" . $row['PROJECTTITLE'] . "</td>";
													echo "<td>" . $row['TASKTITLE'] . "</td>";
													echo "<td>" . date_format($endDate, "M d, Y") . "</td>";
													echo "<td> DELAYED </td>";
												echo "</tr>";
											}
											foreach ($tasks3DaysBeforeDeadline as $data)
											{
												if($data['TASKADJUSTEDENDDATE'] == "") // check if end date has been previously adjusted
													$endDate = date_create($data['TASKENDDATE']);
												else
													$endDate = date_create($data['TASKADJUSTEDENDDATE']);

												echo "<tr class='clickable'>";
													echo "<td class='projectLink'>" . $data['PROJECTTITLE'] . "</td>";
													echo "<td>" . $data['TASKTITLE'] . "</td>";
													echo "<td>" . date_format($endDate, "M d, Y") . "</td>";
													echo "<td>" . $data['TASKDATEDIFF'] . " day/s before deadline</td>";
												echo "</tr>";
											}
										?>
										</tbody>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.box-body -->
							<!-- /.box-footer -->
						</div>
						<!-- /.box -->
					</div>
					<?php endif;?>

					<!-- Right col -->
					<?php if ($editProjects != NULL): ?>
					<div class="col-md-6">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Projects I Need To Edit</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="table-responsive">
									<table class="table table-hover no-margin" id="projWeeklyProgress">
										<thead>
										<tr>
											<th>Project</th>
											<th class="text-center">Start Date</th>
											<th class="text-center">Until Launch</th>
										</tr>
										</thead>
										<tbody>

											<?php foreach($editProjects as $editProject):?>
												<?php $startdate = date_create($editProject['PROJECTSTARTDATE']);?>

												<tr class="clickable" data-id="<?php echo $editProject['PROJECTID'] ;?>'">
													<td><?php echo $editProject['PROJECTTITLE'];?></td>
													<td align="center"><?php echo date_format($startdate, 'M d, Y');?></td>
													<td align="center"><?php echo $editProject['launching'];?></td>
												</tr>
											<?php endforeach;?>

										</tbody>
									</table>
								</div>
								<!-- /.table-responsive -->
							</div>
							<!-- /.box-body -->
							<!-- /.box-footer -->
						</div>
						<!-- /.box -->
					</div>

				</div>
				<?php endif;?>


				<?php if($changeRequests != null):?>

					<!-- APPROVAL TABLE -->
					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<div class="col-md-12">
							<div class="box box-danger">
								<div class="box-header with-border">
									<h3 class="box-title">Change Request Approval</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="table-responsive">
										<table class="table table-hover no-margin" id="requestApproval">
											<thead>
											<tr>
												<th>Date Requested</th>
												<th class="text-center">Request Type</th>
												<th>Project</th>
												<th>Task</th>
												<th>Requester</th>
											</tr>
											</thead>
											<tbody>
												<?php foreach($changeRequests as $changeRequest):
													$dateRequested = date_create($changeRequest['REQUESTEDDATE']);
													// if($changeRequest['REQUESTTYPE'] == 1)
													// 	$type = "Change Performer";
													// else
													// 	$type = "Change Date/s";
												?>
													<tr class="request clickable" data-project = "<?php echo $changeRequest['PROJECTID']; ?>" data-request = "<?php echo $changeRequest['REQUESTID']; ?>">

														<form class='changeRequestApproval' action = 'projectGantt' method="POST">
															<input type ='hidden' name='dashboard' value='0'>
															<input type ='hidden' name='rfc' value='0'>
														</form>

														<td><?php echo date_format($dateRequested, "M d, Y"); ?></td>
														<!-- <td><?php echo $type;?></td> -->
														<td align="center">
															<?php if($changeRequest['REQUESTTYPE'] == 1):?>
																<i class="fa fa-user-times"></i>
															<?php else:?>
																<i class="fa fa-calendar"></i>
															<?php endif;?>
														</td>
														<td><?php echo $changeRequest['PROJECTTITLE'];?></td>
														<td><?php echo $changeRequest['TASKTITLE'];?></td>
														<td><?php echo $changeRequest['FIRSTNAME'] . " " .  $changeRequest['LASTNAME'] ;?></td>
													</tr>
												<?php endforeach;?>
											</tbody>
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
								<!-- /.box-body -->
								<!-- /.box-footer -->
							</div>
							<!-- /.box -->
						</div>
					</div>

					<div class="row">
					</div>

					<!-- END APPROVAL TABLE -->
				<?php endif;?>


				<?php if($toAcknowledgeDocuments != NULL):?>
					<!-- MARKO - Docu-->
					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<div class="col-md-12">
							<div class="box box-danger">
								<div class="box-header with-border">
									<h3 class="box-title">Document Acknowledgement</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="table-responsive">
										<table class="table table-hover no-margin" id="requestApproval">
											<thead>
											<tr>
												<th>Document Name</th>
												<th>Uploaded By</th>
												<th>Department</th>
												<th align="center"></th>
											</tr>
											</thead>
											<tbody>
												<?php
													foreach($toAcknowledgeDocuments as $row){
														if($row['users_UPLOADEDBY'] != $_SESSION['USERID']){
															echo "<tr class='clickable'>";
															echo"
															<form action='acknowledgeDocument' method='POST' class ='acknowledgeDocument'>
																<input type='hidden' name='project_ID' value='" . $row['projects_PROJECTID'] . "'>
																<input type='hidden' name='fromWhere' value='dashboard'>
																<input type='hidden' name='fileName' value='" . $row['DOCUMENTNAME'] . "'>
																<input type='hidden' name='documentID' value='" . $row['DOCUMENTID'] . "'>
															</form>";
																echo "<td>" . $row['DOCUMENTNAME'] . "</td>";
																echo "<td>" . $row['FIRSTNAME'] . " " . $row['LASTNAME'] . "</td>";
																echo "<td>" . $row['DEPARTMENTNAME'] . "</td>";


																if($row['ACKNOWLEDGEDDATE'] != ''){
																	echo "<td align='center'>Acknowledged</td>";
																} else {
																	echo "<td align='center'>
																	<button type='button' class='btn btn-success document' name='documentButton' id='acknowledgeButton' data-toggle='modal' data-target='#confirmAcknowledge' data-id ='" . $row['DOCUMENTID'] . "'>
																	<i class='fa fa-eye'></i> Acknowledge</button></td>";
																}

															echo "</tr>";

														}
													}
												?>
											</tbody>
										</table>
									</div>
									<!-- /.table-responsive -->
								</div>
								<!-- /.box-body -->
								<!-- /.box-footer -->
							</div>
							<!-- /.box -->
						</div>
					</div>

					<div class="row">
					</div>

					<!-- END DOCUMENTS TABLE -->
				<?php endif;?>

				<!-- CONFIRM ACKNOWLEDGEMENT -->
				<div class="modal fade" id="confirmAcknowledge" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="modal-title">Confirm Document Acknowledgement</h2>
							</div>
							<div class="modal-body">
								<h4>Are you sure you want to acknowledge this document?</h4>
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
									<button id = "doneConfirm" type="submit" class="btn btn-success" data-id=""><i class="fa fa-check"></i> Confirm</button>
								</div>
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

	</div> <!--.wrapper closing div-->

	<script>
		$("#dashboard").addClass("active");

		$(document).on("click", ".request", function() {
			var $project = $(this).attr('data-project');
			var $request = $(this).attr('data-request');
			$(".changeRequestApproval").attr("name", "formSubmit");
			$(".changeRequestApproval").append("<input type='hidden' name='project_ID' value= " + $project + ">");
			$(".changeRequestApproval").append("<input type='hidden' name='request_ID' value= " + $request + ">");
			$(".changeRequestApproval").submit();
			});

		$(document).on("click", ".projects", function() {
			var $project = $(this).attr('data-id');
			$(".projectForm").attr("name", "formSubmit");
			$(".projectForm").append("<input type='hidden' name='project_ID' value= " + $project + ">");
			$(".projectForm").submit();
			});

		$(document).on("click", ".document", function() {
			var $id = $(this).attr('data-id');
			$(".acknowledgeDocument").attr("name", "formSubmit");
			$(".acknowledgeDocument").append("<input type='hidden' name='documentID' value= " + $id + ">");
			$(".acknowledgeDocument").submit();
		});

		$(document).ready(function()
		{
			$("#success").click(function(){
				successAlert();
			});

			$("#danger").click(function(){
				dangerAlert();
			});

			$("#warning").click(function(){
				warningAlert();
			});

			$("#info").click(function(){
				infoAlert();
			});
		});
	</script>

	</body>
</html>
