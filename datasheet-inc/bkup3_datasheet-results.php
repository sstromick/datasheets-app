<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Data Sheet</title>
    <link rel="stylesheet" href="ds-style.css">
</head>
<body>

<?php

$path = $_SERVER['DOCUMENT_ROOT'];

include_once $path . '/wp-config.php';
include_once $path . '/wp-load.php';
include_once $path . '/wp-includes/wp-db.php';

global $wpdb; 

$facestock_id1 = null;
$adhesive_id1 = null;
$liner_id1 = null;
$product_title = null;
$item_id = null;
$search_action = null;
$query_str = "";
$item_not_found = "Product Not Found - Please contact Technical Services at 800-358-4448 for assistance.";
$warning_class = " warning";
    
// email a datasheet functionality
if (isset($_POST['email'])) {
    if (isset($_POST['stype'])) {
        if ($_POST['stype'] == "RF") {
            $search_action = "search-russell-field";

            if (isset($_POST['facestock'])) {
                $facestock_id1 = $_POST['facestock'];
                $item_id = $facestock_id1;
            }
        }
        else {
        $search_action = "search";

        if (isset($_POST['facestock'])) {
            $facestock_id1 = $_POST['facestock'];
        }

        if (isset($_POST['adhesive'])) {
            $adhesive_id1 = $_POST['adhesive'];
        }

        if (isset($_POST['adhesive2'])) {
            $adhesive_id2 = $_POST['adhesive2'];
        }

        if (isset($_POST['liner'])) {
            $liner_id1 = $_POST['liner'];
        }

        if (isset($_POST['liner2'])) {
            $liner_id2 = $_POST['liner2'];
        }
    }
    }
}

// General Search from all datasheet pages (except russellfields)    
if (isset($_POST['search'])) {
    if (isset($_POST['stype'])) {
        $search_action = "search-russell-field";
        $query_str .= "stype=RF";
        
        if (isset($_POST['facestock'])) {
            $facestock_id1 = $_POST['facestock'];
            $item_id = $facestock_id1;
            $query_str .= "&facestock=" . $facestock_id1;
        }        
    }
    else {
        $search_action = "search";
        $query_str .= "stype=search";

        if (isset($_POST['facestock'])) {
            $facestock_id1 = $_POST['facestock'];
            $query_str .= "&facestock=" . $facestock_id1;
        }

        if (isset($_POST['adhesive'])) {
            $adhesive_id1 = $_POST['adhesive'];
            $query_str .= "&adhesive=" . $adhesive_id1;
        }

        if (isset($_POST['adhesive2'])) {
            $adhesive_id2 = $_POST['adhesive2'];
            $query_str .= "&adhesive2=" . $adhesive_id2;
        }

        if (isset($_POST['liner'])) {
            $liner_id1 = $_POST['liner'];
            $query_str .= "&liner=" . $liner_id1;
        }

        if (isset($_POST['liner2'])) {
            $liner_id2 = $_POST['liner2'];
            $query_str .= "&liner2=" . $liner_id2;
        }
    }
}
// end General Search if

// item search from datasheet page
if (isset($_POST['itemNumber'])) {
    $search_action = "item-search";
    $item_id = $_POST['itemNumber'];
    $query_str .= "&itemNumber=" . $item_id;
}
  
if ($item_id) { // search ny item_id
    $itemData = $wpdb->get_row($wpdb->prepare("SELECT MFAC, MADH, ADH3, MLIN, LIN2 FROM dsmaint_inbmpf WHERE FINAL = %d LIMIT 1", $item_id), ARRAY_A);

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }

    if ($itemData['MFAC'] > 0) {
        $facestock_id1 = $itemData['MFAC'];
    }

    if ($itemData['MADH'] > 0) {
        $adhesive_id1 = $itemData['MADH'];
    }

    if ($itemData['MLIN'] > 0) {
        $liner_id1 = $itemData['MLIN'];
    }

    if ($itemData['ADH3'] > 0) {
        $adhesive_id2 = $itemData['ADH3'];
    }

    if ($itemData['LIN2'] > 0) {
        $liner_id2 = $itemData['LIN2'];
    }
} 
 
    
// Get Facestock data
if ($facestock_id1) {
    if ($search_action == "search-russell-field") {            
        $facestock = $wpdb->get_row($wpdb->prepare("SELECT fsname, fdesc, fdesc2, fdesc3, fdesc4, fdesc5, fdesc6, fpapfm, calper, opac, bright, baswt, tensmd, tenscd, tmd, tcd, eimd, eicd, fedhmx, fedtsx, fedifx, feddfx FROM ds_specfac WHERE FCOMPN = %d ORDER BY rfxnam", $facestock_id1), ARRAY_A);
    }
    else {
        $facestock = $wpdb->get_row($wpdb->prepare("SELECT fsname, fdesc, fdesc2, fdesc3, fdesc4, fdesc5, fdesc6, fpapfm, calper, opac, bright, baswt, tensmd, tenscd, tmd, tcd, eimd, eicd, fedhmx, fedtsx, fedifx, feddfx FROM ds_specfac WHERE FCOMPN = %d ORDER BY fsname", $facestock_id1), ARRAY_A);
    }
        
    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }        
}

// Get Adhesive data
if ($adhesive_id1) {
    $adhesive = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id1), ARRAY_A);

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }        
}

