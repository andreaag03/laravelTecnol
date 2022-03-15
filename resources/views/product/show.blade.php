<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container marketing" style="margin-top: 50px" >
    <div class="row featurette" style="margin-bottom: 50px">
        <div class="col-md-7">
          <h1 class="featurette-heading">{{$product ->name}}</h1>
          <p class="lead">{{$product->description}}</p>
          <hr style="color: tomato;" />
          <p class="lead" style="text-align:center">{{$product->price}}€</p>
          <hr style="color: tomato;" />
        </div>
        <div class="col-md-5 mt-6">
            <img class="featurette-image img-fluid mx-auto" src="{{asset('/storage/images/' . $product->image)}}" alt="Generic placeholder image" width="300" height="200">
        </div>
    </div>
</div>
<div class="container marketing" style="margin-left: auto; margin-right: auto; border:2px solid #DC3545;
 border-radius:20px; background-color:#DC3545; margin-bottom:50px;">
    @foreach ($product->reviews as $review)
            
        <div class="relative">
          <dt>
            <h5 style="font-weight:900; color:white; margin-top:25px;" class="ml-16 text-lg leading-6 font-medium text-white-900">{{$review->user->username}} <span style="font-weight:500">dice:</span></h5>
          </dt>
          <dd style="font-weight:500; color:white; font-size:18px; margin-bottom:40px" class="mt-2 ml-16 text-base text-white-500">
            {{$review->comment}}
            @if(Auth::user()  != null && Auth::user())
                    <form action="{{route('review.delete')}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="review_id" value="{{$review->id}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button style="position: relative; bottom:45px; left: 980px;"type="submit" class="btn btn-light">Eliminar</i></button>
                    </form>
            @endif
          </dd>
        </div>
      @endforeach

      @if(Auth::user() != null)
<div style='padding-top: 10px' >
        <form style='margin-bottom:20px;'  action="{{route('review.create')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <span style="display: flex; flex-direction:row; align-items:center">
                <textarea name="comment" id="lreview" cols="100" rows="2" placeholder="Añade aquí tu comentario..." style="border: 1px solid #DC3545; border-radius:20px; font-size: 18px;"></textarea>  
                <button type="submit" class="btn btn-light" style="border-radius: 10px; margin-left:20px;height:50px">Enviar</button>
              </span>
        </form>
              </div>
               
@endif
</div>
</body>
</html>