<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
       <title>Adhesive Only</title>
    <link rel="stylesheet" href="ds-style.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
<?php 
include "datasheet-inc/db.php";

include "datasheet-inc/liner-ds.php";

include "datasheet-inc/adhesive-ds.php";

include "datasheet-inc/facestock-ds.php";

include "datasheet-inc/header.php";
?>

<h1 style="text-align: center;">Product Data Sheets</h1>

<?php include "datasheet-inc/item-search.php" ?>

<h3 style="text-align: center;">Adhesive Only</h3>

<h4 style="text-align: center;">Search by Adhesive Cross Reference:</h4>
<div class="adhesive-comp">
    <div class="adhesive-comp-link">
        <a href="adhesivebycompetitor.php" class="btn">By Competitor</a>
        <a href="adhesivecompare.php" class="btn">By Adhesive</a>
    </div>
</div>    
                  
            <div id="search-form">
                <form action="http://www.technicote.com/datasheet-results.php" method="post">
                    <label for="adhesive">Adhesive:</label>
                    <select id="adhesiveDD" name="adhesive">
                        <option value=""></option>
                        <?php
                        foreach ($adhesive as $value) {
                                echo '<option value="' . $value[id] . '">' . $value[txt] . '</option>';
                        }
                        ?>
                    </select>
                                                                            
                    <input type="submit" name="search" value="Search">
                </form>
            </div>

<?php include "datasheet-inc/nav.php" ?>

<?php include "datasheet-inc/footer.php"; ?>
    </div>
</div>
</body>
</html>
