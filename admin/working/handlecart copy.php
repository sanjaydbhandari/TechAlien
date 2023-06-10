<?php 

session_start();
include('config.php');
include('redirect.php');

if(isset($_SESSION['auth']))
{    
    if (isset($_POST['addToCart'])) {

        $prod_id= $_POST['prod_id'];
        $_SESSION['prod_id']=$prod_id;
        $prod_qty=$_POST['prod_qty'];
        // $_SESSION['prod_id']=$prod_id;
        $user_id=$_SESSION['auth_user']['user_id'];

        $chk_existing_cart="SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
        $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);

        if(mysqli_num_rows($chk_existing_cart_run)>0)
        {
            echo "existing";
        }
        
        else
        {
            $insert_query="INSERT INTO carts(user_id,prod_id,prod_qty) VALUES('$user_id','$prod_id','$prod_qty')";
            $insert_query_run=mysqli_query($conn,$insert_query);

            if($insert_query_run)
            {
                echo 201;
            }
            else
            {
                echo 500;
            }
        }     
    }
}
?>
                // break;

            // case "update":
            //     $prod_id=$_POST['prod_id'];
            //     $prod_qty=$_POST['prod_qty'];

            //     $user_id=$_SESSION['auth_user']['user_id'];   

            //     $chk_existing_cart="SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
            //     $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);

            //     if(mysqli_num_rows($chk_existing_cart_run)>0)
            //     {
            //         $update_query="UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id' ";
            //         $update_query_run=mysqli_query($conn,$update_query);
            //         if($update_query_run){
            //             echo 200;
            //         }else{
            //             echo 500;
            //         }
            //     }
                
            //     else
            //     {
            //        echo"something went wrong";
            //     }  
























































// <?php 

// session_start();
// include('config.php');
// include('redirect.php');

// if(isset($_SESSION['auth']))
// {    
//     // if(isset($_POST['scope']))
//     // {
//         // echo "hello";
//         $scope=$_POST['scope'];
//         switch($scope)
//         {
//             case "add":
//                 echo 500;
//                 $prod_id=$_POST['prod_id'];
//                 $prod_qty=$_POST['prod_qty'];
//                 $user_id=$_SESSION['auth_user']['user_id'];

//                 $chk_existing_cart="SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
//                 $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);

//                 if(mysqli_num_rows($chk_existing_cart_run)>0)
//                 {
//                     echo "existing";
//                 }
                
//                 else
//                 {
//                     $insert_query="INSERT INTO carts(user_id,prod_id,prod_qty) VALUES('$user_id','$prod_id','$prod_qty')";
//                     $insert_query_run=mysqli_query($conn,$insert_query);

//                     if($insert_query_run)
//                     {
//                         echo 201;
//                     }
//                     else
//                     {
//                         echo 500;
//                     }
//                 }     
//                 break;

//             case "update":
//                 $prod_id=$_POST['prod_id'];
//                 $prod_qty=$_POST['prod_qty'];

//                 $user_id=$_SESSION['auth_user']['user_id'];   

//                 $chk_existing_cart="SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
//                 $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);

//                 if(mysqli_num_rows($chk_existing_cart_run)>0)
//                 {
//                     $update_query="UPDATE carts SET prod_qty='$prod_qty' WHERE prod_id='$prod_id' AND user_id='$user_id' ";
//                     $update_query_run=mysqli_query($conn,$update_query);
//                     if($update_query_run){
//                         echo 200;
//                     }else{
//                         echo 500;
//                     }
//                 }
                
//                 else
//                 {
//                    echo"something went wrong";
//                 }  

//                 break;

//             case "delete":
//                 $cart_id=$_POST['cart_id'];
//                 $user_id=$_SESSION['auth_user']['user_id'];   

//                 $chk_existing_cart="SELECT * FROM carts WHERE id='$cart_id' AND user_id='$user_id' ";
//                 $chk_existing_cart_run=mysqli_query($conn,$chk_existing_cart);

//                 if(mysqli_num_rows($chk_existing_cart_run)>0)
//                 {
//                     $delete_query="DELETE FROM carts WHERE id='$cart_id' ";
//                     $delete_query_run=mysqli_query($conn,$delete_query);
//                     if($delete_query_run){
//                         echo 200;
//                     }else{
//                         echo"something went wrong";
//                     }
//                 }
                
//                 else
//                 {
//                    echo"something went wrong";
//                 }  

//                 break;

                
//             default:
//                 echo 500;
//         }
//     }
// }
// else
// {
//     echo 401;
//     redirect('login.php','Login To continue');
// }

// ?> 