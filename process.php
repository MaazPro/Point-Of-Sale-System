<?php

$mysqli = new mysqli('localhost','root','','db') or die (mysqli_error($mysqli)); 
$quantity = 0;
$itemCost = 0;

if(isset($_POST['p1'])){
    // echo "p1: ";
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 2;
    $product_name = "P1";
    $quantity = 1;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (order_id, cost_per_item, product_name, quantity) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);
    header("location: index.php");
}
if(isset($_POST['p2'])){
    // echo "p1: ";
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 4;
    $product_name = "P2";
    $quantity = 1;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (order_id, cost_per_item, product_name, quantity) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);
    header("location: index.php");
}
if(isset($_POST['p3'])){
    // echo "p1: ";
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 8;
    $product_name = "P3";
    $quantity = 1;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (order_id, cost_per_item, product_name, quantity) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);
    header("location: index.php");
}
if(isset($_POST['p4'])){
    // echo "p1: ";
    //unique order id
    $order_id = rand(10,100) + rand(1,10);
    $cost_per_item = 16;
    $product_name = "P4";
    $quantity = 1;
    
    // write to db order_item
    $mysqli->query("INSERT INTO order_item (order_id, cost_per_item, product_name, quantity) VALUES ('$order_id','$cost_per_item','$product_name','$quantity')") or
    die($mysqli->error);
    header("location: index.php");
}

// Increment quantity
if(isset($_GET['add'])){
    $id = $_GET['add'];
    
    // "SELECT quantity FROM order_item WHERE id = '$id' "
    $result = $mysqli->query("SELECT quantity FROM order_item WHERE id = '$id' ") or die ($mysqli->error);
    $row = $result-> fetch_assoc();
    $counter = $row['quantity'];
    $counter++;
    $mysqli->query("UPDATE order_item SET quantity= '$counter' WHERE id = '$id'") or die($mysqli->error());
    // echo $row['quantity'];
    // echo $counter;
      header("location: index.php");
  }

//   Decrement quantity
if(isset($_GET['subtract'])){
    $id = $_GET['subtract'];
    
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

  if(isset($_POST['checkout'])){
    console.log("checkout");
  }

  if(isset($_POST['submit'])){
    //   echo "Submitted";
    header("location: index.php");
    
  }
?>