<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<h3 style="color: green;text-align: center" id="msj-agregado"></h3>
<form action="" id="formAddProductos">
    <table class="paneles">
        <tr>
            <th colspan="2">Nuevo Producto</th>
        </tr>
        <tr>
            <td>nombre</td>
            <td><input type="text" name="prd_nombre" required></td>
        </tr>
        <tr>
            <td>descripcion</td>
            <td><textarea name="prd_descripcion" id="" cols="20" rows="3" required></textarea></td>
        </tr>
        <tr>
            <td>precio</td>
            <td><input type="text" name="prd_precio" required></td>
        </tr>
        <tr>
            <td>categoria</td>
            <td>
                <select name="cat_id" id="cat_id" required>
                    <option value="">seleccionar</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>foto</td>
            <td><input type="file" name="prd_foto1" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="agregar"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>panelProductos">volver</a></td>
        </tr>
    </table>
</form>
