@extends('layouts.dashboardAM') 
@section('page_title','Project Add') 
@section('page_content')

<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel" >
        <div class="x_title">
          <h2>Add Project <small>Contract</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="container1">
            <div class="row form-group" style="height: 0px; margin-bottom: -10px;">
              <div class="col-xs-12" style="height: 0px; margin-bottom: -10px;">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel" style="height: 90px; margin-bottom: -50px;">
                  <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Step 1</h4>
                    <p class="list-group-item-text">Client & Company Information</p>
                  </a></li>
                  <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Step 2</h4>
                    <p class="list-group-item-text">Contract Information</p>
                  </a></li>
                  <li class="active"><a href="#step-3">
                    <h4 class="list-group-item-heading">Step 3</h4>
                    <p class="list-group-item-text">Project Information</p>
                  </a></li>
                  <li class="disabled"><a href="#step-4">
                    <h4 class="list-group-item-heading">Step 4</h4>
                    <p class="list-group-item-text">Equipment Information</p>
                  </a></li>
                </ul>
              </div>
            </div>
          </div>
          @if(count($errors))
          <div class='form-group' id = 'flash'>
            <div class = 'alert alert-danger'>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif

          <form method="post" action="/addproject" id="project_form">
            {{ csrf_field() }}

            <div class="container">
              <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                  <div class="col-md-12 well text-center">
                    <h1 style="margin-bottom: 3%;"> CLIENT & COMPANY </h1>

                    <!--div style="float: center;">
                      <div style="float: left; margin-left: 10%">
                        <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback" >
                         <label>Client list</label>
                         <select class="form-control client" name="client" required="">
                          <option value="" disabled selected>----------Select Client Name----------</option>
                          @foreach($client as $client)
                          <optino value="{{$client->cr_id}}">{{$client->cr_first_name}}</optino>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div style="float: right;margin-right: 10%">
                      <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback" >
                       <label>Company list</label>
                       <select class="form-control company" name="company" required="">
                        <option value="" disabled selected>----------Select Company Name----------</option>
                        @foreach($company as $company)
                        <option value="{{$company->cl_no}}">{{$company->cl_company}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </br></br></br-->
                <div>
                  <h2 class="StepTitle" style="text-align:center; margin-bottom: 15px;">Client Information</h2>
                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control has-feedback-left" id="client_fname" name="client_fname" required="required" placeholder="First Name"> 
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control" id="client_lname" name="client_lname" required="required" placeholder="Last Name">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="email" class="form-control has-feedback-left" id="client_email" name="client_email" required="required" placeholder="Email">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <input type="text" class="form-control" id="client_phone" name="client_phone" required="required" placeholder="Phone">
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-9 col-sm-9 col-xs-18 form-group has-feedback" style="margin-bottom:20px;">
                    <input type="text" class="form-control has-feedback-left" id="client_address" name="client_address" required="required" placeholder="Address">
                    <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="col-md-3 col-sm-3 col-xs-6 form-group has-feedback" style="margin-bottom:20px;">
                    <input type="text" class="form-control" id="client_position" name="client_position" required="required" placeholder="Position">
                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                  </div>

                  <h2 class="StepTitle" style="text-align:center; ">Company Information</h2>
                  <div class="form-group col-md-12 col-sm-12 col-xs-24">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="company-name" name="company-name" required="required" class="form-control col-md-7 col-xs-12" name="company-name">
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-24">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="company-address" name="company-address" required="required" class="form-control col-md-7 col-xs-12" name="company-address">
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-24">
                    <label  class="control-label col-md-3 col-sm-3 col-xs-12">Telephone No. <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="company-phone" name="company-phone" required="required" class="form-control col-md-7 col-xs-12" name="company-address">
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-24" >
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Address <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 1%">
                      <input type="email" id="company-email" name="company-email" required="required" class="form-control col-md-7 col-xs-12" name="company-address">
                    </div>
                  </div>
                </div>

                <div >
                  <button id="activate-step-2" class="btn btn-primary btn-md">Next Step ></button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                <h1 style="margin-bottom: 3%;"> CONTRACT INFORMATION </h1>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="contract-title" name="contract-title"required="required" placeholder="Contract Title *" onchange="something(this.value)>
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="contract-signedby" name="contract-signedby" required="required" placeholder="Signed by *">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label>Contract Type</label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <label>Signed Date</label>
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" id="contract-type" name="contract-type" required>
                    <option value="" disabled selected>Select Contract Type</option>
                    <option value="Horizontal">Horizontal</option>
                    <option value="Vertical">Vertical</option>
                  </select>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <input type="date" class="form-control" id="contract-date" name="contract-date" required="required">
                </div>
                <article style="margin-bottom: 5px">
                  <table class="meta">
                    <tr>
                      <th><span>Amount Due</span></th>
                      <td><span id="prefix">P</span><span>0.00</span></td>
                    </tr>
                  </table>
                  <div class="col-md-6 col-sm-6 col-xs-12" style="margin-right:-4px; margin-top:-30px; margin-bottom:20px; width:100%; text-align:center" >
                    <a  data-toggle="modal" data-target="#addContractPlan"><button type="button" class="button" ><i class="fa fa-plus"></i> &nbsp Add Contract Plan</button></a>
                  </div>
                  <table class="bill" id="bill">
                    <thead>
                      <tr>
                        <th><span>Action</span></th>
                        <th style="width:8%"><span>Item No</span></th>
                        <th style="width:30%"><span>Description</span></th>
                        <th><span>Unit</span></th>
                        <th><span>Rate</span></th>
                        <th><span>Quantity</span></th>
                        <th><span>Price</span></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <table class="balance" >
                    <tr>
                      <th><span>Total</span></th>
                      <td><span data-prefix>P </span><span> 0.00</span></td>
                    </tr>
                    <tr>
                      <th><span>Payment (15%):</span></th>
                      <td><span data-prefix>P </span><span> 0.00</span></td>
                    </tr>
                    <tr>
                      <th><span>Balance Due</span></th>
                      <td><span data-prefix>P </span><span> 0.00</span></td>
                    </tr>
                  </table>
                </article>

                <input type="hidden" id="total" name="contract-total" class="total">
                <input type="hidden" id="paid" name="contract-paid" class="paid">
                <input type="hidden" id="balance" name="contract-balance" class="balance">

                <button id="activate-step-3" class="btn btn-primary btn-md">Next Step ></button>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                <h1 style="margin-bottom: 3%;"> Project Information </h1>
                <div class="col-md-12 col-sm-12 col-xs-24".>

                  <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
                    <label style="float: left"> Project Name </label>
                    <input type="text" class="form-control has-feedback-left" id="project-name" name="project-name" placeholder="Project Name" required="required">
                    <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="form-group col-md-6 col-sm-6 col-xs-12" style="margin-top:1%">
                    <label style="float: left"> Project Manager <small style="font-size: 1.05rem"> (only shows available PMs)</small></label>
                    <select class="form-control" required id="project-manager" name="project-manager">
                      <option value="" disabled selected>Select Project Manager</option>
                      @foreach($promanager as $promanager)
                      <option value="{{$promanager->emp_id}}">{{$promanager->emp_first_name}} {{$promanager->emp_last_name}} </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="margin-top:1%">
                    <label style="float: left"> Construction Site </label>
                    <input type="text" class="form-control has-feedback-left" name="construction-site" id="construction-site" placeholder="Construction Site" required="required" style="background-color: #fff">
                    <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div id="floor-nono" class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="margin-top: 15px; display:none">
                    <input type="text" class="form-control has-feedback-left" name="floor-no" id="floor-no" placeholder="No of Floor/s" required="required" style="background-color: #fff">
                    <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div id="floor-areaa" class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="margin-top: 15px; display:none">
                    <input type="text" class="form-control has-feedback-left" name="floor-area" id="floor-area" placeholder="Floor Area (square feet)" required="required" style="background-color: #fff">
                    <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div id="road-lengthh" class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="margin-top: 15px;">
                    <input type="text" class="form-control has-feedback-left" name="road-length" id="road-length" placeholder="Total Road Length (km)" required="required" style="background-color: #fff">
                    <span class="fa fa-road form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div id="road-typee" class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" style="margin-top: 15px;">
                    <input type="text" class="form-control has-feedback-left" name="road-type" id="road-type" placeholder="Road Type" required="required" style="background-color: #fff">
                    <span class="fa fa-road form-control-feedback left" aria-hidden="true"></span>
                  </div>

                  <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                    <label>Start & End Date</label>
                    <fieldset>
                      <div class="control-group">
                        <div class="controls">
                          <div class="input-prepend input-group">
                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                            <input onchange="sync()" type="text" name="reservation" id="reservation" class="form-control" required>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <input type="hidden" id="start" name="project-start-date" required>
                    <input type="hidden" id="end" name="project-end-date" required>
                  </div>

                  <div class="form-group" style="margin-top:7%; margin-bottom:20%;">
                    <label >Project Description</label>
                    <div class="col-md-12 col-sm-12 col-xs-24">
                      <textarea class="resizable_textarea form-control" name="project-desc" id="project-desc" rows="7" cols="50" placeholder="Maximum of 250 character"></textarea>
                    </div>
                  </div>
                </div>
                <div>
                  <button id="activate-step-4" class="btn btn-primary btn-md">Next Step ></button>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="container">  
          <div class="row setup-content" id="step-4">
            <div class="col-xs-12">
              <div class="col-md-12 well text-center">
                <h1 class="text-center"> Equipments Information</h1>
                <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
                  <label>Equipments</label>
                  <table class="table table-striped projects" id="equipment_table">
                    <thead style="background-color: #353959; color:#ffffff; font-size: 15px; text-align: left;">
                      <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 35%">Equipment</th>
                        <th style="width: 10%">Capacity</th>
                        <th style="width: 30%">Start Date</th>
                        <th style="width: 10%">Total Days</th>
                        <th style="width: 10%">Action</th>
                      </tr>
                    </thead>
                    <tbody style="background-color: #fff; font-size: 14px; text-align: left;">
                    </tbody>
                  </table>

                  <div style="margin-right:-4px; margin-top:20px;">
                    <a  data-toggle="modal" data-target="#addEquipment"><button type="button" class="button" ><i class="fa fa-plus"></i> &nbsp Add Equipment</button></a>
                  </div>
                </div>
                <button type="submit" class="btn btn-success" id="submit" style="width:100%">Submit</button>
              </div>
            </div>
          </div>
        </div>


      </form>
    </div>
  </div>
</div>
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- validation -->
<script src="../vendors/validation/dist/jquery.validate.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<script src="../build/js/custom.js"></script>
<script src="../build/js/select2.js"></script>
<!-- Dropzone.js -->
<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
<script src="../vendors/upload.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="js/projectbill.js"></script>
<script type="text/javascript" src="js/project_equipment.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>

<!-- Dropzone.js -->
<link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- Custom Theme Style -->
<script type="text/javascript" src="js/table_script.js"></script>


<style>
.button, .add {
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
  float:center;
}
.cut {
  display: inline-block;
  padding: 4px 10px;
  font-size: 13px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #bc3232;
  border: none;
  border-radius: 5px;
  box-shadow: 0 2px #999;
  float:center;
  width: 100%;
}

.button:hover, .add:hover {background-color: #3e8e41;
  color: #fff;
}

.cut:hover {background-color: #7c0101;
  color: #fff;
}

.button:active, .add:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  color: #fff;
}
.cut:active {
  background-color: #9b0c0c;
  box-shadow: 0 3px #666;
  transform: translateY(2px);
  color: #fff;
}
.custom-file-upload-hidden {
  display: none;
  visibility: hidden;
  position: absolute;
  left: -9999px;
}
.custom-file-upload {
  display: block;
  width: auto;
  font-size: 16px;
  margin-top: 30px;
  //border: 1px solid #ccc;
  label {
    display: block;
    margin-bottom: 5px;
  }
}

