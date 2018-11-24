<?php
// Turn on output buffering for email creation
ob_start();

?>
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
$item_not_found = "Not a Current Stock Product - Please contact Technical Services at 800-358-4448 for assistance.";
$warning_class = " warning";
    
// email a datasheet functionality
if (isset($_POST['email'])) {
    if (isset($_POST['stype'])) {
        if ($_POST['stype'] == "RF") {
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
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
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
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
    }
}

// Get Adhesive data
if ($adhesive_id1) {
    $adhesive = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id1), ARRAY_A);

    if ($wpdb->last_error) {
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
    }
}

// Get Liner data
if ($liner_id1) {
    $liner = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id1), ARRAY_A);

    if ($wpdb->last_error) {
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
    }
}

// Get Adhesive2 data
if ($adhesive_id2) {
    $adhesive2 = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id2), ARRAY_A);

    if ($wpdb->last_error) {
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
    }
}

// Get Liner2 data    
if ($liner_id2) {
    $liner2 = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id2), ARRAY_A);

    if ($wpdb->last_error) {
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
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
        error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
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
<table style="width:750px;" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td style="vertical-align:bottom;"><img src="http://datasheets.technicote.com/datasheets/Images/logo_technicote.gif" alt="">&nbsp;<span style="font-weight:bold; ">Product Data Sheet</span> <br><br>
            </td>
            <td style="text-align:right;font-weight:bold; ;" class="<?php echo ($item_id==0 ? $warning_class : "") ?>"><?php echo ($item_id==0 ? $item_not_found : "Item # " . $item_id) ?></td>
        </tr>
        <tr>
            <td style="font-weight:bold;  border-bottom: solid 1px Gray; width:530px;"><?php echo $product_title; ?>&nbsp;</td>
            <td style="text-align:right;  border-bottom: solid 1px Gray;"><a href="http://<?php echo $_SERVER['SERVER_NAME'] ?>/datasheet-results.php?<?php echo $query_str . "&print=true" ?>">Print</a></td>
        </tr>

   
        <tr>
            <td colspan="2"><?php include "datasheet-inc/email/facestock-area.php" ?></td>
        </tr>

        <tr>
            <td colspan="2"><?php include "datasheet-inc/email/adhesive1-area.php" ?></td>
        </tr>

        <tr>
            <td colspan="2"><?php include "datasheet-inc/email/liner1-area.php" ?></td>
        </tr>
  
        <tr>
            <td colspan="2"><?php include "datasheet-inc/email/liner2-area.php" ?></td>
        </tr>

        <tr>
            <td colspan="2"><?php include "datasheet-inc/email/adhesive2-area.php" ?></td>
        </tr>
   
        <tr>
            <td colspan="2" style="font-size: 5pt;text-align:justify;">
                    <span style="font-weight:bold;">WARRANTY:&nbsp;</span>All data obtained through ASTM standards and are typical and should not be used for specification purposes. Because of the variety of possible uses, 
                    the buyer should test the suitability of each intended use. The buyer assumes all risks in connection with such use. Technicote will not be liable for damages in excess of the purchase price of products
                    or for incidental or consequential damages. <span style="font-weight:bold;">TECHNICOTE&nbsp;</span>warrants the products to be free from defects in material and workmanship. Should any failure to
                    conform to this warranty appear within one year after the initial date of shipment (unless otherwise stated), TECHNICOTE shall, upon notification thereof and substantiation that the products have been stored and applied in
                    accordance with TECHNICOTE'S standards, correct such defects by suitable repair or replacement without charge at TECHNICOTE's plant or at the location of the products (at TECHNICOTE's election); provided,
                    however, if TECHNICOTE determines that repair or replacement is not commercially practical, TECHNICOTE shall issue a credit in favor of BUYER in an amount not to exceed the purchase price of the products.
                </td>
        </tr>
        <tr>
            <td colspan="2" style="border-bottom:solid 1px Gray;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="font-size: 6pt;text-align:center;width:100%;" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                            <td>TECHNICOTE,INC.</td>
                            <td>222 MOUND AVENUE</td>
                            <td>MIAMISBURG, OH 45342</td>
                            <td>800-358-4448</td>
                            <td>FAX: 937-859-9096</td>
                            <td>www.technicote.com</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
    
</body>
</html>


<?php
//  Return the contents of the output buffer
$htmlStr = ob_get_contents();
// Clean (erase) the output buffer and turn off output buffering
ob_end_clean(); 

$to = (string) $_POST['email-addr'];
$subject = "Technicote Product Specification Sheet";
$message = $htmlStr;
$header = "From:marketingdept@technicote.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail ($to,$subject,$message,$header);

 if( $retval == true ) {
     header("Location: emaildatasheet.php?sent=true"); 
     exit();
 }
else {
     header("Location: emaildatasheet.php?sent=false"); 
     exit();
 }
?>
