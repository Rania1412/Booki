<?php
    session_start();
    require_once "component.php";
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
    <title>My Cart</title>
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
        <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h4 style="color:beige;">My Cart</h4>
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $ord=array();
                        $i=0;
                    $sql="select * from products";
                    $result=mysqli_query($connect,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['image'], $row['title'],$row['price'], $row['category'],$row['id']);
                                    $ord[$i]=$row['id'];
                                    $i++;
                                    $total = $total + (int)$row['price'];
                                }
                            }
                        }  
                    }}else{
                        echo "<h5 style=\" color:White; font-size:20px; \">Cart is Empty</h5>";
                    }
                

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart'])-1;
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><?php echo $total; ?> dt</h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6><?php
                            echo $total;
                            ?>dt</h6>
                    </div>
                    <hr>
                    <form  method="post">
                    <div class="col-md-6">
                        <input type="submit" name="order" value="Verify Order">
                        
                    </div>
                    </form>
                    <?php
                            
                            if (isset($_POST['order'])){
                                for($i=0;$i<count($ord);$i++){
                                    echo $ord[$i] ; 
                                    $sql="INSERT INTO `orders`(p_id, user_id,total) VALUES('$ord[$i]', '$idd','$total')"  ;
                                    $result=mysqli_query($connect,$sql);
                                    if(!$result){
                                        echo "<script>alert('Can not verify Order')</script>"; 
                                        
                                    }else{
                                        echo "<script>alert('Order done')</script>"; 
                                    }
                                }
                                echo "<script>window.location = 'cart.php'</script>";}
                            

                        ?>
                </div>
            </div>

        </div>
    </div>
</div>
        
</body>
</html>