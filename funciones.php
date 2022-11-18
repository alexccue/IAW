<?php 

function generaTabla($datos, $acumular=false, $cabecera="false") {

$tabla ="<table border='1'>";
//Si hay cabecera añadimos 
if ($cabecera) {
foreach($cabecera as $value) {
    $tabla 
}

}
//Creamos un acumulador por si tenemos que acumular
$acumulador=0;
//Recorremos cada elemento de los datos

foreach($datos as $clave => $valor) {
    $tabla .= "<tr><td>$clave</td><td>$valor</td>";
    //Si hay que acumular añadimos una columna
    if ($acumulador) {
        $acumulador += $valor;
        $tabla .= "<td> $acumulador</td>";

    }
    //cerramos fila 
    $tabla .= "</tr>";

}

}
$tabla .= "</table>";
return $tabla;

?>