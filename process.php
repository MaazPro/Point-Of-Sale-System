<?php
session_start();

$mysqli = new mysqli('localhost','root','','db') or die (mysqli_error($mysqli)); 

$getId  = 0;
$id = '';
$quantity = 0;
$itemCost = 0;
$finalSubmit = 0;
$status = '';
$is_walking = false;
$order_id ;
$status = "paid"; // write if statement to check status before submitting to transactions DB
// $subTotal = $_SESSION["subTotal"];
// $rowcount = $_SESSION["rowcount"];
// $tax = $_SESSION["tax"];
// $serviceCharge = $_SESSION["serviceCharge"];
// $total = $_SESSION["total"];
// $paymentMethod = $_SESSION["paymentMethod"];

$subTotal_ = 0;
$rowcount_ = 0;
$tax_ = 0;
$serviceCharge_ = 0;
$total_ = 0;
$paymentMethod_ = '';


// Increment quantity
if(isset($_GET['add'])){
    $id = $_GET['add'];
    
    // "SELECT quantity FROM order_item WHERE id = '$id' "
    $result = $mysqli->query("SELECT quantity FROM order_item WHERE id = '$id' ") or die ($mysqli->error);
    $row = $result-> fetch_assoc();
    $counter = $row['quantity'];
    $counter++;
    $mysqli->query("UPDATE order_item SET quantity= '$counter' WHERE id = '$id'") or die($mysqli->error());

      header("location: index.php");
  }

//   Decrement quantity
if(isset($_GET['subtract'])){
    $id = $_GET['subtract'];
    // echo $id;
    // "SELECT quantity FROM order_item WHERE id = '$id' "
    $result = $mysqli->query("SELECT quantity FROM order_item WHERE id = '$id' ") or die ($mysqli->error);
    $row = $result-> fetch_assoc();
    $counter = $row['quantity'];
    $counter--;
    if($counter < 1){
    $result = $mysqli->query("DELETE FROM order_item WHERE id = '$id'") or die ($mysqli->error);
    }else{

        $mysqli->query("UPDATE order_item SET quantity= '$counter' WHERE id = '$id'") or die($mysqli->error());
    }
    // echo $row['quantity'];
    // echo $counter;
      header("location: index.php");
  }

//   cancel button
    if(isset($_POST['cancel'])){
        $rowcount = $_SESSION["rowcount"] ;
        $status = "refunded";
        // echo "CANCEL" . $rowcount;
        // echo "ROW COUNT " . $rowcount;
        $getId = 0 ;
        if($rowcount > 0){
            $result = $mysqli->query("SELECT `id` FROM `transactions` ORDER BY `id` DESC") or die ($mysqli->error);
            $row = $result-> fetch_assoc();
            $getId =  $row['id'];
            // while ($row = $result-> fetch_assoc()){
                // $getId = $row['id'];
                // echo "ID : " . $getId . "<br>";
            // }
            // echo '<br>$Get Id' . $getId ;
             $result = $mysqli->query("UPDATE `transactions` SET `status`= '$status' WHERE `id` = '$getId' ") or die ($mysqli->error);
        }
      header("location: index.php");

    }

  if(isset($_POST['finalSubmit'])){
    
    $order_id ;
    $subTotal = $_SESSION["subTotal"] ;
    $rowcount = $_SESSION["rowcount"] ;
    $tax = $_SESSION["tax"] ;
    $serviceCharge = $_SESSION["serviceCharge"] ;
    $total = $_SESSION["total"] ;
    $paymentMethod = $_SESSION["paymentMethod"];
    
    $subTotal_ = $subTotal;
    $rowcount_ = $rowcount;
    $tax_ = $tax;
    $serviceCharge_ = $serviceCharge;
 
    $paymentMethod_ = $paymentMethod;    
    
    $result = $mysqli->query("SELECT `id` FROM `orders` ORDER BY `id` ASC") or die ($mysqli->error);
    $row = $result-> fetch_assoc();
    while ($row = $result-> fetch_assoc()){
        $getId = $row['id'];
    }
  
    $order_id = rand(10,100) + rand(1,10);
    $status_ = "paid";

    $result = $mysqli->query(" INSERT INTO `transactions`(`id`, `order_id`, `payment_method`, `status`, `paid_amount_cents`) VALUES ('$getId', '$order_id', '$paymentMethod_', ' $status_', '$total') ") or die ($mysqli->error);

     header("location: index.php");
  }



