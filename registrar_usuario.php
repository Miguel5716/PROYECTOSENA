<?php 

include("conexion.php");

    $cargo = $_POST['cargo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_doc = $_POST['tipo_doc'];
	$doc_usuario = $_POST['doc_usuario'];
	$sexo = $_POST['sexo'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $cod_formacion = $_POST['cod_formacion'];

$consulta = "INSERT INTO usuario(cargo, nombre, apellido, tipo_doc, doc_usuario, sexo, correo, celular, cod_formacion ) 
                     VALUES ('$cargo','$nombre', '$apellido', '$tipo_doc','$doc_usuario','$sexo','$correo','$celular','$cod_formacion')";
        
	    $resultado = mysqli_query($conexion,$consulta);
			if ($resultado){
                echo  '<script>
                            alert("Registro exitoso!");
                            window.location.href = "Form_registrar_usuario.php"
                        </script>';
            }
            else{
                echo  '<script>
                alert("Usuario no registrado!");
                window.location.href = "Form_registrar_usuario.php"
            </script>';
            }
?>