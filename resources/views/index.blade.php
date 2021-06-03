<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Index</title>
  </head>
  <body>
    <div class="container">
            <div class="row mb-3 pt-4">
                <div class="col-sm-8 mx-auto">
                    <div class="card border-0 shadow  pl-3">
                        <div class="card-body">
                            @if ($errors->any()) 
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }}
                                <br>
                                @endforeach
                            </div>  
                            @endif
                        <form action="{{route('usuarios')}}" method="POST" class="row g-3 needs-validation">
                            <div class="col-sm-4 padin-2">
                                <input type="text" class="form-control" name="name" placeholder="Name" autocomplete="off" value="{{ old('name') }}">
                            </div>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                            </div>
                            <div class="col-md-2">
                                <div class="input-group has-validation">
                                <input type="password" class="form-control" name="password" placeholder="Password"  autocomplete="off" value="{{ old('password') }}">
                                </div>
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
          <div class="row  mb-3">
                <div class="col-sm-8 mx-auto mt-2">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            
                            <table class="table thead-dark">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>EMAIL</th>
                                        <th>ACCION</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $datos )
                                    <tr>
                                        <td>{{$datos->id }}</td>
                                        <td>{{$datos->name }}</td>
                                        <td>{{$datos->email}}</td>
                                        <td>
                                            <form action="{{route('destroy', $datos)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit"
                                                value="Eliminar"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Desea Eliminar... ?')"
                                                >
                                            </form>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>