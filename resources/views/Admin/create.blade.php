<?php
use App\Models\Category;
$category = Category::all();?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Add post</title>
</head>
<body>
<div class="container my-5">
    <form action="{{route('Admin.store')}}"  method="POST" enctype="multipart/form-data">
        @csrf
        <h3>ADD POST</h3>
        <div class="form-group mb-2">
            <input type="text" required class="form-control" name="title" placeholder="title" value="{{old('title')}}">
        </div>
        <div class="form-group mb-2">
            <textarea name="description" required class="form-control" placeholder="content" > {{old('description')}}</textarea>
        </div>
        <div>
            <select class="form-select mb-2" aria-label="Default select example" name="category_id">
                <option selected>Category</option>
                @foreach($category as $categories)
                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group mb-2">
            <input type="file" class="form-control" name="image" required placeholder="image" value="{{old('image')}}">
        </div>
        <div class="form-group mb-2">
             <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
