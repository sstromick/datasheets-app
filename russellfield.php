<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Non-Pressure Sensitive Products</title>
    <link rel="stylesheet" href="ds-style.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
<?php 
include "datasheet-inc/db.php";

include "datasheet-inc/facestock-rf-ds.php";

include "datasheet-inc/header.php";
?>

<h1 style="text-align: center;">Product Data Sheets</h1>

<?php include "datasheet-inc/item-search.php" ?>

<h3 style="text-align: center;">Non-Pressure Sensitive Products</h3>

            <div id="search-form">
                <form action="http://www.technicote.com/datasheet-results.php" method="post">
                    <label for="facestock">Material:</label>
                    <input type="hidden" name="stype" value="RF">
                    <select id="facestockDD" name="facestock">
                        <option value=""></option>
                        <?php
                        foreach ($facestock as $value) {
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
