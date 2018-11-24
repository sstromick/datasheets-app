<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Product Data Sheets</title>
    <link rel="stylesheet" href="ds-style.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
<?php 
include "datasheet-inc/db.php";

include "datasheet-inc/header.php";
?>

<h1 style="text-align: center;">Product Data Sheets</h1>

<?php include "datasheet-inc/item-search.php" ?>

<p style="text-align: center;">While navigating through this user-friendly site, visitors can access a wide range of technical information on nearly all Technicote product components and finished goods quickly and easily.</p>
<p style="text-align: center;">Your complete access to product specification sheets is only a click away!</p>

<center>
    <div style="background:#00ab6b;color:#FFFFFF;border-radius: 5px;padding:10px;max-width:450px;">To search for data sheets by product description, select the applicable label construction below.</div>
</center>

<?php include "datasheet-inc/nav.php" ?>

<?php include "datasheet-inc/footer.php"; ?>
    </div>
</div>
</body>
</html>
