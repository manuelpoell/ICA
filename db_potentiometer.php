<html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>Potentiometer</title>
</head>
<body>
<div class="container-fluid">
    <h1>ICA_Sensors Datenbank</h1>
    <h2>Daten der Tabelle Potentiometer</h2>
    <a href="index.html"><button type="button">zurueck</button></a>
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
            <script type="text/javascript" src="./js/jquery.min.js"></script>
    	    <script type="text/javascript" src="./js/Chart.min.js"></script>
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
    <a href="index.html"><button type="button">zurueck</button></a>
    <footer>Indoor Climate Analysis</footer>
</div>
</body>
</html>
