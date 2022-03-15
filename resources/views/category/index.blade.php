<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center m-5">Categories</h1>
    <div class="p-3">
         <!--VER CATEGORIA --><a href="{{route('category.create')}}"class="btn btn-success">Crear Categoria</a>
    </div>
    <main role="main">
            <div class="category slide"></div>
            <div class="container marketing" style="margin-left: auto; margin-right: auto;">
                <div class="row ">
                    @foreach($categories as $category)
                    <div class="col-lg-4 pb-4">
                        <img class="rounded-circle" src="{{asset('/storage/images/' . $category->image)}}" width="140" height="140">
                        <h2>{{$category->title}}</h2>
                        <p>{{$category->description}}</p>
                        <!--VER CATEGORIA -->
                        <a href="{{route('category.show',['id'=>$category->id])}}" class="btn btn-success">Ver</a>
                        <!--Editar CATEGORIA -->
                        <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-warning">Editar</a>
                        
                        <form action="{{route('category.delete')}}" method="POST" class="pt-2">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form></span>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
</body>
</html>


