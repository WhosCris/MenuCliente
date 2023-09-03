<!DOCTYPE html>
<html>
<head>
    <title>Editar Datos</title>
</head>
<body><center>
    <h1>Ingrese sus nuevos datos</h1>
    <form method="post">
        <?php error_reporting(0); ?>
        <?php
        if(isset($_POST['btnEdit'])){
            include("funciones.php");
            $cnn = Conectar();
            $rut = $_POST['txtRut'];
            $rs = mysqli_query ($cnn, "select * from clientes where Rut ='$rut'");

            if($row = mysqli_fetch_array($rs)){
                $rut = $row[0];
                $Nom = $row[1];
                $Ape = $row[2];
                $fnac = $row[3];
                $Sex = $row[4];
                $Reg = $row[5];
                $fon = $row[6];
            }
        }
        ?>

        <table border="0">
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtNom" value="<?php echo $Nom; ?>" size="7" placeholder="Nombre"></td>
            </tr>
            <tr>
                <td>Apellido</td>
                <td><input type="text" name="txtApe" value="<?php echo $Ape; ?>" size="7" placeholder="Apellido"></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td><input type="date" name="Fnac" value="<?php echo $fnac; ?>" size="7"></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>
                    <select name="Sexo">
                        <option value="Masculino" <?php if($Sex == 'Masculino') echo 'selected'; ?>>Masculino</option>
                        <option value="Femenino" <?php if($Sex == 'Femenino') echo 'selected'; ?>>Femenino</option>
                        <option value="Otro" <?php if($Sex == 'Otro') echo 'selected'; ?>>Otro</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Región</td>
                <td>
                    <select name="Region">
                        <option value="Ohiggins" <?php if($Reg == 'Ohiggins') echo 'selected'; ?>>Ohiggins</option>
                        <option value="Metropolitana" <?php if($Reg == 'Metropolitana') echo 'selected'; ?>>Metropolitana</option>
                        <option value="Biobio" <?php if($Reg == 'Biobio') echo 'selected'; ?>>Bio-Bio</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Fono</td>
                <td><input type="text" name="txtFon" value="<?php echo $fon; ?>" size="7" placeholder="Teléfono"></td>
            </tr>
        </table>
        <input type="submit" name="btnUpd" value="Actualizar">
        <button type="submit" name=""><a href="editarUsuario.php">Volver</a></button>
    </form>

    <?php
    if(isset($_POST['btnUpd'])){
        include("funciones.php");
        $cnn = Conectar();
        $rut = $_POST['txtRut'];
        $nombre = $_POST['txtNom'];
        $ape = $_POST['txtApe'];
        $fnac = $_POST['Fnac'];
        $sexo = $_POST['Sexo'];
        $Region = $_POST['Region'];
        $fono = $_POST['txtFon'];

        $sql= "UPDATE clientes SET Nombre='$nombre', Apellido='$ape', Fnac='$fnac', Sexo='$sexo', Region='$Region', Fono='$fono' WHERE Rut='$rut'";
        
        if(mysqli_query($cnn, $sql)){
            echo "<script>alert('Sus datos se actualizaron correctamente')</script>";
        }
        else {
            echo "<script>alert('Hubo un error al actualizar los datos')</script>";
        }
    }
    ?>
</body>
</html>