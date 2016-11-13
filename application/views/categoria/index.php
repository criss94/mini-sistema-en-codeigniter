<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<table class="paneles">
    <tr>
        <th>Categoria</th>
        <th colspan="2"><a href="<?php echo base_url(); ?>formAddCategoria"><img src="<?php echo base_url(); ?>assets/img/add.png" alt=""></a></th>
    </tr>
    <?php
        foreach ($cat->result() as $c) {
            ?>
            <tr>
                <td><?php echo $c->cat_nombre; ?></td>
                <td><a href="<?php echo base_url(); ?>formEditCategoria?id=<?php echo $c->cat_id; ?>"><img src="<?php echo base_url(); ?>assets/img/edit.png" alt=""></a></td>
                <td><a href="<?php echo base_url(); ?>formDropCategoria?id=<?php echo $c->cat_id; ?>"><img src="<?php echo base_url(); ?>assets/img/drop.png" alt=""></a></td>
            </tr>
            <?php
        }
    ?>
</table>