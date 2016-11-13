<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<form action="" id="formEditPerfil">
    <table class="paneles" id="perfilUser">
        <tr>
            <th colspan="2">Editar mi  perfil</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" class="nombre"></td>
        </tr>
        <tr>
            <td>Ap paterno</td>
            <td><input type="text" name="appaterno" class="appaterno" value=""></td>
        </tr>
        <tr>
            <td>Ap materno</td>
            <td><input type="text" name="apmaterno" class="apmaterno" value=""></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" class="email" value=""></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><input type="text" name="dni" maxlength="8" class="dni" value=""></td>
        </tr>
        <tr>
            <td>fecnac</td>
            <td><input type="date" name="fecnac" class="fecnac" value=""></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td>
                <select name="idciudad" id="idciudad" class="idciudad"></select>
            </td>
        </tr>
        <tr>
            <td>foto</td>
            <td class="imagen"></td>
        </tr>
        <tr>
            <td>Cambiar Perfil</td>
            <td><input type="file" name="imagen"></td>
        </tr>
        <tr>
            <th colspan="2">Mi cuenta de usuario</th>
        </tr>
        <tr>
            <td>Usuario</td>
            <td><input type="text" name="usu_nombre" class="usu_nombre" value=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="usu_clave" class="usu_clave" value=""></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="actualizar"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>admin">volver</a></td>
        </tr>
    </table>
</form>
<h3 style="color: green;text-align: center" id="msj-edit"></h3>
