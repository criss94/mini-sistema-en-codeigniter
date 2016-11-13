<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<form action="" id="formAddUser">
    <table id="paneles">
        <tr>
            <th colspan="2">Ingresa tus datos personales</th>
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
            <th colspan="2">Crea tu cuenta de usuario</th>
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
            <td colspan="2" align="center"><input type="submit" value="crear usuario"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>formLogin">volver</a></td>
        </tr>
    </table>
</form>
<h3 style="color: green;text-align: center" id="msj-add"></h3>