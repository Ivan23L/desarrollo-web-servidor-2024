<?php
    function calcularIRPF( int|float $salario) : float {
        $salarioNeto = null;
        
        $tramo1 = (12450 * 0.19);
        $tramo2 = ((20200 - 12450) * 0.24);
        $tramo3 = ((35200 - 20200) * 0.30);
        $tramo4 = ((60000 - 35200) * 0.37);
        $tramo5 = ((300000 - 60000) * 0.45);

        if($salario <= 12450) {

            $salarioNeto = $salario - ($salario * 0.19);

        } elseif ($salario > 12450 && $salario <= 20200) {

            $salarioNeto = $salario 
                - $tramo1 
                - (($salario - 12450) * 0.24); 

        } elseif ($salario > 20200 && $salario <= 35200) {

            $salarioNeto = $salario
                - $tramo1
                - $tramo2
                - (($salario - 20200) * 0.30);

        } elseif ($salario > 35200 && $salario <= 60000) {

            $salarioNeto = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - (($salario - 35200) * 0.37);

        } elseif ($salario > 60000 && $salario <= 300000) {

            $salarioNeto = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - (($salario - 60000) * 0.45);
                    
        } else {

            $salarioNeto = $salario
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - $tramo5
                - (($salario - 300000) * 0.47);
        }
        return $salarioNeto;
    }


    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);
    
    function calcularPvP(int $salario, string $iva) : int {
        $pvp = match($iva) {
            "general" => $salario * GENERAL,
            "reducido" => $salario * REDUCIDO,
            "superreducido" => $salario * SUPERREDUCIDO
        };
        return $pvp;
    }
?>