.container1{ height:100px; }



/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #DEF; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }


/* article */

article, article address, table.meta, table.bill { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.bill { clear: both; width: 100%; }
table.bill th { font-weight: bold; text-align: center; }

table.bill td:nth-child(1) { text-align: center; width: 26%; }
table.bill td:nth-child(2) { text-align: center; width: 38%; }
table.bill td:nth-child(3) { text-align: left; width: 12%; }
table.bill td:nth-child(4) { width: 12%; }
table.bill td:nth-child(5) { text-align: right; width: 12%; }
table.bill td:nth-child(6) { text-align: right; width: 12%; }
table.bill td:nth-child(7) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }


/*input color*/
input[type="text"]:focus,
input[type="password"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="time"]:focus,
input[type="week"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="search"]:focus,
input[type="tel"]:focus,
input[type="color"]:focus,
.uneditable-input:focus {   
  border-color: rgba(111, 41, 250, 1);
  box-shadow: 0 1px 1px rgba(63, 15, 159, 1) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;
}

</style>

<!--ADD MEMBER Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Member</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left input_mask">
          <div style="margin-left:27%; margin-bottom:10px;">
            <img src="images/user.png" class="image" alt="Avatar" style="margin-bottom:10px;">
            <input type="file" id="profile_image">
          </div>

          <div class="form-group col-md-12 col-sm-12 col-xs-24" style="margin-left:25%;">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>Employee ID</label>
              <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-8 form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="first-name" required="required" placeholder="First Name">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-8 form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" id="middle-name" required="required" placeholder="Middle Name">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-8 form-group has-feedback">
            <input type="text" class="form-control" id="last-name" required="required" placeholder="Last Name">
            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <label>Department</label>
            <input type="text" class="form-control" id="department" required="required" placeholder="Department">
            <span class="fa fa-buiding form-control-feedback right" aria-hidden="true"></span>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <label>Position</label>
            <input type="text" class="form-control has-feedback-left" id="position" required="required" placeholder="...">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success">Add</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--ADD EQUIPMENT Modal -->
