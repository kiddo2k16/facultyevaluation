<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title; ?></title>
		 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<?php
	/** -- Copy from here -- */
	if(!empty($meta))
	foreach($meta as $name=>$content){
		echo "\n\t\t";
		?><!-- meta name="<?php // echo $name; ?>" content="<?php // echo $content; ?>" --><?php
			 }
	echo "\n";

	if(!empty($canonical))
	{
		echo "\n\t\t";
		?><link rel="canonical" href="<?php echo $canonical?>" /><?php

	}
	echo "\n\t"; ?>
	
	
	
	<?php 
if(isset($css_files)):
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php endif;?>

<?php if(isset($js_files)):?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<?php endif;?>
	
	<?php 

	foreach($css as $file){
	 	echo "\n\t\t";
		?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	} echo "\n\t";

	foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script><?php
	} echo "\n\t";

	/** -- to here -- */
?>

    <!--  styles -->
    <link href="<?php echo base_url(); ?>/public/css/bootstrap.min.css" rel="stylesheet" media="screen">
	 <script src="<?php echo base_url() ?>/public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>/public/js/bootstrap.min.js"></script>
    
</head>

  <body>

  		 <div id="header"> <!--starts header-->
        	<li><a href="<?php echo base_url() ?>login">Panel</a></li>
        </div> <!--ends header-->
   		 <div class="sti_logo"> <!--starts sti_Logo-->
    		<a href="http://www.sti.edu"><img src="<?php echo base_url(); ?>/public/images/stiLogo.png" style="width:150px;"/></a>
  		  </div> <!--ends sti_logo-->
     	 <div class="container" style="padding-top:50px;">
    	  <?php echo $output;?>
   		</div> <!--ends container-->
    <div id="footer"> <!--starts footer-->
        <div class="f_left"> <!--starts f_left-->
        	<p>&copy; STI-Dipolog Faculty Evaluation 2014</p>
        </div> <!--ends f_left-->
        <div class="f_right"> <!--starts f_right-->
        	<p>All rights reserved</p>
        </div><!--ends f_right-->
    </div><!--ends footer-->
    
    <!--<div class="footer_logo"> 
    	<img src="<?php echo base_url() ?>/public/images/footer_logo.png" />
    </div>-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   
</body>

</html>
