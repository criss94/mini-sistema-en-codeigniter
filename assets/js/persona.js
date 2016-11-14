// listamos los usuarios con sus datos en el index con ajax
/*
$('#imgAjax').show(function () {
    $.post(baseurl+'PersonaController/listarDatosPersona',function (data) {
        var persona = JSON.parse(data);
        $('#tablaPersona').append(
            '<tr>'+
            '<th>Nombre</th>'+
            '<th>Ap paterno</th>'+
            '<th>Ap materno</th>'+
            '<th>email</th>'+
            '<th>dni</th>'+
            '<th>fecnac</th>'+
            '<th>ciudad</th>'+
            '<th>Usuario</th>'+
            '<th>Password</th>'+
            '<th>imagen</th>'+
            '<th colspan="3"><a href="agregarUsuario"><img src="'+baseurl+'assets/img/add.png" alt=""></a></th>'+
            '</tr>'
        );
        $.each(persona,function (i,item) {
            $('#tablaPersona').append(
                '<tr>' +
                '<td>'+item.nombre+'</td>' +
                '<td>'+item.appaterno+'</td>' +
                '<td>'+item.apmaterno+'</td>' +
                '<td>'+item.email+'</td>' +
                '<td>'+item.fecnac+'</td>' +
                '<td>'+item.dni+'</td>' +
                '<td>'+item.ciudad+'</td>' +
                '<td>'+item.usu_nombre+'</td>' +
                '<td>'+item.usu_clave+'</td>' +
                '<td><img src="'+baseurl+'assets/imgUser/'+item.imagen+'" alt="" width="150"></td>' +
                '<td colspan="2"><a href="'+item.idpersona+'"><img src="'+baseurl+'assets/img/edit.png" alt=""></a></td>'+
                '<td colspan="2"><a href="'+item.idpersona+'"><img src="'+baseurl+'assets/img/drop.png" alt=""></a></td>'+
                '</tr>'
            );
            $('#imgAjax').hide();
        });
    });
});
*/
//llenamos la ciudad con ajax
$.post(baseurl+'PersonaController/listarCiudadAjax',function (data) {
    var ciudad = JSON.parse(data);
    $.each(ciudad,function (i,item) {
        $('#idciudad').append('<option value="'+item.idciudad+'">'+item.ciudad+'</option>');
    });
});

// mandamos los datos con ajax al controlador
$('#formAddUser').submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url:baseurl+'PersonaController/addUser',
        type:'POST',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function (data) {
            $('#formAddUser')[0].reset();
            $('#file-name').text('');
            $('#desc-file').text('Subir Imagen');
            $('#msj-add').text('tus datos fueron guardados correctamente');
        }
    });
});

//editamos los datos de la persona elegida con ajax
/*$('body').on('click','#tablaPersona a',function (e) {
    e.preventDefault();
    window.location=baseurl+'formEditUser';
    var idpersona = $(this).attr('href');
    $.post(baseurl+'PersonaController/verUsuarioPorID',{idpersona:idpersona},function (data) {
        var persona = JSON.parse(data);
        $('#formEditUser').each(persona,function (i,item) {
            var nombre = $('.nombre').val(item.nombre);
            var appaterno = $('.appaterno').val(item.appaterno);
            var apmaterno = $('.apmaterno').val(item.apmaterno);
            var email = $('.email').val(item.email);
            var dni = $('.dni').val(item.dni);
            var fecnac = $('.fecnac').val(item.fecnac);
            var idciudad = $('.idciudad').val(item.idciudad);
            var imagen = $('.imagen').append('<img src="'+baseurl+'/assets/images/'+item.imagen+'">');
            var usu_nombre = $('.usu_nombre').val(item.usu_nombre);
            var usu_clave = $('.usu_clave').val(item.usu_clave);
        });
    });
});
*/

// tomamos los datos de la persona para mandarlo al controlador y editarlo
$('#formEditUser').submit(function (e) {
    e.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url:baseurl+'PersonaController/editPersona',
        type:'POST',
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function (data) {
            $('#msj-edit').text('tu datos fueron editados coorectamente');
        }
    });
});

