<?php
    include("../conexion.php");
    if(isset($_POST['btnRegistro'])){    
        if (strlen($_POST ['name'])>=1 && strlen($_POST ['email'])>=1 && strlen($_POST ['contraseña'])>=1){
            $name = $_POST ['name'];
            $edad = $_POST ['edad'];
            $email = $_POST ['email']; 
            $password = $_POST ['contraseña'];

            function cifrar($msj){
                $arrayCif = str_split($msj); 
                for($i=0;$i<count($arrayCif);$i++){
                    $arrayCif[$i] = ord($arrayCif[$i]);
                }
                return $arrayCif;
            }
            function descifrar($array){
                $arrayDes = $array; 
                for($i=0;$i<count($arrayDes);$i++){
                    $arrayDes[$i] = chr($arrayDes[$i]);
                }
                return $arrayDes;
            }
            function concatenarMsj($arreglo){
                $msjFinal="";
                for($i = 0; $i<count($arreglo); $i++){
                    $msjFinal = $msjFinal.$arreglo[$i];
                }
                return $msjFinal;
            }
            $pswCifrada = concatenarMsj($msjCif=cifrar($password));
            print_r("CONTRASEÑA CIFRADA: ".$pswCifrada);
            echo "<br>";
            echo "<br>";
            $pswDescifrada = concatenarMsj(descifrar($msjCif));
            print_r("CONTRASEÑA DESCIFRADA: ".$pswDescifrada);
            $query = "INSERT INTO usermetodopropio(nombre,edad, email, psw, pswCif) VALUES ('$name','$edad','$email','$password','$pswCifrada')";
            $resultadoC = mysqli_query($conexion,$query);
            if($resultadoC){
                ?> <h3 class="ok"> RegistroCorrecto </h3> <?php
            }else{
                ?> <h3 class="bad"> Incorrecto </h3> <?php
            }
        }else{
            
            ?><h3 class="bad"> Completa los campos</h3><?php
        }
    }
?> 