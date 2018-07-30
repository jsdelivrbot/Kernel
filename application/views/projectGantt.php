	<html>
	<head>
		<title>Kernel - <?php echo  $projectProfile['PROJECTTITLE'];?></title>
		<link rel = "stylesheet" href = "<?php echo base_url("/assets/css/projectGanttStyle.css")?>">
	</head>
	<body class="hold-transition skin-red sidebar-mini sidebar-collapse">
		<?php require("frame.php"); ?>

			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div style="margin-bottom:10px">

						<?php if(isset($_SESSION['dashboard'])): ?>
								<a href="<?php echo base_url("index.php/controller/dashboard"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to Dashboard"><i class="fa fa-arrow-left"></i></a>
						<?php elseif(isset($_SESSION['archives'])): ?>
								<a href="<?php echo base_url("index.php/controller/archives"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to Archives"><i class="fa fa-arrow-left"></i></a>
						<?php elseif(isset($_SESSION['changeRequest']) || isset($_SESSION['userRequest'])): ?>
								<a href="<?php echo base_url("index.php/controller/rfc"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to Change Requests"><i class="fa fa-arrow-left"></i></a>
						<?php elseif(isset($_SESSION['rfc'])): ?>
								<a href="<?php echo base_url("index.php/controller/rfc"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to Change Requests"><i class="fa fa-arrow-left"></i></a>
						<?php elseif(isset($_SESSION['myTasks'])): ?>
								<a href="<?php echo base_url("index.php/controller/myTasks"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to My Tasks"><i class="fa fa-arrow-left"></i></a>
						<?php elseif(isset($_SESSION['templates'])): ?>
								<a href="<?php echo base_url("index.php/controller/templates"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to Templates"><i class="fa fa-arrow-left"></i></a>
						<?php elseif(isset($_SESSION['monitorTasks'])): ?>
								<a href="<?php echo base_url("index.php/controller/taskMonitor"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to Monitor Tasks"><i class="fa fa-arrow-left"></i></a>
						<?php else: ?>
								<a href="<?php echo base_url("index.php/controller/myProjects"); ?>" class="btn btn-default btn" data-toggle="tooltip" data-placement="top" title="Return to My Projects"><i class="fa fa-arrow-left"></i></a>
						<?php endif; ?>

					</div>

				<?php if(isset($_SESSION['rfc']) && !isset($_SESSION['userRequest'])): ?>

					<!-- RFC GANTT START -->
					<div id="rfcGantt">
						<div class="row">
								<div class="col-md-6">
									<div class="box box-danger">
										<div class="box-header">
											<h3 class="box-title">Change Request Details</h3>
										</div>
										<!-- /.box-header -->
										<div class="box-body">
											<form id = "approvalForm" action="approveDenyRFC" method="POST" style="margin-bottom:0;"
											data-request="<?php echo $changeRequest['REQUESTID'];?>"
											data-project="<?php echo $changeRequest['PROJECTID'];?>"
											data-task="<?php echo $changeRequest['TASKID'];?>"
											data-type="<?php echo $changeRequest['REQUESTTYPE'];?>"
											data-requestor="<?php echo $changeRequest['users_REQUESTEDBY'];?>">

												<?php $dateRequested = date_create($changeRequest['REQUESTEDDATE']);

												if($changeRequest['TASKADJUSTEDSTARTDATE'] == "") // check if start date has been previously adjusted
													$startDate = date_create($changeRequest['TASKSTARTDATE']);
												else
													$startDate = date_create($changeRequest['TASKADJUSTEDSTARTDATE']);

												if($changeRequest['TASKADJUSTEDENDDATE'] == "") // check if end date has been previously adjusted
													$endDate = date_create($changeRequest['TASKENDDATE']);
												else
													$endDate = date_create($changeRequest['TASKADJUSTEDENDDATE']);

												$newStartDate = date_create($changeRequest['NEWSTARTDATE']);
												$newEndDate = date_create($changeRequest['NEWENDDATE']);
												?>
												<?php if($changeRequest['REQUESTTYPE'] == 1)
													$type = "Change Performer";
												else
													$type = "Change Date/s";?>

												<table class="table">
													<tr>
														<td>
															<label>Date Requested</label>
															<p><?php echo date_format($dateRequested, "F d, Y");?></p>
														</td>
														<td>
															<label>Request Type</label>
															<p>
																<?php if($changeRequest['REQUESTTYPE'] == 1):?>
																	<i class="fa fa-user-times"></i>
																<?php else:?>
																	<i class="fa fa-calendar"></i>
																<?php endif;?>
																<?php echo $type;?>
															</p>
														</td>
														<td colspan='2'>
															<label>Requester</label>
															<p><?php echo $changeRequest['FIRSTNAME'] . " " .  $changeRequest['LASTNAME'] ;?></p>
														</td>
													</tr>

													<tr>
														<td>
															<label>Project</label>
															<p><?php echo $changeRequest['PROJECTTITLE'];?></p>
														</td>
														<td>
															<label>Task Name</label>
															<p><?php echo $changeRequest['TASKTITLE'];?></p>
														</td>
														<td>
															<label>Start Date</label>
															<p><?php echo date_format($startDate, "F d, Y");?></p>
														</td>
														<td>
															<label>End Date</label>
															<p><?php echo date_format($endDate, "F d, Y");?></p>
														</td>
													</tr>

													<tr>
														<td colspan='4'>
															<label>Reason</label>
															<p><?php echo $changeRequest['REASON'];?></p>
														</td>
													</tr>

													<?php if($changeRequest['REQUESTTYPE'] == '2'):?>
														<tr>
															<td colspan='2'>
																<label>Requested Start Date</label>
																<?php if($changeRequest['NEWSTARTDATE'] != ""):?>
																	<p><?php echo date_format($newStartDate, "F d, Y");?></p>
																<?php else:?>
																	<p>-</p>
																<?php endif;?>
															</td>
															<td colspan='2'>
																<label>Requested End Date</label>
																<?php if($changeRequest['NEWENDDATE'] != ""):?>
																	<p><?php echo date_format($newEndDate, "F d, Y");?></p>
																<?php else:?>
																	<p>-</p>
																<?php endif;?>
															</td>
														</tr>
													<?php endif;?>

												</table>
										</div>
										<!-- /.box-body -->
										<!-- /.box-footer -->
									</div>
									<!-- /.box -->
								</div>

								<div class="col-md-6">
									<div class="box box-danger">
										<!-- /.box-header -->
										<div class="box-body">
												<div class="form-group">
													<textarea id = "remarks" name = "remarks" class="form-control" rows="5" placeholder="Enter remarks (Optional)"></textarea>
												</div>
											</form>
												<button id = "denyRequest" type="button" class="btn btn-danger pull-left" style="display:block" data-toggle="modal" data-target="#modal-deny">
													<i class="fa fa-close" data-toggle="tooltip" data-placement="top" title="Deny"></i></button>
												<?php if($changeRequest['REQUESTTYPE'] == '1'):?>
												<button id = "approveRequest" type="button" class="btn btn-success pull-right delegateApprove" style="display:block;" data-id="<?php echo $changeRequest['tasks_REQUESTEDTASK'];?>" data-user="<?php echo $changeRequest['users_REQUESTEDBY'];?>" data-toggle="modal" data-target="#modal-delegate">
													<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Approve & Delegate"></i><i class="fa fa-user" ></i></button>
												<?php else:?>
												<button id = "approveRequest" type="button" class="btn btn-success pull-right" style="display:block;" data-toggle="modal" data-target="#modal-approve">
													<i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Approve"></i></button>
												<?php endif;?>
										</div>
										<!-- /.box-body -->
										<!-- /.box-footer -->
									</div>
									<!-- /.box -->
								</div>
						</div>
						<hr style="height:1px; background-color:black">
					</div>
					<!-- RFC GANTT END -->

					<!-- DELEGATE MODAL -->
					<div class="modal fade" id="modal-delegate">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title taskTitle"><?php echo $changeRequest['TASKTITLE'];?></h2>
									<h4 class="taskDates"><?php echo date_format($startDate, "F d, Y");?> - <?php echo date_format($endDate, "F d, Y");?>
										(<?php
											if($changeRequest['TASKADJUSTEDSTARTDATE'] != null && $changeRequest['TASKADJUSTEDENDDATE'] != null)
												$taskDuration = $changeRequest['adjustedTaskDuration2'];
											elseif($changeRequest['TASKSTARTDATE'] != null && $changeRequest['TASKADJUSTEDENDDATE'] != null)
												$taskDuration = $changeRequest['adjustedTaskDuration1'];
											else
												$taskDuration = $changeRequest['initialTaskDuration'];

										echo $taskDuration;?>
										<?php if($taskDuration > 1):?>
											 Days)
										<?php else:?>
											Day)
										<?php endif;?>
									</h4>
									<h4>Current Task Responsible: <?php echo $changeRequest['FIRSTNAME'] . " " .  $changeRequest['LASTNAME'];?></h4>
								</div>

								<div class="modal-body">
									<div id="raciDelegate">
									<!-- <div class="box box-danger"> -->
										<!-- /.box-header -->
										<div class="box-body" id ='delegateDiv'>
											<form id="raciForm" action="delegateTask" method="POST">

												<!-- TEAM DIV -->
												<div class="form-group raciDiv" id = "teamDiv">
												<table id="teamList" class="table table-bordered table-hover">
													<thead>
													<tr>
														<th>Department/Employee</th>
														<th class='text-center'>R*</th>
														<th class='text-center'>A</th>
														<th class='text-center'>C</th>
														<th class='text-center'>I</th>
														<!-- <th>No. of Projects (Ongoing & Planned)</th>
														<th>No. of Tasks (Ongoing & Planned)</th> -->
													</tr>
													</thead>

													<tbody id='assignment'>
														<!-- EXECUTIVES -->
														<?php foreach($users as $user):?>
															<?php if($user['departments_DEPARTMENTID'] == '1'):?>
															<tr>
																<td><?php echo $user['FIRSTNAME'] . " " .  $user['LASTNAME'];?></td>
																<td class='text-center'>
																	<div class="radio">
																	<label>
																		<input id='user<?php echo $user['USERID'];?>-1' class = "radioEmp" type="radio" name="responsibleEmp" value="<?php echo $user['USERID'];?>" required>
																	</label>
																</div>
																</td>
																<td class='text-center'>
																	<div class="checkbox">
																	<label>
																		<input id='user<?php echo $user['USERID'];?>-2' class = "checkEmp" type="checkbox" name="accountableEmp[]" value="<?php echo $user['USERID'];?>" required>
																	</label>
																</div>
																</td>
																<td class='text-center'>
																	<div class="checkbox">
																	<label>
																		<input id='user<?php echo $user['USERID'];?>-3' class = "checkEmp" type="checkbox" name="consultedEmp[]" value="<?php echo $user['USERID'];?>" required>
																	</label>
																</div>
																</td>
																<td class='text-center'>
																	<div class="checkbox">
																	<label>
																		<input id='user<?php echo $user['USERID'];?>-4' class = "checkEmp" type="checkbox" name="informedEmp[]" value="<?php echo $user['USERID'];?>" required>
																	</label>
																</div>
																</td>
															</tr>
															<?php endif;?>
														<?php endforeach;?>

														<!-- ALL DEPARTMENTS -->
														<?php foreach($departments as $department):?>
															<?php if($department['DEPARTMENTID'] != $_SESSION['departments_DEPARTMENTID'] && $department['DEPARTMENTNAME'] != 'Executive'):?>
																<tr>
																	<td><?php echo $department['DEPARTMENTNAME'];?></td>
																	<td class='text-center'>
																		<div class="radio">
																		<label>
																			<input id='user<?php echo $department['users_DEPARTMENTHEAD'];?>-1' class = "radioEmp" type="radio" name="responsibleEmp" value="<?php echo $department['users_DEPARTMENTHEAD'];?>" required>
																		</label>
																	</div>
																	</td>
																	<td class='text-center'>
																		<div class="checkbox">
																		<label>
																			<input id='user<?php echo $department['users_DEPARTMENTHEAD'];?>-2' class = "checkEmp" type="checkbox" name="accountableEmp[]" value="<?php echo $department['users_DEPARTMENTHEAD'];?>" required>
																		</label>
																	</div>
																	</td>
																	<td class='text-center'>
																		<div class="checkbox">
																		<label>
																			<input id='user<?php echo $department['users_DEPARTMENTHEAD'];?>-3' class = "checkEmp" type="checkbox" name="consultedEmp[]" value="<?php echo $department['users_DEPARTMENTHEAD'];?>" required>
																		</label>
																	</div>
																	</td>
																	<td class='text-center'>
																		<div class="checkbox">
																		<label>
																			<input id='user<?php echo $department['users_DEPARTMENTHEAD'];?>-4' class = "checkEmp" type="checkbox" name="informedEmp[]" value="<?php echo $department['users_DEPARTMENTHEAD'];?>" required>
																		</label>
																	</div>
																	</td>
																</tr>
															 <?php endif;?>
														<?php endforeach;?>

														<!-- STAFF IN DEPARTMENT -->
														<tr><td colspan = '7'></td></tr>

														<?php foreach($wholeDept as $employee):?>
															<tr>
																<?php $hasProjects = false;?>
																<?php foreach($projectCount as $count): ;?>
																	<?php $hasProjects = false;?>
																	<?php if ($count['USERID'] == $employee['USERID']):?>
																		<?php $hasProjects = $count['projectCount'];?>
																		<?php break;?>
																	<?php endif;?>
																<?php endforeach;?>
																<?php if ($hasProjects <= '0'):?>
																	<?php $hasProjects = 0;?>
																<?php endif;?>

																<?php $hasTasks = false;?>
																<?php foreach($taskCount as $count): ;?>
																	<?php $hasTasks = false;?>
																	<?php if ($count['USERID'] == $employee['USERID']):?>
																		<?php $hasTasks = $count['taskCount'];?>
																		<?php break;?>
																	<?php endif;?>
																<?php endforeach;?>
																<?php if ($hasTasks <= '0'):?>
																	<?php $hasTasks = 0;?>
																<?php endif;?>

																<td class='clickable moreInfo' data-id="<?php echo $employee['USERID'];?>"
																data-name="<?php echo $employee['FIRSTNAME'];?> <?php echo $employee['LASTNAME'];?>"
																data-projectCount = "<?php echo $hasProjects;?>"
																data-taskCount = "<?php echo $hasTasks;?>"><?php echo $employee['FIRSTNAME'] . " " .  $employee['LASTNAME'];?></td>
																<td class='text-center'>
																	<div class="radio">
																	<label>
																		<input id='user<?php echo $employee['USERID'];?>-1' class = "radioEmp" type="radio" name="responsibleEmp" value="<?php echo $employee['USERID'];?>" required>
																	</label>
																</div>
																</td>
																<td class='text-center'>
																	<div class="checkbox">
																	<label>
																		<?php if($employee['usertype_USERTYPEID'] == '5'):?>
																			<input disabled id='user<?php echo $employee['USERID'];?>-2' class = "checkEmp" type="checkbox" name="accountableEmp[]" value="<?php echo $employee['USERID'];?>" required>
																		<?php else:?>
																			<input id='user<?php echo $employee['USERID'];?>-2' class = "checkEmp" type="checkbox" name="accountableEmp[]" value="<?php echo $employee['USERID'];?>" required>
																		<?php endif;?>
																	</label>
																</div>
																</td>
																<td class='text-center'>
																	<div class="checkbox">
																	<label>
																		<?php if($employee['usertype_USERTYPEID'] == '5'):?>
																			<input disabled id='user<?php echo $employee['USERID'];?>-3' class = "checkEmp" type="checkbox" name="consultedEmp[]" value="<?php echo $employee['USERID'];?>" required>
																		<?php else:?>
																			<input id='user<?php echo $employee['USERID'];?>-3' class = "checkEmp" type="checkbox" name="consultedEmp[]" value="<?php echo $employee['USERID'];?>" required>
																		<?php endif;?>																</label>
																</div>
																</td>
																<td class='text-center'>
																	<div class="checkbox">
																	<label>
																		<?php if($employee['usertype_USERTYPEID'] == '5'):?>
																			<input disabled id='user<?php echo $employee['USERID'];?>-4' class = "checkEmp" type="checkbox" name="informedEmp[]" value="<?php echo $employee['USERID'];?>" required>
																		<?php else:?>
																			<input id='user<?php echo $employee['USERID'];?>-4' class = "checkEmp" type="checkbox" name="informedEmp[]" value="<?php echo $employee['USERID'];?>" required>
																		<?php endif;?>																	</label>
																</div>
																</td class='text-center'>

																<!-- <?php $hasProjects = false;?>
																<?php foreach($projectCount as $count): ;?>
																	<?php $hasProjects = false;?>
																	<?php if ($count['USERID'] == $employee['USERID']):?>
																		<td align="center"><?php echo $count['projectCount'];?></td>
																		<?php $hasProjects = $count['projectCount'];?>
																		<?php break;?>
																	<?php endif;?>
																<?php endforeach;?>
																<?php if ($hasProjects <= '0'):?>
																	<?php $hasProjects = 0;?>
																	<td align="center">0</td>
																<?php endif;?>

																<?php $hasTasks = false;?>
																<?php foreach($taskCount as $count): ;?>
																	<?php $hasTasks = false;?>
																	<?php if ($count['USERID'] == $employee['USERID']):?>
																		<td align="center"><?php echo $count['taskCount'];?></td>
																		<?php $hasTasks = $count['taskCount'];?>
																		<?php break;?>
																	<?php endif;?>
																<?php endforeach;?>
																<?php if ($hasTasks <= '0'):?>
																	<?php $hasTasks = 0;?>
																	<td align="center">0</td>
																<?php endif;?> -->
															 </tr>
														<?php endforeach;?>
													</tbody>
												</table>
												<p>* Only one department/employee is allowed to be assigned</p>

												</div>

										<!-- /.box-body -->
									</div>
								<!-- </div> -->

								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close"></i></button>
									<button type="button" id = "confirmDelegateBtn" class="btn btn-success delegate"><i class="fa fa-check"></i></button>
								</div>
							</form>
							</div>

							<!-- WORKLOAD ASSESSMENT -->
							<div id="workloadAssessment">

								<div class="modal-header">
									<h3 class="modal-title" id ="workloadEmployee">Employee Name</h3>
									<h4 id = "workloadProjects">Total Number of Projects: </h4>
									<h4 id = "workloadTasks">Total Number of Tasks: </h4>
								</div>
								<div class="modal-body" id = "workloadDiv">
								</div>
								<div class="modal-footer">
									<button type="button" id="backWorkload" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i></button>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- END DELEGATE -->

				<!-- CONFIRM DENY MODAL -->
				<div class="modal fade" id="modal-deny">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="modal-title taskTitle"><?php echo $changeRequest['TASKTITLE'];?></h2>
								<h4 class="taskDates"><?php echo date_format($startDate, "F d, Y");?> - <?php echo date_format($endDate, "F d, Y");?>
									(<?php
										if($changeRequest['TASKADJUSTEDSTARTDATE'] != null && $changeRequest['TASKADJUSTEDENDDATE'] != null)
											$taskDuration = $changeRequest['adjustedTaskDuration2'];
										elseif($changeRequest['TASKSTARTDATE'] != null && $changeRequest['TASKADJUSTEDENDDATE'] != null)
											$taskDuration = $changeRequest['adjustedTaskDuration1'];
										else
											$taskDuration = $changeRequest['initialTaskDuration'];

									echo $taskDuration;?>
									<?php if($taskDuration > 1):?>
										 Days)
									<?php else:?>
										Day)
									<?php endif;?>
								<h4>Current Task Responsible: <?php echo $changeRequest['FIRSTNAME'] . " " .  $changeRequest['LASTNAME'];?></h4>
							</div>
							<div class="modal-body">
								<div id="denyConfirm">
									<h4>Are you sure you want to deny this request?</h4>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-toggle="tooltip" data-placement="top" title="Deny"><i class="fa fa-close"></i></button>
										<button id = "confirmDenyBtn" type="submit" class="btn btn-success" data-id=""><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Confirm Deny"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

					<!-- APPROVE MODAL -->
					<div class="modal fade" id="modal-approve">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title taskTitle"><?php echo $changeRequest['TASKTITLE'];?></h2>
									<h4 class="taskDates"><?php echo date_format($startDate, "F d, Y");?> - <?php echo date_format($endDate, "F d, Y");?>
										(<?php
											if($changeRequest['TASKADJUSTEDSTARTDATE'] != null && $changeRequest['TASKADJUSTEDENDDATE'] != null)
												$taskDuration = $changeRequest['adjustedTaskDuration2'];
											elseif($changeRequest['TASKSTARTDATE'] != null && $changeRequest['TASKADJUSTEDENDDATE'] != null)
												$taskDuration = $changeRequest['adjustedTaskDuration1'];
											else
												$taskDuration = $changeRequest['initialTaskDuration'];

										echo $taskDuration;?>
										<?php if($taskDuration > 1):?>
											 Days)
										<?php else:?>
											Day)
										<?php endif;?>
									</h4>

									<h4>Current Task Responsible: <?php echo $changeRequest['FIRSTNAME'] . " " .  $changeRequest['LASTNAME'];?></h4>
								</div>

							<div class="modal-body">

								<!-- CONFIRM APPROVE -->
								<div id="approveConfirm">
									<h4>Are you sure you want to approve this request?</h4>
									<div class="modal-footer">
										<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-close" data-toggle="tooltip" data-placement="top" title="Close"></i></button>
										<button id = "confirmApproveBtn" type="submit" class="btn btn-success" data-id=""><i class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Approve"></i></button>
									</div>
								</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
					</div> <!-- END OF MODAL DIV -->

				<?php endif;?>

					<h1>
						<?php echo $projectProfile['PROJECTTITLE']; ?>
							<?php if ($projectProfile['PROJECTSTATUS'] == 'Planning'): ?>

								<form id="editProjectForm" action = 'newProject'  method="POST" style="display:inline-block">
									<input type='hidden' name='edit' value='<?php echo $projectProfile['PROJECTID'];?>'>
								</form>

								<a id="editProject" data-id="<?php echo $projectProfile['PROJECTID']; ?>"><i class="fa fa-edit"></i></a>
							<?php endif; ?>
					</h1>

					<ol class="breadcrumb">
						<li class ="active"><a href="<?php echo base_url("index.php/controller/myProjects"); ?>"><i class="fa fa-dashboard"></i> My Projects</a></li>
						<li class="active"><?php echo $projectProfile['PROJECTTITLE']; ?></li>
					</ol>

					<?php if($projectProfile['PROJECTSTATUS'] != 'Planning'): ?>

						<div class="col-md-3 col-sm-6 col-xs-12 pull-right">
								<div class="box-header with-border" style="text-align:center;">
									<h3 class="box-title"><?php echo $_SESSION['DEPARTMENTNAME'];?> Performance</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div style="display:inline-block; text-align:center; width:49%;">
										<div class="circlechart" id="completeness"
											data-percentage="<?php
												if($departmentCompleteness['completeness'] == NULL){
													echo 0;
												} else {
													if($departmentCompleteness['completeness'] == 100.00){
														echo 100;
													} elseif ($departmentCompleteness['completeness'] == 0.00) {
														echo 0;
	 												} else {
	 													echo $departmentCompleteness['completeness'];
	 												}
	 											}
 										 ?> "> Completeness
										</div>
									</div>
									<div style="display:inline-block; text-align:center; width:49%;">
										<div class="circlechart" id="completeness"
	 									 data-percentage="<?php
											 if($departmentTimeliness['timeliness'] == NULL){
												 echo 0;
											 } else {
												 if($departmentTimeliness['timeliness'] == 100.00){
													 echo 100;
												 } elseif ($departmentTimeliness['timeliness'] == 0.00) {
													 echo 0;
												 } else {
													 echo $departmentTimeliness['timeliness'];
												 }
											 }
										 ?> "> Timeliness
	 								 </div>
								 </div>
								</div>
						</div>
						<!-- /.col -->

						<?php
							$isResponsible = FALSE;
							foreach ($responsible as $r) {
								if($r['USERID'] == $_SESSION['USERID']){
									$isResponsible = TRUE;
									break;
								}
							}
						?>

						<?php if($isResponsible == TRUE): ?>
							<div class="col-md-3 col-sm-6 col-xs-12 pull-right" style="border-right: solid 1px #b3b3b3;">
									<div class="box-header with-border" style="text-align:center;">
										<h3 class="box-title">My Performance</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div style="display:inline-block; text-align:center; width:49%;">
											<div class="circlechart" id="completeness"
												data-percentage="<?php
													if($employeeCompleteness['completeness'] == NULL){
														echo 0;
													} else {
														if($employeeCompleteness['completeness'] == 100.00){
															echo 100;
														} elseif ($employeeCompleteness['completeness'] == 0.00) {
															echo 0;
														} else {
															echo $employeeCompleteness['completeness'];
														}
													}
													?> "> Completeness
											</div>
										</div>
										<div style="display:inline-block; text-align:center; width:49%;">
											<div class="circlechart" id="completeness"
		 									 data-percentage="<?php
											 if($employeeTimeliness['timeliness'] == NULL){
												 echo 0;
											 } else {
												 if($employeeTimeliness['timeliness'] == 100.00){
													 echo 100;
												 } elseif ($employeeTimeliness['timeliness'] == 0.00) {
													 echo 0;
												 } else {
													 echo $employeeTimeliness['timeliness'];
												 }
											 }
											 ?> ">Timeliness
		 								 </div>
									 </div>
									</div>
							</div>
						<?php endif;?>
					<?php endif; ?>

					<!-- /.col -->
				</section>

				<!-- Main content -->
				<section class="content container-fluid">

					<h4>Project Owner: <?php echo $projectProfile['FIRSTNAME']; ?> <?php echo $projectProfile['LASTNAME']; ?></h4>
					<h4>Description: <?php echo $projectProfile['PROJECTDESCRIPTION']; ?></h4>
					<div>

						<?php
						$startdate = date_create($projectProfile['PROJECTSTARTDATE']);
						$enddate = date_create($projectProfile['PROJECTENDDATE']);
						$current = date_create(date("Y-m-d")); // get current date
						?>

						<h4>Initial Duration: <?php echo date_format($startdate, "F d, Y"); ?> to <?php echo date_format($enddate, "F d, Y"); ?>
							(<?php echo $projectProfile['duration'];?>
							<?php if($projectProfile['duration'] > 1):?>
								days)
							<?php else:?>
								day)
							<?php endif;?>
						</h4>

						<?php if ($projectProfile['PROJECTSTATUS'] == 'Archived' || $projectProfile['PROJECTSTATUS'] == 'Complete'):?>
							<?php $actualEnd = date_create($projectProfile['PROJECTACTUALENDDATE']);?>

							<h4 style="color:red">Actual Duration: <?php echo date_format($startdate, "F d, Y"); ?> to <?php echo date_format($actualEnd, "F d, Y"); ?>
								(<?php echo $projectProfile['actualDuration'];?>
								<?php if($projectProfile['actualDuration'] > 1):?>
									days)
								<?php else:?>
									day)
								<?php endif;?>
							</h4>

						<?php else:?>

							<h4 style="color:red">
								<?php if ($current >= $startdate && $current <= $enddate && $projectProfile['PROJECTSTATUS'] == 'Ongoing'):?>
									<?php echo $projectProfile['remaining'];?>
									<?php if($projectProfile['remaining'] > 1):?>
										days remaining
									<?php else:?>
										day remaining
									<?php endif;?>
								<?php elseif ($current < $startdate && $projectProfile['PROJECTSTATUS'] == 'Planning'):?>
									Launch in <?php echo $projectProfile['launching'];?>
									<?php if($projectProfile['launching'] > 1):?>
										days
									<?php else:?>
										day
									<?php endif;?>
								<?php elseif ($current >= $startdate && $current >= $enddate && $projectProfile['PROJECTSTATUS'] == 'Ongoing'):?>
									<?php echo $projectProfile['delayed'];?>
									<?php if($projectProfile['delayed'] > 1):?>
										days delayed
									<?php else:?>
										day delayed
									<?php endif;?>
								<?php endif;?>
							</h4>

						<?php endif;?>

						<form name="gantt" action ='projectDocuments' method="POST" id ="prjID">
							<input type="hidden" name="project_ID" value="<?php echo $projectProfile['PROJECTID']; ?>">
							<input type="hidden" name="projectID_logs" value="<?php echo $projectProfile['PROJECTID']; ?>">
						</form>

						<form name="gantt" action ='parkProject' method="POST" id ="parkProj">
							<input type="hidden" name="project_ID" value="<?php echo $projectProfile['PROJECTID']; ?>">
						</form>

						<!-- IF USING GET METHOD
						<a href="<?php echo base_url("index.php/controller/projectDocuments/?id=") . $projectProfile['PROJECTID']; ?>" name="PROJECTID" class="btn btn-success btn-xs" id="projectDocu"><i class="fa fa-folder"></i> View Documents</a> -->
						<!-- <a href="<?php echo base_url("index.php/controller/projectLogs/?id=") . $projectProfile['PROJECTID']; ?>"class="btn btn-default btn-xs"><i class="fa fa-flag"></i> View Logs</a> -->

						<a name="PROJECTID" class="btn btn-success btn" id="projectDocu" data-toggle="tooltip" data-placement="top" title="View Documents"><i class="fa fa-folder"></i></a>

						<a name="PROJECTID_logs" class="btn btn-success btn" id="projectLog" data-toggle="tooltip" data-placement="top" title="View Logs"><i class="fa fa-flag"></i></a>

						<?php if ($projectProfile['PROJECTSTATUS'] == 'Complete'): ?>

							<form action = 'archiveProject' method="POST" style="display:inline-block">
							</form>
							<a name="" class="btn btn-primary btn" id="archiveProject" data-toggle="tooltip" data-placement="top" title="Archive Project"><i class="fa fa-archive"></i></a>

						<?php elseif($projectProfile['PROJECTSTATUS'] == 'Archived' && !isset($_SESSION['templates']) && !isset($_SESSION['templateProjectGantt'])): ?>

							<form action = 'templateProject' method="POST" style="display:inline-block">
							</form>
							<a name="" class="btn btn-default btn" id="templateProject" data-toggle="tooltip" data-placement="top" title="Template this Project"><i class="fa fa-window-maximize"></i></a>

						<?php elseif (isset($_SESSION['templates']) || isset($_SESSION['templateProjectGantt'])): ?>
							<form action = 'newProject' method="POST" style="display:inline-block">
							</form>
							<a name="" class="btn btn-default btn" id="useTemplate" data-toggle="tooltip" data-placement="top" title="Use this as Template"><i class="fa fa-window-maximize"></i></a>
						<?php endif; ?>

						<?php if($projectProfile['PROJECTSTATUS'] == 'Ongoing'): ?>
							<a name="" class="btn btn-default btn" id="parkProject" data-toggle="tooltip" data-placement="top" title="Park Project"><i class="fa fa-clock-o"></i></a>
						<?php endif;?>

						<?php if($projectProfile['PROJECTSTATUS'] == 'Parked'): ?>
							<a name="" class="btn btn-default btn" id="continueProject" data-toggle="tooltip" data-placement="top" title="Continue Project"><i class="fa fa-clock-o"></i></a>
						<?php endif;?>

					</div>
					<br>
					<div id="container" style="height: 600px;"></div>

					<!-- </section> -->
				</section>
					</div>
			<?php require("footer.php"); ?>
		</div>
		<script>

		$(document).on("click", "#archiveProject", function() {
			var $id = <?php echo $projectProfile['PROJECTID']; ?>;
			$("form").attr("name", "formSubmit");
			$("form").append("<input type='hidden' name='project_ID' value= " + $id + ">");
			$("form").submit();
			});

			$(document).on("click", "#templateProject", function() {
				var $id = <?php echo $projectProfile['PROJECTID']; ?>;
				$("form").attr("name", "formSubmit");
				$("form").append("<input type='hidden' name='project_ID' value= " + $id + ">");
				$("form").submit();
				});

				$(document).on("click", "#useTemplate", function() {
					var $id = <?php echo $projectProfile['PROJECTID']; ?>;
					$("form").attr("name", "formSubmit");
					$("form").append("<input type='hidden' name='project_ID' value= " + $id + ">");
					$("form").submit();
					});

				$(document).on("click", "#editProject", function() {
					var $id = <?php echo $projectProfile['PROJECTID']; ?>;
					$("#editProjectForm").append("<input type='hidden' name='project_ID' value= " + $id + ">");
					$("#editProjectForm").submit();
					});

			$("#myProjects").addClass("active");

			// $("#projectDocu").click(function()
			// {
			// 	("#gantt").submit();
      // });

			// RFC APPROVAL SCRIPT

			$("body").on("click", function(){ // REMOVE ALL SELECTED IN MODAL
				if($("#modal-approve").css("display") == 'none')
				{
					// $(".radioEmp").prop("checked", false);
					// $(".checkEmp").prop("checked", false);
					$(".select2").val(null).trigger("change");
					$("#workloadAssessment").hide();
					$("#delegateConfirm").hide();
					$("#approveConfirm").show();
					$("#raciDelegate").show();
				}
			});

			$(document).on("click", "#confirmDelegateBtn", function() { // approve with delegate
				$(".checkEmp").prop('disabled', false);
				$(".radioEmp").prop('disabled', false);

				var $request = $("#approvalForm").attr('data-request');
				var $project = $("#approvalForm").attr('data-project');
				var $task = $("#approvalForm").attr('data-task');
				var $type = $("#approvalForm").attr('data-type');
				var $requestor = $("#approvalForm").attr('data-requestor');
				$("#approvalForm").attr("name", "formSubmit");
				$("#approvalForm").append("<input type='hidden' name='request_ID' value= '" + $request + "'>");
				$("#approvalForm").append("<input type='hidden' name='request_type' value= '" + $type + "'>");
				$("#approvalForm").append("<input type='hidden' name='project_ID' value= '" + $project + "'>");
				$("#approvalForm").append("<input type='hidden' name='task_ID' value= '" + $task + "'>");
				$("#approvalForm").append("<input type='hidden' name='requestor_ID' value= '" + $requestor + "'>");
				$("#approvalForm").append("<input type='hidden' name='status' value= 'Approved'>");
				$("#approvalForm").submit();
				});

			$(document).on("click", "#confirmDenyBtn", function() { // deny
				var $request = $("#approvalForm").attr('data-request');
				var $project = $("#approvalForm").attr('data-project');
				var $task = $("#approvalForm").attr('data-task');
				var $type = $("#approvalForm").attr('data-type');
				var $requestor = $("#approvalForm").attr('data-requestor');
				$("#approvalForm").attr("name", "formSubmit");
				$("#approvalForm").append("<input type='hidden' name='request_ID' value= '" + $request + "'>");
				$("#approvalForm").append("<input type='hidden' name='request_type' value= '" + $type + "'>");
				$("#approvalForm").append("<input type='hidden' name='project_ID' value= '" + $project + "'>");
				$("#approvalForm").append("<input type='hidden' name='task_ID' value= '" + $task + "'>");
				$("#approvalForm").append("<input type='hidden' name='requestor_ID' value= '" + $requestor + "'>");
				$("#approvalForm").append("<input type='hidden' name='status' value= 'Denied'>");
				$("#approvalForm").submit();
				});

			$(document).on("click", "#confirmApproveBtn", function() { // approve without delegate
				var $request = $("#approvalForm").attr('data-request');
				var $project = $("#approvalForm").attr('data-project');
				var $task = $("#approvalForm").attr('data-task');
				var $type = $("#approvalForm").attr('data-type');
				var $requestor = $("#approvalForm").attr('data-requestor');
				$("#approvalForm").attr("name", "formSubmit");
				$("#approvalForm").append("<input type='hidden' name='request_ID' value= '" + $request + "'>");
				$("#approvalForm").append("<input type='hidden' name='request_type' value= '" + $type + "'>");
				$("#approvalForm").append("<input type='hidden' name='project_ID' value= '" + $project + "'>");
				$("#approvalForm").append("<input type='hidden' name='task_ID' value= '" + $task + "'>");
				$("#approvalForm").append("<input type='hidden' name='requestor_ID' value= '" + $requestor + "'>");
				$("#approvalForm").append("<input type='hidden' name='status' value= 'Approved'>");
				$("#approvalForm").submit();
				});

				$("body").on("click", ".delegateApprove", function(){
					var $id = $(this).attr('data-id');
					var $user = $(this).attr('data-user');

					$.ajax({
						type:"POST",
						url: "<?php echo base_url("index.php/controller/getRACIByTaskID"); ?>",
						data: {taskID: $id},
						dataType: 'json',
						success:function(data)
						{
							for(x=0; data['raci'].length >x; x++)
							{
								$("#user" + data['raci'][x].users_USERID + "-" + data['raci'][x].ROLE).prop('checked', true);
								if((data['raci'][x].ROLE == '3' || data['raci'][x].ROLE == '4') && <?php echo $_SESSION['usertype_USERTYPEID'];?> == '4')
								{
									$("#user" + data['raci'][x].users_USERID + "-" + data['raci'][x].ROLE).prop('disabled', true);
								}
								if(data['raci'][x].ROLE == '1' && data['raci'][x].users_USERID == $user)
								{
									$("#user" + data['raci'][x].users_USERID + "-" + data['raci'][x].ROLE).prop('checked', false);
									$("#user" + data['raci'][x].users_USERID + "-" + data['raci'][x].ROLE).prop('disabled', true);
								}
							}
						},
						error:function(data)
						{
							alert("There was a problem with loading the RACI");
						}
					});
				});

				$("body").on("click", ".moreInfo", function(){
					alert("clicked");

					function loadWorkloadTasks($projectID)
					{
						$.ajax({
							type:"POST",
							url: "<?php echo base_url("index.php/controller/getUserWorkloadTasks"); ?>",
							data: {userID: $id, projectID: $projectID},
							dataType: 'json',
							success:function(data)
							{
								for(t=0; t<data['workloadTasks'].length; t++)
								{
									var taskStart = moment(data['workloadTasks'][t].TASKSTARTDATE).format('MMM DD, YYYY');
									var taskEnd = moment(data['workloadTasks'][t].TASKENDDATE).format('MMM DD, YYYY');

									$("#project_" + $projectID).append("<tr>" +
													 "<td>" + data['workloadTasks'][t].TASKTITLE + "</td>" +
													 "<td>" + taskStart + "</td>" +
													 "<td>" + taskEnd + "</td>" +
													 "<td>" + data['workloadTasks'][t].TASKSTATUS + "</td>" +
													 "</tr>");
								}
							},
							error:function()
							{
								alert("Failed to retrieve user data.");
							}
						});
					 }

					var $id = $(this).attr('data-id');
					var $projectCount = $(this).attr('data-projectCount');
					var $taskCount = $(this).attr('data-taskCount');
					$("#workloadEmployee").html($(this).attr('data-name'));
					$("#workloadProjects").html("Total Number of Projects: " + $projectCount);
					$("#workloadTasks").html("Total Number of Tasks: " + $taskCount);
					$('#workloadDiv').html("");
					$("#workloadAssessment").show();
					$("#raciDelegate").hide();

					$.ajax({
						type:"POST",
						url: "<?php echo base_url("index.php/controller/getUserWorkloadProjects"); ?>",
						data: {userID: $id},
						dataType: 'json',
						success:function(data)
						{
							$('#workloadDiv').html("");
							for(p=0; p<data['workloadProjects'].length; p++)
							{
								var $projectID = data['workloadProjects'][p].PROJECTID;
								$('#workloadDiv').append("<div class = 'box'>" +
												 "<div class = 'box-header'>" +
													 "<h3 class = 'box-title text-blue'> " + data['workloadProjects'][p].PROJECTTITLE + "</h3>" +
												 "</div>" +
												 "<div class = 'box-body table-responsive no-padding'>" +
													 "<table class='table table-hover' id='project_" + $projectID + "'>" +
														 "<th>Task Name</th>" +
														 "<th>Start Date</th>" +
														 "<th>End Date</th>" +
														 "<th>Status</th>");

								 loadWorkloadTasks($projectID);

								 $('#workloadDiv').append("</table>" +
																					 "</div>" +
																				 "</div>");
							}
						},
						error:function()
						{
							alert("Failed to retrieve user data.");
						}
					});

				});

			$("#backWorkload").click(function(){

				$("#raciDelegate").show();
				$("#workloadAssessment").hide();

			});

		</script>

		<!-- Javascript for Tasks -->

		<script>

			$('.select2').select2()
			$('.circlechart').circlechart(); // Initialization

			$(function ()
			{
				//Date picker
 	     $('#startDate').datepicker({
 	       autoclose: true
 	     });

 	     $('#endDate').datepicker({
 	       autoclose: true
 	     });
		 });

			$("#projectDocu").click(function() //redirect to individual project profile
      {
				$("#prjID").submit();
      });

			$("#projectLog").click(function() //redirect to individual project logs
      {
				$("#prjID").attr("action","projectLogs");
				$("#prjID").submit();
      });

			$("#parkProject").click(function() //submitPark
      {
				$("#parkProj").submit();
      });

			$("#continueProject").click(function() //submitPark
      {
				alert("Continue Project");
      });

		</script>

		<script>

		// PROJECT GANTT START
			anychart.onDocumentReady(function (){

				var rawData = [
					<?php

					foreach ($ganttData as $key => $value) {

						// START: Formatting of TARGET START date
						$targetStartDate = $value['TASKSTARTDATE'];
						$formatted_startDate = date('Y-m-d', strtotime($targetStartDate));
						// END: Formatting of TARGET START date

						// START: Formatting of TARGET END date
						$targetEndDate = $value['TASKENDDATE'];
						$formatted_endDate = date('Y-m-d', strtotime($targetEndDate));
						// END: Formatting of TARGET END date

						// START: Formatting of ACTUAL START date
						$actualStartDate = $value['TASKACTUALSTARTDATE'];
						$formatted_actualStartDate = date('Y-m-d', strtotime($actualStartDate));
						// END: Formatting of ACTUAL START date

						// START: Formatting of ACTUAL END date
						$actualEndDate = $value['TASKACTUALENDDATE'];
						$formatted_actualEndDate = date('Y-m-d', strtotime($actualEndDate));
						// END: Formatting of ACTUAL END date

						// // START: Formatting of ADJUSTED START date
						// $adjustedStartDate = $value['TASKADJUSTEDSTARTDATE'];
						// $formatted_adjustedStartDate = date('Y-m-d', strtotime($adjustedStartDate));
						// // END: Formatting of ACTUAL END date
						//
						// // START: Formatting of ADJUSTED END date
						// $adjustedEndDate = $value['TASKADJUSTEDENDDATE'];
						// $formatted_adjustedEndDate = date('Y-m-d', strtotime($adjustedEndDate));
						// // END: Formatting of ACTUAL END date

						// START: Checks for progress value
						$progress = '0';
						if($value['TASKSTATUS'] == 'Complete' && $value['CATEGORY'] == 3){
							$progress = 100;
						}
						// END: Checks for progress value

						// START: Checks for parent
						$parent = '0';
						if($value['tasks_TASKPARENT'] != NULL){
							$parent = $value['tasks_TASKPARENT'];
						}
						// END: Checks for parent

						// // START: Checks for period
						// $period = '';
						// if($value['TASKADJUSTEDSTARTDATE'] == NULL && $value['TASKADJUSTEDENDDATE'] == NULL){
						// 	$period = $value['initialTaskDuration'];
						// } else if ($value['TASKADJUSTEDSTARTDATE'] == NULL && $value['TASKADJUSTEDENDDATE'] != NULL){
						// 	$period = $value['adjustedTaskDuration1'];
						// } else {
						// 	$period = $value['adjustedTaskDuration2'];
						// }
						// echo "<script>console.log(".$period.");</script>";
						// // END: Checks for period

						// START: Checks for dependecies
						$dependency = '';
						$type = '';
						foreach ($dependencies as $data) {
							if($data['PRETASKID'] == $value['TASKID']){
								$dependency = $data['tasks_POSTTASKID'];
								$type = 'finish-start';
							}
						}
						// END: Checks for dependecies

						// START: Checks for responsible
						$responsiblePerson = '';
						foreach ($responsible as $r) {
							if($r['tasks_TASKID'] == $value['TASKID']){
								$responsiblePerson = $r['FIRSTNAME'] . " " . $r['LASTNAME'];
							}
						}
						// END: Checks for responsible

						// START: Checks for accountable
						$accountablePerson = '';
						foreach ($accountable as $a) {
							if($a['tasks_TASKID'] == $value['TASKID']){
								$accountablePerson = $a['FIRSTNAME'] . " " . $a['LASTNAME'];
							}
						}
						// END: Checks for accountable

						// START: Checks for consulted
						$consultedPerson = '';
						foreach ($consulted as $c) {
							if($c['tasks_TASKID'] == $value['TASKID']){
								$consultedPerson = $c['FIRSTNAME'] . " " . $c['LASTNAME'];
							}
						}
						// END: Checks for consulted

						// START: Checks for informed
						$informedPerson = '';
						foreach ($informed as $i) {
							if($i['tasks_TASKID'] == $value['TASKID']){
								$informedPerson = $c['FIRSTNAME'] . " " . $i['LASTNAME'];
							}
						}
						// END: Checks for informed

						//START: CHECKS IF RACI IS EMPTY
						if($accountable == NULL || $consulted == NULL || $informed == NULL){
							echo "
							{
								'id': " . $value['TASKID'] . ",
								'name': '" . $value['TASKTITLE'] . "',
								'actualStart': '" . $formatted_startDate .  "T00:00',
								'actualEnd': '" . $formatted_endDate . "T13:00',
								'responsible': '',
								'accountable': '',
								'consulted': '',
								'informed': '',
								'period': '" . $value['initialTaskDuration'] . "',
								'progressValue': '0%',
								'parent': '" . $parent . "'
							},";
						} else { // START: RACI IS NOT EMPTY
							// START: CHECKS IF MAIN OR SUB
							if($value['CATEGORY'] == 2 || $value['CATEGORY'] == 1){
								// START: Planning - no baseline since task have not yet started
								if(($value['TASKACTUALSTARTDATE'] == NULL)){
									echo "
									{
										'id': " . $value['TASKID'] . ",
										'name': '" . $value['TASKTITLE'] . "',
										'actualStart': '" . $formatted_startDate . "',
										'actualEnd': '" . $formatted_endDate . "',
										'responsible': '" . $responsiblePerson  ."',
										'accountable': '" . $accountablePerson ."',
										'consulted': '" . $consultedPerson  ."',
										'informed': '" . $informedPerson  ."',
										'period': '" . $value['initialTaskDuration'] . "',
										'parent': '" . $parent . "',
										'connectTo': '" . $dependency . "',
										'connectorType': '" . $type . "'
									},";
								} // END: Planning - no baseline since task have not yet started

								// START: Ongoing tasks - baselineEnd is the date today
								else if($value['TASKACTUALENDDATE'] == NULL){
									// not delayed
									if($value['TASKENDDATE'] > date('Y-m-d')){ // ongoing but not delayed
										// echo "<script> console.log(''); </script>";
										$color = "green";
									} else { // ongoing and delayed
										// echo "<script> console.log(''); </script>";
										$color = "#F53006";
									}
									echo "
									{
										'id': " . $value['TASKID'] . ",
										'name': '" . $value['TASKTITLE'] . "',
										'actualStart': '" . $formatted_startDate . "',
										'actualEnd': '" . $formatted_endDate . "',
										'responsible': '" . $responsiblePerson  ."',
										'accountable': '" . $accountablePerson ."',
										'consulted': '" . $consultedPerson  ."',
										'informed': '" . $informedPerson  ."',
										'period': '" . $value['initialTaskDuration'] ."',
										'parent': '" . $parent . "',
										'connectTo': '" . $dependency . "',
										'connectorType': '" . $type . "',
										'baselineStart': '" . $formatted_actualStartDate . "',
										'baselineEnd': '" . date('M d, Y') . "',
										'baseline':{'fill': '" .$color. "'},
									},";
								} // END: Ongoing tasks - baselineEnd is the date today

								// START: Completed tasks - baselineStart and baselineEnd are present
								else {
									echo "
									{
										'id': " . $value['TASKID'] . ",
										'name': '" . $value['TASKTITLE'] . "',
										'actualStart': '" . $formatted_startDate . "',
										'actualEnd': '" . $formatted_endDate . "',
										'responsible': '" . $responsiblePerson  ."',
										'accountable': '" . $accountablePerson ."',
										'consulted': '" . $consultedPerson  ."',
										'informed': '" . $informedPerson  ."',
										'period': '" . $value['initialTaskDuration'] . "',
										'parent': '" . $parent . "',
										'connectTo': '" . $dependency . "',
										'connectorType': '" . $type . "',
										'baselineStart': '" . $formatted_actualStartDate . "',
										'baselineEnd': '" . $formatted_actualEndDate . "'
									},";
								} // END: Completed tasks - baselineStart and baselineEnd are present

							} else { // START: IF TASK
								if(($value['TASKACTUALSTARTDATE'] == NULL)){
									echo "
									{
										'id': " . $value['TASKID'] . ",
										'name': '" . $value['TASKTITLE'] . "',
										'actualStart': '" . $formatted_startDate . "',
										'actualEnd': '" . $formatted_endDate . "',
										'responsible': '" . $responsiblePerson  ."',
										'accountable': '" . $accountablePerson ."',
										'consulted': '" . $consultedPerson  ."',
										'informed': '" . $informedPerson  ."',
										'period': '" . $value['initialTaskDuration'] . "',
										'progressValue': '" . $progress . "%',
										'parent': '" . $parent . "',
										'connectTo': '" . $dependency . "',
										'connectorType': '" . $type . "'
									},";
								} // END: Planning - no baseline since task have not yet started

								// START: Ongoing tasks - baselineEnd is the date today
								else if($value['TASKACTUALENDDATE'] == NULL){
									echo "
									{
										'id': " . $value['TASKID'] . ",
										'name': '" . $value['TASKTITLE'] . "',
										'actualStart': '" . $formatted_startDate . "',
										'actualEnd': '" . $formatted_endDate . "',
										'responsible': '" . $responsiblePerson  ."',
										'accountable': '" . $accountablePerson ."',
										'consulted': '" . $consultedPerson  ."',
										'informed': '" . $informedPerson  ."',
										'period': '" . $value['initialTaskDuration'] . "',
										'progressValue': '" . $progress . "%',
										'parent': '" . $parent . "',
										'connectTo': '" . $dependency . "',
										'connectorType': '" . $type . "',
										'baselineStart': '" . $formatted_actualStartDate ."',
										'baselineEnd': '" . date('M d, Y') . "'
									},";
								} // END: Ongoing tasks - baselineEnd is the date today

								// START: Completed tasks - baselineStart and baselineEnd are present
								else {
									echo "
									{
										'id': " . $value['TASKID'] . ",
										'name': '" . $value['TASKTITLE'] . "',
										'actualStart': '" . $formatted_startDate . "',
										'actualEnd': '" . $formatted_endDate . "',
										'responsible': '" . $responsiblePerson  ."',
										'accountable': '" . $accountablePerson ."',
										'consulted': '" . $consultedPerson  ."',
										'informed': '" . $informedPerson  ."',
										'period': '" . $value['initialTaskDuration'] ."',
										'progressValue': '" . $progress . "%',
										'parent': '" . $parent . "',
										'connectTo': '" . $dependency . "',
										'connectorType': '" . $type . "',
										'baselineStart': '" . $formatted_actualStartDate . "',
										'baselineEnd': '" . $formatted_actualEndDate . "'
									},";
								} // END: Completed tasks - baselineStart and baselineEnd are present
							} // END: CHECKS FOR CATEGORY
						} // END: CHECKS IF RACI IS EMPTY OR NOT
					} // END: Foreach
					?>

				];

				// data tree settings
				var treeData = anychart.data.tree(rawData, "as-table");
				var chart = anychart.ganttProject();      // chart type
				chart.data(treeData);                     // chart data

				// data grid getter
				var dataGrid = chart.dataGrid();

				dataGrid.column(0).labels({hAlign: 'center'});

				// create custom column
				var columnTitle = dataGrid.column(1);
				columnTitle.title("Task Name");
				columnTitle.setColumnFormat("name", "text");
				columnTitle.width(300);

				var columnStartDate = dataGrid.column(2);
				columnStartDate.title("Target Start Date");
				columnStartDate.labels({hAlign: 'center'});
				columnStartDate.setColumnFormat("actualStart", {
					"formatter": dateFormatter
				});
				columnStartDate.width(100);

				var columnEndDate = dataGrid.column(3);

				columnEndDate.title("Target End Date");
				columnEndDate.labels({hAlign: 'center'});
				columnEndDate.setColumnFormat("actualEnd", {
					"formatter": dateFormatter
				});
				columnEndDate.width(100);

				var columnPeriod = dataGrid.column(4);
				columnPeriod.title("Period");
				columnPeriod.setColumnFormat("period", "text");
				columnPeriod.width(80);
				columnPeriod.labels({hAlign: 'center'});

				var columnResponsible = dataGrid.column(5);
				columnResponsible.title("Responsible");
				columnResponsible.setColumnFormat("responsible", "text");
				columnResponsible.width(100);

				var columnAccountable = dataGrid.column(6);
				columnAccountable.title("Accountable");
				columnAccountable.setColumnFormat("accountable", "text");
				columnAccountable.width(100);

				var columnConsulted = dataGrid.column(7);
				columnConsulted.title("Consulted");
				columnConsulted.setColumnFormat("consulted", "text");
				columnConsulted.width(100);

				var columnInformed = dataGrid.column(9);
				columnInformed.title("Informed");
				columnInformed.setColumnFormat("informed", "text");
				columnInformed.width(100);

				chart.splitterPosition(650);
				chart.zoomTo("week", 2);
				chart.container('container').draw();      // set container and initiate drawing
			});

			function dateFormatter (value){
				// var stringDate = strtotime(value);
				var date = new Date(value);
				var month = date.toLocaleDateString("en-US", {month: "short"});
				var day = date.getDate();
				if(day < 10){
					day = "0"+day;
				}
				var year = date.getFullYear()
				return month + " " + day + ", " + year;
			}

		</script>
	</body>
</html>