// Get Liner data
if ($liner_id1) {
    $liner = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id1), ARRAY_A);

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }        
}

// Get Adhesive2 data
if ($adhesive_id2) {
    $adhesive2 = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id2), ARRAY_A);

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }        
}

// Get Liner2 data    
if ($liner_id2) {
    $liner2 = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id2), ARRAY_A);

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }        
}

    
// Find item based on search conditions
if (!$item_id) {
    $query_conditions = array();
    $facestock_conditions = array();
    $adhesive_conditions = array();
    $liner_conditions = array();
    $adhesive_conditions2 = array();
    $liner_conditions2 = array();
    $values = array();

    if ($facestock_id1) {
        $facestock_conditions[] = array('column' => 'mfac', 'value' =>$facestock_id1);
    }

    if ($adhesive_id1) { 
        $adhesive_conditions[] = array('column' => 'madh', 'value' =>$adhesive_id1);
    }

    if ($liner_id1) { 
        $liner_conditions[] = array('column' => 'mlin', 'value' =>$liner_id1);
    }

    if ($liner_id2) { 
        $liner_conditions2[] = array('column' => 'lin2', 'value' =>$liner_id2);
    }

    if ($adhesive_id2) { 
        $adhesive_conditions2[] = array('column' => 'adh3', 'value' =>$adhesive_id2);
    }

    $query_conditions = array_merge($facestock_conditions, $adhesive_conditions, $liner_conditions, $liner_conditions2, $adhesive_conditions2);

    $i=1;
    foreach($query_conditions as $qc) {
        if ($i==1) {
            $criteria = $qc['column'] . " = %d";
        }
        else {
            $criteria = $criteria . " and " . $qc['column'] . " = %d";
        }

        array_push($values, $qc['value']);
        $i++;
    }

    $item = $wpdb->get_row($wpdb->prepare("SELECT final FROM dsmaint_inbmpf WHERE " . $criteria . " LIMIT 1", $values), ARRAY_A);
    
    $item_id = $item['final'];
    if (is_null($item_id)) {
        $item_id = 0;
    }
    

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }
}

?>

<?php
// Format item name based on materials found
    if ($facestock_id1) {
        $product_title = $facestock['fsname'];
    }
    
    if ($adhesive_id1) {
        if ($facestock_id1) 
            $product_title = $product_title . " / " . $adhesive['adnam'];
        else
            $product_title = $adhesive['adnam'];
    }
    
    if ($liner_id1) {
        if ($facestock_id1 || $adhesive_id1)
            $product_title = $product_title . " / " . $liner['LINNAM'];
        else
            $product_title = $liner['LINNAM'];
    }
    
    if ($liner_id2) {
        if ($facestock_id1 || $adhesive_id1 || $liner_id1)
            $product_title = $product_title . " / " . $liner2['LINNAM'];
        else
            $product_title = $liner2['LINNAM'];
    }
    
    if ($adhesive_id2) {
        if ($facestock_id1 || $adhesive_id1 || $liner_id1 || $liner_id2)
            $product_title = $product_title . " / " . $adhesive2['adnam'];
        else
            $product_title = $adhesive2['adnam'];
    }
    
?>

<div id="datasheet">
    <div class="ds-head">
        <div><img src="http://datasheets.technicote.com/datasheets/Images/logo_technicote.gif" alt=""></div>
        <div class="ds-title">Product Data Sheet</div>
        <div class="ds-item-number <?php echo ($item_id==0 ? $warning_class : "") ?>"><?php echo ($item_id==0 ? $item_not_found : "Item # " . $item_id) ?></div>
    </div>

    <div class="ds-prod-title-sect">
        <div class="ds-prod-title"><?php echo $product_title; ?></div>
        <div><a href="emaildatasheet.php?<?php echo $query_str ?>">Email This Page</a></div>
    </div>

<?php include "datasheet-inc/facestock-area.php" ?>  

<?php include "datasheet-inc/adhesive1-area.php" ?>  

<?php include "datasheet-inc/liner1-area.php" ?>  

<?php include "datasheet-inc/liner2-area.php" ?>  

<?php include "datasheet-inc/adhesive2-area.php" ?>  
   
    <div class="ds-warning">WARRANTY: All data obtained through ASTM standards and are typical and should not be used for specification purposes. Because of the variety of possible uses, the buyer should test the suitability of each intended use. The buyer assumes all risks in connection with such use. Technicote will not be liable for damages in excess of the purchase price of products or for incidental or consequential damages. TECHNICOTE warrants the products to be free from defects in material and workmanship. Should any failure to conform to this warranty appear within one year after the initial date of shipment (unless otherwise stated), TECHNICOTE shall, upon notification thereof and substantiation that the products have been stored and applied in accordance with TECHNICOTE'S standards, correct such defects by suitable repair or replacement without charge at TECHNICOTE's plant or at the location of the products (at TECHNICOTE's election); provided, however, if TECHNICOTE determines that repair or replacement is not commercially practical, TECHNICOTE shall issue a credit in favor of BUYER in an amount not to exceed the purchase price of the products.
    </div>
  
    <div class="ds-footer">
        <div>TECHNICOTE,INC.</div>
        <div>222 MOUND AVENUE</div>
        <div>MIAMISBURG, OH 45342</div>
        <div>800-358-4448</div>
        <div>FAX: 937-859-9096</div>
        <div>www.technicote.com</div>
    </div>
</div>


    
</body>
</html>