<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report - Employee Performance Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/AdminLTE.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Own Style -->
  <!-- <link rel="stylesheet" href="<?php echo base_url("/assets/css/reportsProjectPerDeptStyle.css")?>"> -->
  <!-- Report Style -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/css/reportStyle.css")?>">
</head>
<body onload="window.print();" style="font-size: 11px">
<div class="wrapper">
  <!-- Main content -->
  <section>
    <!-- title row -->
    <div class="reportHeader viewCenter">
      <h3 class="viewCenter"><img class="" id = "logo" src = "<?php echo base_url("/assets/media/tei.png")?>"> Employee Performance Report</h3>
    </div>
    <div class="reportBody">
      <!-- LOOP START HERE -->
        <div class="box box-danger">
          <table class="table-condensed" style="width:100%; width:auto; display:inline-block">
            <tr>
              <td><b>Name: </b><?php echo $userInfo['FIRSTNAME'] . " " . $userInfo['LASTNAME'];?></td>
            </tr>
            <tr>
              <td><b>Position: </b><?php echo $userInfo['POSITION'];?></td>
            </tr>
            <tr>
              <td><b>Department: </b>
                <?php foreach($departments as $department)
                  if($department['DEPARTMENTID'] == $userInfo['departments_DEPARTMENTID'])
                    echo $department['DEPARTMENTNAME'];
                ?>
              </td>
            </tr>
          </table>

           <div class="pull-right" style="display:inline-block; margin-right: 20px">
             <div style="display:inline-block; text-align:center; width:49%; padding-right: 20px">
               <h3>100%</h3>
               <h6>Timeliness</h6>
             </div>
             <div style="display:inline-block; text-align:center; width:49%; padding-left: 20px; border-left: solid lightgray 1px;">
               <h3>100%</h3>
               <h6>Completeness</h6>
             </div>
           </div>

          <table class="table table-bordered table-condensed" id="">
            <thead>
              <?php foreach($projectCount as $project):?>
                <tr>
                  <th colspan="10"><?php echo $project['PROJECTTITLE'];?> (<?php echo date_format(date_create($project['PROJECTSTARTDATE']), "M d, Y");?> - <?php echo date_format(date_create($project['PROJECTENDDATE']), "M d, Y");?>)</th>
                </tr>
                <tr>
                  <th>Task</th>
                  <th class='text-center'>Start</th>
                  <th class='text-center'>End</th>
                  <th class='text-center'>Actual End</th>
                  <th class='text-center'>Days Delayed</th>
                  <th class='text-center'>A</th>
                  <th class='text-center'>C</th>
                  <th class='text-center'>I</th>
                  <th class='text-center'>Status</th>
                  <th class='text-center'>Timeliness</th>
                </tr>
              </thead>
                <tbody>
                <?php foreach($taskCount as $task):?>
                  <?php if($task['projects_PROJECTID'] == $project['PROJECTID']):?>
                    <tr>
                      <td><?php echo $task['TASKTITLE'];?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  <?php endif;?>
                <?php endforeach;?>
                </tbody>
            <?php endforeach;?>
          </table>

  				<!-- Requests -->
  				<div class="row">
  					<div class="col-md-12 col-sm-12 col-xs-12">
  						<div class="box box-default">
  							<div class="box-header with-border">
  								<h5 class="box-title">Change Requests</h5>
  							</div>
  							<!-- /.box-header -->
  							<div class="box-body">
  								<table class="table table-bordered table-condensed" id="">
  									<thead>
  										<tr>
  											<th width="0%">Task</th>
                        <th class="text-center" width="0%">End Date</th>
                        <th width="0%" class='text-center'>Type</th>
                        <th width="0" class="text-center">Date Requested</th>
  											<th width="0%">Requester</th>
  											<th width="0%">Reason</th>
  										</tr>
  									</thead>
  									<tbody>

  									</tbody>
  								</table>
  							</div>
  						</div>
  	        </div>
  	        <!-- /.col -->
  				</div>
  				<div class="row">
  					<div class="col-md-12 col-sm-12 col-xs-12">
  						<div class="box box-default">
  							<div class="box-header with-border">
  								<h5 class="box-title">Change Requests</h5>
  							</div>
  							<!-- /.box-header -->
  							<div class="box-body">
  								<h6 align="center">There were no change requests</h6>
  							</div>
  						</div>
  	        </div>
  	        <!-- /.col -->
  				</div>
        </div>

    <div class="endReport viewCenter">
      <p>***END OF REPORT***</p>
    </div>

    <footer class="reportFooter">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        <!-- <medium>Page 1 of 1M</medium> -->
      </div>
      <!-- Default to the left -->
      <medium>Prepared By: <?php echo $_SESSION['FIRSTNAME'] . " " . $_SESSION['LASTNAME']?></medium>
      <br>
      <medium>Prepared On: <?php echo date('F d, Y'); ?></medium>
    </footer>
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
