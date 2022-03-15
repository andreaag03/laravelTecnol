<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EditCategory</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container p-3">
  <h1 class="text-center p-3">Editar Categoria</h1>
  <form action="{{ route('category.update', ['id' => $category->id])}}" method="POST">
  @csrf
  @method('put')
    <div class="form-row" >
    <input type="hidden" class="form-control" name="cId" value="{{$category->id}}">
      <div class="form-group col-md-6">
      <label for="cname">Category name</label>
        <input type="text" class="form-control" name="title" value="{{$category->title}}">
      </div>
    </div>
    <div class="form-group">
    <label for="cdescription">Description</label>
    <input type="text" class="form-control" name="description" value="{{$category->description}}">
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" name="image" value="{{asset('/storage/images/' . $category->image)}}">
    </div>
    <a href="{{route('category.index')}}" class="btn btn-success">Volver</a>
    <button type="submit" class="btn btn-warning">Guardar</button>
    
  </form>


</div>
</body>
</html>