<?php
class Task
{
	public static function getTask($start, $countOnPage)
	{
		$conn = Db::getConnection();
		$sql = "SELECT id, user_name, email, text, state
		FROM task 
		LIMIT $start,$countOnPage";	
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data;
    } 
    public static function addTask($user_name, $email, $text)
	{
		$conn = Db::getConnection();	
		$state = 0;
		$sql = "INSERT INTO app.task (user_name, email, text, state) 
		VALUES ('$user_name', '$email', '$text', '$state')";
		return $conn->query($sql);
	}
	public static function getTaskCount() 
	{
		$conn = Db::getConnection();
		$sql = "SELECT count(*) as count FROM task";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data[0]['count'];
	}
	public static function getSortName($sortName, $start, $countOnPage) 
	{
		$conn = Db::getConnection();
		$sql = "SELECT * FROM task 
		ORDER BY $sortName
        LIMIT $start,$countOnPage";
		$result = $conn->query($sql);
		$data = $result->fetch_all(MYSQLI_ASSOC);
		return $data;	
	}	
	public static function editTask($id, $text, $state)
	{	     
		$conn = Db::getConnection();
		$sql = "UPDATE task SET text = '$text', state = '$state' WHERE id = $id ";
		return $conn->query($sql);
	}
}
	