if(isset($_POST['p1'])){

    // echo "p1: ";
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 2;
    $product_name = "P1";
    $quantity = 1;
    $status = 'pending';
    $is_walking = true;

    // write to db order_item
    $mysqli->query("INSERT INTO `order_item` (`order_id`, `cost_per_item`, `product_name`, `quantity`) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);
   
    $reference_no = rand(10,100) + rand(1,100);
    $serviceCharge = $_SESSION["serviceCharge"] ;
    $total = $_SESSION["total"] ;
    
    $serviceCharge_ = $serviceCharge;
    $total_ = ($total+ $cost_per_item) + ($total* 0.06);
    // echo "Total " . $total_;
    $tax_ = ($total_ * 0.06);
    $is_walking_ = true;
    $status_ = "pending";
   
    $mysqli->query("INSERT INTO orders (`reference_no`, `tax`, `service_charge`, `total_amount_cents`, `is_walking`, `status`) VALUES ('$reference_no','$tax_','$serviceCharge_', '$total_','$is_walking_','$status_')") or
    die($mysqli->error);
    // SELECT * FROM Customers
// ORDER BY Country DESC;
    // $result = $mysqli->query("SELECT `id` FROM `orders` ORDER BY `id` ASC") or die ($mysqli->error);
    // $row = $result-> fetch_assoc();
    // while ($row = $result-> fetch_assoc()){
    //     $getId = $row['id'];
    // }
    // echo "ID:" . $getId;

    header("location: index.php");

}
if(isset($_POST['p2'])){
    // echo "p1: ";
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 4;
    $product_name = "P2";
    $quantity = 1;
    $status_ = 'pending';
    $is_walking = true;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (`order_id`, `cost_per_item`, `product_name`, `quantity`) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);

    $reference_no = rand(10,100) + rand(1,100);
    $serviceCharge = $_SESSION["serviceCharge"] ;
    $total = $_SESSION["total"] ;
    
    $serviceCharge_ = $serviceCharge;
    $tax_ = 6;
    $total_ = ($total+ $cost_per_item) + ($total* 0.06); 
    // echo "Total " . $total_;
    $tax_ = ($total_ * 0.06);
    $is_walking_ = true;
    $status_ = "pending";
   
    $mysqli->query("INSERT INTO orders (`reference_no`, `tax`, `service_charge`, `total_amount_cents`, `is_walking`, `status`) VALUES ('$reference_no','$tax_','$serviceCharge_', '$total_','$is_walking_','$status_')") or
    die($mysqli->error);

    header("location: index.php");
    
}

if(isset($_POST['p3'])){

    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 8;
    $product_name = "P3";
    $quantity = 1;
    $status_ = 'pending';
    $is_walking = true;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (`order_id`, `cost_per_item`, `product_name`, `quantity`) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);

    $reference_no = rand(10,100) + rand(1,100);
    $serviceCharge = $_SESSION["serviceCharge"] ;
    $total = $_SESSION["total"] ;
    
    $serviceCharge_ = $serviceCharge;
    $tax_ = 6;
    // $total_ = $total;
    $total_ = ($total+ $cost_per_item) + ($total* 0.06);
    $tax_ = ($total_ * 0.06);
    $is_walking_ = true;
    $status_ = "pending";
   
    $mysqli->query("INSERT INTO orders (`reference_no`, `tax`, `service_charge`, `total_amount_cents`, `is_walking`, `status`) VALUES ('$reference_no','$tax_','$serviceCharge_', '$total_','$is_walking_','$status_')") or
    die($mysqli->error);

    header("location: index.php");
}

if(isset($_POST['p4'])){
   
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 16;
    $product_name = "P4";
    $quantity = 1;
    $status_ = 'pending';
    $is_walking = true;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (`order_id`, `cost_per_item`, `product_name`, `quantity`) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);

    $reference_no = rand(10,100) + rand(1,100);
    $serviceCharge = $_SESSION["serviceCharge"] ;
    $total = $_SESSION["total"] ;
    
    $serviceCharge_ = $serviceCharge;
    $tax_ = 6;
    // $total_ = $total;
    $total_ = ($total+ $cost_per_item) + ($total* 0.06);
    $tax_ = ($total_ * 0.06);
    $is_walking_ = true;
    $status_ = "pending";
   
    $mysqli->query("INSERT INTO orders (`reference_no`, `tax`, `service_charge`, `total_amount_cents`, `is_walking`, `status`) VALUES ('$reference_no','$tax_','$serviceCharge_', '$total_','$is_walking_','$status_')") or
    die($mysqli->error);

    header("location: index.php");
}

  session_destroy();
?>