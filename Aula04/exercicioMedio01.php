<?php

$numeros =[];

echo "Digite 10 numeros: ";

for ($i=0; $i < 3; $i++) { 
    $numero = readline();

    $numeros[]=[
        "numero" => $numero
    ];
}
<<<<<<< HEAD

for ($i=0; $i < 3; $i++) { 
    for ($a=0; $a < 3; $a++) { 
        
        if ($numeros[$i]['numero']>$numeros[$a]['numero']) {
            $ordem[] = $numeros[$i]['numero'];

           $i++;
        }
    }
    
}
foreach ($ordem as $ordem2) {
    echo $ordem2;
}
=======
   
>>>>>>> 06cb5dbada5d7a7098de1d705676acbd51d04331


?>