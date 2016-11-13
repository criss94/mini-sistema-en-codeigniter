$('#imgAjax').show(function () {
    $.post(baseurl+'IndexController/listarProductosConAjax',function (data) {
        var producto = JSON.parse(data);
        $('#listaProducto').append(
            '<tr>' +
            '<th>Nombre</th>' +
            '<th>Descripcion</th>' +
            '<th>Precio</th>' +
            '<th>Categoria</th>' +
            '<th>Imagen</th>' +
            '</tr>'
        );
        $.each(producto,function (i,item) {
            $('#listaProducto').append(
                '<tr>' +
                    '<td>'+item.prd_nombre+'</td>' +
                    '<td>'+item.prd_descripcion+'</td>' +
                    '<td>'+item.prd_precio+'</td>' +
                    '<td>'+item.cat_nombre+'</td>' +
                    '<td><img src="'+baseurl+'assets/imagenes/'+item.prd_foto1+'" alt="" width="150"></td>' +
                '</tr>'
            );
            $('#imgAjax').hide();
        });
    });
});

$('#query').keyup(function () {
    $('#listaProducto').html('');
    var campo = $('#query').val();
    $.post(baseurl+'IndexController/listarProductosConAjaxEnTiempoReal',
        {
            campo:campo
        },function (data) {
                var producto = JSON.parse(data);
                $('#listaProducto').append(
                    '<tr>' +
                    '<th>Nombre</th>' +
                    '<th>Descripcion</th>' +
                    '<th>Precio</th>' +
                    '<th>Categoria</th>' +
                    '<th>Imagen</th>' +
                    '</tr>'
                );
                $.each(producto,function (i,item) {
                    $('#listaProducto').append(
                        '<tr>' +
                        '<td>'+item.prd_nombre+'</td>' +
                        '<td>'+item.prd_descripcion+'</td>' +
                        '<td>'+item.prd_precio+'</td>' +
                        '<td>'+item.cat_nombre+'</td>' +
                        '<td><img src="'+baseurl+'assets/imagenes/'+item.prd_foto1+'" alt="" width="150"></td>' +
                        '</tr>'
                    );
                });
        });
});

// panel productos,crud con ajax
/*
$('#imgAjax').show(function () {
    $.post(baseurl+'IndexController/listarProductos',function (data) {
        var producto = JSON.parse(data);
        $('#panelProductos').append(
            '<tr>' +
            '<th>Nombre</th>' +
            '<th>Descripcion</th>' +
            '<th>Precio</th>' +
            '<th>Categoria</th>' +
            '<th>Imagen</th>' +
            '<th colspan="2"><a href="'+baseurl+'formAddProductos"><img src="'+baseurl+'assets/img/add.png" alt=""></a></th>' +
            '</tr>'
        );
        $.each(producto,function (i,item) {
            $('#panelProductos').append(
                '<tr>' +
                '<td>'+item.prd_nombre+'</td>' +
                '<td>'+item.prd_descripcion+'</td>' +
                '<td>'+item.prd_precio+'</td>' +
                '<td>'+item.cat_nombre+'</td>' +
                '<td><img src="'+baseurl+'assets/imagenes/'+item.prd_foto1+'" alt=""></td>' +
                '<td><a href="editProducto?id='+item.prd_id+'"><img src="'+baseurl+'assets/img/edit.png" alt=""></a></td>' +
                '<td><a href="dropProducto?id='+item.prd_id+'"><img src="'+baseurl+'assets/img/drop.png" alt=""></a></td>' +
                '</tr>'
            );
            $('#imgAjax').hide()
        });
    });

});
*/

// llenamos las categorias
$.post(baseurl+'ProductoController/listarCategorias',function (data) {
    var categorias = JSON.parse(data);
    $.each(categorias,function (i,item) {
        $('#cat_id').append('<option value="'+item.cat_id+'">'+item.cat_nombre+'</option>');
    });
});

// mandamos los datos con ajax para insertar en la db
$('#formAddProductos').submit(function (e) {
    e.preventDefault();
    var formData = new FormData($('#formAddProductos')[0]);
    $.ajax({
        url:baseurl+'ProductoController/agregarProducto',
        type:'POST',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function (data) {
            $('#formAddProductos')[0].reset();
            $('#msj-agregado').text('tus datos fueron agregados correctamente');
        }
    });
});

// mandamos los datos paraser editados
$('#formEditProducto').submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url:baseurl+'ProductoController/editarProducto',
        type:'POST',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function (data) {
            $('#msj-editado').text('tus datos fueron editados correctamente');
        }
    });

});

// mandamos los datos paraser eliminados
$('#formDropProducto').submit(function (e) {
    e.preventDefault();
    if (confirm('Esta seguro que quiere eliminarlo?')){
        var formData = new FormData($(this)[0]);
        $.ajax({
            url:baseurl+'ProductoController/eliminarProducto',
            type:'POST',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                alert('el producto elegido fue eliminado correctamente');
                window.location=baseurl+'panelProductos';
            }
        });
        return true;
    }
    window.location=baseurl+'panelProductos';
    return false;
});

// buscador avanzado
$('#formBuscar').submit(function (e) {
    e.preventDefault();
    $('#results .fila').remove();
    $.ajax({
        url:baseurl+'ProductoController/buscarProducto',
        type:'GET',
        data:$(this).serialize(),
        success:function (data) {
            var results = JSON.parse(data);
            $('#imgAjaxBuscador').show('slow',function () {
                $('#results').append(
                    '<tr class="fila">' +
                        '<th colspan="5"><h2 align="center">Resultados de la búsqueda</h2></th>'+
                    '</tr>'+
                    '<tr class="fila">' +
                        '<th>Nombre</th>'+
                        '<th>Descripcion</th>'+
                        '<th>Precio</th>'+
                        '<th>Categoria</th>'+
                        '<th>Imagen</th>'+
                    '</tr>'
                );
                $.each(results,function (i,item) {
                    $('#results').append(
                        '<tr class="fila">' +
                            '<td>'+item.prd_nombre+'</td>' +
                            '<td>'+item.prd_descripcion+'</td>' +
                            '<td>'+item.prd_precio+'</td>' +
                            '<td>'+item.cat_nombre+'</td>' +
                            '<td><img src="'+baseurl+'assets/imagenes/'+item.prd_foto1+'" alt="" width="150"></td>' +
                        '</tr>'
                    );
                    $('#imgAjaxBuscador').hide();
                });
            });
        }
    });
});


































