<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Single Ply Pressure Sensitive Constructions</title>
    <link rel="stylesheet" href="ds-style.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
<?php 
include "datasheet-inc/db.php";

include "datasheet-inc/facestock-ds.php";

include "datasheet-inc/adhesive-ds.php";

include "datasheet-inc/liner-ds.php";

include "datasheet-inc/header.php";
?>

<h1 style="text-align: center;">Product Data Sheets</h1>

<?php include "datasheet-inc/item-search.php" ?>

<h3 style="text-align: center;">Single Ply Pressure Sensitive Constructions</h3>

            <div id="search-form">
                <form action="http://www.technicote.com/datasheet-results.php" method="post">
                    <label for="facestock">Facestock:</label>
                    <select id="facestockDD" name="facestock">
                        <option value=""></option>
                        <?php
                        foreach ($facestock as $value) {
                                echo '<option value="' . $value[id] . '">' . $value[txt] . '</option>';
                        }
                        ?>
                    </select>
                    
                    <label for="adhesive">Adhesive:</label>
                    <select id="adhesiveDD" name="adhesive">
                        <option value=""></option>
                        <?php
                        foreach ($adhesive as $value) {
                                echo '<option value="' . $value[id] . '">' . $value[txt] . '</option>';
                        }
                        ?>
                    </select>
                    
                    <label for="liner">Release Liner:</label>
                    <select id="linerDD" name="liner">
                        <option value=""></option>
                        <?php
                        foreach ($liner as $value) {
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
