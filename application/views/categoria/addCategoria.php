<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'validar.php';
?>
<h3 style="color: green;text-align: center" id="msj-add"></h3>
<form id="formAddCategoria">
    <table class="paneles">
        <tr>
            <th colspan="2">Nueva categoria</th>
        </tr>
        <tr>
            <td>Categoria</td>
            <td><input type="text" name="cat_nombre" class="cat_nombre"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="agregar"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><a href="<?php echo base_url(); ?>panelCategorias">volver</a></td>
        </tr>
    </table>
</form>
