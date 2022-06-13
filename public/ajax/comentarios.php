<?php
header('Content-Type: text/txt; charset=utf-8');
$conexion=mysqli_connect("localhost","root","","flamenco_duro") or
    die("Problemas con la conexión");
    $id = $_REQUEST['id'];
$registros=mysqli_query($conexion,"select com.article_id, com.comentario, DATE_FORMAT(com.created_at, '%d-%m-%Y') as fecha, art.id, us.name from comments com inner join users us on com.user_id = us.id inner join articles art on com.article_id = art.id where article_id = $id") or 
  die("Problemas en el select".mysqli_error($conexion));

while ($reg=mysqli_fetch_assoc($registros))
{
  $vec[]=$reg;
}

$cad=json_encode($vec);
echo $cad;
?>
