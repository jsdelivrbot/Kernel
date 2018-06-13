<html>
	<head>
		<title>Kernel - Add Tasks</title>
		<!-- <link rel = "stylesheet" href = "<?php echo base_url("/assets/css/newProjectTaskStyle.css")?>"> -->
	</head>
	<body class="hold-transition skin-red sidebar-mini">
		<?php require("frame.php"); ?>

			<div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <h1>
		        <?php echo $project['PROJECTTITLE'] ?>

						<?php if ($dateDiff <= 1):
							$diff = $dateDiff + 1;?>
							<small><?php echo $project['PROJECTSTARTDATE'] . " - " . $project['PROJECTENDDATE'] . "\t" . $diff . " day remaining"?></small>
							<?php endif; ?>

						<?php if ($dateDiff > 1):
							$diff = $dateDiff + 1;
							?>
						<small><?php echo $project['PROJECTSTARTDATE'] . " - " . $project['PROJECTENDDATE'] . "\t" . $diff . " days remaining"?></small>
						<?php endif; ?>
		      </h1>
		      <ol class="breadcrumb">
		        <li class ="active"><a href="<?php echo base_url("index.php/controller/myProjects"); ?>"><i class="fa fa-dashboard"></i> My Projects</a></li>
		        <li class="active">New Project</li>
						<li class="active"><?php echo $project['PROJECTTITLE'] . " Tasks" ?></li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content container-fluid">
					<div class="row">
		        <div class="col-xs-12">
		          <div class="box">
		            <div class="box-header">
		              <h3 class="box-title">Enter all tasks for this project</h3>
		              <div class="box-tools">
		                <div class="input-group input-group-sm" style="width: 150px;">
		                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

		                  <div class="input-group-btn">
		                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
		                  </div>
		                </div>
		              </div>
		            </div>
		            <!-- /.box-header -->
								<form id='addTasks' name = 'addTasks' action='' method="POST">
		            <div class="box-body table-responsive no-padding">
		              <table class="table table-hover" id="table">
		                <tr>
		                  <th>No.</th>
		                  <th>Category</th>
											<th>Title</th>
											<th>Department</th>
											<th></th>
											<th></th>
		                </tr>

		                <tr id="row0">
											<td>1</td>
		                  <td><div class="form-group">
			                  <select class="form-control" name = "category[]" required>
													<option disabled selected value> -- Select Category -- </option>
													<option>Main Activity</option>
				                  <option>Sub Activity</option>
				                  <option>Task</option>
			                  </select>
			                </div></td>
		                  <td><div class="form-group">
			                  <input type="text" class="form-control" placeholder="Enter task title" name = "title[]" required>
			                </div></td>
											<td><select class="form-control" name = "department[]" required>
												<option disabled selected value> -- Select Department -- </option>

												<?php foreach ($departments as $row): ?>

													<option>
														<?php echo $row['DEPARTMENTNAME']; ?>
													</option>

											<?php endforeach; ?>
											</select></td>
										<td class="btn" id="addRow"><a class="btn addButton"><i class="glyphicon glyphicon-plus-sign"></i></a></td>
										<td class='btn'><a class='btn delButton' data-id = " + i +"><i class='glyphicon glyphicon-trash'></i></a></td>
										<!-- <td class="btn"><a class="btn delButton"></a></td> -->
		                </tr>

										<tr id="row1"></tr>

		              </table>
								</form>

								</div>
		            <!-- /.box-body -->
								<div class="box-footer">
									<button type="button" class="btn btn-success">Previous: Project details</button>
									<button type="button" class="btn btn-success pull-right" id="arrangeTask" data-id= <?php echo $project['PROJECTID']; ?>>Next: Arrange tasks</button>
									<button type="button" class="btn btn-primary pull-right" style="margin-right: 5%">Save</button>
								</div>
		          </div>
		          <!-- /.box -->
		        </div>

				</div>

		      </div>
		    </section>
		    <!-- /.content -->
				<?php require("footer.php"); ?>

		  </div>

		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED JS SCRIPTS -->

		<script>
			$("#myProjects").addClass("active");

		  $(function ()
			{
				//Initialize Select2 Elements
		    $('.select2').select2()

				//Date picker
 	     $('#taskStartDate').datepicker({
 	       autoclose: true
 	     })

 	     $('#taskEndDate').datepicker({
 	       autoclose: true
 	     })
		 });

		 $(document).ready(function() {

			 var i = 1;
			 var x = 2;

			 $(document).on("click", "a.addButton", function() {

				 $('#row' + i).html("<td id='num" + i + "'>" + x + "</td><td><div class='form-group'><select class ='form-control' name = 'category[]' required><option disabled selected value> -- Select Category -- </option><option>Main Activity</option><option>Sub Activity</option><option>Task</option></select></div></td> <td><div class ='form-group'><input type='text' class='form-control' placeholder='Enter task title' name ='title[]' required></div></td>  <td><select class='form-control' id ='dept' name = 'department[]' required><option disabled selected value> -- Select Department -- </option>" + "<?php foreach ($departments as $row) { echo '<option>' . $row['DEPARTMENTNAME'] . '</option>'; } ?>" + "</select></td>  <td class='btn'><a class='btn addButton'><i class='glyphicon glyphicon-plus-sign'></i></a></td> <td class='btn'><a class='btn delButton' data-id = " + i +" counter = " + x + "><i class='glyphicon glyphicon-trash'></i></a></td>");

					 // $('#row' + i).html("<td id='num" + i + "'>" + x + "</td><td><div class='form-group'><select class ='form-control' name = 'category" + i + "'><option disabled selected value> -- Select Category -- </option><option>Main Activity</option><option>Sub Activity</option><option>Task</option></select></div></td> <td><div class ='form-group'><input type='text' class='form-control' placeholder='Enter task title' name ='title" + i +"'</div></td>  <td><select class='form-control' id ='dept' name = 'department" + i +"'><option disabled selected value> -- Select Department -- </option>" + "<?php foreach ($departments as $row) { echo '<option>' . $row['DEPARTMENTNAME'] . '</option>'; } ?>" + "</select></td>  <td class='btn'><a class='btn addButton'><i class='glyphicon glyphicon-plus-sign'></i></a></td> <td class='btn'><a class='btn delButton' data-id = " + i +" counter = " + x + "><i class='glyphicon glyphicon-trash'></i></a></td>");

					 $('#table').append('<tr id="row' + (i + 1) + '"></tr>');
					 i++;
					 x++;
				});

				$(document).on("click", "a.delButton", function() {

					// console.log("before removing: " + x);

					if (x > 2)
					{
						x = x -1;
						var j = $(this).attr('data-id');

						$('#row' + j).remove();
						console.log("after removing: " + x);
					}

					// for (var x = 0; x <= counter; x++)
					// {
					// 	//$('.num' + i ).text(i);
					// 	//console.log(i);
					// 	//console.log(i);
					// 	i--;
					// }

 				});

				$("#arrangeTask").click(function()
        {

					var $id = $(this).attr('data-id');

					$("#addTasks").attr("action", "<?php echo base_url('index.php/controller/addTasksToProject/?id=');?> " + $id);
					$("#addTasks").submit();
        	});
        });

				// var el = document.getElementById('table');
				// var dragger = tableDragger(el, {
				//  mode: 'row',
				//  dragHandler: '.handle',
				//  onlyBody: true,
				//  animation: 300
				// });

				// $(document).on("drop", "a.handle", function() {
				//
 				// });

				// dragger.on('drop',function(from, to){
				//  console.log(from);
				//  console.log(to);
				// });
		</script>
	</body>
</html>
