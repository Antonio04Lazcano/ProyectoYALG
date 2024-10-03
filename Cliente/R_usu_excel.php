<?php
include("../servidor/conexion.php");
include('lib/PHPExcel-1.8/Classes/PHPExcel.php');

///nombre del  archivo  y  charset
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition:attachment;filename="ReporteUsu.csv"');
//Salida del archivo
 $salida=fopen('php://output','w');
//encabezados
fputcsv($salida, array('ID','Nombre','Apellido Paterno','Apellido Materno','Correo','Telefono'));
//consulta  para  mostrar en el reporte
$reporteCsv=mysqli_query($conexion,'select * from usuarios');
while($filaR=$reporteCsv->fetch_assoc()){
    fputcsv($salida,array(
    $filaR['idusu'],
    $filaR['nomusu'],
    $filaR['apausu'],
    $filaR['amausu'],
    $filaR['correo'],
    $filaR['telefono']
    ));
}
fclose($salida);
?>