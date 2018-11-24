<?php
$liner = $wpdb->get_results ( 'SELECT LLITM2 as id, LINNAM as txt FROM ds_speclin WHERE LINNAM <> "" order by LINNAM', ARRAY_A); 

if ($wpdb->last_error) {
    error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
}
?>