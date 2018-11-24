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
