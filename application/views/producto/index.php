<?php
require_once 'validar.php';
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<table class="panel" id="panelProductos">
    <tr>
        <th colspan="2">nombre</th>
        <th>descripcion</th>
        <th>precio</th>
        <th>categoria</th>
        <th>imagen</th>
        <th colspan="2"><a href="<?php echo base_url(); ?>formAddProductos"><img src="<?php echo base_url(); ?>assets/img/add.png" alt=""></a></th>
    </tr>
    <?php
        foreach ($consulta->result() as $p){
    ?>
    <tr>
        <td><input type="hidden" name="id" value="<?php echo $p->prd_id; ?>" id="id"></td>
        <td><?php echo $p->prd_nombre; ?></td>
        <td><?php echo $p->prd_descripcion; ?></td>
        <td><?php echo $p->prd_precio; ?></td>
        <td><?php echo $p->cat_nombre; ?></td>
        <td><img src="<?php echo base_url(); ?>assets/imagenes/<?php echo $p->prd_foto1; ?>" alt="" width="150"></td>
        <td><a href="formEditProducto?id=<?php echo $p->prd_id; ?>"><img src="<?php echo base_url(); ?>assets/img/edit.png" alt=""></a></td>
        <td><a href="formDropProducto?id=<?php echo $p->prd_id; ?>"><img src="<?php echo base_url(); ?>assets/img/drop.png" alt=""></a></td>
    </tr>
    <?php
        }
    ?>
</table>