<?php
    include("../conexion.php");
    if(isset($_POST['btnRegistro'])){    
        if (strlen($_POST ['name'])>=1 && strlen($_POST ['email'])>=1 && strlen($_POST ['contraseña'])>=1){
            $name = $_POST ['name'];
            $edad = $_POST ['edad'];
            $email = $_POST ['email']; 
            $password = $_POST ['contraseña'];
            
            function cifrarSha256($msjCifrar){
                $key = base64_encode(openssl_random_pseudo_bytes(64));
                $pswCifradaSha256 = hash_hmac('sha256',$msjCifrar,$key);
                return $pswCifradaSha256;
            }
            
            echo "Mensaje a cifrar es: " . $password .  "<br/><br/>";

            $mensajeCifradoSHA256 = cifrarSha256($password);
            echo "Mensaje Cifrado con SHA256: " . $mensajeCifradoSHA256 . "<br/><br/>";
            
            $query = "INSERT INTO usermetodohashv2(nombre,edad, email, psw, pswCif) VALUES ('$name','$edad', '$email','$password','$mensajeCifradoSHA256')";
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