// eliminar todos us datos de persona
$('#formDropUser').submit(function (e) {
    e.preventDefault();
    if(confirm('Esta seguro que quiere eliminarlo?')){
        var idpersona = $('.idpersona').val();
        $.post(baseurl+'PersonaController/eliminarPersona',{idpersona:idpersona},function (data) {
            alert('todos los datos del usuario fueron eliminados');
            window.location=baseurl+'panelUsuarios';
        });
        return true;
    }
    window.location=baseurl+'panelUsuarios';
    return false;
});

// verificamos si el uusario existe
$('#formLogin').submit(function (e) {
    e.preventDefault();
    $('#imgLogin').show();
    var user = $('.usu_nombre').val();
    $.ajax({
        url:baseurl+'LoginController/verificarUsuario',
        type:'POST',
        data:{usu_nombre:user},
        success:function (data) {
            if (data != 0){
                var usu = JSON.parse(data);
                $('#msj-login').hide();
                $('#imgLogin').hide('slow');
                $('#formLogin').hide();
                $('#formLogin2').show();
                $.each(usu,function (i,item) {
                    $('#verUser').append('<strong>"'+item.usu_nombre+'"</strong>');
                });
            }else{
                $('#imgLogin').hide();
                $('#formLogin').show();
                $('#formLogin2').hide();
                $('#msj-login').text('Ingresa un usuario valido, o registrate nuevamente');
            }
        }
    });
});

// verifico el password para un inicio de session
$('#formLogin2').submit(function (e) {
    e.preventDefault();
    var pass = $('.usu_clave').val();
    $.ajax({
        url:baseurl+'LoginController/verificarPassword',
        type:'POST',
        data:{usu_clave:pass},
        success:function (data) {
            if (data == 1){
                window.location=baseurl+'admin';
            }else{
                $('#msj-passError').text('Ingresa una contraseña valida');
            }
        }
    });
});

// obtener los datos del usuario para editarlo por el mismo
$.post(baseurl+'LoginController/verMisDatos',function (data) {
    var user = JSON.parse(data);
    $.each(user,function (i,item) {
        var nombre = $('.nombre').val(item.nombre);
        var appaterno = $('.appaterno').val(item.appaterno);
        var apmaterno = $('.apmaterno').val(item.apmaterno);
        var email= $('.email').val(item.email);
        var dni = $('.dni').val(item.dni);
        var fecnac = $('.fecnac').val(item.fecnac);
        var idciudad = $('.idciudad').val(item.idciudad);
        var imagen = $('.imagen').append('<img src="'+baseurl+'assets/imgUser/'+item.imagen+'" width="150">');
        var usu_nombre = $('.usu_nombre').val(item.usu_nombre);
        var usu_clave = $('.usu_clave').val(item.usu_clave);
    });

    $('#formEditPerfil').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url:baseurl+'LoginController/editPerfil',
            type:'POST',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $('#msj-edit').text('Tus datos de perfil fueron editados correctamente');
            }
        });
    });

});

/* eliminamos los datos del usuario logueado */
$('#formDropPerfil').submit(function (e) {
    e.preventDefault();
    if (confirm('Esat seguro que quiere eliminar su cuenta?')) {
        $.post(baseurl + 'LoginController/dropLogin', function (data) {

        });
        alert('Su cuenta ha sido eliminado correctamente');
        window.location=baseurl+'admin';
        return true;
    }
    window.location=baseurl+'admin';
    return false;
});


/*###############################################################################################################
 ########################## modificamos el boton de file con jquery #############################################
 ################################################################################################################*/
// de esta form tambien funciona
$('.file').change(function (e) {
    var filename = e.target.value.split('\\').pop();
    $('#desc-file').text('');
    $('#file-name').text(filename);
});

// y de sta forma tambien
/*
$('.file').change(function () {
    var filename = $(this).val();
    $('#desc-file').text('');
    $('#file-name').text(filename);
});
*/




























