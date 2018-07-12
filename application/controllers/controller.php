<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("model");
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('login');
		}

		else
		{
			$this->load->view('contact');
		}
	}

//LOGS USER OUT AND DESTROYS SESSION
	public function logout()
	{
		unset($_SESSION);
	  session_destroy();
	  session_write_close();

		$this->load->view("login");
	}

// CHECKS IF EMAIL AND PASSWORD MATCH DB
	public function validateLogin()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			 $this->load->view('login', $this->data);
		}

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
					'email' => $this->input->post('email'),
					// 'password' => password_verify($this->input->post('password'), hashedpasswordfromDB)
					//'password' => md5($this->input->post('password'))
					'password' => $this->input->post('password')
			);

			$result = $this->model->checkDatabase($data);

			if($result == true)
			{
				$sessionData = $this->model->getUserData($data);
				$this->session->set_userdata($sessionData);

				// $notificationsData = $this->model->getAllNotificationsByUser();
				// $this->session->set_userdata('notificationsData', $notificationsData);

				$currentDate = date('Y-m-d');

				$this->model->updateTaskStatus($currentDate);

				redirect('controller/dashboard');

					// if ($userType == 1 || $userType == 5 || $userType == 6 || $userType == 7)
					// {
					// 	$this->load->view("home");
					// 	//redirect('guardwatch_controller/viewHome');
					// }
					//
					// elseif ($userType == 2)
					// {
					// 	$sessionData = $this->dbtest_model->getUserData_Client($data);
					// 	$this->session->set_userdata($sessionData);
					//
					// 	$this->load->view("home");
					// 	// redirect('guardwatch_controller/viewHome');
					// }
					//
					// elseif ($userType == 3)
					// {
					// 	$sessionData = $this->dbtest_model->getUserData_Guard($data);
					// 	$this->session->set_userdata($sessionData);
					//
					// 	$this->load->view("home");
					// 	// redirect('guardwatch_controller/viewHome');
					// }
					//
					// elseif ($userType == 4)
					// {
					// 	$sessionData = $this->dbtest_model->getUserData_Guard($data);
					// 	$this->session->set_userdata($sessionData);
					//
					// 	$this->load->view("home");
					// 	//redirect('guardwatch_controller/viewHome');
					// }
				}

			else
			{
				$email = $this->input->post('email');

				$this->session->set_flashdata('stickyemail', $email);
				$this->session->set_flashdata('danger', 'email or Password is incorrect');
				redirect('controller/login');
			}
		}
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function dashboard()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$data['delayedTaskPerUser'] = $this->model->getDelayedTasksByUser();
			$data['tasks3DaysBeforeDeadline'] = $this->model->getTasks3DaysBeforeDeadline();
			$this->load->view("dashboard", $data);
		}
	}

	public function myProjects()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			if ($_SESSION['departments_DEPARTMENTID'] == '1') //ONLY EXECUTIVES CAN VIEW ALL PROJECTS
			{
				$data['ongoingProjects'] = $this->model->getAllOngoingProjects();
				$data['plannedProjects'] = $this->model->getAllPlannedProjects();
				$data['delayedProjects'] = $this->model->getAllDelayedProjects();
				$data['parkedProjects'] = $this->model->getAllParkedProjects();
				$data['draftedProjects'] = $this->model->getAllDraftedProjects();

				// $data['ongoingProjectProgress'] = $this->model->getOngoingProjectProgress();
				// $data['delayedProjectProgress'] = $this->model->getDelayedProjectProgress();
				// $data['parkedProjectProgress'] = $this->model->getParkedProjectProgress();

			}
			else
			{
				$data['ongoingProjects'] = $this->model->getAllOngoingProjectsByUser($_SESSION['USERID']);
				$data['plannedProjects'] = $this->model->getAllPlannedProjectsByUser($_SESSION['USERID']);
				$data['delayedProjects'] = $this->model->getAllDelayedProjectsByUser($_SESSION['USERID']);
				$data['parkedProjects'] = $this->model->getAllParkedProjectsByUser($_SESSION['USERID']);
				$data['draftedProjects'] = $this->model->getAllDraftedProjectsByUser($_SESSION['USERID']);

				// $data['ongoingProjectProgress'] = $this->model->getOngoingProjectProgressByUser();
				// $data['delayedProjectProgress'] = $this->model->getDelayedProjectProgressByUser();
				// $data['parkedProjectProgress'] = $this->model->getParkedProjectProgressByUser();
			}

			$data['ongoingProjectProgress'] = $this->model->getOngoingProjectProgress();
			$data['delayedProjectProgress'] = $this->model->getDelayedProjectProgress();
			$data['parkedProjectProgress'] = $this->model->getParkedProjectProgress();

			$this->load->view("myProjects", $data);
		}
	}

	public function myTeam()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			if ($_SESSION['departments_DEPARTMENTID'] == '1') //ONLY EXECUTIVES CAN VIEW ALL PROJECTS
			{
				$data['ongoingProjects'] = $this->model->getAllOngoingProjects();
				$data['plannedProjects'] = $this->model->getAllPlannedProjects();
			}
			else
			{
				$data['ongoingProjects'] = $this->model->getAllOngoingProjectsByUser($_SESSION['USERID']);
				$data['plannedProjects'] = $this->model->getAllPlannedProjectsByUser($_SESSION['USERID']);
			}
			$this->load->view("myTeam", $data);
		}
	}

	public function myTasks()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$data['departments'] = $this->model->getAllDepartments();

			switch($_SESSION['usertype_USERTYPEID'])
			{
				case '2':
					$filter = "users.usertype_USERTYPEID = '3'";
					break;

				case '3':
					$filter = "users.departments_DEPARTMENTID = '". $_SESSION['departments_DEPARTMENTID'] ."'";
					break;

				case '4':
					$filter = "users.users_SUPERVISORS = '" . $_SESSION['USERID'] ."'";
					break;

				default:
					$filter = "users.departments_DEPARTMENTID = '". $_SESSION['departments_DEPARTMENTID'] ."'";
					break;
			}

			$data['departments'] = $this->model->getAllDepartments();
			$data['deptEmployees'] = $this->model->getAllUsersByDepartment($filter);
			$data['wholeDept'] = $this->model->getAllUsersByDepartment("users.departments_DEPARTMENTID = '". $_SESSION['departments_DEPARTMENTID'] ."'");
			$data['projectCount'] = $this->model->getProjectCount($filter);
			$data['taskCount'] = $this->model->getTaskCount($filter);
			$this->load->view("myTasks", $data);
		}
	}

	public function doneTask()
	{
		if ($this->input->post('task_ID'))
		{
			$id = $this->input->post("task_ID");
			$remarks = $this->input->post('remarks');

			$data = array(
						'TASKSTATUS' => 'Complete',
						'TASKREMARKS' => $remarks,
						'TASKACTUALENDDATE' => date('Y-m-d')
			);

			$updateTasks = $this->model->updateTaskDone($id, $data);
		}
		$this->myTasks();
	}

	public function loadTasks()
	{
		$data['users'] = $this->model->getAllUsers();
		$data['departments'] = $this->model->getAllDepartments();
		$data['tasks'] = $this->model->getAllTasksByUser($_SESSION['USERID']);
		$data['mainActivity'] = $this->model->getAllMainActivitiesByUser($_SESSION['USERID']);
		$data['subActivity'] = $this->model->getAllSubActivitiesByUser($_SESSION['USERID']);

		echo json_encode($data);
	}

	public function getDependenciesByTaskID()
	{
		$taskID = $this->input->post("task_ID");
		$data['dependencies'] = $this->model->getDependenciesByTaskID($taskID);
		$data['taskID'] = $this->model->getTaskByID($taskID);
		echo json_encode($data);
	}

	public function delegateTask()
	{
		$taskID = $this->input->post("task_ID");

		// SAVE/UPDATE RESPONSIBLE
		$responsibleEmp = $this->input->post('responsibleEmp');
		$responsibleData = array(
			'users_USERID' => $responsibleEmp,
		);
		$result = $this->model->updateResponsible($taskID, $responsibleData);

		// SAVE ACCOUNTABLE
		if($this->input->post("accountableDept[]"))
		{
			foreach($this->input->post("accountableDept[]") as $deptID)
			{
				$accountableData = array(
					'ROLE' => '2',
					'users_USERID' => $deptID,
					'tasks_TASKID' =>	$taskID
				);
				$this->model->addToRaci($accountableData);
			}
		}

		if ($this->input->post("accountableEmp[]"))
		{
			foreach($this->input->post("accountableEmp[]") as $empID)
			{
				$accountableData = array(
					'ROLE' => '2',
					'users_USERID' => $empID,
					'tasks_TASKID' =>	$taskID
				);
				$this->model->addToRaci($accountableData);
			}
		}

		// SAVE CONSULTED
		if($this->input->post("consultedDept[]"))
		{
			foreach($this->input->post("consultedDept[]") as $deptID)
			{
				$consultedData = array(
					'ROLE' => '3',
					'users_USERID' => $deptID,
					'tasks_TASKID' =>	$taskID
				);
				$this->model->addToRaci($consultedData);
			}
		}

		if($this->input->post("consultedEmp[]"))
		{
			foreach($this->input->post("consultedEmp[]") as $empID)
			{
				$consultedData = array(
					'ROLE' => '3',
					'users_USERID' => $empID,
					'tasks_TASKID' =>	$taskID
				);
				$this->model->addToRaci($consultedData);
			}
		}

		// SAVE INFORMED
		if($this->input->post("informedDept[]"))
		{
			foreach($this->input->post("informedDept[]") as $deptID)
			{
				$informedData = array(
					'ROLE' => '4',
					'users_USERID' => $deptID,
					'tasks_TASKID' =>	$taskID
				);
				$this->model->addToRaci($informedData);
			}
		}

		if($this->input->post("informedEmp[]"))
		{
			foreach($this->input->post("informedEmp[]") as $empID)
			{
				$informedData = array(
					'ROLE' => '4',
					'users_USERID' => $empID,
					'tasks_TASKID' =>	$taskID
				);
				$this->model->addToRaci($informedData);
			}
		}

		$this->myTasks();
	}

	public function submitRFC()
	{
		if($this->input->post("rfcType") == '1')
		{
			$data = array(
				'REQUESTTYPE' => $this->input->post("rfcType"),
				'tasks_REQUESTEDTASK' => $this->input->post("task_ID"),
				'REASON' => $this->input->post("reason"),
				'REQUESTSTATUS' => "Pending",
				'users_REQUESTEDBY' => $_SESSION['USERID'],
				'REQUESTEDDATE' => date('Y-m-d')
			);
		}
		else
		{
			$data = array(
				'REQUESTTYPE' => $this->input->post("rfcType"),
				'tasks_REQUESTEDTASK' => $this->input->post("task_ID"),
				'REASON' => $this->input->post("reason"),
				'REQUESTSTATUS' => "Pending",
				'users_REQUESTEDBY' => $_SESSION['USERID'],
				'REQUESTEDDATE' => date('Y-m-d'),
				'NEWSTARTDATE' => $this->input->post("startDate"),
				'NEWENDDATE' => $this->input->post("endDate"),
			);
		}
		$this->model->addRFC($data);
		$this->myTasks();
	}

	public function getUserWorkloadProjects()
	{
		$userID = $this->input->post('userID');
		$data['workloadProjects'] = $this->model->getWorkloadProjects($userID);

		echo json_encode($data);
	}

	public function getUserWorkloadTasks()
	{
		$userID = $this->input->post('userID');
		$projectID = $this->input->post('projectID');
		$data['workloadTasks'] = $this->model->getWorkloadTasks($userID, $projectID);

		echo json_encode($data);
	}


	public function templates()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$data['templates'] = $this->model->getAllTemplates();

			$this->load->view("templates", $data);
		}
	}

	public function archives()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$data['archives'] = $this->model->getAllProjectArchives();

			$this->load->view("archives", $data);
		}
	}

	public function newProject()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$this->load->view("newProject");
		}
	}

	public function myCalendar()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$this->load->view("myCalendar");
		}
	}

	public function documents()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{

			$data['documents'] = $this->model->getAllDocuments();
			$this->load->view("documents", $data);
		}
	}

	public function reports()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$this->load->view("reports");
		}
	}

	public function projectLogs()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$id = $this->input->post("projectID_logs");
			$this->session->set_flashdata('projectIDlogs', $id);
			$data['projectLog'] = $this->model->getProjectLogs($id);
			$this->load->view("projectLogs", $data);
		}
	}

	public function teamGantt()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$id = $this->input->post("project_ID");
			$data['projectProfile'] = $this->model->getProjectByID($id);
			$data['ganttData'] = $this->model->getAllProjectTasks($id);
			$data['dependencies'] = $this->model->getDependencies();
			$data['users'] = $this->model->getAllUsers();

			$departmentID = $_SESSION['departments_DEPARTMENTID'];

			$data['ganttData'] = $this->model->getAllProjectTasksByDepartment($id, $departmentID);
			$this->load->view("teamGantt", $data);
		}
	}

