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
    <center>
        <h2>Formulario para registrar un nuevo libro</h2>
    </center>

    <div id="book-list" class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <form action="{{ url('/books') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="row">
                    <div class="col-6">
                        <label for="author">Autor</label>
                        <input name="author" class="form-control">
                        @error('author')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="title">Titulo</label>
                        <input name="title" class="form-control">
                        @error('title')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="edition">Edición</label>
                        <input name="edition" class="form-control">
                        @error('edition')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="title">Datos de publicacion</label>
                        <input name="publication_data" class="form-control">
                        @error('publication_data')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="title">Tipo de contenido</label>
                        <input name="content_type" class="form-control">
                        @error('content_type')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="title">Restricciones</label>
                        <input name="restrictions" class="form-control">
                        @error('restrictions')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="subject">Materia</label>
                        <input name="subject" class="form-control">
                        @error('subject')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="provider">Proveedor</label>
                        <input name="provider" class="form-control">
                        @error('provider')
                            <span style="color:red">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <br>
        <div class="col-12">
            <a href="/getViewBook">
                Ir a listado de libros
            </a>
        </div>
    </div>
</body>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script type="text/javascript" src="{{ asset('js/form.js') }}"></script>
