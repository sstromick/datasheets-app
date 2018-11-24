<?php
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

?>