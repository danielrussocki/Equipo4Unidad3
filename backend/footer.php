<?php
	session_start();
	error_reporting(0);
	$varsesion = $_SESSION['auth'];
	if (isset($varsesion)){
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'nav.php';
    ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-danger cancelar">Cancelar</button>
                            <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_header">Nuevo</button>
                        </div>
                    </div>
                </div>
                <h2>Footer</h2>
                <div class="table-responsive view" id="show_data">
                    <table class="table table-striped table-sm" id="list_header">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Background</th>
                                <th>Button</th>
                                <th>Reference</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="insert_data" class="view">
                    <form id="form_data" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto" required>
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Título">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" id="text_btn" name="text_btn" class="form-control" placeholder="Botón">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" id="header_href" name="header_href" class="form-control" placeholder="Redireccionamiento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-success" id="guardar_datos">Guardar</button>
                            </div>
                        </div>
                        <div class="box">
                            <span class="alert alert-danger" id="error" style='display:none;'></span>
                            <span class="alert alert-success" id="success" style='display:none;'></span>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        //cambia vista
        function change_view(vista = 'show_data') {
            $("#main").find(".view").each(function() {
                // $(this).addClass("d-none");
                $(this).slideUp('fast');
                let id = $(this).attr("id");
                if (vista == id) {
                    $(this).slideDown(300);
                    // $(this).removeClass("d-none");
                }
            });
        }
        function consultar() {
            let obj = {
                "accion": "consultar_headers"
            };
            checar_obj(obj);
            $.post("includes/_funciones.php", obj, function(respuesta) {
                let template = ``;
                $.each(respuesta, function(i, e) {
                    console.log(i,e);
                    template +=
                        `
          <tr>
          <td>${e.header_title}</td>
          <td>${e.header_background}</td>
          <td>${e.header_button}</td>
          <td>${e.header_href}</td>
          <td>
          <a href="#" data-id="${e.header_id}" class="editar_header">Editar</a>
          <a href="#" data-id="${e.header_id}" class="eliminar_header">Eliminar</a>
          </td>
          </tr>
          `;
                });
                $("#list_header tbody").html(template);
            }, "JSON");
        }
        $(document).ready(function() {
            consultar();
            change_view();
        });
        //form change
        $("#nuevo_header").click(function() {
            change_view('insert_data');
        });
        //Foto
        $('#validatedCustomFile').on("change",function(e){
            let formDatos = new FormData($('#form_data')[0]);
            formDatos.append("accion","carga_foto");
            console.log(e);
            console.log(formDatos);
            $.ajax({
                url:"includes/_funciones.php",
                type:"POST",
                data:formDatos,
                contentType:false,
                processData:false,
                beforeSend:function(){
                    let template = `<span>Subiendo imagen...</span>`;
                    $('.box').html(template);
                },
                success:function(datos){
                    let respuesta = JSON.parse(datos);
                    console.log(JSON.parse(datos));
                    if(respuesta.status==0){
                        alert("No se cargó la imagen")
                    }else{
                        let template=`<img src="${respuesta.archivo}" class="img-fluid img-thumbnail" alt=""/>`;
                        $('.box').html(template);
                    }
                },
                error:function(){
                    let template=`<span>Error, intente nuevamente.</span>`;
                    $('.box').html(template);
                }
            });
        });
        //insertar header
        $("#guardar_datos").click(function() {
            let file = $("#validatedCustomFile").val();
            let title = $("#title").val();
            let text_btn = $("#text_btn").val();
            let header_href = $("#header_href").val();
            let obj = {
                "accion": "insertar_header",
                "file": file,
                "title": title,
                "text_btn": text_btn,
                "header_href": header_href
            }
            $("#form_data").find("input").each(function() {
                $(this).removeClass("has-error");
                if ($(this).val() != "") {
                    obj[$(this).prop("name")] = $(this).val();
                } else {
                    $(this).addClass("has-error");
                    return false;
                }
            });
            checar_obj(obj);
            //boton change insertar to edit
            if ($(this).data("editar") == 1) {
                obj["accion"] = "editar_header";
                obj["id"] = $(this).data('id');
            }
            $.post("includes/_funciones.php", obj, function(r) {
                if (r == 0) {
                    $("#error").html("Campos vacios").fadeIn();
                }
                if (r == 1) {
                    location.reload();
                }
            });
        });
        //eliminar header
        $("#main").on("click", ".eliminar_header", function(e) {
            e.preventDefault();
            let confirmacion = confirm('¿Desea eliminar este registro?');
            if (confirmacion) {
                let id = $(this).data('id'),
                    obj = {
                        "accion": "eliminar_header",
                        "id": id
                    };
                $.post("includes/_funciones.php", obj, function(r) {
                    if (r == 0) {
                        $("#error").html("Error al eliminar").fadeIn();
                    }
                    if (r == 1) {
                        location.reload();
                    }
                });
            }
        });
        //editar usuario
        $("#list_header").on("click", ".editar_header", function(e) {
            let id = $(this).data('id'),
                obj = {
                    "accion": "consultar_header",
                    "id": id
                };
            $("#form_data")[0].reset();
            change_view("insert_data");
            $("#guardar_datos").text("Editar").data("editar", 1).data('id', id);
            $.post('includes/_funciones.php', obj, function(r) {
                $("#file").val(r.header_background);
                $("#title").val(r.header_title);
                $("#text_btn").val(r.header_button);
                $("#header_href").val(r.header_href);
            }, "JSON");
            if (r == 0) {
                $("#error").html("Error al editar").fadeIn();
            }
            if (r == 1) {
                location.reload();
            }
        });
        //cancel button
        $("#main").find(".cancelar").click(function() {
            change_view();
            $("#form_data")[0].reset();
            $("#form_data").find("input").each(function() {
                $(this).removeClass("has-error");
            });
            $("#error").hide();
            $("#success").hide();
        });
        $("#sign_out").on("click",function(){
            let obj = {
            "accion":"kill_session"
            };
            $.post("includes/_funciones.php",obj,function(xd){
            window.location.href = xd;
            });
        });
        function checar_obj(objeto){
            $.each(objeto,function(i,e){
                console.log(i,e);
            });
        }
    </script>
</body>

</html> 
<?php
	}else{
		header("Location:index.php");
	}
?>