<div class="modal fade" id="addEquipment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Equipment</h4>
      </div>
      <form class="form-horizontal form-label-left input_mask">
        <div class="modal-body">

          <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 5%;">
           <label>Equipment Type</label>
           <select class="form-control" id="select_equiptype">
            <option value="default" selected disabled>Select Equipment Type</option>
            @foreach($equipcat as $equipcat)
            <option value="{{$equipcat->ec_id}}" data-name="{{$equipcat->ec_category}}">{{$equipcat->ec_category}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 5%;" >
         <label>Equipment Description</label>
         <select class="form-control" id="select_equip">
          <option value="" selected disabled>Equipment Description</option>
        </select>
      </div>

      <input type="hidden" class="equipment-id" id="equipment-id">

      <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
       <input type="text" class="form-control has-feedback-left manufacturer-name" disabled="disabled" id="manufacturer-name" required="required" placeholder="Manufacturer Name">
       <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
     </div>

     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
       <input type="text" class="form-control has-feedback-left serial-model" disabled="disabled" id="serial-model" required="required" placeholder="Serial Model">
       <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
     </div>

     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
       <input type="text" class="form-control equip-capacity" disabled="disabled" id="equip-capacity" required="required" placeholder="Capacity">
       <span class="fa fa-asterisk form-control-feedback right" aria-hidden="true"></span>
     </div>

     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
      <label>Start Date</label>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
      <label>Total Day/s</label>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
     <input type="date" class="form-control start-date" id="start-date" required="required" placeholder="">
     <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
   </div>

   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >  
     <input type="number" class="form-control total-days" id="total-days" required="required" placeholder="0">
     <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
   </div>
 </div>
 <div class="modal-footer" style="margin-top: 30%;" >
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  <button type="button" class="btn btn-success" id="add_equipment" data-dismiss="modal" >Add Equipment</button>
</div>
</form>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
<!-- /.modal -->

<!-- ADD PLAN TO THE CONTRACT -->
<div class="modal fade" id="addContractPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Contract Plan</h4>
      </div>
      <div class="modal-body" id="msg">
        <form class="form-horizontal form-label-left input_mask" id="contract_plan">
          <div class="form-group col-md-12 col-sm-12 col-xs-24" style="margin-bottom: 5%;">
            <label>Plan Description</label>
            <select class="form-control" id="select_plan" name="select_plan">
              <option value="default" selected disabled>Select a Plan</option>
              @foreach($plan as $plan)
              <option value="{{$plan->task_id}}">{{$plan->task_description}}</option>
              @endforeach
            </select>
          </div>

          <input type="hidden" id="task-id" class="task-id">
          <input type="hidden" id="phase-id" class="phase-id">

          <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
            <input type="text" class="form-control has-feedback-left task-description" disabled="disabled" id="task-description" required="required" placeholder="Plan Descrption">
            <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
            <input type="text" class="form-control has-feedback-left task-unit" disabled="disabled" id="task-unit" required="required" placeholder="Unit">
            <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <input type="text" class="form-control task-cost" disabled="disabled" id="task-cost" required="required" placeholder="Cost">
            <span class="fa fa-truck form-control-feedback right" aria-hidden="true"></span>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <input type="text" class="form-control task-quantity" id="task-quantity" name="task_quantity" required="required" placeholder="Quantity">
            <span class="fa fa-asterisk form-control-feedback right" aria-hidden="true"></span>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-24 form-group has-feedback">
            <input type="text" class="form-control task-price" id="task-price" required="required" placeholder="price" readonly>
            <span class="fa fa-asterisk form-control-feedback right" aria-hidden="true"></span>
          </div>
        </div>
        <div class="modal-footer" style="margin-top: 5%;">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success add" data-dismiss="modal" >Add Contract Plan</button>
        </div>
        <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<script>
  /*function checkFilled1() {
    var client_fname = document.getElementById("client_fname");
    var client_lname = document.getElementById("client_lname");
    var client_email = document.getElementById("client_email");
    var client_phone = document.getElementById("client_phone");
    var client_address = document.getElementById("client_address");
    var client_position = document.getElementById("client_position");
    var name = document.getElementById("company-name");
    var address = document.getElementById("company-address");
    var phone = document.getElementById("company-phone");
    var email = document.getElementById("company-email");
    if($.trim(client_fname.value) == ''){
      client_fname.style.boxshadow =" 0 1px 1px rgba(63, 15, 159, 1)";
      console.log('empty');
    }else{
      console.log('not empty');
        client_fname.style.backgroundColor = "";
    }
  }
  checkFilled1();*/
</script>
<script type="text/javascript">
  $(document).ready(function() {
    document.getElementById("submit").disabled = true;
  // Activate Next Step
  var navListItems = $('ul.setup-panel li a');
  var allWells = $('.setup-content');

  allWells.hide();

  navListItems.click(function(e)
  {
    e.preventDefault();
    var $target = $($(this).attr('href')),
    $item = $(this).closest('li');

    if (!$item.hasClass('disabled')) {
            //navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
          }
        });

  $('ul.setup-panel li.active a').trigger('click');
  

    // next step //
    $('#activate-step-2').on('click', function(e) {
      var client_fname = document.getElementById("client_fname").value;
      var client_lname = document.getElementById("client_lname").value;
      var client_email = document.getElementById("client_email").value;
      var client_phone = document.getElementById("client_phone").value;
      var client_address = document.getElementById("client_address").value;
      var client_position = document.getElementById("client_position").value;
      var name = document.getElementById("company-name").value;
      var address = document.getElementById("company-address").value;
      var phone = document.getElementById("company-phone").value;
      var email = document.getElementById("company-email").value;
      if($.trim(client_fname) == ''){
        alert('Client Firstname can not be left blank');
        jQuery.fancybox('<div class="box">Some amazing wonderful content</div>');
      }else if($.trim(client_lname) == ''){
        alert('Client Lastname can not be left blank');
      }else if($.trim(client_email) == ''){
        alert('Client Email can not be left blank');
      }else if($.trim(client_phone) == '' || client_phone < 8){
        alert('Client Phone can not be left blank and must not be less than 7 digit number');
      }else if($.trim(client_address) == ''){
        alert('Client Address can not be left blank');
      }else if($.trim(client_position) == ''){
        alert('Client Position can not be left blank');
      }else if($.trim(name) == ''){
        alert('Client Company Name can not be left blank');
      }else if($.trim(address) == ''){
        alert('Client Company Address can not be left blank');
      }else if($.trim(phone) == '' || phone < 8){
        alert('Client Company Phone can not be left blank and must not be less than 8 digit number');
      }else if($.trim(email) == ''){
        alert('Client Company Email can not be left blank');
      }else{
        var atpos = client_email.indexOf("@");
        var dotpos = client_email.lastIndexOf(".");
        var at = email.indexOf("@");
        var dot = email.lastIndexOf(".");
        
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=client_email.length) {
          alert("Client e-mail address not valid");
          return false;
        }else if (at<1 || dot<at+2 || dot+2>=email.length) {
          alert("Company e-mail address not valid");
          return false;
        }else{//*/
          $('ul.setup-panel li:eq(1)').removeClass('disabled');
          $('ul.setup-panel li a[href="#step-2"]').trigger('click');
          $(this).remove();    
        }//if email not valid
      }//if empty else next step
    });

    $('#activate-step-3').on('click', function(e) {
      var title = document.getElementById("contract-title").value;
      var signed = document.getElementById("contract-signedby").value;
      var type = document.getElementById("contract-type").value;
      var date = document.getElementById("contract-date").value;
      var tblCtr = document.getElementById("bill").rows.length-1;
      if($.trim(title) == ''){
        alert('Contract Title can not be left blank');
      }else if($.trim(signed) == ''){
        alert('Contract Signed By can not be left blank');
      }else if(type == ''){
        alert('Select Contract Type');
      }else if(date == ''){
        alert('Select Contract Signed Date');
      }else if(tblCtr == 0){
        alert('Add Contract Plan');
      }else{//*/
        $('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-3"]').trigger('click');
        $(this).remove();
      }//if empty can not proceed to next
    });

    $('#activate-step-4').on('click', function(e) {
      var name = document.getElementById("project-name").value;
      var manager = document.getElementById("project-manager").value;
      var site = document.getElementById("construction-site").value;
      var no = document.getElementById("floor-no").value;
      var area = document.getElementById("floor-area").value;
      var length = document.getElementById("road-length").value;
      var type = document.getElementById("road-type").value;
      var start = document.getElementById("start").value;
      var end = document.getElementById("end").value;
      var reservation = document.getElementById("reservation").value;
      var desc = document.getElementById("project-desc").value;
      console.log("reservation = "+reservation+" start="+start+" end="+end);
      if($.trim(name) == ''){
        alert('Project Name can not be left blank');
      }else if($.trim(manager) == ''){
        alert('Project Manager can not be left blank');
      }else if($.trim(site) == ''){
        alert('Construction Site can not be left blank');
      }else if($.trim(no) == ''){
        alert('Floor number can not be left blank');
      }else if($.trim(area) == ''){
        alert('Floor area can not be left blank');
      }else if($.trim(length) == ''){
        alert('Road Length can not be left blank');
      }else if($.trim(type) == ''){
        alert('Road Type can not be left blank');
      }else if($.trim(desc) == ''){
        alert('Project Description can not be left blank')
      }else{//*/
        $('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-4"]').trigger('click');
        $(this).remove();
      }//if empty can not proceed to next
    });
    
    $('#activate-step-5').on('click', function(e) {

      $('ul.setup-panel li:eq(4)').removeClass('disabled');
      $('ul.setup-panel li a[href="#step-5"]').trigger('click');
      $(this).remove();
    });//*/

	// Validate client-phone (INT)
	$('#client_phone').keypress(function(eve) {
		if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
      eve.preventDefault();
    }
  });

	// Validate company-phone (INT)
	$('#company-phone').keypress(function(eve) {
		if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
      eve.preventDefault();
    }
  });

    // Validate company-phone (INT)
    $('#task-quantity').keypress(function(eve) {
      if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
        eve.preventDefault();
      }
    });
    
	// Computes plan-price
	$( "#task-quantity" ).keyup(function() {

		var total = 0;

    inpquantity = document.getElementById("task-quantity").value;
    inpcost = document.getElementById("task-cost").value;

    inptotal = inpcost * inpquantity;
    total = inptotal.toFixed(2);
    document.getElementById("task-price").value = total;

  });

