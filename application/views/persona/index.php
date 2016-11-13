<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<table class="panel" id="tablaPersona">
    <tr>
        <th>Nombre</th>
        <th>Ap paterno</th>
        <th>Ap materno</th>
        <th>email</th>
        <th>dni</th>
        <th>fecnac</th>
        <th>ciudad</th>
        <th>Usuario</th>
        <th>Password</th>
        <th>imagen</th>
        <th colspan="2"><a href="<?php echo base_url(); ?>agregarUsuario"><img src="<?php echo base_url(); ?>assets/img/add.png" alt=""></a></th>
    </tr>
    <?php
        foreach ($persona->result() as $p) {
            ?>
            <tr>
                <td><?php echo $p->nombre; ?></td>
                <td><?php echo $p->appaterno; ?></td>
                <td><?php echo $p->apmaterno; ?></td>
                <td><?php echo $p->email; ?></td>
                <td><?php echo $p->dni; ?></td>
                <td><?php echo $p->fecnac; ?></td>
                <td><?php echo $p->ciudad; ?></td>
                <td><?php echo $p->usu_nombre; ?></td>
                <td><?php echo $p->usu_clave; ?></td>
                <td><img src="<?php echo base_url(); ?>assets/imgUser/<?php echo $p->imagen; ?>" alt="" width="150"></td>
                <td><a href="<?php echo base_url(); ?>formEditUser?id=<?php echo $p->idpersona; ?>"><img src="<?php echo base_url(); ?>assets/img/edit.png" alt=""></a></td>
                <td><a href="<?php echo base_url(); ?>formDropUser?id=<?php echo $p->idpersona; ?>"><img src="<?php echo base_url(); ?>assets/img/drop.png" alt=""></a></td>
            </tr>
            <?php
        }
    ?>
</table>