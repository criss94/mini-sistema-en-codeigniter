<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<form action="" id="formDropPerfil">
    <table class="paneles" id="perfilUser">
        <tr>
            <th colspan="2">Se van a eliminar todos estos datos</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" class="nombre" disabled></td>
        </tr>
        <tr>
            <td>Ap paterno</td>
            <td><input type="text" name="appaterno" class="appaterno" disabled></td>
        </tr>
        <tr>
            <td>Ap materno</td>
            <td><input type="text" name="apmaterno" class="apmaterno" disabled></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" class="email" disabled></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><input type="text" name="dni" maxlength="8" class="dni" disabled></td>
        </tr>
        <tr>
            <td>fecnac</td>
            <td><input type="date" name="fecnac" class="fecnac" value="" disabled></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td>
                <select name="idciudad" id="idciudad" class="idciudad" disabled></select>
            </td>
        </tr>
        <tr>
            <td>foto</td>
            <td class="imagen"></td>
        </tr>
        <tr>
            <th colspan="2">Mi cuenta de usuario</th>
        </tr>
        <tr>
            <td>Usuario</td>
            <td><input type="text" name="usu_nombre" class="usu_nombre" disabled></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="usu_clave" class="usu_clave" disabled></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="eliminar cuenta"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>admin">volver</a></td>
        </tr>
    </table>
</form>
<h3 style="color: green;text-align: center" id="msj-edit"></h3>
