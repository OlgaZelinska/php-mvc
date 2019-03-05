<div class="container-fluid bg-light p-3">
	<div class="row justify-content-center"> 	
		<ul class="nav flex-column">	
			<li><a class="btn btn-primary btn-block btn-sm m-1" href="/" role="button">All</a></li>
			<li><a class="btn btn-primary btn-block btn-sm m-1" href="/user_name" role="button">Сортировка по имени</a></li>
			<li><a class="btn btn-primary btn-block btn-sm m-1" href ="/email" role="button">Сортировка по email</a></li>	
			<li><a class="btn btn-primary btn-block btn-sm m-1" href="/state" role="button">Сортировка по статусу</a></li>	
		</ul>
    <div class="col-12 col-md-9">
	    <section class="content">
	        <form action = "/addTask" method="post" class="form-add-task">            
                <div class="form-group">
                    <h3>Добавить задачу</h3>               
			            <input class="form-control form-control-sm m-1" type="text" placeholder="Имя"  name = "user_name">
	                    <input class="form-control form-control-sm m-1" type="text" placeholder="Email"  name = "email">	           
	                    <div class="form-group">   
                            <textarea class="form-control m-1" id="exampleFormControlTextarea1" rows="3" placeholder="Задача" name = "text"></textarea>
		                </div>  
		                <button type="submit" class="btn btn-primary mb-2" name="sub-task">Оk</button>              
			    </div>
            </form>
        <?php foreach($data as $post) { ?>
	        <article class="posts">
				<h2>Имя : <?=$post['user_name'];?></h2>
				    <h3>e-mail : <?=$post['email'];?></h3>
					<p> Задача:<?=$post['text'];?></p>	
	       	<? if($_SESSION['admin'] === 'admin') { ?>					
		    	<form action = "/edit/<?=$post['id'];?>" method="post">
			        <div class="form-group">
				    <input class="form-control form-control-sm m-1" type="text" value="<?=$post['text'];?>" name="text">			   	
				    <input type="radio" name="state" value="1">
					<label class="form-check-label" for="exampleRadios1">Решено</label>
			      	<button type="submit" class="btn btn-primary mb-2" name="sub-edit">Ok</button>             
				</div>
            </form>
			<? }?>					
				<?
			    if($post['state']) {
			     	echo "<span style='color:green'>Решено</span>";
			    }else {
			    	echo "<span style='color:red'>Не решено</span>";}?>
		    </article>
		<? } ?>
	</section>
  	</div>
	</div>  
</div>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>