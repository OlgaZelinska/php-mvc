<?php
return array(
	'/admin' => 'admin/index',	
	'/addTask' => 'main/addTask',
	'/exit' => 'admin/destroy',
	'/edit/([0-9]+)' => 'main/editTask/$1',
	'/page-([0-9]+)' => 'main/index//$1',
	'/email/page-([0-9]+)' => 'main/index/email/$1',
	'/email' => 'main/index/email',	
	'/user_name/page-([0-9]+)' => 'main/index/user_name/$1',
	'/user_name' => 'main/index/user_name',
	'/state/page-([0-9]+)' => 'main/index/state/$1',
	'/state' => 'main/index/state',		
	'/' => 'main/index');
