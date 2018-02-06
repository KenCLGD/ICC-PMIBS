 
<?php $__env->startSection('page_title','Description'); ?> 
<?php $__env->startSection('page_content'); ?>

     <div class="">

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
					<?php $__currentLoopData = $proj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-2 col-sm-2 col-xs-2" style="width: 6%">
						<h1 class="lime-text darken-4"><i class="fa <?php if($proj->ci_desc == 'Vertical'): ?> fa-building <?php else: ?> fa-road <?php endif; ?>"></i></h1>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-22" style="margin-left: 0%; width: 94%">
						<h1 class="lime-text darken-4" style="color:#d2d600";><?php echo e($proj->pi_title); ?></h1>
					</div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="col-md-12 col-sm-12 col-xs-24">
                      <ul class="stats-overview">
                        <li style="width: 31%;">
                          <span class="name"> Estimated budget </span>
                          <span class="value text-success"> P <?php $number = $proj->cb_total; echo number_format ( $number , "2" , "." , "," )?> </span>
                        </li>
                        <li style="width: 36%;">
						  <span class="value text-default"> Progress Status (%)</span>
                          <div class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo e($proj->proj_percentage); ?>"></div>
                            </div>
                            <small>
								<?php $number = $proj->proj_percentage; echo number_format ( $number , "0" , "." , "," )?>
								% Complete
							</small>
                          </div>
                        </li>
                        <li class="hidden-phone" style="width: 30%;">
                          <span class="name"> Estimated project duration </span>
                          <span class="value text-success"> <?php  echo date_diff(date_create($proj->proj_start_date),date_create($proj->proj_end_date))->format('%r%a days')  ?></span>
                        </li>
                      </ul>
					  <ul class="stats-overview">
                        <li style="width: 31%;">
                          <span class="name"> Project Expense </span>
                          <span class="value text-success"> P <?php $number = $proj->cb_expense; echo number_format ( $number , "2" , "." , "," )?> </span>
                        </li>
                        <li style="width: 36%;">
						  <h3><span <?php if(strtotime($proj->proj_end_date) < strtotime('now') && $proj->proj_status!='Complete'): ?> style="color:#af0000"; <?php elseif($proj->proj_status=='Pending'): ?> style="color:#0057af"; <?php elseif($proj->proj_status=='Complete'): ?> style="color:#00af14"; <?php else: ?> style="color:#f9840e"; <?php endif; ?>"><?php if(strtotime($proj->proj_end_date) < strtotime("now") && $proj->proj_status!='Complete'): ?> Delayed <?php else: ?> <?php echo e($proj->proj_status); ?> <?php endif; ?></span></h3>
						</li>
                        <li class="hidden-phone" style="width: 30%;">
						  <?php if($proj->proj_status!='Complete'): ?>
							<?php if(strtotime($proj->proj_end_date) < strtotime('now')): ?>
								<span class="name"> Days Delayed</span>
								<span class="value text-danger"> <?php  echo date_diff(date_create("now"),date_create($proj->proj_end_date))->format('%a days')  ?></span>
							<?php else: ?>
								<span class="name"> Remaining Days</span>
								<span class="value text-success"> <?php  echo date_diff(date_create("now"),date_create($proj->proj_end_date))->format('%r%a days')  ?></span>
							<?php endif; ?>
						  <?php else: ?>
							<span class="name"> Date Completed </span>
							<span class="value text-success"> <?php echo e($proj->proj_complete_date); ?> </span>
                          <?php endif; ?>
						</li>
                      </ul>
                      <br />
                    </div>

					
					<!-- start project-detail sidebar -->
                    <div class="col-md-12 col-sm-12 col-xs-24">

                      <section class="panel">

                        <div class="panel-body" style="margin-top:-27px;">
						  <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:15px;">

                          <p style="font-size:1.5em;" ><strong>Project Description</strong></p>
                          <p style="font-size:1em;"><?php echo e($proj->pi_description); ?></p>
						  <br />

                          <div class="project_detail">
						  <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p style="font-size:1.5em;"><strong>Client Company</strong></p>
                            <p><?php echo e($client->cl_company); ?><br>
							   <?php echo e($client->cl_address); ?> <br>
							   <?php echo e($client->cl_contact); ?><br>
							   <?php echo e($client->cl_email); ?>

							</p>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <p style="font-size:1.5em;"><strong>Project Leader</strong></p>
                            <img src="images/profile/<?php echo e($proj->emp_image); ?>" class="avatar" alt="Avatar">
								&nbsp;<?php echo e($proj->emp_first_name.' '.$proj->emp_middle_initial.' '.$proj->emp_last_name); ?>

							</div>

                          <br />
						  </div>

						  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="margin-top:15px;">
							<p style="font-size:1.5em;"><strong>Equipment Deployed</strong></p>
                                 <table class="table table-striped projects">
								 <thead>
                                 <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 50%">Equipment</th>
                                    <th style="width: 10%">Capacity</th>
                                 </tr>
                                 </thead>
								 <tbody>
								 <?php $__currentLoopData = $equipdep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipdep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
									<td><?php echo e($equipdep->ei_id); ?></td>
									<td><?php echo e($equipdep->ei_manufacturer.' '.$equipdep->ei_serial_model_plate); ?></td>
									<td><?php echo e($equipdep->ei_capacity_qty.' '.$equipdep->ei_capacity_unit); ?></td>
                                 </tr>
								 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								 </tbody>
					             </table>
								 <div class="divider"></div>
                          </div>

						<div class="col-md-12 col-sm-12 col-xs-24">
							<p class="title"><strong>Project Tasks</strong></p>
							<!-- start task list -->
							<table class="table table-striped ">
								<thead style="background-color: #353959; color:#ffffff;">
									<tr>
										<th style="width: 25%">Phase</th>
										<th style="width: 30%">Task</th>
										<th style="width: 10%">Deadline</th>
										<th style="width: 15%; text-align:center;">Percentage</th>
										<th style="width: 15%; text-align:center;">Status</th>
									</tr>
								</thead>
								<tbody>
								<?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<a><?php echo e($task->phase_title); ?></a>
											<br />
											<small><?php echo e($task->phase_description); ?></small>
										</td>
										<td>
											<?php echo e($task->task_description); ?>

										</td>
										<td>
											<?php if($task->pt_end_date == '1111-11-11'): ?> Not yet set
                                            <?php else: ?><?php echo e($task->pt_end_date); ?>

                                            <?php endif; ?>
										</td>
										<td class="center">
											<div class="project_progress" style="text-align:center;">
												<div class="progress progress_sm">
													<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo e($task->pt_percentage); ?>"></div>
												</div>
												<small><?php echo e($task->pt_percentage); ?>% Complete</small>
											</div>
										</td>
										<td class="center">
											<span class="<?php if($task->pt_status=='Complete'): ?> label label-success <?php elseif($task->pt_status=='On Going'): ?> label label-warning <?php else: ?> label label-error grey-text <?php endif; ?>"  style="font-size:13px;"><?php echo e($task->pt_status); ?></span>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						<!-- end task list -->
						  </div>
						  
						<div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
							<p class="title"><strong>Project Financials</strong></p>

							<table class="table table-striped">
							<thead style="background-color: #353959; color:#ffffff;">
								<tr>
									<th>Contract Plan</th>
									<th>Cost</th>
									<th style="text-align:center">Quantiy</th>
									<th style="text-align:center">Final Cost</th>
								</tr>
							</thead>
							<tbody style="font-size: 14px;">
								<?php $__currentLoopData = $plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
									<td><?php echo e($plan->task_description); ?></td>
									<td><?php echo e($plan->task_unit_cost.' / '.$plan->task_unit); ?></td>
									<td style="text-align:center"><?php echo e($plan->pt_qty); ?></td>
									<td style="text-align:right">
										<span>
											<strong>
												₱ <?php $number = $plan->pt_total_cost; echo number_format ( $number , "2" , "." , "," )?>
											</strong>
										</span>
									</td>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<tr style=" border-top: 3px solid gray;">
											<td colspan="3" align="right" class="quote-align-right"style="color:black; font-size:16px"><strong>Total Cost:</strong></td>
											<td class="subtotal" style="text-align:right;"><strong>₱ <?php $number = $plan->cb_total; echo number_format ( $number , "2" , "." , "," )?></strong></td>
										</tr>
										<tr>
											<td colspan="3" align="right" class="quote-align-right" style="color:black; font-size: 16px;"><strong>Received by ALCEL:</strong></td>
											<td class="subtotal bg-green " style="text-align:right"><strong>₱ <?php $number = $plan->cb_paid; echo number_format ( $number , "2" , "." , "," )?></strong></td>
										</tr>
										<tr>
											<td colspan="3" align="right" class="quote-align-right" style="color:black; font-size: 16px;"><strong>Balance:</strong></td>
											<td class="subtotal bg-red" style="text-align:right"><strong>₱ <?php $number = $plan->cb_balance; echo number_format ( $number , "2" , "." , "," )?></strong></td>
										</tr>
							</tbody>
						</table>

						</div>


                      </section>

                    </div>
					<div class="text-center">
                            
                        <?php if($proj->proj_status != 'Closed'): ?><a <?php if($proj->proj_status != 'Closed'): ?> href="/project_edit?id=<?php echo e($proj->proj_no); ?>" <?php endif; ?> class="btn btn-primary edittype" style="width: 140px; height: 30px; font-size:15px;">Edit Details</a><?php endif; ?>
                    </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>


                  </div>
                </div>
              </div>
            </div>

     
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
	<!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	  <script>
	  $(document).ready(function() {
			$('select').material_select();
	  });

	  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
	  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardAM', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>