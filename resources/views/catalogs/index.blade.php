<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased">
    <center><h2>Listado de libros</h2></center>
    <div id="book-list" class="container">
        <a href="/books">Volver a pagina principal</a>
        <br>
        <div class="col-12">
            <table class="table table-dark table-striped">
                <thead>
                    <th>Autor</th>
                    <th>Titulo</th>
                    <th>Edición</th>
                    <th>Datos de publicación</th>
                    <th>Tipo de contenido</th>
                    <th>Restricciones</th>
                    <th>Materia</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr v-for="row in books">
                        <td>@{{ row.author }}</td>
                        <td>@{{ row.title }}</td>
                        <td>@{{ row.edition }}</td>
                        <td>@{{ row.publication_data }}</td>
                        <td>@{{ row.content_type }}</td>
                        <td>@{{ row.restrictions }}</td>
                        <td>@{{ row.subject }}</td>
                        <td>@{{ row.provider }}</td>
                        <td>
                            <div>
                                <button type="button" class="btn btn-primary" @click="editBook(row.id)">Editar</button>
                                <button type="button" class="btn btn-danger"
                                    @click="deleteBook(row.id)">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Editar libro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input  v-model="modal.id" hidden>
                            <div class="col-6">
                                <label for="author">Autor</label>
                                <input v-model="modal.author" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="title">Titulo</label>
                                <input v-model="modal.title" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="edition">Edición</label>
                                <input v-model="modal.edition" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="title">Datos de publicacion</label>
                                <input v-model="modal.publication_data" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="title">Tipo de contenido</label>
                                <input v-model="modal.content_type" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="title">Restricciones</label>
                                <input v-model="modal.restrictions" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="title">Materia</label>
                                <input v-model="modal.subject" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="title">Proveedor</label>
                                <input v-model="modal.provider" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button @click="saveEditBook(modal.id)" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
