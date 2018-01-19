<html>
<head>
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
    
  <!-- validation -->
  <script src="../vendors/validation/dist/jquery.validate.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#loginForm').validate({
          rules: {
              username: {
                  minlength: 3,
                  maxlength: 15,
                  required: true
              },
              password: {
                  minlength: 3,
                  maxlength: 15,
                  required: true
              }
          },
          highlight: function(element) {
              $(element).closest('.form-group').addClass('has-error');
          },
          unhighlight: function(element) {
              $(element).closest('.form-group').removeClass('has-error');
          },
          errorElement: 'span',
          errorClass: 'help-block',
          errorPlacement: function(error, element) {
              if (element.parent('.input-group').length) {
                  error.insertAfter(element.parent());
              } else {
                  error.insertAfter(element);
              }
          }
      });

    });
  </script>
  <script type="text/javascript">
    window.onload = function() {
      if (window.jQuery) {  
        // jQuery is loaded  
        alert("Yeah!");
      } else {
        // jQuery is not loaded
        alert("Doesn't Work");
      }
    }
  </script>
  <script type="text/javascript">
    var form = $('#formvalidation');
    if(form.data('validator')){
      // validator exists   
      alert("Yeah!!");  
    }
  </script>
</head>  
<body>
  <p class="text-center">
    <button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>
  </p>

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <h5 class="modal-title">Login</h5>
              </div>

              <div class="modal-body">
                  <!-- The form is placed inside the body of modal -->
                  <form id="loginForm" method="post" class="form-horizontal">
                      <div class="form-group">
                          <label class="col-xs-3 control-label">Username</label>
                          <div class="col-xs-5">
                              <input type="text" class="form-control" name="username" />
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-xs-3 control-label">Password</label>
                          <div class="col-xs-5">
                              <input type="password" class="form-control" name="password" />
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-5 col-xs-offset-3">
                              <button type="submit" class="btn btn-primary">Login</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

</body>

</html>
