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

if (isset($_POST['search-item'])) {
    $action = $_POST['search-item'];
    if ($action === "Search") { 
        if (isset($_POST['itemNumber'])) {
            $item_id = $_POST['itemNumber'];
            
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
    }
    if ($facestock_id1) {
        $facestock = $wpdb->get_row($wpdb->prepare("SELECT fsname, fdesc, fdesc2, fdesc3, fdesc4, fdesc5, fdesc6, fpapfm, calper, opac, bright, baswt, tensmd, tenscd, tmd, tcd, eimd, eicd, fedhmx, fedtsx, fedifx, feddfx FROM ds_specfac WHERE FCOMPN = %d ORDER BY fsname", $facestock_id1), ARRAY_A);

        if ($wpdb->last_error) {
            echo "ERROR: An error has occured" . $wpdb->last_error;
        }        
    }
    
    if ($adhesive_id1) {
        $adhesive = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id1), ARRAY_A);

        if ($wpdb->last_error) {
            echo "ERROR: An error has occured" . $wpdb->last_error;
        }        
    }
    
    if ($liner_id1) {
        $liner = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id1), ARRAY_A);

        if ($wpdb->last_error) {
            echo "ERROR: An error has occured" . $wpdb->last_error;
        }        
    }

    if ($adhesive_id2) {
        $adhesive2 = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id2), ARRAY_A);

        if ($wpdb->last_error) {
            echo "ERROR: An error has occured" . $wpdb->last_error;
        }        
    }
    
    if ($liner_id2) {
        $liner2 = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id2), ARRAY_A);

        if ($wpdb->last_error) {
            echo "ERROR: An error has occured" . $wpdb->last_error;
        }        
    }

}
    
if (isset($_POST['search-non-press'])) {
    $action = $_POST['search-non-press'];
    if ($action === "Search") { 
        if (isset($_POST['facestock'])) {
            $facestock_id1 = $_POST['facestock'];
            $item_id = $facestock_id1;
            
            $facestock = $wpdb->get_row($wpdb->prepare("SELECT fsname, fdesc, fdesc2, fdesc3, fdesc4, fdesc5, fdesc6, fpapfm, calper, opac, bright, baswt, tensmd, tenscd, tmd, tcd, eimd, eicd, fedhmx, fedtsx, fedifx, feddfx FROM ds_specfac WHERE FCOMPN = %d ORDER BY rfxnam", $facestock_id1), ARRAY_A);

            if ($wpdb->last_error) {
                echo "ERROR: An error has occured" . $wpdb->last_error;
            }
        }
    }
    
}
    
if ($facestock_id1) {
    
}
    
if (isset($_POST['search'])) {
    $action = $_POST['search'];
    
    if ($action === "Search") { 
        if (isset($_POST['facestock'])) {
            $facestock_id1 = $_POST['facestock'];

            $facestock = $wpdb->get_row($wpdb->prepare("SELECT fsname, fdesc, fdesc2, fdesc3, fdesc4, fdesc5, fdesc6, fpapfm, calper, opac, bright, baswt, tensmd, tenscd, tmd, tcd, eimd, eicd, fedhmx, fedtsx, fedifx, feddfx FROM ds_specfac WHERE FCOMPN = %d ORDER BY fsname", $facestock_id1), ARRAY_A);

            if ($wpdb->last_error) {
                echo "ERROR: An error has occured" . $wpdb->last_error;
            }
        }

        if (isset($_POST['adhesive'])) {
            $adhesive_id1 = $_POST['adhesive'];
            $adhesive = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id1), ARRAY_A);

            if ($wpdb->last_error) {
                echo "ERROR: An error has occured" . $wpdb->last_error;
            }

        }
        
        if (isset($_POST['adhesive2'])) {
            $adhesive_id2 = $_POST['adhesive2'];
            $adhesive2 = $wpdb->get_row($wpdb->prepare("SELECT adnam, addef, addef2, addef3, addef4, addef5, addef6, cwlev, adtype, adtynu, shrtrg, matemp, lstemp, hstemp, afrhm, afrtoy, afrif, afrdf, p12418, lttarg, p22418, p32418, p42418, p52418 FROM ds_specadh WHERE ACOMPN = %d ORDER BY adnam", $adhesive_id2), ARRAY_A);

            if ($wpdb->last_error) {
                echo "ERROR: An error has occured" . $wpdb->last_error;
            }

        }
        
        if (isset($_POST['liner'])) {
            $liner_id1 = $_POST['liner'];
            
            $liner = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id1), ARRAY_A);

            if ($wpdb->last_error) {
                echo "ERROR: An error has occured" . $wpdb->last_error;
            }

        }
        
        if (isset($_POST['liner2'])) {
            $liner_id2 = $_POST['liner2'];
            
            $liner2 = $wpdb->get_row($wpdb->prepare("SELECT LLITM2, LINNAM, LDESC, LDESC2, LDESC3, LDESC4, LDESC5, LDESC6, lbwght, ltenmd, ltencd, lcal, ltarmd, ltarcd FROM ds_speclin WHERE LLITM2 = %d ORDER BY LINNAM", $liner_id2), ARRAY_A);

            if ($wpdb->last_error) {
                echo "ERROR: An error has occured" . $wpdb->last_error;
            }

        }
    }
}
    
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

    if ($wpdb->last_error) {
        echo "ERROR: An error has occured" . $wpdb->last_error;
    }
}


