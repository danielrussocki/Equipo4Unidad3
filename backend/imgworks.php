<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['auth'];
if (isset($varsesion)) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Works img</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="css/estilos.css" rel="stylesheet">
        <style>
            .col{
                margin-top: 10px;
            }
        </style>
    </head>

    <body>
        <?php
        include 'nav.php';
        ?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Works Img</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-danger cancelar">Cancelar</button>
                        <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_registro">Nuevo</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive view" id="show_data">
                <table class="table table-striped table-sm" id="list-workimg">
                    <thead>
                        <tr>
                            <th>img</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div id="insert_data" class="view">
                <form name="form" id="form" method="post" action="includes/upload.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                                    <input type="hidden" name="type" value="imgworks">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Cargar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box">
                <span class="alert alert-danger" id="error" style='display:none;'></span>
                <span class="alert alert-success" id="success" style='display:none;'></span>
            </div>
            </form>
            </div>
        </main>

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
                    "accion": "consultar_workimg"
                };
                $.post("includes/_funciones.php", obj, function(respuesta) {
                    let template = ``;
                    $.each(respuesta, function(i, e) {
                        template +=
                            `
                    <tr>
                    <td><img src="${e.worksimg_route}" class="img-thumbnail" width="150" height="150"/></td>
                    <td>
                    <a href="#" data-id="${e.worksimg_id}" class="eliminar_registro">Eliminar</a>
                    </td>
                    </tr>
                    `;
                    });
                    $("#list-workimg tbody").html(template);
                }, "JSON");
            }

            $(document).ready(function() {
                consultar();
                change_view();
            });

            //eliminar registro
            $("#main").on("click", ".eliminar_registro", function(e) {
                e.preventDefault();
                let confirmacion = confirm('¿Desea eliminar este registro?');
                if (confirmacion) {
                    let id = $(this).data('id'),
                        obj = {
                            "accion": "eliminar_workimg",
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

            //form change
            $("#nuevo_registro").click(function() {
                change_view('insert_data');
            });

            //boton cancelar
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
    header("Location:index.php");
}
?>