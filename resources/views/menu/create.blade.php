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

        <main role="main" class="container">
         <div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
            <a class="navbar-brand" href="{{route('index')}}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" >
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                   <div class="col-md-6">
                      <h5 class="mb-4 text-center bg-success text-white rounded">Add New Menu</h5>
                      <form action="{{ route('createsave')}}" method="post">
                         @csrf
                          @if(count($errors) > 0)
                              <div class="alert alert-danger  alert-dismissible">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 @foreach($errors->all() as $error)
                                          {{ $error }}<br>
                                 @endforeach
                              </div>
                           @endif
                           @if ($message = Session::get('success'))
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>   
                                    <strong>{{ $message }}</strong>
                            </div>
                         @endif
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label>Title</label>
                                  <input type="text" name="title" class="form-control">   
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label>Parent</label>
                                  <select class="form-control" name="parent_id">
                                     <option selected disabled>Select Parent Menu</option>
                                     @foreach($allMenus as $key => $value)
                                        <option value="{{ $key }}">{{ $value}}</option>
                                     @endforeach
                                  </select>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <button type="submit" class="btn btn-success">Save</button>
                            </div>
                         </div>
                      </form>
                   </div>
                   <div class="col-md-6">
                      <h5 class="text-center mb-4 bg-info text-white rounded">Menu List</h5>
                       <ul id="tree1">
                          @foreach($menus as $menu)
                             <li>
                                 {{ $menu->title }}
                                 @if(count($menu->childs))
                                     @include('menu.managechild',['childs' => $menu->childs])
                                 @endif
                             </li>
                          @endforeach
                         </ul>
                   </div>
                </div>
             </div>
        </main>
        <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="/js/treeview.js"></script>
    </body>
</html>
