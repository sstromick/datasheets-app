<?php
$adhesive = $wpdb->get_results ( 'SELECT acompn as id, ADNAM as txt FROM ds_specadh WHERE ADNAM <> "" order by ADNAM', ARRAY_A); 

if ($wpdb->last_error) {
    error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
}
?>