<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<h3 style="color: green;text-align: center" id="msj-add"></h3>
<form action="" id="formAddUser">
    <table id="paneles">
        <tr>
            <th colspan="2">nuevo usuario</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" required></td>
        </tr>
        <tr>
            <td>Ap paterno</td>
            <td><input type="text" name="appaterno" required></td>
        </tr>
        <tr>
            <td>Ap materno</td>
            <td><input type="text" name="apmaterno" required></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" required></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><input type="text" name="dni" maxlength="8" required></td>
        </tr>
        <tr>
            <td>fecnac</td>
            <td><input type="date" name="fecnac" required></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td>
                <select name="idciudad" id="idciudad" required>
                    <option value="">seleccionar</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Foto Perfil</td>
            <td><input type="file" name="imagen"></td>
        </tr>
        <tr>
            <th colspan="2">Datos de tu usuario</th>
        </tr>
        <tr>
            <td>Usuario</td>
            <td><input type="text" name="usu_nombre" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="usu_clave" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="agregar"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>panelUsuarios">volver</a></td>
        </tr>
    </table>
</form>