<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $__env->yieldContent('page_title'); ?> | Alcel Construction</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />


  <script src="../vendors/jquery/dist/jquery.min.js"></script>
    
  <!-- validation -->
  <script src="../vendors/validation/dist/jquery.validate.min.js"></script>  
  
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- W3 Css -->
  <link rel="stylesheet" href="css/w3.css">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/construction.css" rel="stylesheet">
  <!--Import Google Icon Font-->
  <!--link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"-->
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>


  <style>
  .button {
    display: inline-block;
    padding: 5px 13px;
    font-size: 15px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #4CAF50;
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px #999;
    float:right;
  }

  .button:hover {background-color: #3e8e41}

  .button:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }
  @font-face {
    font-family: 'Material Icons';
    font-style: normal;
    font-weight: 400;
    src: url('https://cdn.rawgit.com/google/material-design-icons/a6145e16/iconfont/MaterialIcons-Regular.eot');
    /* For IE6-8 */
    src: url('https://cdn.rawgit.com/google/material-design-icons/a6145e16/iconfont/MaterialIcons-Regular.woff2') format('woff2'),
    url('https://cdn.rawgit.com/google/material-design-icons/a6145e16/iconfont/MaterialIcons-Regular.woff') format('woff'),
    url('https://cdn.rawgit.com/google/material-design-icons/a6145e16/iconfont/MaterialIcons-Regular.ttf') format('truetype');
  }

  .material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    /* Preferred icon size */
    display: inline-block;
    line-height: 1;
    text-transform: none;
    letter-spacing: normal;
    word-wrap: normal;
    white-space: nowrap;
    direction: ltr;
    /* Support for all WebKit browsers. */
    -webkit-font-smoothing: antialiased;
    /* Support for Safari and Chrome. */
    text-rendering: optimizeLegibility;
    /* Support for Firefox. */
    -moz-osx-font-smoothing: grayscale;
    /* Support for IE. */
    font-feature-settings: 'liga';
  }
/* This only works with JavaScript, 
if it's not present, don't show loader *
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(images/Preloader_3.gif) center no-repeat #fff;
  }/*loader*/
</style>
<script>  
  // Wait for window load
  //$(window).load(function() {
    // Animate loader off screen
    //$(".se-pre-con").fadeOut("slow");;
  //});
</script>
<?php echo $__env->yieldContent('page_style'); ?>

</head>

