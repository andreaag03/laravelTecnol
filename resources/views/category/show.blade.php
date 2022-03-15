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
    <h1 class="text-center m-5">Productos</h1>
    <div class="p-3">
         <!--VER CATEGORIA --><a href="{{route('product.create')}}"class="btn btn-success">Crear Producto</a>
    </div>
    <main role="main">
            <div class="category slide"></div>
            <div class="container marketing" style="margin-left: auto; margin-right: auto;">
                <div class="row ">
                    @foreach($products as $product)
                    <div class="col-lg-4 pb-4">
                        <img class="rounded-circle" src="{{asset('/storage/images/' . $product->image)}}" width="140" height="140">
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->description}}</p>
                        <!--VER CATEGORIA -->
                        <a href="{{route('product.show',['id'=>$product->id])}}" class="btn btn-success">Detalles</a>
                        <!--Editar CATEGORIA -->
                        <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-warning">Editar</a>
                        
                        <form action="{{route('product.delete')}}" method="POST" class="pt-2">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form></span>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
</body>
</html>
