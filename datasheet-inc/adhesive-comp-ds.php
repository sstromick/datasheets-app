<?php
$adhesive_comp1 = $wpdb->get_results ( 'SELECT DISTINCT(COMPCO) as COMPCO FROM ds_acref order by COMPCO', ARRAY_A); 

if ($wpdb->last_error) {
    error_log("ERROR: An error has occured" . $wpdb->last_error, 0);
}
?>