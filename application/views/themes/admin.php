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

  <body style="background:#2b3e50; color:#fff;font-family:adminfont;">

      <div class="container"  style="margin:0 auto;">
        <nav class="navbar navbar-inverse" role="navigation" style="background:#4e5d6c; border-radius:1px; border:none;">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url(); ?>" style="color:#fff;">Admin Panel</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
              
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url(); ?>faculty" style="color:#fff;">Faculty</a></li>
                <li><a href="<?php echo base_url(); ?>code" style="color:#fff;">Code</a></li>
                <li><a href="<?php echo base_url(); ?>users" style="color:#fff;">Users</a></li>
                <li><a href="<?php echo base_url(); ?>course" style="color:#fff;">Course</a></li>
                <li><a href="<?php echo base_url(); ?>subject" style="color:#fff;">Subject</a></li>
                <li><a href="<?php echo base_url(); ?>section" style="color:#fff;">Section</a></li>
                


                // Enable if updated!
                <!--<li>
                    <a style="color:#fff;border:none;background:transparent;" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modall-sm">
                      Semester
                    </a>

                  <div class="modal fade bs-example-modall-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content" style="color:#000;">
                        <div class="row" style="padding:50px;">
                        <div class="col-md-12">
                        <label for="semester">Select Semester</label>
                          <select title='Choose one of the following...'>
                            <option>-- Select one --</option>
                            <option>1st Semester</option>
                            <option>2nd Semester</option>
                          </select>
                          <button type="button" class="btn btn-info" style="float:right;">Activate</button>
                          </div><!--row
                          </div><!--colmd4
                      </div>
                    </div>
                  </div>         
                </li>
                -->

                <li><a href="<?php echo base_url(); ?>logout" style="color:#fff;">Logout</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
            
          <?php echo $output;?>

          </div><!--end container-->


</body>

</html>
