<?php 
$stype = null;

$facestock_id1 = "";
$adhesive_id1  = "";
$liner_id1     = "";
$adhesive_id2  = "";
$liner_id2     = "";
$item_id       = "";
$msg           = "";

if (isset($_GET['sent'])) {
    if ($_GET['sent'] == true)
        $msg = "Product Datasheet sent successfully...";
    else
        $msg = "Product Datasheet could not be sent...";
}
else
if (isset($_GET['stype'])) {
    if ($_GET['stype'] == "RF") {
        $stype = $_GET['stype'];
        if (isset($_GET['facestock'])) {
            $facestock_id1 = $_GET['facestock'];
            $item_id = $facestock_id1;
        }
    }
    else {
        $stype = "search";
        if (isset($_GET['facestock'])) {
            $facestock_id1 = $_GET['facestock'];
        }
        if (isset($_GET['adhesive'])) 
            $adhesive_id1 = $_GET['adhesive'];
            
        if (isset($_GET['liner'])) 
            $liner_id1 = $_GET['liner'];
            
        if (isset($_GET['adhesive2'])) 
            $adhesive_id2 = $_GET['adhesive2'];
            
        if (isset($_GET['liner2'])) 
            $liner_id2 = $_GET['liner2'];
            
        if (isset($_GET['itemNumber'])) 
            $item_id = $_GET['itemNumber'];
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Email Data Sheet</title>
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

<h3 style="text-align: center;">Email Data Sheet</h3>
<p style="text-align: center;">Enter the email addresses below delimited by semi-colons:</p>  
<p style="text-align: center;color:red;"><strong><?php echo $msg ?></strong></p>                
<div id="email-form">
    <form action="datasheet-results-email.php" method="post">
        <input type="text" name="email-addr" placeholder="email">        
        <input type="hidden" name="stype" value="<?php echo $stype ?>">
        <input type="hidden" name="itemNumber" value="<?php echo $item_id ?>" >        
        <input type="hidden" name="facestock" value="<?php echo $facestock_id1 ?>" >        
        <input type="hidden" name="adhesive" value="<?php echo $adhesive_id1 ?>" >        
        <input type="hidden" name="liner" value="<?php echo $liner_id1 ?>" >        
        <input type="hidden" name="adhesive2" value="<?php echo $adhesive_id2 ?>" >        
        <input type="hidden" name="liner2" value="<?php echo $liner_id2 ?>" >        
        <input type="submit" name="email" value="email">
    </form>
</div>

<?php include "datasheet-inc/nav.php" ?>

<?php include "datasheet-inc/footer.php"; ?>
    </div>
</div>
</body>
</html>
