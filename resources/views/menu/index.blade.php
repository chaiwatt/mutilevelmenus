<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap NavBar</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link href="{{asset('css/navbar.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
            <a class="navbar-brand" href="#">NavBar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto">


                  @foreach($menus as $menu)

                  <li class="nav-item  {{ count($menu->childs) ? 'dropdown' :'' }} active">
                      <a class="nav-link {{ count($menu->childs) ? 'dropdown-toggle' :'' }}"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{ $menu->title }}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdown1">
                        @if(count($menu->childs))
                          @include('menu.menusub',['childs' => $menu->childs])
                        @endif
                      </ul>
                  </li>
                  @endforeach
                </ul>
                <form class="form-inline mt-2 mt-md-0">
                <a href="{{route('create')}}" class="btn btn-outline-success my-2 my-sm-0" type="submit">Add menu</a>
                </form>
            </div>
        </div>

        <main role="main" class="container">
            <div class="jumbotron text-center">
                <h1>Multi-Level Menus</h1>
                <p class="lead text-info">NavBar with multiple childs.</p>
            </div>
        </main>

        <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/navbar.js')}}"></script>
    </body>
</html>
