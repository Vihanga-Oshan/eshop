<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="single-product.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Raleway:wght@300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminPanel.css">
    <link rel="icon" href="Resources/logo.svg">
    <link rel="stylesheet" href="style.css" />
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Admin Panel</title>
</head>

<body> <?php

session_start();

if (isset($_SESSION["u"])) {

    $data = $_SESSION["u"];




}?>

    <div class="modal fade" id="product_add_error" data-bs-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content1" style="  background-color:rgba(183, 104, 104, 0.505) !important; backdrop-filter: blur(15px) !important;">
                <div class="d-flex justify-content-end px-3 pt-2">

                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="" id="response">

                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
    <div class="product-container"></div>

    <?php

$today = date("Y-m-d");
$thismonth = date("m");
$thisyear = date("Y");

$a = "0";
$b = "0";
$c = "0";
$e = "0";
$f = "0";

$invoice_rs = Database::search("SELECT * FROM `invoice`");
$invoice_num = $invoice_rs->num_rows;

for ($x = 0; $x < $invoice_num; $x++) {
    $invoice_data = $invoice_rs->fetch_assoc();

    $f = $f + $invoice_data["qty"]; //total qty

    $d = $invoice_data["date"];
    $splitDate = explode(" ", $d); //separate date from time
    $pdate = $splitDate[0]; //sold date

    if ($pdate == $today) {
        $a = $a + $invoice_data["total"];
        $c = $c + $invoice_data["qty"];
    }

    $splitMonth = explode("-", $pdate); //separate date as year,month & date
    $pyear = $splitMonth[0]; //year
    $pmonth = $splitMonth[1]; //month

    if ($pyear == $thisyear) {
        if ($pmonth == $thismonth) {
            $b = $b + $invoice_data["total"];
            $e = $e + $invoice_data["qty"];
        }
    }
}

?>

    <div class="Sproduct ">
        <div class="" style="height: 100vh;">
            <div class="d-lg-flex justify-content-lg-center " style="margin: 0; padding: 0;">
                <div class="row offset-lg-1 col-lg-11 col-md-12 col-12 product-dis d-md-flex justify-content-md-center py-4" style="padding: 0;margin: 0;background: #0000001a; margin-bottom: 10vh;">
                    <div class="col-12 my-3 m-3 ms-5" style="font-family: 'Lato', sans-serif;">
                        <h3>Admin Panel</h3>

                    </div>
                    <div class="row  d-flex justify-content-between " style="font-family: 'Lato', sans-serif;">
                        <div class="col-3 sell-con d-flex justify-content-between align-items-center mx-4">
                            <div>
                                <p style="color: rgba(9, 10, 10, 0.579);">Daily Earnings</p>
                                <h2 style="color:#2491EB;" >Rs. <?php echo $a; ?> .00</h2>
                            </div>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-3 sell-con d-flex justify-content-between align-items-center mx-4">
                            <div>
                                <p style="color: rgba(9, 10, 10, 0.579);">Today Selling</p>
                                <h2 style="color:#2491EB;" ><?php echo $c; ?> Items</h2>
                            </div>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-3 sell-con d-flex justify-content-between align-items-center mx-4">
                            <div>
                                <p style="color: rgba(9, 10, 10, 0.579);">Monthly Earning</p>
                                <h2 style="color:#2491EB;">Rs. <?php echo $b; ?> .00</h2>
                            </div>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-3 sell-con d-flex justify-content-between align-items-center mx-4">
                            <div>
                                <p style="color: rgba(9, 10, 10, 0.579);">Monthly Sellings</p>
                                <h2 style="color:#2491EB;"><?php echo $e; ?> Items</h2>
                            </div>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-3 sell-con d-flex justify-content-between align-items-center mx-4">
                            <div>
                                <p style="color: rgba(9, 10, 10, 0.579);">Total Sales</p>
                                <h2 style="color:#2491EB;"><?php echo $f; ?> Items</h2>
                            </div>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                </svg>
                            </button>
                        </div>
                        <div class="col-3 sell-con d-flex justify-content-between align-items-center mx-4">
                            <div>
                                <p style="color: rgba(9, 10, 10, 0.579);">Total Engagements</p>
                                <h2 style="color:#2491EB;">No of users :<?php
                                            $user_rs = Database::search("SELECT * FROM `user`");
                                            $user_num = $user_rs->num_rows;
                                            ?>
                                          <?php echo $user_num; ?> 
                            </div>
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                </svg>
                            </button>
                        </div>



                    </div>
                    <div class="d-flex justify-content-evenly">
                        <div class="col-8 Order" style="font-family: 'Lato', sans-serif;">
                            <div class="d-flex justify-content-start py-5 px-4">
                                <h5 style="color: #2491EB;">Mostly Sold Item</h5>
                            </div>
                            <?php

$freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` 
FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY 
`value_occurence` DESC LIMIT 1");

$freq_num = $freq_rs->num_rows;
if ($freq_num > 0) {
    $freq_data = $freq_rs->fetch_assoc();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
    $product_data = $product_rs->fetch_assoc();

    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $freq_data["product_id"] . "'");
    $image_data = $image_rs->fetch_assoc();

    $qty_rs = Database::search("SELECT SUM(`qty`) AS `qty_total` FROM `invoice` WHERE 
    `product_id`='" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
    $qty_data = $qty_rs->fetch_assoc();

?>
    <div class="col-12 text-center shadow">
        <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-top" style="height: 250px;" />
    </div>
    <div class="col-12 text-center my-3">
        <span class="fs-5 fw-bold"><?php echo $product_data["title"]; ?></span><br />
        <span class="fs-6"><?php echo $qty_data["qty_total"]; ?> items</span><br />
        <span class="fs-6">Rs. <?php echo $qty_data["qty_total"] * $product_data["price"]; ?> .00</span>
    </div>
<?php

} else {
?>
    <div class="col-4 offset-4 text-center shadow">
        <img src="resource/empty.svg" class="img-fluid rounded-top" style="height: 200px; " />
    </div>
    <div class="col-12 text-center my-3">
       
        <span class="fs-6">0 items</span><br />
        <span class="fs-6">Rs.0 .00</span>
    </div>
<?php
}

?>



                        </div>
                        <div class="col-3 Order" style="font-family:'Lato', sans-serif ;">
                            <div class="d-flex justify-content-start py-5 px-4">
                                <h5 style="color: #2491EB;">Recent Customers</h5>
                            </div>


                            <?php

            $query = "SELECT * FROM `user`";
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();
               

           

            if (isset($_SESSION["u"])) {

                $emaill = $_SESSION["u"]["email"];

                $image_rss = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $emaill . "'");

                $image_detailss = $image_rss->fetch_assoc();
              }

            ?>                    
                                
                     <div class="product-container-table" style="height: 40vh;">
                                <div class="row ms-4 ">
                                    <div  class="col-3 mt-2"><img src="<?php echo $image_detailss["path"]; ?>" class="rounded  " style="height:50px" /></div>
                                    <div class="col-9 pt-4"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></div>
                                </div>
                                
                            </div>

                       
                        
                 
              
            <?php

            }

            ?>

         

                            

                        </div>
                    </div>
                    
                </div>

            </div>
        </div>





    </div>
    </div>



    

   
    <script src="script.js"></script>
</body>

</html>