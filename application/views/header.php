
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HR System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php print base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?php print base_url('assets/css/bootstrap-theme.min.css');?>" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php print site_url('login');?>"><?php print "HR System";?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <?php if($this->users->isAuthorized()) :?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                  Users 
                  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                    <a href="<?php print site_url('users/list');?>">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span> View all users
                    </a>
                </li>
                <li>
                    <a href="<?php print site_url('user/add');?>">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add User
                    </a>
                </li>
              </ul>
            </li>
            <li>
                <a href="<?php print site_url('requests');?>">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Requests
                </a>
            </li>
            
            <?php endif;?>
            <li>
                <a href="<?php print site_url('request/add');?>">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Requests
                </a>
            </li>
            <li>
                <a href="<?php print site_url('contact');?>">
                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact
                </a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <?php if($this->users->isAuthorized()) :?>
    <div class="container">
        <div class="col-md-12 text-right">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Welcome <strong><?php print $this->session->userdata('display_name');?></strong> | 
            <?php print anchor('logout','Logout');?>
        </div>
    </div>
    <?php endif;?>
