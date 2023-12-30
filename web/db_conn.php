<?php

$sname= "sql.freedb.tech";

$unmae= "freedb_filtbase";

$password = "v9pv3g@ms#tPM5n";

$db_name = "freedb_filtbase";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {

    echo "Connection failed!";

}
