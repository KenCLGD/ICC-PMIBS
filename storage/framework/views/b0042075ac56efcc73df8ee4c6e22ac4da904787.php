 
<?php $__env->startSection('page_title','Dashboard'); ?> 
<?php $__env->startSection('page_content'); ?>

<div class="">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-7">
        <div class="x_panel">
          <div class="x_title">
            <h3>Project Financials <small>Information</small></h3>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <div class="col-md-12 col-xs-24" >
  			  <div class="col-md-12 col-xs-24">
                <!-- start project list -->
                <table id="datatable-responsive" class=" table table-striped projects">
                  <thead style="background-color: #353959; color:#ffffff;">
                    <tr>
                      <th style="width: 50%">Project Name</th>
                      <th style="width: 20%">Amount</th>
                      <th style="width: 20%">Deadline</th>
                      <th style="width: 10%">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($invoice)): ?>
                      <?php $__currentLoopData = $invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($invoice->ci_name); ?></td>
                        <td><?php echo e(number_format($invoice->invoice_amount, 2,'.',',')); ?></td>
                        <td><?php echo e($invoice->invoice_due); ?></td>
                        <td>
                          <!--button type="button" class="btn <?php if(strtotime($invoice->invoice_due) < strtotime('now') && $invoice->invoice_status == 'Unpaid'): ?> btn-danger 
                                                           <?php elseif($invoice->invoice_status=='Paid'): ?> btn-success 
                                                           <?php else: ?> btn-warning 
                                                           <?php endif; ?> btn-xs"><?php if(strtotime($invoice->invoice_due) < strtotime("now") &&$invoice->invoice_status=='Unpaid'): ?> Delayed 
                                                                          <?php else: ?> {$invoice->invoice_status}} 
                                                                          <?php endif; ?>
                          </button-->
                          <span class="label <?php if(strtotime($invoice->invoice_due) < strtotime('now') && $invoice->invoice_status == 'Unpaid'): ?> label-danger 
                                             <?php elseif($invoice->invoice_status=='Paid'): ?> label-success 
                                             <?php else: ?> label-warning 
                                             <?php endif; ?>" style="font-size: 1em;">
                            <?php if(strtotime($invoice->invoice_due) < strtotime("now") &&$invoice->invoice_status=='Unpaid'): ?> Delayed 
                            <?php else: ?> <?php echo e($invoice->invoice_status); ?> 
                            <?php endif; ?>
                          </span>
                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php elseif(empty($invoice)): ?>
                      <td colspan="4" style="text-align:center;">There's no data</td>
                    <?php endif; ?>
                  </tbody>
                </table>
                    <!-- end project list -->
              </div>
            </div>
          </div>
        </div>

        <div class="x_panel">
          <div class="x_title">
            <h3>Equipment <small>Information</small></h3>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-xs-24" style="margin-left: 0px">
              <div class="col-md-12 col-xs-24" style="margin-left: 0px">
                <!-- start project list -->
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead style="background-color: #353959; color:#ffffff;">
                    <tr>
                      <th>ID</th>
                      <th>Description</th>
                      <th>Available</th>
                      <th>Deployed</th>
                      <th>Defective</th>
                      <th>Total Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $equip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($var->id); ?></td>
                      <td><?php echo e($var->ec_category); ?></td>
                      <?php
                      if($var->Available==0){
                        echo '<td>0</td>';
                      }else{
                        echo '<td>'. $var->Available. '</td>';
                      }if($var->Deployed==0){
                        echo '<td>0</td>';
                      }else{
                        echo '<td>'. $var->Deployed. '</td>';
                      }if($var->Defective==0){
                        echo '<td>0</td>';
                      }else{
                        echo '<td>'. $var->Defective. '</td>';
                      }
                      ?>
                      <td><?php echo e($var->ec_quantity); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                  <!-- end project list -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-5 col-xs-24" style="margin-left: -30px; ">
        <ul>       
          <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <li>
			<div class="col-md-12 col-xs-24" style="text-align: center; margin-top:-10px;">
              <div class="w3-animate-zoom x_panel ui-ribbon-container fixed_height_350 fixed_width_600" style=" background-color: #353959; color:#ffffff;">
                <div class="x_content">
                  <div style="text-align: center; margin-bottom: 17px;">
                    <a href="/project_detail?id=<?php echo e($proj->proj_no); ?>"><h5 class="name_title" style="color:#ffffff"><?php echo e($proj->ci_name); ?></h5></a>
                    <p>Status: <?php if(strtotime($proj->proj_end_date) < strtotime("now") && $proj->proj_status!='Complete'): ?> Delayed 
                               <?php else: ?> <?php echo e($proj->proj_status); ?> 
                               <?php endif; ?>
                    </p>
                    <div class="project_progress">
                      <div class="progress progress_sm">
                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo e($proj->proj_percentage); ?>"></div>
                      </div>
                      <small><?php echo e($proj->proj_percentage); ?>% Complete</small>
                    </div>
                  </div>
                  <div class="divider"></div>
                  <div class="col-md-4 col-sm-4 col-xs-8 tile_stats_count">
                    <span class="count_top"><i class="fa fa-calendar"></i> START</span>
                    <div class="count"><?php echo e($proj->proj_start_date); ?></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-8 tile_stats_count">
                    <span class="count_top"><i class="fa fa-calendar"></i> Remaining</span>
                    <div class="count green"><strong><?php  echo date_diff(date_create("now"),date_create($proj->proj_end_date))->format('%r%a days')  ?> CD</strong></div>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-8 tile_stats_count" >
                    <span class="count_top"><i class="fa fa-calendar"></i> DEADLINE</span>
                    <div class="count"><strong><?php echo e($proj->proj_end_date); ?></strong></div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
        </ul>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboardAM', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>