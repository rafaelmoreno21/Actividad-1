<?php

    session_start();

    if (!isset($_SESSION['valor'])){
        $_SESSION['valor'] = 0;
    }
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $civil = $_POST['civil'];
    $sexo = $_POST['sexo'];
    $sueldo = $_POST['sueldo'];

    //evaluamos si el valor ya esta creado en la sesion o no
    if (!isset($_SESSION['total_mujeres'])){
        $_SESSION['total_mujeres'] = 0;
    }
    if (!isset($_SESSION['h_casados25'])){
        $_SESSION['h_casados25'] = 0;
    }
    if (!isset($_SESSION['m_viudas10'])){
        $_SESSION['m_viudas10'] = 0;
    }
    if (!isset($_SESSION['edad_promedio'])){
        $_SESSION['edad_promedio'] = 0;
    }

    //validaciones
    if($sexo == "mujer"){
        $_SESSION['total_mujeres']++; 
        if($civil == "viudo" && $sueldo =="opc2"){
            $_SESSION['m_viudas10']++;
        }
    }
    else{
        if($civil == "casado" && $sueldo == "opc3"){
            $_SESSION['h_casados25']++;
        }
        if($_SESSION['edad_promedio'] == 0){
            $_SESSION['edad_promedio'] += $edad;
        } 
        elseif($_SESSION['edad_promedio'] != 0){
            $_SESSION['edad_promedio'] = ( $_SESSION['edad_promedio'] + $edad) /2;
        }
    }
    
    $_SESSION['valor']++;
    
    if ($_SESSION['valor'] == 5){
        echo "Total empleados del sexo femenino: ". $_SESSION['total_mujeres']. '     '; 
        echo "   Total hombres casados que ganan mas 2500: ". $_SESSION['h_casados25']. '     ';
        echo "   Total mujeres viudas que ganan mas de 1000: ". $_SESSION['m_viudas10']. '     ';
        echo "   Edad promedio de hombre: ". $_SESSION['edad_promedio']. '     ';

        $_SESSION['total_mujeres'] = 0;
        $_SESSION['h_casados25'] = 0;
        $_SESSION['m_viudas10'] = 0;
        $_SESSION['edad_promedio'] = 0;

        $_SESSION['valor'] = 0;

    }
    else{
        echo "Empleado #" . $_SESSION['valor'] . "registrado";
    }


?>




