<html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>archive_day_UV</title>
</head>
<body>
    <h1>Weewx Datenbank</h1>
    <h2>Daten der Tabelle archive_day_UV</h2>
    <a href="index.html"><button type="button">zurueck</button></a>
    <table>
        <?php
        //Create Connection
        require_once ('dbconnect.php');
		mysql_connect (MYSQL_HOST, MYSQL_USER, MYSQL_PW);
        mysql_select_db(MYSQL_DB);
        $sql_command = "SELECT * FROM archive_day_UV";
        $sql_result = mysql_query($sql_command);
        $num_rows = mysql_num_rows($sql_result);
        $num_field = mysql_num_fields($sql_result);
        
        echo "<table>";
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
        <a href="index.html"><button type="button">zurueck</button></a>
        <footer>Indoor Climate Analysis</footer>
</body>
</html>