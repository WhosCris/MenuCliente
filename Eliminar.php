<html>
    <head>
        <title>Eliminar</title>
    </head>


    <body><center><h1>Eliminar cliente</h1>
        <form method="post">

        <?php error_reporting(0)?>
        <?php
        
        if($_POST['btnVer']=="Buscar"){
            include("funciones.php");
            $cnn = Conectar();
            $rut = $_POST['txtRut'];
            $rs = mysqli_query ($cnn, "select * from clientes where Rut ='$rut'");

            if($row = mysqli_fetch_array($rs)){
                $Nom = $row[1];
                $Ape = $row[2];
            }
            else {
                echo "<script>alert('El usuario ingresado no existe')</script>";
            }}
        
        ?>
            <table>
                <tr>
                    <td>Rut:</td> <td><input type="text" name="txtRut" value="<?php echo $rut ?>" size="10"></td>
                </tr>
                <tr>
                    <td> Nombre:</td> <td> <input type="text" name="txtNom" value="<?php echo $Nom ?>" size="7"></td>
                </tr>
                <tr>
                    <td>Apellido:</td> <td> <input type="text" name="txtApe" value="<?php echo $Ape ?>" size="7"></td>
                </tr>
                
                
            </table>
            <input type="Submit" name="btnVer" value="Buscar" size="7">
            <input type="Submit" name="btnDel" value="Eliminar" size="7">
            <button type="submit" name="btnEdit"><a href="index.php">Volver</a></button>


<?php

if($_POST['btnDel']=="Eliminar"){

    include("funciones.php");
    $cnn = Conectar();
    $rut = $_POST['txtRut'];
    $Nom = $_POST['txtNom'];
    $Ape = $_POST['txtApe'];
    $sql = "DELETE FROM clientes where(Rut='$rut')";
    echo "$sql";
    echo "<script>alert('Se ha eliminado al usuario con rut: $rut')</script>";

    mysqli_query($cnn,$sql);}

    ?>
    </form>
    </body>
    </html>