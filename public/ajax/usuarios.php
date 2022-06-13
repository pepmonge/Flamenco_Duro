<?php
header('Content-Type: text/txt; charset=utf-8');
$conexion=mysqli_connect("localhost","root","","flamenco_duro") or
    die("Problemas con la conexión");

    $registros=mysqli_query($conexion,"select u.id, u.name from articles a inner join users u on a.user_id = u.id") or 
  die("Problemas en el select".mysqli_error($conexion));

while ($reg=mysqli_fetch_assoc($registros))
{
  $vec[]=$reg;
}

$cad=json_encode($vec);
echo $cad;
?>
