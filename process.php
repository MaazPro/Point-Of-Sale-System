<?php

$mysqli = new mysqli('localhost','root','','db') or die (mysqli_error($mysqli)); 

if(isset($_POST['update'])){
    echo "Update";
}
?>