?>

<?php
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
        <div class="ds-item-number">Item # <?php echo $item_id ?></div>
    </div>

    <div class="ds-prod-title-sect">
        <div class="ds-prod-title"><?php echo $product_title; ?></div>
        <div>Email This Page</div>
    </div>

<?php if ($facestock_id1) {
   $desc = $facestock['fdesc'] . ' ' . $facestock['fdesc2'] . ' ' .  $facestock['fdesc3'] . ' ' . $facestock['fdesc4'] . ' ' . $facestock['fdesc5'] . ' ' . $facestock['fdesc6'];
?>
    <div class="ds-prod-desc">
        <strong>Facebstock(<?php echo $facestock['fsname']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-data">
        <div class="ds-fs-col1">
            <div class="ds-item">
              <div class="ds-label">Type:</div>
              <div class="ds-item-data"><?php echo $facestock['fpapfm']; ?></div>
            </div>

            <div class="ds-item">
                <div class="ds-label">Caliper:</div>
                <div class="ds-item-data"><?php echo $facestock['calper']; ?> </div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Opacity:</div>
                <div class="ds-item-data"><?php echo (trim($facestock['opac']) == "" ? "N/A" : $facestock['opac']) ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Brightness:</div>
                <div class="ds-item-data"><?php echo (trim($facestock['bright']) == "" ? "N/A" : $facestock['bright']) ?></div>
            </div>
            
        </div>
  
        <div class="ds-fs-col2">
        <div class="ds-item">
            <div class="ds-label">Basis Weight:</div>
            <div class="ds-item-data"><?php echo (trim($facestock['baswt']) == "" ? "N/A" : $facestock['baswt']) ?></div>
        </div>
        <div class="ds-item">
            <div class="ds-label">Tensile:</div>
            <div class="ds-item-data">MD: <?php echo (trim($facestock['tensmd']) == "" ? "N/A" : $facestock['tensmd']) ?></div>
            <div class="ds-item-data">CD: <?php echo (trim($facestock['tenscd']) == "" ? "N/A" : $facestock['tenscd']) ?></div>
        </div>
      
        <div class="ds-item">
            <div class="ds-label">Tear:</div>
            <div class="ds-item-data">MD: <?php echo (trim($facestock['tmd']) == "" ? "N/A" : $facestock['tmd']) ?></div>
            <div class="ds-item-data">CD: <?php echo (trim($facestock['tcd']) == "" ? "N/A" : $facestock['tcd']) ?></div>
        </div>
      
        <div class="ds-item">
            <div class="ds-label">Elongation:</div>
            <div class="ds-item-data">MD: <?php echo (trim($facestock['eimd']) == "" ? "N/A" : $facestock['eimd']) ?></div>
            <div class="ds-item-data">CD: <?php echo (trim($facestock['eicd']) == "" ? "N/A" : $facestock['eicd']) ?></div>
        </div>     

    </div>
       
        <div class="ds-fs-col3">
            <div class="ds-item ds-sub-head">Federal Regulation Approval
        </div>
        
        <div class="ds-item">
            <div class="ds-label">Heavy Metals:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['fedhmx'])); ?> </div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Toy Safety:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['fedtsx'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Indirect Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['fedifx'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Direct Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($facestock['feddfx'])); ?></div>
        </div>
    </div>

</div>

<?php } //end if facestock ?>
  

    
<?php if ($adhesive_id1) {
   $desc = $adhesive['addef'] . ' ' . $adhesive['addef2'] . ' ' .  $adhesive['addef3'] . ' ' . $adhesive['addef4'] . ' ' . $adhesive['addef5'] . ' ' . $adhesive['addef6'];
?>
    <div class="ds-prod-desc">
        <strong>Adhesive(<?php echo $adhesive['adnam']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-data">
        <div class="ds-ad-col1">
            <div class="ds-item">
              <div class="ds-label">Coat Weight:</div>
              <div class="ds-item-data"><?php echo $adhesive['cwlev']; ?></div>
            </div>

            <div class="ds-item">
                <div class="ds-label">Adhesive Type:</div>
                <div class="ds-item-data"><?php echo $adhesive['adtype']; ?> <?php echo $adhesive['adtynu']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Shear:</div>
                <div class="ds-item-data"><?php echo $adhesive['shrtrg']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Minimum Application Temperature:</div>
                <div class="ds-item-data"><?php echo $adhesive['matemp']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Service Temperature:</div>
                <div class="ds-item-data"><?php echo $adhesive['lstemp']; ?> to <?php echo $adhesive['hstemp']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">ACTS Approval:</div>
                <div class="ds-item-data">??</div>
            </div>
        </div>
  
        <div class="ds-ad-col2">
            <div class="ds-item ds-sub-head">Federal Regulation Approval
        </div>
        
        <div class="ds-item">
            <div class="ds-label">Heavy Metals:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive['afrhm'])); ?> </div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Toy Safety:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive['afrtoy'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Indirect Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive['afrif'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Direct Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive['afrdf'])); ?></div>
        </div>
    </div>

        <div class="ds-ad-col3">
            <div class="ds-item ds-sub-head">Typical Adhesion Values
        </div>
        
        <div class="ds-item">
            <div class="ds-sub-head2">Stainless Steel:</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive['p12418']; ?> lb/in</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">Loop Tack:</div>
            <div class="ds-item-data"><?php echo $adhesive['lttarg']; ?> lb/in²</div>
        </div>
      
        <div class="ds-item">
            <div class="ds-sub-head2">Glass:</div>
        </div>
        <div class="ds-item">
          <div class="ds-item-data">180° Peel:</div>
          <div class="ds-item-data"><?php echo $adhesive['p22418']; ?> lb/in</div>
        </div>

        <div class="ds-item">
          <div class="ds-sub-head2">Polyethylene:
          </div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive['p32418']; ?> lb/in</div>
        </div>

        <div class="ds-item">
            <div class="ds-sub-head2">Corrugated:</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive['p42418']; ?> lb/in</div>
        </div>

        <div class="ds-item">
            <div class="ds-sub-head2">Painted Metal:</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive['p52418']; ?> lb/in</div>
        </div>

    </div>
