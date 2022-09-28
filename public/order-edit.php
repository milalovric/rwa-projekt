<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Order Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Edit 
                            <a href="index1.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id_orders']))
                        {
                            $customer_id = mysqli_real_escape_string($con, $_GET['id_orders']);
                            $query = "SELECT * FROM orders WHERE id_orders='$customer_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $customer = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code1.php" method="POST">
                                    <input type="hidden" name="customer_id" value="<?= $customer['id_orders']; ?>">

                                    <div class="mb-3">
                                        <label> Name</label>
                                        <input type="text" name="name" value="<?=$customer['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Email</label>
                                        <input type="email" name="email" value="<?=$customer['email'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label> Order date</label>
                                        <input type="text" name="ord_date" value="<?=$customer['ord_date'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" value="<?=$customer['quantity'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                          <label>Order time</label>
                                              <input type="text" name="ord_time" value="<?=$customer['ord_time'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Total</label>
                                          <input type="text" name="total" value="<?=$customer['total'];?>" class="form-control">
                                    </div>
                                     <div class="mb-3">  
                                        <button type="submit" name="update_order" class="btn btn-primary">
                                            Update Order
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
















































































