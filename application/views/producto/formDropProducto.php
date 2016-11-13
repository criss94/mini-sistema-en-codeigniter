<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<h3 style="color: green;text-align: center" id="msj-eliminado"></h3>
<form action="" id="formDropProducto">
    <table class="paneles">
        <tr>
            <th colspan="2">Eliminar Producto</th>
        </tr>
        <tr>
            <td>nombre</td>
            <td><input type="text" name="prd_nombre" value="<?php echo $p->prd_nombre; ?>" disabled></td>
        </tr>
        <tr>
            <td>descripcion</td>
            <td><textarea name="prd_descripcion" id="" cols="20" rows="3" disabled><?php echo $p->prd_descripcion; ?></textarea></td>
        </tr>
        <tr>
            <td>precio</td>
            <td><input type="text" name="prd_precio" value="<?php echo $p->prd_precio; ?>" disabled></td>
        </tr>
        <tr>
            <td>categoria</td>
            <td>
                <select name="cat_id" id="">
                    <?php
                        foreach ($categorias->result() as $c) {
                            ?>
                            <option <?php if ($p->cat_id == $c->cat_id){ echo 'selected'; } ?> value="<?php echo $c->cat_id; ?>" disabled><?php echo $c->cat_nombre; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>foto</td>
            <td><img src="<?php echo base_url(); ?>assets/imagenes/<?php echo $p->prd_foto1; ?>" alt="" width="150"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="prd_id" value="<?php echo $p->prd_id; ?>"></td>
            <td colspan="2" align="center"><input type="submit" value="eliminar"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>panelProductos">volver</a></td>
        </tr>
    </table>
</form>