// DELETE THIS MAYBE?
	public function newProjectTask()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$this->load->view("newProjectTask");
		}
	}

	public function addTasks()
	{
		// CHECKS IF PROJECT HAS STARTED TO SET STATUS
		$startDate = $this->input->post('startDate');
		date_default_timezone_set("Singapore");
		$currDate = date("mm-dd-YYYY");

		if ($currDate >= $startDate)
		{
			$status = 'Ongoing';
		}

		else
		{
			$status = 'Planning';
		}

		$data = array(
				'PROJECTTITLE' => $this->input->post('projectTitle'),
				'PROJECTSTARTDATE' => $startDate,
				'PROJECTENDDATE' => $this->input->post('endDate'),
				'PROJECTDESCRIPTION' => $this->input->post('projectDetails'),
				'PROJECTSTATUS' => $status,
				'users_USERID' => $_SESSION['USERID']
		);

		$sDate = date_create($startDate);
		$eDate = date_create($this->input->post('endDate'));
		$diff = date_diff($eDate, $sDate);
		$dateDiff = $diff->format('%d');

		// PLUGS DATA INTO DB AND RETURNS ARRAY OF THE PROJECT
		$data['project'] = $this->model->addProject($data);
		$data['dateDiff'] =$dateDiff;
		$data['departments'] = $this->model->getAllDepartments();

		if ($data)
		{
			// TODO PUT ALERT
			$this->load->view('addTasks', $data);
		}

		else
		{
			// TODO PUT ALERT
			redirect('controller/contact');
		}
	}

