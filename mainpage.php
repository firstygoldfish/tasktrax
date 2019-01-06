<?php
  require_once("classes/session.php");
  $ses = new Session();
	if (!$ses->authorised())
    {
      header("Location:index.php");
    }
  require_once("classes/database.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Starter Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="tasktrax.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="mainpage.php">TaskTrax</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="panel-body">
                <div class="pull-right">
                    <div class="btn-group">
                        <?php
                          $db = new Database("/var/www/connectvars/todo_vars.inc");
                          $db->useDatabase("todo");
                          $resultset = $db->getRows("projects","");
                          while ($row = mysqli_fetch_assoc($resultset))
                          {
                            if($row["id"] % 2 == 0)
                            {
                              $btn = "btn-default";
                            }  else {
                              $btn = "btn-info";
                            }
                            echo '<button type="button" class="btn '.$btn.' btn-filter" data-target="'.$row["name"].'">'.$row["name"].'</button>';
                          }
                       ?>
                        <button type="button" class="btn btn-secondary btn-filter" data-target="all">All</button>
                    </div>
                    <a class="btn btn-success" href="logout.php">New</a>
                </div>
                <div class="table-container">
                    <table class="table table-filter">
                        <tbody>
                            <!-- Start of task -->
                            <?php
                                  $resultset = $db->getRows("tasks_vw","");
                                  if (!$resultset) { echo "<tr><th>Wow! No tasks on your list.</th></tr>"; }
                                  while ($row = mysqli_fetch_assoc($resultset))
                                  {
                                  echo '<tr data-status="'.$row["project_name"].'">

                                        <td>
                                            <div class="media">
                                                <a href="#" class="pull-left"> </a>
                                                <div class="media-body">
                                                    <span class="media-meta pull-right">'.$row["required"].'</span>
                                                    <h4 class="title">
        														                   '.$row["name"].'<span class="pull-right pagado">('.$row["project_name"].')</span> </h4>
                                                    <p class="summary">'.$row["description"].'</p>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>';
                                  }
                            ?>
                            <!-- END of task -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- TASKS -->
        <script>
        $(document).ready(function () {
      	$('.star').on('click', function () {
            $(this).toggleClass('star-checked');
          });

          $('.ckbox label').on('click', function () {
            $(this).parents('tr').toggleClass('selected');
          });

          $('.btn-filter').on('click', function () {
            var $target = $(this).data('target');
            if ($target != 'all') {
              $('.table tr').css('display', 'none');
              $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
              $('.table tr').css('display', 'none').fadeIn('slow');
            }
          });

       });
       </script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
