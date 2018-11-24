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

