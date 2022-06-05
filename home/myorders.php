<?php
    session_start();
    require_once "component.php";
	require_once "../connect.php";
    $idd=$_SESSION['user_id'];
    
    if (isset($_POST['remove'])){
        if ($_GET['action']== 'remove'){
            foreach($_SESSION['cart'] as $key => $value ){
                if(isset($value['product_id'])){
                if ($value["product_id"] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Product has been Removed...!')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }}
                
            }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>My Order</title>
	<style>
		h3{
			color:beige;
			font-size:30px;
			margin-left:20px;
		}
		tr th{
			color:white;
			text-align:center;
		}
		tr td {
			color:white;
			
		}
	</style>
</head>
<body style="background-color: #222;">
        
                
                <?php
                    require_once "header.php";
                    head();
                    if (isset($_SESSION['cart'])){
                        $count =count($_SESSION["cart"])-1;
                        echo "<span id=\"cart_count\">$count</span>";
                    }
                    else{
                        echo "<span id=\"cart_count\">0</span>";
                    }
                    if (isset($_POST['search'])){
                        $_SESSION['search']=$_POST['search'];
                        header('location:search.php');
                        
                    }
                    echo "</div>
                    </div>
                </header>";
                ?>
        <h3>Order Details</h3>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th >Order Num</th>
								<th >Quantity</th>
								<th >Total</th>
							</tr>
							<?php

								$result=mysqli_query($connect,"select * from orders where user_id='$idd'");
								$row=mysqli_fetch_assoc($result);
								
							?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo count($row); ?></td>
								<td> <?php echo $row['total'] ?>dt</td>
								
								
							</tr>
								
						</table>
					</div>
        
</body>
</html>
