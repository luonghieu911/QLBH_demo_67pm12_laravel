<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/product/store" method="post">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price"><br><br>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock"><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>