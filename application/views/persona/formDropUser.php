<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<h3 style="color: green;text-align: center" id="msj-drop"></h3>
<form action="" id="formDropUser">
    <table class="paneles">
        <tr>
            <th colspan="2">Todos tus datos y tu cuenta seran eliminados</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type="text" name="nombre" class="nombre" value="<?php echo $u->nombre; ?>" disabled></td>
        </tr>
        <tr>
            <td>Ap paterno</td>
            <td><input type="text" name="appaterno" class="appaterno" value="<?php echo $u->appaterno; ?>" disabled></td>
        </tr>
        <tr>
            <td>Ap materno</td>
            <td><input type="text" name="apmaterno" class="apmaterno" value="<?php echo $u->apmaterno; ?>" disabled></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td><input type="text" name="email" class="email" value="<?php echo $u->email; ?>" disabled></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><input type="text" name="dni" maxlength="8" class="dni" value="<?php echo $u->dni; ?>" disabled></td>
        </tr>
        <tr>
            <td>fecnac</td>
            <td><input type="date" name="fecnac" class="fecnac" value="<?php echo $u->fecnac; ?>" disabled></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td>
                <select name="idciudad" id="">
                    <?php
                    foreach ($ciudad->result() as $c) {
                        ?>
                        <option <?php if ($u->idciudad == $c->idciudad){ echo "selected"; } ?> value="<?php echo $c->idciudad; ?>" disabled><?php echo $c->ciudad; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>foto</td>
            <td class=""><img src="<?php echo base_url(); ?>assets/imgUser/<?php echo $u->imagen; ?>" alt="" width="150"></td>
        </tr>
        <tr>
            <th colspan="2">Datos de tu usuario</th>
        </tr>
        <tr>
            <td>Usuario</td>
            <td><input type="text" name="usu_nombre" class="usu_nombre" value="<?php echo $u->usu_nombre; ?>" disabled></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="usu_clave" class="usu_clave" value="<?php echo $u->usu_clave; ?>" disabled></td>
        </tr>
        <tr>
            <td><input type="hidden" name="idpersona" value="<?php echo $u->idpersona; ?>" class="idpersona"></td>
            <td><input type="submit" value="eliminar"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>panelUsuarios">volver</a></td>
        </tr>
    </table>
</form>