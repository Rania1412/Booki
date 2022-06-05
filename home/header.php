<?php
function head(){
    $element="
    <header class=\"p-3 text-white\"> 
                <div class=\"container\" >
                
                <div class=\"d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start\">
                <h2> Booki</h2>
                    <a href=\"/\" class=\"d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none\">
                    <svg class=\"bi me-2\" width=\"40\" height=\"32\" role=\"img\" aria-label=\"Bootstrap\"><use xlink:href=\"#bootstrap\"></use></svg>
                    </a>

                    <ul class=\"nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0\">
                        <li><a href=\"index.php\" class=\"nav-link px-2 text-secondary\">Home</a></li>
                        <li><a href=\"myorders.php\" class=\"nav-link px-2 text-white\">My order</a></li>
                        <li><a href=\"about.php\" class=\"nav-link px-2 text-white\">About</a></li>
                    </ul>

                    <form class=\"col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3\" role=\"search\" method=\"post\">
                        <input type=\"search\" class=\"form-control form-control-dark text-white bg-dark\" name=\"search\" placeholder=\"Search...\" aria-label=\"Search\">
                        
                    </form>

                    <a href=\"../logout.php\" class=\"btn btn-warning\" style=\" margin-right:30px;\">Logout</a>
                
                    
                    <button type=\"button\" class=\"btn \" style=\" border:none;\" >
                            <a href=\"cart.php\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"25\" height=\"25\" fill=\"#ffc107\" class=\"bi bi-cart2\" viewBox=\"0 0 16 16\">
                            <path d=\"M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z\"></path></svg> 
                            </a>                
                        </button>
                    
                    
                       
                    
                ";
    echo $element;}
?>