<?PHP
/* Set the correct header */
header('Content-type: application/json');

define("MySQL_HOST", "localhost");
define("MySQL_DATABASE", "");
define("MySQL_TABLE", "");
define("MySQL_USER", "");
define("MySQL_PASSWORD", "");
define("REQUEST", $_GET['q']);

$rows = array();

/* Connecting to the databse*/
$mysqli = mysqli_connect(MySQL_HOST, MySQL_USER, MySQL_PASSWORD, MySQL_DATABASE) or
    die('Could not connect: ' . mysql_error());

/* Select the correct row in the table according to the request*/
$result = $mysqli->query("SELECT restaurant_name FROM restaurants where (restaurant_name like '".REQUEST."%') OR (cuisine_type like '".REQUEST."%') order by restaurant_name");

/* Stuff the records into an array to be used later by json_encode() */
while($r = mysqli_fetch_assoc($result)) 
  $rows[] = $r['restaurant_name'];

/* Print out a json verion of the array. */
print json_encode($rows);

/* Free result set */
$result->close();

/* Close MySQLi connection */
$mysqli->close();


?>