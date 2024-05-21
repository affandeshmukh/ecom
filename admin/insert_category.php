<?php
include('../connect.php'); // Assuming 'connect.php' contains your database connection code

if(isset($_POST['insert_cat'])){
    $category_title = mysqli_real_escape_string($con, $_POST['cat_title']); // Sanitize input to prevent SQL injection

    // Check if the category already exists
    $select_query = "SELECT * FROM `categories` WHERE category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);

    if(mysqli_num_rows($result_select) > 0) {
        echo "<script>alert('This category is already present in the database')</script>";
    } else {
        // Insert the category
        $insert_query = "INSERT INTO `categories` (`category_title`) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);

        if($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        } else {
            echo "<script>alert('Failed to insert category')</script>";
        }
    }
}
?>


<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_cat" value="Insert Category">
    </div>
</form>
