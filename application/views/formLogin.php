<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form action="" id="formLogin">
    <table class="paneles">
        <tr>
            <th colspan="2">Ingresa tu usuario</th>
        </tr>
        <tr>
            <td>Ingresa tu Usuario</td>
            <td>
                <input type="text" name="usu_nombre" class="usu_nombre" required>
                <br>
                <img src="<?php echo base_url(); ?>assets/img/load.gif" alt="" style="display: none;" id="imgLogin">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="siguiente"></td>
        </tr>
        <tr>
            <td align="center" colspan="2">No tenes cuenta? <a href="<?php echo base_url(); ?>registro">Registrate ahora</a></td>
        </tr>
    </table>
</form>
<h3 style="text-align: center;color: red" id="msj-login"></h3>

<?php
    if (isset($_GET['error'])) {
    $error = $_GET['error'];
        if ($error == 1) {
            ?>
            <h3 id="error">Debe iniciar sesion para ingresar</h3>
            <?php
        }
    }
?>

<form action="" id="formLogin2" style="display: none">
    <table class="paneles">
        <tr>
            <th colspan="2">Ingresa tu password</th>
        </tr>
        <tr>
            <td colspan="2" align="center" id="verUser">Escribe la contraseña para el usuario: </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="hidden" name="usu_nombre" id="name_user"></td>
        </tr>
        <tr>
            <td>Ingresa tu Password</td>
            <td><input type="password" name="usu_clave" class="usu_clave" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="sign in"></td>
        </tr>
    </table>
</form>
<h3 style="text-align: center;color: red" id="msj-passError"></h3>
