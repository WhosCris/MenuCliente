<html>
    <head>
        <title>Registro</title>
    </head>

    <body>
        <center><h1>Registro de clientes</h1>
        <form method="post">
        <table border="0">
            <tr>
                <td>Rut</td>
                <td><input type="text" name="txtRut" value="" size="7"></td>
            </tr>
            
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtNom" value="" size="7"></td>
            </tr>
            
            <tr>
                <td>Apellido</td>
                <td><input type="text" name="txtApe" value="" size="7"></td>
            </tr>
            
            <tr>
                <td>Fecha de nacimiento</td>
                <td><input type="date" name="Fnac" value="" size="7"></td>
            </tr>
            
            <tr>
                <td>Sexo</td>
                <td><select name="Sexo">
                    <option value="Masculino" size="7">Masculino</option>
                    <option value="Femenino" size="7">Femenino</option>
                    <option value="Otro" size="7">Otro</option>
                </td>
            </tr>
            
            <tr>
                <td>Región</td>
                <td><select name="Region">
                    <option value="Ohiggins">Ohiggins</option>
                    <option value="Metropolitana">Metropolitana</option>
                    <option value="Biobio">Bio-Bio</option>
                </td>
            </tr>
            
            <tr>
                <td>Fono</td>
                <td><input type="text" name="txtFon" value="" size="7"></td>
            </tr>
        </table>
        <input type="submit" name="btnReg" value="Registrar" size="7">
        <button type="submit" name="btnEdit"><a href="index.php">Volver</a></button>

        <?php
        error_reporting(0)
        ?>
        <?php
        if($_POST['btnReg']=="Registrar"){
            include("funciones.php");
            $cnn = Conectar();
            $rut = $_POST['txtRut'];
            $nombre = $_POST['txtNom'];
            $ape = $_POST['txtApe'];
            $fnac = $_POST['Fnac'];
            $sexo = $_POST['Sexo'];
            $Region = $_POST['Region'];
            $fono = $_POST['txtFon'];


           $sql= "insert into clientes values('$rut','$nombre','$ape','$fnac','$sexo','$Region','$fono')";
           mysqli_query($cnn,$sql);
            echo "<script>alert('Sus datos se registraron correctamente')</script>";
        }
      
        
        ?>
    </form>
</body>
</html>