<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
</head>
<body>
<div id="top">
    <img src="<?php echo base_url(); ?>assets/imagenes/top2.png" alt="encabezado" width="100%" height="80">
</div>
<?php
    if (isset($_SESSION['login'])) {
        ?>
        <div id="user">
            <p><b>Usuario : </b><span><?php echo $this->session->userdata('nombre'); ?></span></p>
        </div>
        <?php
    }
?>
<div id="nav">

    <ul>
        <?php
        if (!isset($_SESSION['login'])) {
            ?>
            <li><a href="<?php echo base_url(); ?>index">Inicio</a></li>
            <li><a href="<?php echo base_url(); ?>formBuscar">Búsqueda avanzada</a></li>
            <li><a href="<?php echo base_url(); ?>formLogin">Ingresar</a></li>

            <li class="query">
                    <input type="search" name="query" class="palabra" id="query" placeholder="Buscar producto ...">
                    <input type="submit" value="Buscar" class="btn-buscar">
            </li>
            <?php
        }else {
            ?>
            <li><a href="<?php echo base_url(); ?>panelUsuarios">Admin Usuarios</a></li>
            <li><a href="<?php echo base_url(); ?>panelProductos">Admin Productos</a></li>
            <li><a href="<?php echo base_url(); ?>panelCategorias">Admin Categorias</a></li>
            <!--<li id="perfil"><a href="<?php echo base_url(); ?>formEditLogin">Editar mi Perfil</a></li>-->
            <li id="perfilConfig">Mi Perfil
                <ul class="down">
                    <li><a href="<?php echo base_url(); ?>formEditLogin">Editar cuenta</a></li>
                    <li><a href="<?php echo base_url(); ?>formDropLogin">Eliminar cuenta</a></li>
                    <li><a href="<?php echo base_url(); ?>logout">Salir</a></li>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>


</div>
<div id="main">

    <h1>venta de productos</h1>
