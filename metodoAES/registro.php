<?php
    include("../conexion.php");
    if(isset($_POST['btnRegistro'])){    
        if (strlen($_POST ['name'])>=1 && strlen($_POST ['email'])>=1 && strlen($_POST ['contraseña'])>=1){
            $name = $_POST ['name'];
            $email = $_POST ['email']; 
            $edad = $_POST ['edad'];
            $password = $_POST ['contraseña'];

            function cifrar($mensaje, $llave){
                $vectorIni = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
                $menEncriptado = openssl_encrypt($mensaje,"AES-256-CBC",$llave, 0, $vectorIni);
                return base64_encode($menEncriptado."::".$vectorIni);
        
            }
            function descifrar($mensaje,$llave){
                list($datosEncriptados,$vectorIni) = explode('::',base64_decode($mensaje),2);
                return openssl_decrypt($datosEncriptados,'AES-256-CBC',$llave,0,$vectorIni);
            }
            $llave = base64_encode(openssl_random_pseudo_bytes(64));
            $llaveCif = $llave;
            echo "LLAVE: ". $llave . "<br/><br/>";
            $mensajeCifrar = $password;
            echo "Mensaje a cifrar es: " . $mensajeCifrar .  "<br/><br/>";

            $mensajeCifrado = cifrar($mensajeCifrar,$llave);
            echo "Mensaje Cifrado: " . $mensajeCifrado . "<br/><br/>";

            $mensajeDescifrado = descifrar($mensajeCifrado,$llave);
            echo "Mensaje Descifrado: " . $mensajeDescifrado . "<br/><br/>";
            
            $query = "INSERT INTO usermetodoaes(nombre, edad, email, keyCif, psw, pswCif) VALUES ('$name','$edad','$email','$llaveCif','$password','$mensajeCifrado')";
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