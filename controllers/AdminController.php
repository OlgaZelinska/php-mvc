<?

class AdminController
{
	public function actionIndex() 
	{
		if($_POST['adminLogin'] === 'admin' AND $_POST['adminPass'] === '123') {
			$_SESSION['admin'] = 'admin';
			include ROOT.'/views/admin/adminView.php';
			return;
		}
		if($_SESSION['admin'] === 'admin') {	
			include ROOT.'/views/admin/adminView.php';			
		} else {
			include ROOT.'/views/admin/adminFormView.php';
		}		
	}
	public function actionDestroy() 
	{
		unset($_SESSION['admin']);
		session_destroy();
		$this->actionIndex();
	}
}

