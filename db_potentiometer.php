<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="ICA Potentiometer Testdaten">
  <meta name="author" content="Manuel Poell">

  <title>Potentiometer</title>

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/starter-template.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Indoor Climate Analysis</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sensoren
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="db_potentiometer.php">Potentiometer</a></li>
                    <li><a href="db_dht.php">DHT22</a></li>
                </ul>
            </li>
            <li><a href="contacts.html">Kontakt</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container-fluid">
    <h1>ICA_Sensors Datenbank</h1>
    <h2>Daten der Tabelle Potentiometer</h2>
    <div class="container">
        <button class="btn btn-info" data-toggle="collapse" data-target="#chart">Chart</button>
    </div>
    <div id="chart" class="collapse in">
        <div class="container">
            <div class="jumbotron">
                <div class="chart-container">
    		        <canvas id="mycanvas"></canvas>
    	        </div>
            </div>
    	    <script type="text/javascript" src="./js/Chart.js"></script>
            <script type="text/javascript" src="./js/Chart.Scatter.min.js"></script>
            <script type="text/javascript" src="./js/jquery.min.js"></script>
            <script type="text/javascript" src="./js/PotChart.js"></script>
        </div>
    </div>
    <div class="container">
        <button class="btn btn-info" data-toggle="collapse" data-target="#data">Data</button>
    </div>
    <div id="data" class="collapse">
        <div class="container">
            <div class="jumbotron">
            <table>
            <?php
            //Create Connection
            require_once ('dbconnect.php');
    		mysql_connect (MYSQL_HOST, MYSQL_USER, MYSQL_PW);
            mysql_select_db('ica_sensors');
            $sql_command = "SELECT * FROM Potentiometer";
            $sql_result = mysql_query($sql_command);
            $num_rows = mysql_num_rows($sql_result);
            $num_field = mysql_num_fields($sql_result);

            echo "<table class=\"table table-striped\">";
            echo "<tr>";

            for($n = 0; $n < $num_field; $n++)
            {
                $fieldname = mysql_field_name($sql_result, $n);
                echo "<th>" . $fieldname. "</th>\n";
            }
            echo "<tr>";
            while ($data = mysql_fetch_assoc($sql_result))
            {
                echo "<tr>";
                foreach ($data as $key => $value)
                {
                    echo "<td>" . $value . "</td>\n";
                }
                echo "</tr>\n";
            }
            echo "</table>";
            while ($data = mysql_fetch_assoc($sql_result))
            ?>
            </table>
            </div>
        </div>
    </div>
    <footer>Indoor Climate Analysis</footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="./js/jquery.min.js"><\/script>')</script>
<script src="./js/bootstrap.min.js"></script>

</body>
</html>
