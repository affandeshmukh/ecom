<?php
include('../src/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];
    $categories = $_POST['categories'];
    $brands = $_POST['brands'];
    $price = $_POST['price'];
    $status = 'true';

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_product_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_product_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_product_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking empty condition
    if ($product_title == '' || $description == '' || $categories == '' || $brands == '' || $product_image1 == '' || $product_image2 == '' ||$product_image3 == '' || $price == '') {
        echo "<script>alert('Please fill all fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_product_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_product_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_product_image3, "./product_images/$product_image3");

    }

    // Insert query
    $insert_product = "INSERT INTO `product` (product_title, description, keywords, category_title, brands_title, product_image1, product_image2, product_image3, price, date, status)
                       VALUES ('$product_title', '$description', '$keywords', '$categories', '$brands', '$product_image1','$product_image2','$product_image3', '$price', NOW(), '$status')";
    $result_query = mysqli_query($con, $insert_product);
    if ($result_query) {
        echo "<script>alert('Successful product insert')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Insert Products</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body class="bg-light">
<div class="container">
    <h1 class="text-center p-3">Insert Products</h1>
    <form class="" action="" method="post" enctype="multipart/form-data">
        <!-- Title -->
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Product title" autocomplete="off" required>
        </div>
        <!-- Description -->
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="description" class="form-label">Product description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Product description" autocomplete="off" required>
        </div>
        <!-- Keywords -->
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="keywords" class="form-label">Keywords</label>
            <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Keywords" autocomplete="off" required>
        </div>
        <!-- Categories -->
        <div class="form-outline w-50 mb-4 m-auto">
            <select class="form-select" name="categories">
                <option value="">Select category</option>
                <?php
                $select_query = "SELECT * FROM `categories`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $category_title = $row['category_title'];
                    echo "<option value='$category_title'>$category_title</option>";
                }
                ?>
            </select>
        </div>
        <!-- Brands -->
        <div class="form-outline w-50 mb-4 m-auto">
            <select class="form-select" name="brands">
                <option value="">Select brand</option>
                <?php
                $select_query = "SELECT * FROM `brands`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $brands_title = $row['brands_title'];
                    echo "<option value='$brands_title'>$brands_title</option>";
                }
                ?>
            </select>
        </div>
        <!-- Image Upload -->
        <div class="form-outline w-50 mb-4 m-auto">
            <input type="file" name="product_image1" value="" required>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <input type="file" name="product_image2" value="" required>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <input type="file" name="product_image3" value="" required>
        </div>
        <!-- Price -->
        <div class="form-outline w-50 mb-4 m-auto">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Price" autocomplete="off" required>
        </div>
        <div class="form-outline w-50 mb-4 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info">
        </div>
    </form>
</div>
</body>
</html>
