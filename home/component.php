<?php
    require_once "../connect.php";
    $idd=$_SESSION['user_id'];
    function component($productname,$productimg,$productcategory,$productprice,$product_id){
    $element="
            <div class=\"prod\">
                <form action=\"index.php\" method=\"post\">
                    <img src=\"$productimg \" alt=\"\">
                    <h4>$productname</h4>
                    <h5>$productprice dt </h5>
                    <button type=\"submit\" class=\"btn \" id=\"cart\" name=\"add_to_cart\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-cart2\" viewBox=\"0 0 16 16\">
                            <path d=\"M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z\"></path></svg> 
                            Add to Cart
                        </button>
                        <input type='hidden' name=\"product_id\" value=\"$product_id\">
                    </form>
            </div> 
    ";
    echo $element;}

    function cartelement($productimg, $productname, $productprice,$productcategory, $product_id){
        $element ="
        <form action=\"cart.php?action=remove&id=$product_id\" method=\"post\" class=\"cart-items\">
        <div class=\"border rounded\" style=\"margin:50px 10px;\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\" style=\"color:grey;\">$productname</h5>
                                <small class=\"text-secondary\">Category : $productcategory</small>
                                <h5 class=\"pt-2\">$productprice dt</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                <input type='hidden' name=\"product_id\" value=\"$product_id\">
                            </div>
                        </div>
                    </div>
                </form>
        ";
        echo $element;
    }
    
    function names($idd,$connect){
        $result=mysqli_query($connect,"select title from products,orders where orders.pid==products.id and user_id='$idd'");
		$row=mysqli_fetch_assoc($result);
		for($i=0;$i<count($row);$i++){
			echo "<td> $row[$i] </td></tr><tr>";
		}
    }

    
    

?>
