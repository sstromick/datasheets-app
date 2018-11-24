<?php
if( isset($_GET['a'])) {
    $edit_action = $_GET['a'];
}

// item search from product page
if (isset($_GET['itemNumber'])) {
    $search_action = "item-search";
    $item_id = $_GET['itemNumber'];
    $query_str .= "&itemNumber=" . $item_id;
}
  
// get request for adhesive
if (isset($_GET['adhesive'])) {
    $search_action = "search";
    $query_str .= "stype=search";

    if (isset($_GET['adhesive'])) {
        $adhesive_id1 = $_GET['adhesive'];
        $query_str .= "&adhesive=" . $adhesive_id1;
    }

}
  
// get request for facestock
if (isset($_GET['facestock'])) {
    $search_action = "search";
    $query_str .= "stype=search";
    $facestock_id1 = $_GET['facestock'];
    $query_str .= "&adhesive=" . $facestock_id1;
}
  
// get request for adhesive1
if (isset($_GET['adhesive'])) {
    $search_action = "search";
    $query_str .= "stype=search";
    $adhesive_id1 = $_GET['adhesive'];
    $query_str .= "&adhesive=" . $adhesive_id1;
}
  
// get request for adhesive2
if (isset($_GET['adhesive2'])) {
    $search_action = "search";
    $query_str .= "stype=search";
    $adhesive_id2 = $_GET['adhesive2'];
    $query_str .= "&adhesive2=" . $adhesive_id2;
}
  
// get request for liner1
if (isset($_GET['liner'])) {
    $search_action = "search";
    $query_str .= "stype=search";
    $liner_id1 = $_GET['liner'];
    $query_str .= "&liner=" . $liner_id1;
}
  
// get request for liner2
if (isset($_GET['liner2'])) {
    $search_action = "search";
    $query_str .= "stype=search";
    $liner_id2 = $_GET['liner2'];
    $query_str .= "&liner2=" . $liner_id2;
}
  
?>