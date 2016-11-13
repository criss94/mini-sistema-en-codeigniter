//agregamos nueva categoria
$('#formAddCategoria').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url:baseurl+'CategoriaController/addCategoria',
        type:'POST',
        data:$(this).serialize(),
        success:function (data) {
            $('#msj-add').text('nueva categoria agregada');
        }
    });
});

//editados la categoria
$('#formEditCategoria').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url:baseurl+'CategoriaController/editCategoria',
        type:'POST',
        data:$(this).serialize(),
        success:function (data) {
            $('#msj-edit').text('la categoria fue editada');
        }
    });
});

//eliminar la categoria
$('#formDropCategoria').submit(function (e) {
    e.preventDefault();
       $.ajax({
           url:baseurl+'CategoriaController/DropCategoria',
           type:'POST',
           data:$(this).serialize(),
           success:function (data) {
               if(data == 1){
                   alert('la categoria fue eliminada');
                   window.location = baseurl + 'panelCategorias';
               }else {
                   window.location=baseurl+'panelCategorias';
               }
           }
       });
});