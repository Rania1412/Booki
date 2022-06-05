<?php
    session_start();
    error_reporting(0);
    require "../connect.php";
    require_once "component.php";

    if (isset($_POST['add_to_cart'])){
        if (isset($_SESSION['cart'])){
            
                $count=count($_SESSION['cart']);
                $item_array=array( 'product_id' => $_POST['product_id']);
                $_SESSION['cart'][$count]=$item_array;
            }
        }
    else{
            $item_array = array(
                'product_id' => $_POST['product_id']
        );

        $_SESSION['cart'][0] = $item_array;
    }
    
    
?>

  




<!DOCTYPE HTML>
<html>
    <head>
        <title>Booki</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #222;">
        
        <main>
            <?php 
            require_once "header.php";
            head();
            if (isset($_SESSION['cart'])){
                $count =count($_SESSION['cart'])-1;
                echo "<span id=\"cart_count\" style=\"color:beige\">$count</span>";
            }
            else{
                echo" <span id=\"cart_count\">0</span>";
            }
            if (isset($_POST['search'])){
                $_SESSION['search']=$_POST['search'];
                header('location:search.php');
                
            }
            echo "</div>
                    </div>
                </header>";
            ?>
            <div class="menu">
                <ul>
                    <?php
                        $cat=array("Action","Adventure","Biography","Fiction","horror","Kids","Romance");
                        for ($i=0;$i<count($cat);$i++){
                            echo "<li><a href=\"$cat[$i].php \" >  $cat[$i] </li>";
                            
                        }
                        ?>
                        
                </ul>
            </div>
             </div>
            <div class="catalogue">
            <?php 
                    $sql="select * from products where category='fiction'";
                    $result=mysqli_query($connect,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)){
                            component($row['title'], $row['image'], $row['category'], $row['price'],$row['id']);
                            
                        } 
                    }
                    
                ?>
            </div>
        </main>
        
        
    <body>
</html>