<body class="nav-md">
  <div class="se-pre-con"></div>
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" >
            <a href="<?php echo e(url ('indexAdmin')); ?>" class="site_title" style="text-shadow:5px 5px 5px #222;"><img src="images/logoheader.png" alt="" style="width:100%; height:100%; -webkit-filter: drop-shadow(5px 5px 5px #222); filter: drop-shadow(5px 5px 5px #222); margin-left:-10px;"></a>
          </div>

          <div class="clearfix"></div>
          <br />

          <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>Alcel Construction Inc.</h3>
            <ul class="nav side-menu">
              <li>
                <a href="<?php echo e(url ('indexAdmin')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
              </li>
              <li>
                <a ><i class="fa fa-wrench"></i>Maintenance<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo e(url ('company')); ?>">Client Company</a></li>
                  <li><a href="<?php echo e(url ('engineer')); ?>">Employee</a></li>
                  <li><a href="<?php echo e(url ('phase')); ?>">Phases</a></li>
                  <li><a href="<?php echo e(url ('tasks')); ?>">Tasks</a></li>
                  <li><a href="<?php echo e(url ('truck_category')); ?>">Truck Category</a></li>
                </ul>
              </li>
              <li>
                <a><i class="fa fa-cubes"></i> Project Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="<?php echo e(url ('project_add')); ?>">Add Project</a></li>
                  <li><a href="<?php echo e(url ('project')); ?>">Projects</a></li>
				  <li>
				  		<a>Contracts<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
                            <li ><a href="<?php echo e(url ('contract')); ?>">All Contracts</a></li>
                            <li><a>Terminated</a></li>
                        </ul>
				  </li>
                </ul>
              </li>
              <li>
               <a><i class="fa fa-money"></i>Billing<span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu">
                <li><a href="<?php echo e(url ('project_financial')); ?>">Project Financial</a></li>
              </ul>
            </li>
            <li>
              <a ><i class="fa fa-truck"></i>Inventory<span class="fa fa-chevron-down"></span> </a>
              <ul class="nav child_menu">
                <li><a href="<?php echo e(url ('equipment_add')); ?>">Add Equipment</a></li>
                <li><a href="<?php echo e(url ('equipment_dep')); ?>">Equipment deploy</a></li>
              </ul>
            </li>
            <li>
              <a ><i class="fa fa-file-pdf-o jumbo"></i>Report<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo e(url ('monthly_report')); ?>">Project Monthly Report</a></li>
                <li><a href="<?php echo e(url ('financial')); ?>">Financial</a></li>
                <li><a href="<?php echo e(url ('equipment_util')); ?>">Equipment Utilization</a></li>
              </ul>
            </li>
            <li>
              <a ><i class="fa fa-question-circle-o jumbo"></i>Queries<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo e(url ('queryEmployee')); ?>">Employee</a></li>
                <li><a href="<?php echo e(url ('queryClient')); ?>">Client Company</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="/admin_logout" style="width:100%; height:50px;">
            <span class="glyphicon glyphicon-off" aria-hidden="true" style="margin-top:10px;"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <?php $__currentLoopData = $empPic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empPic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="images/profile/<?php echo e($empPic->emp_image); ?>" alt=""><?php echo e($empPic->emp_first_name); ?> <?php echo e($empPic->emp_last_name); ?>

                <span class=" fa fa-angle-down"></span>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="<?php echo e(url ('profileAdmin')); ?>"> Profile</a></li>
                <li><a href="/admin_logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
              </ul>
            </li>
            
            <li role="presentation" class="dropdown">
              <a id="notif" data-id="<?php echo e($id); ?>" style="cursor:pointer" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                <img src="/images/notification-flat.png" class="w3-animate-top" style="width:2.2em; margin-top:-2px">
                <?php if($notifcount > 0) {
                  echo "<span class='badge bg-green w3-animate-zoom' id='notifcount'>". $notifcount ."</span>";
                } ?>
              </a>
              <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <?php $__currentLoopData = $notif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <a href="<?php echo e($notif->notif_url); ?>">
                    <span class="image"><img src="images/profile/<?php echo e($notif->emp_image); ?>" alt="Profile Image" /></span>
                    <span>
                      <strong><span><?php echo e($notif->emp_first_name); ?> <?php echo e($notif->emp_last_name); ?></span></strong>
                      <span class="time" style="right:0px;margin-top:-20px">
                       <?php
                       $time = 0;
                       $notifdate = date_create($notif->notif_date);
                       $nowdate = date_create("now");
                       
                       $interval = date_diff($nowdate, $notifdate);
                       
                       $time = $interval->format('%y');
                       
                       if($time > 0) {
                         echo $time." years ago";
                       } else {
                         $time = $interval->format('%m');
                         if($time > 0 && $time < 12) {
                          echo $time." months ago";
                        } else {
                          $time = $interval->format('%d');
                          if($time > 0 && $time < 31) {
                           echo $time." days ago";
                         } else {
                           $time = $interval->format('%h');
                           if($time > 0 && $time < 12) {
                            echo $time." hours ago";
                          } else {
                            $time = $interval->format('%i');
                            if($time > 0 && $time < 60) {
                             echo $time." mins ago";
                           } else {
                             echo "a few moment ago";
                           }
                         }
                       }
                     }
                   }
                   ?>
                   <img src="/images/icon/<?php echo e($notif->notif_icon); ?>" style="height:45px; margin-top:20px; margin-right:5px;">
                 </span>
               </span>
               <span class="message" style="width:90%">
                <?php echo e($notif->notif_description); ?>

              </span>
            </a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <li>
            <div class="text-center">
              <a href="/notification">
                <strong>See All Alerts</strong>
                <i class="fa fa-angle-right"></i>
              </a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</div>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main" style="">
 <?php echo $__env->yieldContent('page_content'); ?>
</div>
<!-- /page content -->

<!-- footer content -->
<footer style="margin-top:-3%; ">
  <div class="pull-right">
    Alcel Construction Inc Admin by <a href="https://www.facebook.com">Shithi Inc.</a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer -->
</div>
</div>
<script>
  $('#notif').click(function () {
    $("#notifcount").hide();
    $.ajax({
      type : "get",
      url : '/updatenotifadmin',
      data : {"id" : $(this).data('id')},
      dataType: "json",
      success: function(response) {
      }
    });
  });
</script>

</body>
</html>