</div>

<?php } //end if ahersive ?>
  
<?php if ($liner_id1) {

   $desc = $liner['LDESC'] . ' ' . $liner['LDESC2'] . ' ' .  $liner['LDESC3'] . ' ' . $liner['LDESC4'] . ' ' . $liner['LDESC5'] . ' ' . $liner['LDESC6'];
?>
    <div class="ds-prod-desc">
        <strong>Release Liner(<?php echo $liner['LINNAM']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-liner-data">
        <div class="ds-liner">
            <div class="ds-liner-item">
                <div class="ds-liner-label">Base Weight:</div>
                <div class="ds-item-data"><?php echo $liner['lbwght'] ?> lb/ream</div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-liner-label">Tensile:</div>
                <div class="ds-item-data">MD: <?php echo ($liner['ltenmd'] == "" ? "N/A" : $liner['ltenmd']) ?> lb/in </div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-item-data">CD: <?php echo (($liner['ltencd'] == "" || $liner['ltencd'] == "0") ? "N/A" : $liner['ltencd']) ?> </div>
            </div>
        </div>
        
        <div class="ds-liner">
            <div class="ds-liner-item">
                <div class="ds-liner-label">Caliper:</div>
                <div class="ds-item-data"><?php echo $liner['lcal'] ?> mil  </div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-liner-label">Tear:</div>
                <div class="ds-item-data">MD: <?php echo ($liner['ltanmd'] == "" ? "N/A" : $liner['ltanmd']) ?></div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-item-data">CD: <?php echo ($liner['ltancd'] == "" ? "N/A" : $liner['ltancd']) ?> </div>
            </div>
        </div>
    </div>

<?php } //end if liner ?>

<?php if ($liner_id2) {

   $desc = $liner2['LDESC'] . ' ' . $liner2['LDESC2'] . ' ' .  $liner2['LDESC3'] . ' ' . $liner2['LDESC4'] . ' ' . $liner2['LDESC5'] . ' ' . $liner2['LDESC6'];
?>
    <div class="ds-prod-desc">
        <strong>Release Liner(<?php echo $liner2['LINNAM']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-liner-data">
        <div class="ds-liner">
            <div class="ds-liner-item">
                <div class="ds-liner-label">Base Weight:</div>
                <div class="ds-item-data"><?php echo $liner2['lbwght'] ?> lb/ream</div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-liner-label">Tensile:</div>
                <div class="ds-item-data">MD: <?php echo ($liner2['ltenmd'] == "" ? "N/A" : $liner2['ltenmd']) ?> lb/in </div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-item-data">CD: <?php echo (($liner2['ltencd'] == "" || $liner2['ltencd'] == "0") ? "N/A" : $liner2['ltencd']) ?> </div>
            </div>
        </div>
        
        <div class="ds-liner">
            <div class="ds-liner-item">
                <div class="ds-liner-label">Caliper:</div>
                <div class="ds-item-data"><?php echo $liner2['lcal'] ?> mil  </div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-liner-label">Tear:</div>
                <div class="ds-item-data">MD: <?php echo ($liner2['ltanmd'] == "" ? "N/A" : $liner2['ltanmd']) ?></div>
            </div>
            <div class="ds-liner-item">
                <div class="ds-item-data">CD: <?php echo ($liner2['ltancd'] == "" ? "N/A" : $liner2['ltancd']) ?> </div>
            </div>
        </div>
    </div>

<?php } //end if liner ?>

<?php if ($adhesive_id2) {
   $desc = $adhesive2['addef'] . ' ' . $adhesive2['addef2'] . ' ' .  $adhesive2['addef3'] . ' ' . $adhesive2['addef4'] . ' ' . $adhesive2['addef5'] . ' ' . $adhesive2['addef6'];
?>
    <div class="ds-prod-desc">
        <strong>Adhesive(<?php echo $adhesive2['adnam']; ?>):</strong> <?php echo $desc; ?>
    </div>

    <div class="ds-data">
        <div class="ds-ad-col1">
            <div class="ds-item">
              <div class="ds-label">Coat Weight:</div>
              <div class="ds-item-data"><?php echo $adhesive2['cwlev']; ?></div>
            </div>

            <div class="ds-item">
                <div class="ds-label">Adhesive Type:</div>
                <div class="ds-item-data"><?php echo $adhesive2['adtype']; ?> <?php echo $adhesive['adtynu']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Shear:</div>
                <div class="ds-item-data"><?php echo $adhesive2['shrtrg']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Minimum Application Temperature:</div>
                <div class="ds-item-data"><?php echo $adhesive2['matemp']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">Service Temperature:</div>
                <div class="ds-item-data"><?php echo $adhesive2['lstemp']; ?> to <?php echo $adhesive['hstemp']; ?></div>
            </div>
            
            <div class="ds-item">
                <div class="ds-label">ACTS Approval:</div>
                <div class="ds-item-data">??</div>
            </div>
        </div>
  
        <div class="ds-ad-col2">
            <div class="ds-item ds-sub-head">Federal Regulation Approval
        </div>
        
        <div class="ds-item">
            <div class="ds-label">Heavy Metals:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive2['afrhm'])); ?> </div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Toy Safety:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive2['afrtoy'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Indirect Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive2['afrif'])); ?></div>
        </div>
    
        <div class="ds-item">
            <div class="ds-label">Direct Food:</div>
            <div class="ds-item-data"><?php echo ucwords(strtolower($adhesive2['afrdf'])); ?></div>
        </div>
    </div>

        <div class="ds-ad-col3">
            <div class="ds-item ds-sub-head">Typical Adhesion Values
        </div>
        
        <div class="ds-item">
            <div class="ds-sub-head2">Stainless Steel:</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive2['p12418']; ?> lb/in</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">Loop Tack:</div>
            <div class="ds-item-data"><?php echo $adhesive2['lttarg']; ?> lb/in²</div>
        </div>
      
        <div class="ds-item">
            <div class="ds-sub-head2">Glass:</div>
        </div>
        <div class="ds-item">
          <div class="ds-item-data">180° Peel:</div>
          <div class="ds-item-data"><?php echo $adhesive2['p22418']; ?> lb/in</div>
        </div>

        <div class="ds-item">
          <div class="ds-sub-head2">Polyethylene:
          </div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive2['p32418']; ?> lb/in</div>
        </div>

        <div class="ds-item">
            <div class="ds-sub-head2">Corrugated:</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive2['p42418']; ?> lb/in</div>
        </div>

        <div class="ds-item">
            <div class="ds-sub-head2">Painted Metal:</div>
        </div>
        <div class="ds-item">
            <div class="ds-item-data">180° Peel:</div>
            <div class="ds-item-data"><?php echo $adhesive2['p52418']; ?> lb/in</div>
        </div>

    </div>
</div>

<?php } //end if ahersive ?>
  
   
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