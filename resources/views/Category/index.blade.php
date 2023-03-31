<?php
use App\Models\Category;
$category = Category::all();?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body class="container">
<table class="table caption-top my-4">
    <h3 class="my-4">List of Categories</h3>
    <a class="btn btn-primary" href="{{route("Category.create")}}">New Category</a>
    <caption></caption>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($category as $categories)
        <tr>
            <td>{{$categories->id}}</td>
            <td>{{$categories->name}}</td>
            <td>
                <a href="{{route("Category.edit", $categories->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route("Category.delete", $categories->id)}}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
