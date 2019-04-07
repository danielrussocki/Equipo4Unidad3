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
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Testimonials</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/estilos.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/unid-ico.ico">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Switch</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="index.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="usuarios.php">
                                <span data-feather="home"></span>
                                Usuarios <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="banner.php">
                                <span data-feather="file"></span>
                                Banner
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features.php">
                                <span data-feather="file"></span>
                                Features
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="works.php">
                                <span data-feather="file"></span>
                                Works
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="team.php">
                                <span data-feather="file"></span>
                                Team
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="testimonial.php">
                                <span data-feather="file"></span>
                                Testimonial
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="download.php">
                                <span data-feather="file"></span>
                                Download
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="footer.php">
                                <span data-feather="file"></span>
                                Footer
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Testimonials</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-danger cancelar">Cancelar</button>
                            <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_registro">Nuevo</button>
                        </div>
                    </div>
                </div>
                <h2 id="h2-title">Consultar Testimonials</h2>
                <div class="table-responsive view" id="show_data">
                    <table class="table table-striped table-sm" id="list-testimonial">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Quote</th>
                                <th>Logo</th>
                                <th>Nombre</th>
                                <th>Puesto</th>
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
                                    <label for="description">Description</label>
                                    <input type="text" id="description" name="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="quote">Quote</label>
                                    <input type="text" id="quote" name="quote" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="img">Logo</label>
                                    <br>
                                    <input type="file" name="foto" id="foto">
                                    <input type="hidden" name="ruta" id="ruta" readonly="readonly">
                                    <div id="preview"></div>
                                </div>
                            </div>
                            <div id="preview"></div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="puesto">Puesto</label>
                                    <input type="puesto" id="puesto" name="puesto" class="form-control">
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
                "accion": "consultar_testimonials"
            };
            $.post("includes/_funciones.php", obj, function(respuesta) {
                let template = ``;
                $.each(respuesta, function(i, e) {
                    template +=
                        `
          <tr>
          <td>${e.description}</td>
          <td>${e.quote}</td>
          <td><img src="${e.img}" class="img-thumbnail" width="100" height="100"/></td>
          <td>${e.name}</td>
          <td>${e.puesto}</td>
          <td>
          <a href="#" data-id="${e.id}" class="editar_registro">Editar</a>
          <a href="#" data-id="${e.id}" class="eliminar_registro">Eliminar</a>
          </td>
          </tr>
          `;
                });
                $("#list-testimonial tbody").html(template);
            }, "JSON");
        }
        $(document).ready(function() {
            consultar();
            change_view();
        });
        $("#nuevo_registro").click(function() {
            change_view('insert_data');
            $("#guardar_datos").text("Guardar").data("editar", 0);
            $("#preview").html("");
            $('#ruta').attr('value', '');
            $("#form_data")[0].reset();
        });

        //INSERTAR

        $("#guardar_datos").click(function() {
            let description = $('#description').val();
            let quote = $('#nombre').val();
            let img = $('#ruta').val();
            let name = $('#name').val();
            let puesto = $('#puesto').val();
            let obj = {
                "accion": "insertar_testimonial",
                "description": description,
                "quote": quote,
                "img": img,
                "name": name,
                "puesto": puesto

            };
            $("#form_data").find("input").each(function() {
                $(this).removeClass("has-error");
                if ($(this).val() != "") {
                    obj[$(this).prop("name")] = $(this).val();
                } else {
                    $(this).addClass("has-error").focus();
                    return false;
                }
            });
            if ($(this).data("editar") == 1) {
                obj["accion"] = "editar_testimonial";
                obj["id"] = $(this).data("id");
                $(this).text("Guardar").data("editar", 0);
                $("#form_data")[0].reset();
            }
            $.post("includes/_funciones.php", obj, function(respuesta) {
                if (respuesta == 0) {
                    $("#error").html("Campos vacios").fadeIn();
                }
                if (respuesta == 1) {
                    location.reload();
                }
            });
        });


        //EDITAR
        $('#list-testimonial').on("click", ".editar_registro", function(e) {
            let id = $(this).data('id'),
                obj = {
                    "accion": "consultar_testimonial",
                    "id": id
                };
            $("#form_data")[0].reset();
            change_view('insert_data');
            $("#guardar_datos").text("Editar").data("editar", 1).data("id", id);
            $.post("includes/_funciones.php", obj, function(r) {
                $("#description").val(r.description);
                $("#quote").val(r.quote);
                $("#name").val(r.name);
                $("#puesto").val(r.puesto);
                let template =
                    `
                    <img src="${r.img}" class="img-thumbnail" width="200" height="200"/>
                    `;
                $("#ruta").val(r.img);
                $("#preview").html(template);
            }, "JSON");
            if (r == 0) {
                $("#error").html("Error al editar").fadeIn();
            }
            if (r == 1) {
                location.reload();
            }
        });


        //ELIMINAR
        $("#main").on("click", ".eliminar_registro", function(e) {
            e.preventDefault();
            let confirmacion = confirm('Desea eliminar este registro?');
            if (confirmacion) {
                let id = $(this).data('id'),
                    obj = {
                        "accion": "eliminar_testimonial",
                        "id": id
                    };
                $.post("includes/_funciones.php", obj, function(respuesta) {
                    if (respuesta == 0) {
                        $("#error").html("Error al eliminar").fadeIn();
                    }
                    if (respuesta == 1) {
                        location.reload();
                    }
                });
            }
        });
        //imagen
        $("#foto").on("change", function(e) {
            let formDatos = new FormData($("#form_data")[0]);
            formDatos.append("accion", "carga_foto");
            $.ajax({
                url: "includes/_funciones.php",
                type: "POST",
                data: formDatos,
                contentType: false,
                processData: false,
                success: function(datos) {
                    let respuesta = JSON.parse(datos);
                    if (respuesta.status == 0) {
                        alert("no se cargo la imagen");
                    }
                    let template =
                        `
                    <img src="${respuesta.archivo}" class="img-thumbnail" width="200" height="200"/>
                    `;
                    $("#ruta").val(respuesta.archivo);
                    $("#preview").html(template);
                }
            });
        });
        $("#main").find(".cancelar").click(function() {
            change_view();
            $("#form_data")[0].reset();
            $("#preview").html("");
            $("#preview").html("");
            if ($("#guardar_datos").data("editar") == 1) {
                $("#guardar_datos").text("Guardar").data("editar", 0);
                consultar();
            }
        });
    </script>


</body>

</html>
<?php

} else {
    header("Location:index.php");
}
?> 