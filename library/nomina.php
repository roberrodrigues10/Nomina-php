<?php
$nomina = [
    ['id' => 1, 'nombres' => 'Rober Andres', 'apellidos'=> 'Rodrigues Velasco', 'cargo' => 'cantante', 'valorDia' => 10000, 'diasTrabajados' => 30, 'salario' => ''] ,
    ['id' => 2, 'nombres' => 'Julian David', 'apellidos' => 'Naranjo Pascuas', 'cargo' => 'empleado', 'valorDia' => 70000, 'diasTrabajados' => 10],
    ['id' => 3, 'nombres' => 'Samuel Felipe', 'apellidos' => 'Paloma Quila', 'cargo' => 'subgerente', 'valorDia' => 10000, 'diasTrabajados' => 30],
    ['id' => 4, 'nombres' => 'Jesus Antonio', 'apellidos' => 'Rico Puerta', 'cargo' => 'gerente', 'valorDia' => 10000, 'diasTrabajados' => 30],
    ['id' => 5, 'nombres' => 'Mario Antonieta', 'apellidos' => 'Vargas Prada', 'cargo' => 'presidente', 'valorDia' => 10000, 'diasTrabajados' => 30],
    ['id' => 6, 'nombres' => 'Nestor Francisco', 'apellidos' => 'Mora Cante', 'cargo' => 'empresario', 'valorDia' => 10000, 'diasTrabajados' => 30],
    ['id' => 7, 'nombres' => 'Andriu Darwin', 'apellidos' => 'Rosario Tijeras', 'cargo' => 'tesorero', 'valorDia' => 1500, 'diasTrabajados' => 22],
    ['id' => 8, 'nombres' => 'Diego Josue', 'apellidos' => 'Bosinga del Mar', 'cargo' => 'empleado', 'valorDia' => 10000, 'diasTrabajados' => 30],
    ['id' => 9, 'nombres' => 'Oscar Daniel', 'apellidos' => 'Pantera Morales', 'cargo' => 'empleado', 'valorDia' => 10000, 'diasTrabajados' => 30],
    ['id' => 10, 'nombres' => 'Maria Jose', 'apellidos' => 'Rivera Bautista', 'cargo' => 'empleado', 'valorDia' => 10000, 'diasTrabajados' => 30]
]; 
$numerosRegistros = count($nomina);


function salario($valorDia, $diasTrabajados){
    $salarioTotal = $valorDia * $diasTrabajados;
    return $salarioTotal;
}
echo "<div style= 'margin-left: 7%;'>"."NOMINA 1"."</div>";
for( $iteracion = 0; $iteracion < $numerosRegistros; $iteracion++){
    $valorDia = $nomina[$iteracion]['valorDia'];
    $diasTrabajados = $nomina[$iteracion]['diasTrabajados'];
    $salariototal = salario($valorDia,$diasTrabajados);
    $nomina[$iteracion]['salario'] = $salariototal;
    echo "Id: ". $nomina[$iteracion]['id']." - "." Nombre : ".$nomina[$iteracion]['nombres'] ." - " ." Salario: ".$salariototal."<br>";

};

