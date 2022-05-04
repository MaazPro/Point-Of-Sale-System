<!doctype html>
<html lang="en">
  <head>
    <title>POS - Cashier</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

  </head>
  <body>
    <?php require_once 'process.php'; ?>
    <!-- Codes Below -->
    <div class="container">
   
    <div class="row justify-content-center">
    <h6>Point Of Sale - Cashier</h6>
    </div>
    <?php 
        $mysqli = new $mysqli('localhost','root','','db') or die ($mysqli->error);
        $result = $mysqli->query("SELECT * FROM order_item") or die ($mysqli->error);
        $subTotal = 0;
        $total = 0;
        $tax = 0.06;
        // pre_r($result->fetch_assoc());
        // pre_r($result->fetch_assoc());
    ?>

<!-- <form action="process.php" method = "POST"> -->

   <!--Display Table -->
    <div class="row justify-content-center">
        <table class = "table">
          <thead>
            <tr>
              <th>Product</th>
              <th>Price <br>(RM)</th>
              <!-- <th colspan = "2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity</th> -->
              <th colspan = "1">Quantity</th>
              <th> Cost<br> (RM)</th>
            </tr>
          </thead>
          <?php while ($row = $result-> fetch_assoc()):  ?>
          <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['cost_per_item']; ?></td>
            <td>
              <a href="index.php?subtract=<?php echo $row['id']; ?>" class = "btn btn-secondary">-</a>

                <?php echo $row['quantity']; ?>
               <a href="index.php?add=<?php echo $row['id']; ?>" class = "btn btn-dark">+</a>
              
            </td>
            <td> <!-- Cost--> 
            <?php
                 $cost = 0;
                 $cost_per_item =  $row['cost_per_item'];
                 $quantity = $row['quantity'];
                //  echo $quantity ;
                 $cost = $cost_per_item * $quantity;
                 $subTotal = $cost + $subTotal ;
                 echo $cost ;
              ?>
              
            </td>
          </tr>
          <?php endwhile; ?>
          </table>
          <br><br>
          <p></p>
          <table class = "table">
          <thead>
            <tr>
            <!-- <tr></tr> -->
           <th colspan = "3">Subtotal</th>
              <!-- <td></td>
              <td></td>
              <td></td> -->
              <th>&nbsp;RM<?php echo $subTotal ?></th>
            </tr>
            <tr>
              <th colspan = "3">&nbsp;No. of items

              </th>
              <th>
              <?php
                  $rowcount = mysqli_num_rows( $result );
                  echo $rowcount;
                ?>
              </th>
            </tr>
            <tr>
              <th colspan = "3">&nbsp;&nbsp;Tax</td>
              <th>6%</th>
            </tr>
            <tr>
              <th colspan = "3">&nbsp;&nbsp;Service Charge</th>
              <th>-</th>
            </tr>
            <tr>
              <th colspan = "3">&nbsp;&nbsp;Total</th>

              <th>RM
                <?php
                    $tax = 0.06;
                    $total = ($subTotal * $tax);
                    $total = $subTotal + $total;
                    echo $total;
                ?>
              </th>
            </tr>
          </thead>
      </table>
      </div>

      <!-- Form Buttons-->
      <div class="row justify-content-center">
        <form action="process.php" method = "POST">
              <!-- Products Buttons -->
        <div class="row justify-content-center">
            <br><br>       
            <button type="submit" class = "btn btn-secondary" name = "p1">Product 1</button>
            &nbsp; &nbsp; 
            <button type="submit" class = "btn btn-secondary" name = "p2">Product 2</button>
            &nbsp; &nbsp;
            <br>
            <button type="submit" class = "btn btn-secondary" name = "p3">Product 3</button>
            &nbsp; &nbsp; 
            <button type="submit" class = "btn btn-secondary" name = "p4">Product 4</button>
        </div>
        <br><br>
        <center>
        <button type="submit" class = "btn btn-danger" name = "cancel">Cancel</button>
        <!-- <button type="submit" class = "btn btn-success" name = "checkout" data-toggle="modal" data-target="#exampleModal">Checkout</button> -->
        <button type="button" class = "btn btn-success" name = "checkout" data-toggle="modal" data-target="#exampleModal">Checkout</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <table class = "table">
                    <thead>
                    <tr>
                        <th colspan = "3">Total Paid Amount</th>
                        <th></th>
                    </tr>  
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>  
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>  
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>  
                  </thead>
                
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
                </div>
              </div>
            </div>
        </div>
        
        </center>
        </form>  
      </div>
    </div>
  </body>
</html>