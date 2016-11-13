<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form action="" id="formBuscar">
    <table class="paneles">
        <tr>
            <th colspan="2">Busqueda avanzada</th>
        </tr>
        <tr>
            <td>Producto</td>
            <td><input type="text" name="query"></td>
        </tr>
        <tr>
            <td>Categorias</td>
            <td>
                <select name="cat_id" id="cat_id">
                    <option value="0">seleccionar</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="buscar"></td>
        </tr>
    </table>
</form>
<table class="panel" id="results"></table>
<div align="center">
    <img src="<?php echo base_url(); ?>assets/img/ajax-loader.gif" alt="" style="display: none;" id="imgAjaxBuscador">
</div>