echo "<br>";
$nomina2 = [
    ['id' => 1, 'nombreCompleto' => 'Luisa María Gómez Pérez', 'cargo' => 'cantante', 'valorDia' => 1200, 'diasTrabajados' => 25, 'salario' => '','salud' => ''] ,
    ['id' => 2, 'nombreCompleto' => 'Alejandro García Rodríguez', 'cargo' => 'empleado', 'valorDia' => 80000, 'diasTrabajados' => 15],
    ['id' => 3, 'nombreCompleto' => 'Ana Martínez Sánchez', 'cargo' => 'subgerente', 'valorDia' => 11000, 'diasTrabajados' => 27],
    ['id' => 4, 'nombreCompleto' => 'Daniel Pérez Hernández', 'cargo' => 'gerente', 'valorDia' => 11000, 'diasTrabajados' => 26],
    ['id' => 5, 'nombreCompleto' => 'Sofía López González', 'cargo' => 'presidente', 'valorDia' => 11000, 'diasTrabajados' => 28],
    ['id' => 6, 'nombreCompleto' => 'Carlos Ruiz Martínez', 'cargo' => 'empresario', 'valorDia' => 11000, 'diasTrabajados' => 29],
    ['id' => 7, 'nombreCompleto' => 'Laura Fernández Díaz', 'cargo' => 'tesorero', 'valorDia' => 1700, 'diasTrabajados' => 20],
    ['id' => 8, 'nombreCompleto' => 'Javier Torres Gómez', 'cargo' => 'empleado', 'valorDia' => 11000, 'diasTrabajados' => 30],
    ['id' => 9, 'nombreCompleto' => 'Paula Ramírez Martín', 'cargo' => 'empleado', 'valorDia' => 11000, 'diasTrabajados' => 28],
    ['id' => 10, 'nombreCompleto' => 'Diego Sánchez Rodríguez', 'cargo' => 'empleado', 'valorDia' => 11000, 'diasTrabajados' => 27]
];

$numerosRegistros2 = count($nomina2);

function salud($valorDia, $diasTrabajados){
    $pagosalud = salario($valorDia,$diasTrabajados)*0.12;
    return $pagosalud;   
}
function pension($valorDia, $diasTrabajados){
    $pagoPension = salario($valorDia,$diasTrabajados)*0.16;
    return $pagoPension;   
}
function arl($valorDia, $diasTrabajados){
    $pagoarl = salario($valorDia,$diasTrabajados)*0.052;
    return $pagoarl;   
}

function sub($valorDia, $diasTrabajados){
    $salariomin = 1200000;
    $salariotransp = salario($valorDia, $diasTrabajados);
    if($salariotransp <= 2 * $salariomin){
        return 120000;
    } else {
        return 0; 
    }
}
function retencion($valorDia, $diasTrabajados){
    $salariomin = 1200000;
    $salariorete = salario($valorDia, $diasTrabajados);
    if($salariorete >= 12 * $salariomin){
        return 0.08; 
    } else if($salariorete >= 8 * $salariomin) {
        return 0.04; 
    }
    else if($salariorete >= 6 * $salariomin) {
        return 0.02;
    }
    return 0;
}

function pagototal($valorDia, $diasTrabajados){
    $pagosueldo = salario($valorDia,$diasTrabajados)+sub($valorDia, $diasTrabajados)-salud($valorDia, $diasTrabajados)-pension($valorDia, $diasTrabajados)-arl($valorDia, $diasTrabajados)-retencion($valorDia, $diasTrabajados);
    return $pagosueldo;   
}


echo "<div style= 'margin-left: 7%;'>"."NOMINA 2"."</div>";
for( $iteracion = 0; $iteracion < $numerosRegistros2; $iteracion++){
    $valorDia = $nomina2[$iteracion]['valorDia'];
    $diasTrabajados = $nomina2[$iteracion]['diasTrabajados'];
    $salariototal = salario($valorDia,$diasTrabajados);
    $salud = salud($valorDia,$diasTrabajados);
    $pension = pension($valorDia,$diasTrabajados);
    $arl = arl($valorDia,$diasTrabajados);
    $sub = sub($valorDia,$diasTrabajados);
    $retencion = retencion($valorDia,$diasTrabajados);
    $sueldo = pagototal($valorDia,$diasTrabajados);
    echo "Id: ". $nomina2[$iteracion]['id']." - "." Nombre : ".$nomina2[$iteracion]['nombreCompleto'] ." - " ." Salario: ".$salariototal." - " ." Salud: ".$salud." - " ." Pension: ".$pension." - " ." Arl: ".$arl." - " ." Subtransporte: ".$sub." - " ." Retencion: ".$retencion." - " ." Sueldo total: ".$sueldo." - " ."<br>";

};