// DELETE THIS MAYBE??
	public function scheduleTasks()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$this->load->view("scheduleTasks");
		}
	}

	public function projectGantt()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$id = $this->input->post("project_ID");

			$data['projectProfile'] = $this->model->getProjectByID($id);
			$data['ganttData'] = $this->model->getAllProjectTasks($id);
			$data['dependencies'] = $this->model->getDependencies();
			$data['users'] = $this->model->getAllUsers();

			$this->load->view("projectGantt", $data);
		}
	}

	public function projectDocuments()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$id = $this->input->post("project_ID");
			$this->session->set_flashdata('projectID', $id);
			// $id = $this->input->get("id");
			$data['projectProfile'] = $this->model->getProjectByID($id);
			// WHAT IS HAPPENING :(( HAHAHAHAH
			$data['departments'] = $this->model->getAllDepartments();
			$data['documentsByProject'] = $this->model->getAllDocumentsByProject($id);

			$this->load->view("projectDocuments", $data);
		}
	}

	/******************** MY PROJECTS START ********************/

	// ADDS MAIN ACTIVITIES TO PROJECT
	public function addTasksToProject()
	{
		// GET PROJECT ID
		$id = $this->input->post("project_ID");

		// GET ARRAY OF INPUTS FROM VIEW
		$title = $this->input->post('title');

		// GET ALL DEPTS TO ASSIGN DEPT HEAD TO TASK
		$departments = $this->model->getAllDepartments();

		foreach($departments as $row)
		{
			switch ($row['DEPARTMENTNAME'])
			{
				case 'Executive':
					$execHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'Marketing':
					$mktHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'Finance':
					$finHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'Procurement':
					$proHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'HR':
					$hrHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'MIS':
					$misHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'Store Operations':
					$opsHead = $row['users_DEPARTMENTHEAD'];
					break;
				case 'Facilities Administration':
					$fadHead = $row['users_DEPARTMENTHEAD'];
					break;
			}
		}

		$x = 0;

		foreach ($title as $row)
		{
			$department = $this->input->post('department_' . $x);

				$data = array(
						'TASKTITLE' => $row,
						'TASKSTATUS' => 'Planning',
						'CATEGORY' => '1',
						'projects_PROJECTID' => $id
				);

				$addedTask = $this->model->addTasksToProject($data);

				if (!$addedTask)
				{
					echo "false";
				}

				else
				{
					foreach($department as $a)
					{
						switch ($a)
						{
							case 'Executive':
								$deptHead = $execHead;
								break;
							case 'Marketing':
								$deptHead = $mktHead;
								break;
							case 'Finance':
								$deptHead = $finHead;
								break;
							case 'Procurement':
								$deptHead = $proHead;
								break;
							case 'HR':
								$deptHead = $hrHead;
								break;
							case 'MIS':
								$deptHead = $misHead;
								break;
							case 'Store Operations':
								$deptHead = $opsHead;
								break;
							case 'Facilities Administration':
								$deptHead = $fadHead;
								break;
						}

						$data = array(
								'ROLE' => '1',
								'users_USERID' => $deptHead,
								'tasks_TASKID' => $addedTask['TASKID']
						);

						// ENTER INTO RACI
						$result = $this->model->addToRaci($data);
					}
				}

				$x++;
			}

			$data['project'] = $this->model->getProjectByID($id);
			$data['tasks'] = $this->model->getAllProjectTasks($id);
			$data['groupedTasks'] = $this->model->getAllProjectTasksGroupByTaskID($id);
			$data['users'] = $this->model->getAllUsers();
			$data['departments'] = $this->model->getAllDepartments();

			$sDate = date_create($data['project']['PROJECTSTARTDATE']);
			$eDate = date_create($data['project']['PROJECTENDDATE']);
			$diff = date_diff($eDate, $sDate);
			$dateDiff = $diff->format('%d');

			$data['dateDiff'] = $dateDiff;

			$this->load->view('arrangeTasks', $data);
		}

		// ADDS SUB ACTIVITIES TO MAIN ACTIVITIES OF PROJECT
		public function arrangeTasks()
		{
			$id = $this->input->post('project_ID');

			$parent = $this->input->post('mainActivity_ID');
			$title = $this->input->post('title');
			$startDates = $this->input->post('taskStartDate');
			$endDates = $this->input->post('taskEndDate');

			$departments = $this->model->getAllDepartments();

			foreach($departments as $row)
			{
				switch ($row['DEPARTMENTNAME'])
				{
					case 'Executive':
						$execHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'Marketing':
						$mktHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'Finance':
						$finHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'Procurement':
						$proHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'HR':
						$hrHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'MIS':
						$misHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'Store Operations':
						$opsHead = $row['users_DEPARTMENTHEAD'];
						break;
					case 'Facilities Administration':
						$fadHead = $row['users_DEPARTMENTHEAD'];
						break;
				}
			}

			$x = 0;
			$table = 0;
			// $num = 0;

			foreach ($parent as $key => $value)
			{
				$data = array(
						'TASKTITLE' => $title[$key],
						'TASKSTARTDATE' => $startDates[$key],
						'TASKENDDATE' => $endDates[$key],
						'TASKSTATUS' => 'Planning',
						'CATEGORY' => '2',
						'projects_PROJECTID' => $id,
						'tasks_TASKPARENT' => $value
				);

				$addedTask = $this->model->addTasksToProject($data);

				if (!$addedTask)
				{
					echo "false";
				}

				else
				{
					// echo $addedTask['TASKID'] . "<br>";

					$table = 0;
					$num = 0;

					foreach ($title as $key=> $t)
					{
						if ($t == $addedTask['TASKTITLE'])
						{
							// echo $addedTask['TASKID'] . " -- " . $value.  "<br>";
							foreach ($parent as $p)
							{
								$num = 0;

								foreach ($title as $t2)
								{
									$department = $this->input->post('table_' . $table . '_department' . $num);

									if (isset($department))
									{
											// echo $value . " -- " . $addedTask['tasks_TASKPARENT'] . "<BR>";
											echo "table_" . $table . "_department" . $num . " -- " . $addedTask['TASKID'] . " -- " . $value . "<BR>";

									}
									$num++;
								}

								$table++;
							}
						}
						// if ($t == $value)
						// {
						// 	echo "hello<br>";
						// }
					}
				}

				$x++;
				echo "-------------------------<br>";
			}



			// GANTT CODE
			$data['projectProfile'] = $this->model->getProjectByID($id);
			$data['ganttData'] = $this->model->getAllProjectTasks($id);
			// $data['preReq'] = $this->model->getPreReqID();
			$data['dependencies'] = $this->model->getDependencies();
			$data['users'] = $this->model->getAllUsers();

			// $this->load->view("dashboard", $data);
			// redirect('controller/projectGantt');
			// $this->load->view("scheduleTasks", $data);
	}

	public function uploadDocument()
	{
		$config['upload_path']          = './assets/uploads';
		$config['allowed_types'] 				= '*';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('docu'))
		{
			$this->load->view('dashboard');
		}

		else
		{
			// GET PROJECT ID
			// Hi nami this should work
			$id = $this->input->get("id");
			// $id = $this->input->post("projectID");
			$data['projectProfile'] = $this->model->getProjectByID($id);

			$user = $_SESSION['USERID'];
			$fileName = $this->upload->data('file_name');
			$src = "http://localhost/Kernel/assets/uploads/" . $fileName;

			$uploadData = array(
				'DOCUMENTSTATUS' => 'Uploaded',
				'DOCUMENTNAME' => $fileName,
				'DOCUMENTLINK' => $src,
				'users_UPLOADEDBY' => $user,
				'UPLOADEDDATE' => date('Y-m-d'),
				'projects_PROJECTID' => $id
			);

			$result = $this->model->uploadDocument($uploadData);

			// $data['ongoingProjects'] = $this->model->getAllOngoingProjects();
			// $data['plannedProjects'] = $this->model->getAllPlannedProjects();

			$id = $this->input->post("project_ID");
			$this->session->set_flashdata('projectID', $id);
			// $id = $this->input->get("id");
			$data['projectProfile'] = $this->model->getProjectByID($id);

			$this->load->view("projectDocuments", $data);
		}
	}

	/******************** MY PROJECTS END ********************/

	public function gantt2(){

		$filter = "tasks.TASKSTARTDATE"; // default
		$data['ganttData'] = $this->model->getAllProjectTasks(1, $filter);
		// $data['preReq'] = $this->model->getPreReqID();
		$data['dependencies'] = $this->model->getDependencies();

		$this->load->view("gantt2", $data);
	}

// DELETE THIS AFTER
	public function frame()
	{
		if (!isset($_SESSION['EMAIL']))
		{
			$this->load->view('contact');
		}

		else
		{
			$this->load->view("frame");
		}
	}
}