//change project title name
	$( "#contract-title" ).keyup(function() {

		var total = 0;

    conname = document.getElementById("contract-title").value;

    document.getElementById("project-name").value = conname;

  });

	$('#contract-type').on('change',function(){
		var contype = document.getElementById("contract-type");
    var floornono= document.getElementById("floor-nono");
    var floorareaa= document.getElementById("floor-areaa");
    var floorno= document.getElementById("floor-no");
    var floorarea= document.getElementById("floor-area");
    var roadtypee= document.getElementById("road-typee");
    var roadlengthh= document.getElementById("road-lengthh");
    var roadtype= document.getElementById("road-type");
    var roadlength= document.getElementById("road-length");
    floornono.style.display = contype.value == "Vertical" ? "block" : "none";
    floorareaa.style.display = contype.value == "Vertical" ? "block" : "none";
    roadlengthh.style.display = contype.value == "Vertical" ? "none" : "block";
    roadtypee.style.display = contype.value == "Vertical" ? "none" : "block";

    roadlength.value = contype.value == "Vertical" ? "0" : "";
    roadtype.value = contype.value == "Vertical" ? "0" : "";
    floorno.value = contype.value == "Vertical" ? "" : "0";
    floorarea.value = contype.value == "Vertical" ? "" : "0";
    floorno.value = contype.value == "Horizontal" ? "0" : "";
    floorarea.value = contype.value == "Horizontal" ? "0" : "";
    roadlength.value = contype.value == "Horizontal" ? "" : "0";
    roadtype.value = contype.value == "Horizontal" ? "" : "0";
        //roadlengthh.style.display = contype.value == "Vertical" ? "none" : "display";
        //roadtypee.style.display = contype.value == "Vertical" ? "none" : "display";
      });

});

//calendar
function sync(){
 var projdate = document.getElementById("reservation").value;

 var s = projdate.slice(0, 11);
 var date = new Date(s);
 var year = date.getFullYear();
 var month = (1 + date.getMonth()).toString();
 month = month.length > 1 ? month : '0' + month;
 var day = date.getDate().toString();
 day = day.length > 1 ? day : '0' + day;
 var start = year + '-' + month + '-' + day;
 document.getElementById("start").value = start;

 e = projdate.slice(13, 24);
 var date1 = new Date(e);
 var year1 = date1.getFullYear();
 var month1 = (1 + date1.getMonth()).toString();
 month1 = month1.length > 1 ? month1 : '0' + month1;
 var day1 = date1.getDate().toString();
 day1 = day1.length > 1 ? day1 : '0' + day1;
 var end = year1 + '-' + month1 + '-' + day1;
 var plus1 = day1+1;
 document.getElementById("end").value = end;
		};//*/

  </script>
  <script>
    $(function() {
      $('#flash').delay(500).fadeIn('normal', function() {
        $(this).delay(500).fadeOut();
      });
    });
  </script>
  @stop