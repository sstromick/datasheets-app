<?php
$facestock = $wpdb->get_results ( 'SELECT fcompn as id, FSNAME as txt FROM ds_specfac WHERE FSNAME <> "" order by FSNAME', ARRAY_A); 

if ($wpdb->last_error) {
    error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
}


?>