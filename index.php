<?php include("login.php"); ?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Diary</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

    .navbar-brand {
      font-size: 2em;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .my {
      color: #C71C77;
    }

    .app {
      color: #C71C77;
    }
    
    #topContainer {
      background-image: url("images/background.jpeg");
      width: 100%;
      background-size: cover;
      
    }

    #topRow {
      margin-top: 15px;
      text-align: center;
      border-radius: 20px;
       background-color: rgba(0, 0, 0, 0.55);
      padding: 5px 10px 5px 10px;
            font-size: 1.5em;
      letter-spacing: 2px;
      text-shadow:
      -1px -1px 0 #33363B,
      1px -1px 0 #33363B,
      -1px 1px 0 #33363B,
      1px 1px 0 #33363B;  
    }

    #topRow .app {
      font-size: 1.5em;
      letter-spacing: 2px;
      text-shadow:
      -1px -1px 0 #EEE,
      1px -1px 0 #EEE,
      -1px 1px 0 #EEE,
      1px 1px 0 #EEE; 
    }



    #topRow .my {
      font-size: 1.5em;
      letter-spacing: 2px;
      text-shadow:
      -1px -1px 0 #33363B,
      1px -1px 0 #33363B,
      -1px 1px 0 #33363B,
      1px 1px 0 #33363B;  
    
    }

    #topRow p, label  {
      color: #E6E6E6;
      
    }

    .input-group {
      margin-top: 10px;
    }


    .btn-lg {
      margin-bottom: 10px;
      border-color: #C71C77;
      background-color: #33363B;
      color: #E6E6E6;
      font-weight: bold;
    }

    .center {
      text-align: center;


    }

    .glyphicon {
      float: right;
      right: 20px;
    }

    .btn-mid {
      margin-top: 10px;
      border-color: #C71C77;
      background-color: #33363B;
      color: #E6E6E6;
    }

    .btn-glyphicon {
      font-size: 1.4em;
      right: 0px;
      left: 10px;
      top: 0px;
      padding-right: 5px;
    }

    #footer {
      background-color: #C71C77;
      width: 100%;
      color: #E6E6E6;
    }

    .marginBottom {
      margin-bottom: 10px;
    }

    .form-label {
      color: #E6E6E6;
      
    }
    
    </style>

  </head>

  <body data-spy="scroll" data-target=".navbar-default">

    <div class="navbar navbar-default navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">

          <a href="" class="navbar-brand"><span class="my">Secret Diary</a>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

         </button>

        </div>

        <div class="collapse navbar-collapse">

          <form class="navbar-form navbar-right" method="post">

            <div class="form-group">

              <input type="email" placeholder="Email" class="form-control" name="loginemail" value="<?php echo addslashes($_POST['email']); ?>"/>

              <input type="password" placeholder="Password" class="form-control" name="loginpassword" value="<?php echo addslashes($_POST['password']); ?>"/>

            </div>

            <input type="submit" class="btn btn-success" name="submit" value="Log In"/>
          </form>
        </div>
      </div>

       <div class="container contentFirstContainer" id="topContainer">

        <div class="row">

          <div class="col-md-6 col-md-offset-3"> 

          <div id="topRow">

            <h1><span class="my">Secret Diary</h1>

            <p class="lead"> This is your own private diary, with you wherever you go!</p>

            <?php 

            	if ($error) {

            		echo '<div class="alert alert-danger">'.addslashes($error).'</div>';

            	}

              if ($message) {

                echo '<div class="alert alert-success">'.addslashes($message).'</div>';

              }

            ?>



            <p class="bold">Interested? Sign up below!</p>

          

            <form method="post">

              <div class="form-group">

              		<label for="email" class="form-label">Email Address</label>

	                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo addslashes($_POST['email']); ?>">

              </div>

              <div class="form-group">

              		<label for="password" class="form-label">Password</label>

	                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo addslashes($_POST['password']); ?>">

              </div>

              <div class="subbutton">

                  <input type="submit" name="submit" value="sign up" class="btn btn-default btn-lg"></input>

              </div>

              </div>

              </div>

            </form>

          </div>          

        </div>



      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

   <script type="text/javascript">

    $(".contentFirstContainer").css("min-height",$(window).height());

    $(".contentSubsequentContainer").css("min-height",$(window).height()-40);

    </script>

  </body>

</html>