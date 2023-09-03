<html>
    <head>
        <title>Editar Usuario</title>
    </head>

    <body><center>
        <h1>
            Ingrese su rut
        </h1>
        <form action="CambiarDatos.php" method="POST">
            RUT <input type="text" name="txtRut" value="" size="10" placeholder="Ej. 12345678-9">
            <button type="submit" name="btnEdit">Editar</button>
        </form>
        <form action="index.php" method="post">
        <button type="submit" name="btnEdit"><a href="index.php">Volver</a></button>
        
            <?php error_reporting(0) ?>
            <?php
                include("funciones.php");
                $cnn = Conectar();
                $rut = $_POST['txtRut'];
                $rs = mysqli_query ($cnn, "select * from clientes where Rut ='$rut'");

                if($row = mysqli_fetch_array($rs)){
                    $Nom = $row[1];
                    $Ape = $row[2];
                    $fnac = $row[3];
                    $Sex = $row[4];
                    $Reg = $row[5];
                    $fon = $row[6];
                }
                else {
                    echo "<script>alert('El usuario ingresado no existe')</script>";
                }
            
            ?>
        </form>
        </center></body>
</html>