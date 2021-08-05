<?php
  include("conexion.php");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="shortcut icon" href="img/Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://kit.fontawesome.com/0458944bda.js" crossorigin="anonymous"></script>
	<script src="main.js"></script>
    
    <title>IRC</title>
</head>
<body>
<a name="inicio"></a>
    <header class="hero">
        <div class="container">
            <nav class="nav">

            <header class="header">
        <div class="container logo-nav-container">
            <a href="http://localhost/Proyecto%20Formativo/admin.php" class="logo">

                <img src="" alt="" class="fas fa-sign-out-alt projects__icon" >
            </a>
            <span class="menu-icon">Menú</span>
        
            <nav class="navigation">
                <ul class="nav">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#">Registrar</a>
                        <ul>
                            <li><a href="Form_registrar_usuario.php">Usuarios</a></li>
                            <br>
                            <li><a href="Form_registrar_permisos.php">Permisos</a></li>
                            <br>
                            <li><a href="Form_registrar_ingreso.php">Ingresos</a></li>
                            <br>
                            <li><a href="Form_formacion.php">Formaciones</a></li>
                            <br>
                            <li><a href="Form_espacios.php">Espacios</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Registros</a>
                        <ul>
                            <li><a href="tabla_usuarios.php">Usuarios</a></li>
                            <br>
                            <li><a href="tabla_permisos.php">Permisos</a></li>
                            <br>
                            <li><a href="tabla_ingreso.php">Ingresos</a></li>
                            <br>
                            <li><a href="tabla_formacion.php">Formaciones</a></li>
                            <br>
                            <li><a href="tabla_espacios.php">Espacios</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="#">Consultas</a>
                    <ul>
                        <li><a href="consulta1.php">Permisos solicitados</a></li>
                        <li><a href="consulta2.php">Ingresos no aprendices</a></li>
                        <li><a href="consulta3.php">Ingreso menores</a></li>
                        <li><a href="Consulta4.php">Ingreso a bienestar</a></li>
                        <li><a href="consulta6.php">Ingreso por genero</a></li>
                        </li>
                    </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    </nav>
    <br>
    <br>
    <br>

        <section class="hero__container">
            <div class="hero__texts">
                <h1 class="hero__title">
                    
                    <h1 class="animate__animated animate__fadeInDown animate__delay-1.5s">
                        <?php
                            session_start();
                                $usuario = $_SESSION['usuario'];
                                    echo "Bienvenido $usuario";
                        ?>
                        <?php 
                        
                        

                        
                        ?>
                        
                </h1>
                </h1>
                
                
                <h2 class="hero__subtitle">
                    <div class="animate__animated animate__fadeInDown animate__delay-1.5s">
                    <?php
                        $usuarios = "SELECT * FROM usuario";
                        $resultado = mysqli_query($conexion, $usuarios);
                        $total = mysqli_num_rows($resultado);
                        echo 'Personas registradas '.$total.'<br>';
                        ?>

                        <?php
                        $consulta1 = "SELECT * FROM registro where fecha_hora_salida='2000-01-01 01:00:00'";
		                $resultado1 = mysqli_query($conexion,$consulta1);
                        $total2= mysqli_num_rows($resultado1);
                        echo "Personas ingresadas ";
                        echo $total2;
                        ?>
                    </div>
                </h2>
        </section>
        </div>
        
        <div class="animate__animated animate__fadeIn">
        <div class="hero__wave" style="overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
        </div>
    </header>

    <main>
    <a name="servicios"></a>
    <div class="animate__animated animate__fadeIn">
        <section class="about container">

        <div class="animate__animated animate__fadeInLeft">
            <div class="about__texts">
                <h2 class="subtitle">
                    Registrar Usuarios
                </h2>
            </div>
        </div>

        <div class="animate__animated animate__fadeInRight">
                    <figure class="about__img">
                        <a href="Form_registrar_usuario.php">
                            <img src="..//Proyecto Formativo/ilustration/inicio.svg" class="about__picture" alt="">
                        </a>
                    </figure>
        </div>


        

        <div class="animate__animated animate__fadeInRight">
                    <figure class="about__img--left">
                        <a href="Form_registrar_permisos.php">
                            <img src="..//Proyecto Formativo/ilustration/permisos.svg" class="about__picture" alt="">
                        </a>
                    </figure>
        </div>

        <div class="animate__animated animate__fadeInLeft">
            <div class="about__texts">
                <h2 class="subtitle--right">
                    Registrar Permisos
                </h2>
            </div>
        </div>



        <div class="animate__animated animate__fadeInLeft">
            <div class="about__texts">
                <h2 class="subtitle">
                    Registrar Ingreso
                </h2>
            </div>
        </div>

        <div class="animate__animated animate__fadeInRight">
                    <figure class="about__img">
                        <a href="Form_registrar_ingreso.php">
                            <img src="..//Proyecto Formativo/ilustration/ingreso.svg" class="about__picture" alt="">
                        </a>
                    </figure>
        </div>

        </section>
    </div>

    <br>
    <br>
    <br>
    <br>
    <a name="informacion"></a>
  <footer>
    <p>Analisis y Desarrollo de Sistemas de Información <i class="fas fa-user-check"></i></p>
    <br>
    <h4 class="desarrolladores">
    Alejandro Aguilar | Miguel Aguiar | Cristian Murcia | Sebastián Giraldo
    </h4>
  </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="js/js.js"></script>
</body>
</html>