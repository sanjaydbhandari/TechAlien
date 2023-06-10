<?php
session_start();
include('../config.php'); 
include('../redirect.php');

if(isset($_POST['add_category']))
{
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $slug= mysqli_real_escape_string($conn,$_POST['slug']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $meta_keywords=mysqli_real_escape_string($conn,$_POST['meta_keywords']); 
  
  $image = $_FILES['image']['name'];
  $path = "uploads";
  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;
  
  if(empty(trim($name)) || empty(trim($slug)) ||empty(trim($description)) || empty(trim($meta_keywords)) ||empty(trim($image)) ){
    $_SESSION['msg'] = "All Fields are Mandatory";
    header('location:add_category.php');
  }
  else if (!preg_match('/^[\p{L} ]+$/u', $name)) {
    $_SESSION['msg'] = "Category Name must contain letters and spaces only!";
    header('location:add_category.php');
  }
  else if (!preg_match('/^[\p{L} ]+$/u', $slug)) {
    $_SESSION['msg'] = "Slug must contain letters and spaces only!";
    header('location:add_category.php');
  }
  else if (strlen($description) <= '3' && strlen($description) >= '100') {
    $_SESSION['msg'] = "Description must contain atleast 3 Character and Not more then 100 Character";
    header('location:add_category.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $meta_keywords)) {
    $_SESSION['msg'] = "Meta Keywords must contain numbers, letters and spaces only!";
    header('location:add_category.php');
  }
  else{
  $cat_query = "INSERT INTO categories(name, slug, description,meta_keywords,image)
    VALUES ('$name','$slug','$description','$meta_keywords','$filename')";
  
  $cat_query_run=mysqli_query($conn,$cat_query);
  
  if($cat_query_run)
  {
    move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
    redirect('category.php','Category Added Successfully');
  }
  else
  {
    redirect('add_category.php','Failed to add category');
  }
}
}
else if(isset($_POST['update_category']))
{
  $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $slug= mysqli_real_escape_string($conn,$_POST['slug']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $meta_keywords=mysqli_real_escape_string($conn,$_POST['meta_keywords']); 

  $new_image = $_FILES['image']['name'];
  $previous_image=$_POST['previous_image'];
  if($new_image != "")
  {
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
  }
  else
  {
    $update_filename=$previous_image;
  }

  if(empty(trim($name)) || empty(trim($slug)) || empty(trim($description)) || empty(trim($meta_keywords)) ){
    $_SESSION['msg'] = "All Fields are Mandatory";
    header('location:edit_category.php?id='.$category_id);
  }
  else if (!preg_match('/^[\p{L} ]+$/u', $name)) {
    $_SESSION['msg'] = "Category Name must contain letters and spaces only!";
    header('location:edit_category.php?id='.$category_id);
  }
  else if (!preg_match('/^[\p{L} ]+$/u', $slug)) {
    $_SESSION['msg'] = "Slug must contain letters and spaces only!";
    header('location:edit_category.php');
  }
  else if (strlen($description) < '3' && strlen($description) > '100') {
    $_SESSION['msg'] = "Description must contain atleast 3 Character and Not more then 100 Character";
    header('location:edit_category.php?id='.$category_id);
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $meta_keywords)) {
    $_SESSION['msg'] = "Meta Keywords must contain numbers, letters and spaces only!";
    header('location:edit_category.php?id='.$category_id);
  }
  else{
  $path = "uploads";
  $update_category="UPDATE categories SET name='$name',slug='$slug',description='$description',meta_keywords='$meta_keywords',image='$update_filename' WHERE id='$category_id'";
  $update_query_run = mysqli_query($conn, $update_category);
  
  if ($update_query_run) {
    if($_FILES['image']['name'] != "")
    {
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
      if(file_exists("uploads/".$previous_image))
      {  
        unlink("uploads/".$previous_image);
      }
    }
      redirect("edit_category.php?id=$category_id","Category Updated Successfully");
   } else {
    redirect("edit_category.php?id=$category_id","Category Updation Failed");

      // $_SESSION['msg'] = "Category Updation Failed";
      // header("location: category.php");
   }
  }
}
else if(isset($_POST['delete_category']))
{
  $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
  
  $cate_query="SELECT * FROM categories WHERE id='$category_id'";
  $cate_query_run = mysqli_query($conn, $cate_query);
  $row= mysqli_fetch_array($cate_query_run);

  $image=$row['image'];
  
  $delete_cate_query = "DELETE FROM categories WHERE id='$category_id'";
  $delete_query_run = mysqli_query($conn, $delete_cate_query);

  if ($delete_query_run) {
    if(file_exists("uploads/".$image))
      {
        unlink("uploads/".$image);
      }
    redirect("category.php","Category Deleted Successfully");
  } else {
    redirect("category.php","Category Deletion Failed");
  }
}
else if(isset($_POST['add_product'])){
  $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);

  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $slug= mysqli_real_escape_string($conn,$_POST['slug']);
  $small_description = mysqli_real_escape_string($conn,$_POST['small_description']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $original_price = mysqli_real_escape_string($conn,$_POST['original_price']);
  $selling_price = mysqli_real_escape_string($conn,$_POST['selling_price']);
  $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
  $meta_keywords=mysqli_real_escape_string($conn,$_POST['meta_keywords']); 
  $image = mysqli_real_escape_string($conn,$_FILES['image']['name']);
  $path = "uploads/products";
  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time().'.'.$image_ext;
  
  if(empty(trim($name)) || empty(trim($slug)) ||empty(trim($description)) || empty(trim($small_description)) || empty(($original_price)) || empty(trim($quantity)) ||empty(trim($selling_price)) || empty(trim($meta_keywords))  ){
    $_SESSION['msg'] = "All Fields are Mandatory";
    header('location:add_product.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $name)) {
    $_SESSION['msg'] = "Product Name must contain numbers, letters and spaces only!";
    header('location:add_product.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $slug)) {
    $_SESSION['msg'] = "Slug must contain numbers, letters and spaces only!";
    header('location:add_product.php');
  }
  else if (strlen($_POST["small_description"]) < '3' || strlen($_POST["small_description"]) > '20' ) {
    $_SESSION['msg'] = "Small Description must be more then 3 and less then 20";
    header('location:add_product.php');
  }
  else if (strlen($_POST["description"]) < '10' || strlen($_POST["description"]) > '200' ) {
    $_SESSION['msg'] = "Description must be more then 10 and less then 200";
    header('location:add_product.php');
  }
  else if (!preg_match("/^\\d+$/", $original_price) || $original_price<1 ) {
    $_SESSION['msg'] = "Original Price must be positive integer";
    header('location:add_product.php');
  }
  else if (!preg_match("/^\\d+$/", $selling_price)  || $selling_price<1 ) {
    $_SESSION['msg'] = "Selling Price must be positive integer";
    header('location:add_product.php');
  }
  else if (!preg_match("/^\\d+$/", $quantity) || $quantity<1 ) {
    $_SESSION['msg'] = "Quantity must be positive integer";
    header('location:add_product.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $meta_keywords)) {
    $_SESSION['msg'] = "Meta Keywords must contain numbers, letters and spaces only!";
    header('location:add_product.php');
  }
  else{
  $prod_query = "INSERT INTO products(category_id,name, slug,small_description,description,original_price,selling_price,image,quantity,meta_keywords)
    VALUES ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$filename','$quantity','$meta_keywords')";
  $prod_query_run=mysqli_query($conn,$prod_query);
  
  if($prod_query_run)
  {
    move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$filename);
    redirect('product.php','Product Added Successfully');
  }
  else
  {
    redirect('product.php','Failed to Add Product');
  }
}
}
else if(isset($_POST['update_product']))
{
  $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
  $product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $slug= mysqli_real_escape_string($conn,$_POST['slug']);
  $small_description = mysqli_real_escape_string($conn,$_POST['small_description']);
  $description = mysqli_real_escape_string($conn,$_POST['description']);
  $original_price = mysqli_real_escape_string($conn,$_POST['original_price']);
  $selling_price = mysqli_real_escape_string($conn,$_POST['selling_price']);
  $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
  $meta_keywords=mysqli_real_escape_string($conn,$_POST['meta_keywords']); 

  $path = "uploads/products";
  $new_image = $_FILES['image']['name'];
  $previous_image=$_POST['previous_image'];
  if(empty(trim($name)) || empty(trim($slug)) ||empty(trim($description)) || empty(trim($small_description)) || empty(trim($original_price)) || empty(trim($quantity)) ||empty(trim($selling_price)) || empty(trim($meta_keywords))  ){
    $_SESSION['msg'] = "All Fields are Mandatory";
    header('location:add_product.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $name)) {
    $_SESSION['msg'] = "Product Name must contain numbers, letters and spaces only!";
    header('location:add_product.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $slug)) {
    $_SESSION['msg'] = "Slug must contain numbers, letters and spaces only!";
    header('location:add_product.php');
  }
  else if (strlen($_POST["small_description"]) < '3' || strlen($_POST["small_description"]) > '20' ) {
    $_SESSION['msg'] = "Small Description must be greater then 3 and less then 20";
    header('location:add_product.php');
  }
  else if (strlen($_POST["description"]) < '10' || strlen($_POST["description"]) > '200' ) {
    $_SESSION['msg'] = "Description must be greater then 10 and less then 200";
    header('location:add_product.php');
  }
  else if (!preg_match("/^\\d+$/", $original_price) || $original_price<1 ) {
    $_SESSION['msg'] = "Original Price must be positive integer";
    header('location:add_product.php');
  }
  else if (!preg_match("/^\\d+$/", $selling_price)  || $selling_price<1 ) {
    $_SESSION['msg'] = "Selling Price must be positive integer";
    header('location:add_product.php');
  }
  else if (!preg_match("/^\\d+$/", $quantity) || $quantity<1 ) {
    $_SESSION['msg'] = "Quantity must be positive integer";
    header('location:add_product.php');
  }
  else if (!preg_match('/^[a-zA-Z0-9 ]+$/', $meta_keywords)) {
    $_SESSION['msg'] = "Meta Keywords must contain numbers, letters and spaces only!";
    header('location:add_product.php');
  }
  else{
  if($new_image != "")
  {
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time().'.'.$image_ext;
  }
  else
  {
    $update_filename=$previous_image;
  }

  $update_product="UPDATE products SET category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',quantity='$quantity',image='$update_filename',meta_keywords='$meta_keywords' WHERE id='$product_id'";
  $update_query_run = mysqli_query($conn, $update_product);
  
  if ($update_query_run) {
    if($_FILES['image']['name'] != "")
    {
      move_uploaded_file($_FILES['image']['tmp_name'],$path.'/'.$update_filename);
      if(file_exists("uploads/products/".$previous_image))
      {
        unlink("uploads/products/".$previous_image);
      }
    }
      redirect("edit_product.php?id=$product_id","Product Updated Successfully");
  } else {
    redirect("edit_product.php?id=$product_id","Product Updation Failed");
  }
  }
}
else if(isset($_POST['delete_product']))
{
  $product_id = mysqli_real_escape_string($conn,$_POST['product_id']);
  
  $prod_query="SELECT * FROM products WHERE id='$product_id'";
  $prod_query_run = mysqli_query($conn, $prod_query);
  $row= mysqli_fetch_array($prod_query_run);

  $image=$row['image'];
  
  $delete_prod_query = "DELETE FROM products WHERE id='$product_id'";
  $delete_query_run = mysqli_query($conn, $delete_prod_query);

  if ($delete_query_run) {
    if(file_exists("uploads/products/".$image))
    {
        unlink("uploads/products/".$image);
    }
    redirect("product.php","Product Deleted Successfully");
  } else {
    redirect("product.php","Product Deletion Failed");
  }
}
else if(isset($_POST['updateOrderBtn']))
{
  $track_no=$_POST['tracking_no'];
  $order_status=$_POST['order_status'];

  $updateOrderStatus_query="UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'";
  $updateOrderStatus_run=mysqli_query($conn,$updateOrderStatus_query);

  redirect("view-order.php?t=$track_no","Order Status Updated Successfully");
}
else if(isset($_POST['add_admin']))
{
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone_number = mysqli_real_escape_string($conn, $_POST['phone']);
  $full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $token = bin2hex(random_bytes(15));
    
if (empty(trim($full_name))) {
    $_SESSION['msg'] = "Please Enter your Fullname";
    header('location:admins.php');
  } else if (empty(trim($full_name)) ){
    $_SESSION['msg'] = "Name must contain letters and spaces only!";
    header('location:admins.php');
  } else if (!preg_match('/^[\p{L} ]+$/u', $full_name) ){
    $_SESSION['msg'] = "Name must contain letters and spaces only!";
    header('location:admins.php');
  } else if (empty(trim($email))) {
    $_SESSION['msg'] = "Please Enter your Email";
    header('location:admins.php');
  } else if (empty(trim( $phone_number))) {
    $_SESSION['msg'] = "Please Enter your Mobile Number";
    header('location:admins.php');
  } else if (!preg_match('/^[6-9][0-9]{9}$/', $phone_number)) {
    $_SESSION['msg'] = "Mobile Number is not Valid";
    header('location:admins.php');
  } else if (empty(trim($password))) {
    $_SESSION['msg'] = "Please Enter your Password";
    header('location:admins.php');
  } else if (strlen($_POST["password"]) <= '8' || !preg_match("#[A-Z]+#",$_POST["password"]) ||!preg_match("#[a-z]+#",$_POST["password"]) || !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
    $_SESSION['msg'] = "Your Password Must Contain At Least 8 Digits,1 Number, 1 Capital Letter, 1 Lowercase Letter and 1 Special Character!";
    header('location:admins.php');
  } else if (empty($cpassword)) {
    $_SESSION['msg'] = "Confirm Password is required";
    header('location:admins.php');
  } else {
      $select = " SELECT * FROM users WHERE (email = '$email')";
      $query = mysqli_query($conn, $select);
      if (mysqli_num_rows($query) > 0) {
        $_SESSION['msg'] = "Email Id already register";
        header('location:admins.php');
      } else {
        if ($password != $cpassword) {
            $_SESSION['msg'] = "Password not matched!";
            header('location:admins.php');
        } else {
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $insert = "INSERT INTO users(id,fullname,email,phone,password,token,role) VALUES('','$full_name','$email','$phone_number','$pass','$token','$role')";
            $query_run = mysqli_query($conn, $insert);

            if ($query_run) {
              $_SESSION['msg'] = "Admin Added Successfully";
              header('location:admins.php');
            } else {
              $_SESSION['msg'] = "Admin Registeration Failed!";
              header('location:admins.php');
            }
        }
      }
  }
}
else if (isset($_POST['updateUser'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone_number = mysqli_real_escape_string($conn, $_POST['phone']);
  $full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $pass = password_hash($password, PASSWORD_BCRYPT);

  $select = "UPDATE users SET fullname='$full_name',email='$email',phone='$phone_number',password='$pass',role='$role' WHERE id='$id' ";
  $query_run = mysqli_query($conn, $select);
  if ($query_run) {
  $_SESSION['msg'] = "User Updated Successfully";
  header('location:admins.php');
  } else {
  $_SESSION['msg'] = "User Updation Failed!";
  header('location:admins.php');
  }
}
else if(isset($_POST['delete_admin']))
{
  $admin_id = mysqli_real_escape_string($conn,$_POST['admin_id']);
  $delete_admin_query = "DELETE FROM users WHERE id='$admin_id'";
  $delete_query_run = mysqli_query($conn, $delete_admin_query);

  if ($delete_query_run) {
    redirect("admins.php","Admin Deleted Successfully");
  } else {
    redirect("admins.php","Admin Deletion Failed");
  }
}
else{
  header('location: index.php');
}
?>
