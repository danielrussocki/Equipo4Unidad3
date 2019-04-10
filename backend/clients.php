<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['auth'];
if (isset($varsesion)) {
    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title>Clients</title>
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
                <h1 class="h2">Clients</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-danger cancelar">Cancelar</button>
                        <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_registro">Nuevo</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive view" id="show_data">
                <table class="table table-striped table-sm" id="list-clients">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div id="insert_data" class="view">
                <form action="#" id="form_data" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <input type="text" id="titulo" name="titulo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control">
                            </div>
                        </div>
                        <div class="col"></div>
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
                    "accion": "consultar_clients"
                };
                $.post("includes/_funciones.php", obj, function(respuesta) {
                    let template = ``;
                    $.each(respuesta, function(i, e) {
                        template +=
                            `
                            <tr>
                            <td>${e.client_title}</td>
                            <td>${e.client_description}</td>
                            <td>
                            <a href="#" data-id="${e.client_id}" class="editar_registro">Editar</a>
                            <a href="#" data-id="${e.client_id}" class="eliminar_registro">Eliminar</a>
                            </td>
                            </tr>
                            `;
                    });
                    $("#list-clients tbody").html(template);
                }, "JSON");
            }
            $(document).ready(function() {
                consultar();
                change_view();
            });

            //form change
            $("#nuevo_registro").click(function() {
                change_view('insert_data');
            });

            //insertar registro
            $("#guardar_datos").click(function() {
                let titulo = $("#titulo").val();
                let descripcion = $("#descripcion").val();
                let obj = {
                    "accion": "insertar_client",
                    "titulo": titulo,
                    "descripcion": descripcion
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
                //boton change insertar to edit
                if ($(this).data("editar") == 1) {
                    obj["accion"] = "editar_client";
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


            //eliminar registro
            $("#main").on("click", ".eliminar_registro", function(e) {
                e.preventDefault();
                let confirmacion = confirm('¿Desea eliminar este registro?');
                if (confirmacion) {
                    let id = $(this).data('id'),
                        obj = {
                            "accion": "eliminar_client",
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

            //editar registro
            $('#list-clients').on("click", ".editar_registro", function(e) {
                let id = $(this).data('id'),
                    obj = {
                        "accion": "consultar_client",
                        "id": id
                    };
                $("#form_data")[0].reset();
                change_view('insert_data');
                $("#guardar_datos").text("Editar").data("editar", 1).data("id", id);
                $.post("includes/_funciones.php", obj, function(r) {
                    $("#titulo").val(r.client_title);
                    $("#descripcion").val(r.client_description);
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
        </script>
    </body>

    </html>
<?php
} else {
    header("Location:index.html");
}
?>