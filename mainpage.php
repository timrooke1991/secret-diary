<?php  

  session_start();

  include("connection.php");

  $query = "SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";

  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  $diary = $row['diary'];

?>

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

    #topRow p {
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

    .download {
      
      padding-top: 70px;
    }

    .marginBottom {
      margin-bottom: 10px;
    }

    .appStoreImage {
      height: 100px;
      top: 50px;
    }

    textarea {
      margin-top: 30px;
    }
    

    </style>

  </head>

  <body data-spy="scroll" data-target=".navbar-default">

    <div class="navbar navbar-default navbar-fixed-top">

      <div class="container">

        <div class="navbar-header pull-left">

          <a href="" class="navbar-brand"><span class="my">Secret Diary</a>

        </div>

        <div class="pull-right">

            <ul class="navbar-nav nav">

                <li><a href="index.php?logout=1">Log Out</a></li>

            </ul>

        </div>
      </div>

       <div class="container contentFirstContainer" id="topContainer">

        <div class="row">

          <div class="col-md-6 col-md-offset-3"> 

        

            <textarea class="form-control">

              <?php echo $diary; ?>

            </textarea>

            

        </div>



      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

   <script type="text/javascript">

    $(".contentFirstContainer").css("min-height",$(window).height());

    $("textarea").css("min-height",$(window).height()-120);

    $("textarea").keyup(function(){

      $.post("updatediary.php", {diary:$("textarea").val() });

      });

   

    </script>

  </body>

</html>