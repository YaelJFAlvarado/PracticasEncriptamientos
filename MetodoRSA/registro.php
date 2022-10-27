<?php
    include("../conexion.php");
    if(isset($_POST['btnGenerar'])){    
        if (strlen($_POST ['name'])>=1 && strlen($_POST ['email'])>=1 && strlen($_POST ['contraseña'])>=1){
            $name = $_POST ['name'];
            $edad = $_POST ['edad'];
            $email = $_POST ['email']; 
            $password = $_POST ['contraseña'];

            $configArgs = array(
                "config" => "C:/xampp/php/extras/openssl/openssl.cnf",
                'private_key_bits' => 2048,
                'default' =>  "sha256"
            );

            $gen = openssl_pkey_new($configArgs);
            openssl_pkey_export($gen,$keypriva, NULL,$configArgs);
            $keyPubl = openssl_pkey_get_details($gen);
            file_put_contents('privada.key',$keypriva);
            file_put_contents('publica.key',$keyPubl['key']);

            $keyPublica = openssl_pkey_get_public(file_get_contents('publica.key'));
            $keyPrivada = openssl_pkey_get_private(file_get_contents('privada.key'));

            function cifrar($mensajeCifrar, $keyPub){
                openssl_public_encrypt($mensajeCifrar,$datosCifrados,$keyPub);
                return $datosCifrados;
            }
            function descifrar($datosCifrados,$keyPri){
                openssl_private_decrypt($datosCifrados,$datosDescifrados,$keyPri);
                return $datosDescifrados;
            }
            $mensajeCifrar = $password;
            echo "Mensaje a cifrar es: " . $mensajeCifrar .  "<br/><br/>";

            $mensajeCifrado = cifrar($mensajeCifrar,$keyPublica);
            echo "Mensaje Cifrado: " . $mensajeCifrado . "<br/><br/>";

            $mensajeDescifrado = descifrar($mensajeCifrado,$keyPrivada);
            echo "Mensaje Descifrado: " . $mensajeDescifrado . "<br/><br/>";
            
            $query = "INSERT INTO usermetodorsa(nombre,edad,email,psw) VALUES ('$name','$edad','$email','$password')";
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