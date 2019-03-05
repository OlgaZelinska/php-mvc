<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
	 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <title>Document</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	 <link rel="stylesheet" href="/styles/style.css">
	 
</head>
<body>
<header class="top_line bg-dark p-4 text-center">
	<h1 class="text-light ">Задачник JavaScript и jQuery</h1>
    <? if($_SESSION['admin'] === 'admin') { ?>
	<a href="/exit" class="btn btn-primary btn-lg active " role="button" aria-pressed="true">Выход</a>
	<? } ?>
</header>