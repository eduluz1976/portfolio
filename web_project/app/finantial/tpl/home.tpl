<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
	{literal}
	    .list-group-item I {
		margin-right: 10px;
	    }
	{/literal}
    </style>
    
  </head>
  
  
  <body>
      
      <div class="container">
	  
	  
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Hello {$name}</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          
                              <div class="form-group">
                                  <label for="fullname" class="control-label">Nome</label>
                                  <input type="text" class="form-control" id="fullname" name="fullname" value="" required="" title="Please enter you full name" placeholder="John Doe">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group has-feedback">
                                  <label for="cpf" class="control-label">CPF</label>
                                  <input type="text" class="form-control" id="cpf" name="cpf" value="" required="true" title="000.000.000-00" placeholder="00000000000">
				  <span class="glyphicon form-control-feedback"></span>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="email" class="control-label">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="" required="" title="Inform your email" placeholder="you@yourdomain">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>

                              <button type="button" id="btnValidateCPF" disabled="1" class="btn btn-success btn-block">Register</button>
                         
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">What is <span class="text-success">CPF?</span></p>
		      <p>
			  CPF is a brazilian code that identifies a person, mainly for tax purposes. 
		      </p>

		      
		      Some examples of code: 
		      <ul class="list-group small" id="samples-list">
			  <li class="list-group-item"><i class="glyphicon glyphicon-ok text-success"></i>02450020578</li>
			  <li class="list-group-item "><i class="glyphicon glyphicon-ok text-success"></i>98871420420</li>
			  <li class="list-group-item "><i class="glyphicon glyphicon-ban-circle text-danger"></i>98871420410</li>
			  <li class="list-group-item "><i class="glyphicon glyphicon-ban-circle text-danger"></i>9887142041X</li>
			  <li class="list-group-item "><i class="glyphicon glyphicon-ban-circle text-danger"></i>12345</li>
		      </ul>
		      
                      <p><a href="https://ca.linkedin.com/in/eduluz" target="_blank" class="btn btn-info btn-block">See my profile at</a></p>
		      
                  </div>
              </div>
          </div>
      </div>
  </div>
	  
      </div>

	  
	  
<script src="./app/finantial/assets/home.js"></script>

<script>
{literal}
$( document ).ready(function() {
    MainHome.init();
});
{/literal}


</script>
	  
	  
	  
	  
  </body>
  
  
  
</html>

