<html>
<head>
<title></title>
<meta charset="UTF-8"/>
</head>
<body>
    <?php  


include 'funciones.php';


CONST PRECIO_BASE = 200;

//Vamos a usar la variable $poliza para almacenar los conceptos
$poliza["BASE"]=PRECIO_BASE;


//Vamos a definir variables con los datos introducidos en el formulario
//Primero el nombre del tomador
$tomador = $_POST["nombre"];

//El año del carnet 
$añoCarnet = $_POST["añoCarnet"];

//La antiguedad del carnet (la calculamos restandole al año del carnet el año actual)
$antiguedadCarnet =  date('Y') - $añoCarnet;

//El sexo del tomador   
$sexo = $_POST["sexo"];

//La matricula del coche
$matricula = $_POST["matricula"];

//El año de la matricula 
$AñoMatricula = $_POST["añoMatricula"];

//La antiguedad de la matricula (la calculamos restandole al año del carnet el año actual)
$antiguedadMatricula =  date('Y') - $AñoMatricula;

//El tipo de combustible
$combustible = $_POST["tipoCombustible"];

//El tipo de seguro que necesita
$tipoSeguro = $_POST["tipoSeguro"];

//Igualamos el precio base
$precio = PRECIO_BASE;





//Si tiene menos de 10 años el carnet precio x2
if ($antiguedadCarnet < 10 ){
    
    $poliza["Menos de 10 años de carnet"] = $precio;
    $precio = $precio * 2;

}

//Si es mujer 10% Dto
if ( $sexo == 'mujer') {

    $poliza["Buena Conductora"] = $precio*(-0.1);
    $precio = $precio * 0.90;
}


//Si la matricula es mayor a 10 años + 100€
if ($antiguedadMatricula > 10 ) {

    $poliza["Vehiculo antiguo"]= $precio+100;
    $precio = $precio + 100;
}



//Si el combustible es electrico 30% Dto
if ($combustible == 'electrico') {

    $poliza["Coche Ecologico"] = $precio *(-0.30);
    $precio = $precio * 0.70;
}


//Si el combustible es diesel +30% 
if ($combustible =='diesel') {

    $poliza['Matadelfines']= $precio * 0.30;
    $precio = $precio * 1.3;
} 


//Si el seguro es todo riesgo precio x2
//si el seguro es intermedio precio +200
if ($tipoSeguro == 'intermedio') {

    $precio = $precio + 200;

} else if ($tipoSeguro == 'todoriesgo') {

    $precio = $precio * 2;
}





//Ahora vamos a imprimir el mensaje que saldra al calcular el seguro
// 
    echo '<h2> DATOS DE LA POLIZA </h2>';
    echo '<br> <h2> DATOS DEL TOMADOR</h2> ';  
    echo '<br> Tomador' .$tomador;
    echo '<br> Año de obtencion del carnet ' .$añoCarnet .' (antiguedad de ' .$antiguedadCarnet .')';
    echo '<br> SEXO ' .$sexo ;

echo '<br><h2> DATOS DEL VEHICULO </h2>';
    echo '<br>Matricula: ' .$matricula;
    echo '<br>Año Matriculacion: ' .$AñoMatricula .' (antiguedad de ' .$antiguedadMatricula .')';
    echo '<br>Combustible: ' . $combustible;

echo '<br> <h2>MODALIDAD</h2>';
    echo '<br>Tipo de seguro: ' .'<b>'.$tipoSeguro .'</b>';

//Aqui haremos un echo con el precio definitivo del seguro 
echo '<br> ' .$tomador .' el seguro para tu vehiculo con matricula ' 
             .$matricula .' costará un total de  ' .$precio .'€ ';

generaTabla($poliza);
?>  
<br>
<br>
<button onclick="history.back()">Otro jodido seguro</button>
</body>
</html>