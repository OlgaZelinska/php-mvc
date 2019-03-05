<?
class MainController 
{
	public function actionIndex($params)
	{	  	 
		$sortName = strval($params[0]);
	 	$pageNumber = intval($params[1]);
        if(!$pageNumber){
	 		$pageNumber = 1;
	 	}
		$countOnPage = 3;
		$taskItemsCount = ($pageNumber-1)*$countOnPage;
		
		if ($sortName === 'state'){
		   	$data = Task::getSortName($sortName, $taskItemsCount, $countOnPage);
		    $taskCount = Task::getTaskCount();
			$paginationPath = "/state/page-";
		} elseif($sortName === 'email'){
	    	$data = Task::getSortName($sortName, $taskItemsCount, $countOnPage);
		    $taskCount = Task::getTaskCount();
			$paginationPath = "/email/page-";
		} elseif ($sortName === 'user_name'){
	    	$data = Task::getSortName($sortName, $taskItemsCount, $countOnPag);
		    $taskCount = Task::getTaskCount();
			$paginationPath = "/user_name/page-";
		} else {
			$data = Task::getTask($taskItemsCount, $countOnPage);
	    	$taskCount = Task::getTaskCount();
			$paginationPath = "/page-";
		}			
	    $taskCount = intval($taskCount);
		include ROOT.'/views/MainView.php';
		
		$pagination= new Pagination($taskCount, $countOnPage, $pageNumber, $paginationPath);
		echo $pagination->show();

	}	
    public function actionAddTask()
	{
	    if(isset($_POST['sub-task'])){
		if(!empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['text'])) {
	        $postUser_name = $_POST['user_name'];
			$postUser_name = trim($postUser_name);
            $postUser_name = strip_tags($postUser_name);
			$postUser_name = addslashes($postUser_name);			
		    $postEmail = $_POST['email'];
			$postEmail = trim($postEmail);
            $postEmail = strip_tags($postEmail);
			$postEmail = addslashes($postEmail);
		    $postText =  $_POST['text'];
			$postText = trim($postText);
            $postText = strip_tags($postText);
			$postText = addslashes($postText);
			if(Task::addTask($postUser_name, $postEmail, $postText)) {
			    echo '<h2>Task has been added</h2>';
			} else {	
			    echo '<h2>Error</h2>';
		    }
		} else {	
			echo '<h2>Error</h2>';
		}
	    $this->actionIndex($params);	    	
	    }
	}
	public function actionEditTask($id)
	{
	    if($_SESSION['admin'] === 'admin'){	
	    $id=$id[0];
		$id = intval($id);	
	    if(isset($_POST['sub-edit'])){	        
	        $editText = $_POST['text'];
		    $editState= $_POST['state'];	
			if(Task::editTask($id, $editText, $editState)) {
				echo '<h2>Task has been edited</h2>';
			} else {	
				echo '<h2>Error</h2>';
			}
		}
	    $this->actionIndex($params);	
    	}
	}	
}