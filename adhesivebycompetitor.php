<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Adhesive Cross Reference by Competitor</title>
    <link rel="stylesheet" href="ds-style.css">
</head>
<body>
<div class="wrapper">
    <div class="container">
<?php         
include "datasheet-inc/db.php";

include "datasheet-inc/header.php";

$adhesive_comp1 = $wpdb->get_results ( 'SELECT DISTINCT(COMPCO) as COMPCO FROM ds_acref order by COMPCO', ARRAY_A); 

if ($wpdb->last_error) {
    error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
}

$selected_company = null;
        
if (isset($_GET['adhesive'])) {
    $selected_company = $_GET['adhesive'];

    $itemData = $wpdb->get_results($wpdb->prepare("SELECT COMPAD, COMPCO, ADTYPE, CPERFG, TADH, TADHT, TPERFG, ADCOMN, CWT FROM ds_acref WHERE COMPCO = %s order by COMPCO", $selected_company), ARRAY_A);

    if ($wpdb->last_error) {
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
    }
}
?>

<h1 style="text-align: center;">Product Data Sheets</h1>

<?php include "datasheet-inc/item-search.php" ?>

<h3 style="text-align: center;">Adhesive Cross Reference by Competitor</h3>
<p style="text-align: center;">Please select a competitor name from the drop down list to view the comparision data.  Click on the Technicote Adhesive to view details on it. </p>
                  
            <div id="search-form-adhesiveonly">
                <form>
                    <select id="adhesiveDD" name="adhesive" onchange='this.form.submit()'>
                        <option value=""></option>
                        <?php
                        foreach ($adhesive_comp1 as $value) {
                            $company_name = $value['COMPCO'];
                            if ($company_name == $selected_company) {
                                echo '<option selected="selected" value="' . $value['COMPCO'] . '">' . $value['COMPCO'] . '</option>';
                            }
                            else {
                                echo '<option value="' . $value['COMPCO'] . '">' . $value['COMPCO'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <a href="adhesiveonly.php" class="btn">Back to Adhesives</a>
                                                        
                    <noscript><input type="submit" value="Submit"></noscript>
                </form>
            </div>

<?php if ($itemData) { ?>
<div class="result-table">
    <table class="table" cellspacing="0" rules="all" border="1" id="content_grdCompetitors" style="border-collapse:collapse;">
    <tbody>
        <tr>
            <td align="center" colspan="4" style="color:White;background-color:Red;font-weight:bold;">Competitive Adhesive</td>
            <td align="center" colspan="4" style="color:LightGreen;background-color:Green;font-weight:bold;">Technicote Adhesive</td>
		</tr>
        <tr>
			<th scope="col">COMPAD</th>
            <th scope="col">COMPCO</th>
            <th scope="col">ADTYPE</th>
            <th scope="col">CPERFG</th>
            <th scope="col">TADH</th>
            <th scope="col">TADHT</th>
            <th scope="col">TPERFG</th>
            <th scope="col">ADCOMN</th><th scope="col">CWT</th>
		</tr>
<?php 
        foreach ( $itemData as $item ) {
?>
        <tr>
			<td><?php echo $item['COMPAD']; ?></td>
			<td><?php echo $item['COMPCO']; ?></td>
			<td><?php echo $item['ADTYPE']; ?></td>
			<td><?php echo $item['CPERFG']; ?></td>
			<td><?php echo $item['TADH']; ?></td>
			<td><?php echo $item['TADHT']; ?></td>
			<td><?php echo $item['TPERFG']; ?></td>
			<td><?php echo $item['ADCOMN']; ?></td>
			<td><?php echo $item['CWT']; ?></td>
		</tr>
<?php
        }
?>
	</tbody>
</table>
</div>
<?php } //end if itemdata ?>
<?php include "datasheet-inc/nav.php" ?>

<?php include "datasheet-inc/footer.php"; ?>
    </div>
</div>
</body>
</html>
