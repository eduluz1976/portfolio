<?php
/* Smarty version 3.1.31, created on 2017-02-24 04:10:00
  from "C:\Bitnami\meanstack-3.0.6-1\apache2\htdocs\portfolio\app\finantial\tpl\home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58afdc480f2444_68803514',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2506e978f843b184de231ffed9d6895a665b59b7' => 
    array (
      0 => 'C:\\Bitnami\\meanstack-3.0.6-1\\apache2\\htdocs\\portfolio\\app\\finantial\\tpl\\home.tpl',
      1 => 1487919938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58afdc480f2444_68803514 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
	
	    .list-group-item I {
		margin-right: 10px;
	    }
	
    </style>
    
  </head>
  
  
  <body>
      
      <div class="container">
	  
	  
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Hello <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</h4>
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

	  
	  
<?php echo '<script'; ?>
 src="./app/finantial/assets/home.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

$( document ).ready(function() {
    MainHome.init();
});



<?php echo '</script'; ?>
>
	  
	  
	  
	  
  </body>
  
  
  
</html>

<?php }
}
