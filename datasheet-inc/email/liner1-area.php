<?php if ($liner_id1) {

   $desc = $liner['LDESC'] . ' ' . $liner['LDESC2'] . ' ' .  $liner['LDESC3'] . ' ' . $liner['LDESC4'] . ' ' . $liner['LDESC5'] . ' ' . $liner['LDESC6'];
?>
   
<table width="100%" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td><span style="font-size:10pt;font-weight:bold;">Release Liner(<?php echo $liner['LINNAM']; ?>):&nbsp;</span>"<?php echo $desc; ?>"</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
			    <table cellpadding="5">
			        <tbody>
			            <tr>
			                <td style="font-size:9pt;font-weight:bold;">Basis Weight:</td>
			                <td><?php echo $liner['lbwght'] ?> lb/ream&nbsp;</td>
			                <td style="font-size:9pt;font-weight:bold;">Tensile:</td><td>MD:&nbsp;<?php echo ($liner['ltenmd'] == "" ? "N/A" : $liner['ltenmd']) ?> lb/in&nbsp;</td><td>CD:&nbsp;<?php echo ($liner['ltencd'] == "" ? "N/A" : $liner['ltencd']) ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Caliper:</td>
			                 <td><?php echo $liner['lcal'] ?> mil&nbsp;</td>
			                 <td style="font-size:9pt;font-weight:bold;">Tear:</td><td>MD:&nbsp;<?php echo ($liner['ltanmd'] == "" ? "N/A" : $liner['ltanmd']) ?>&nbsp;</td><td>CD:&nbsp;<?php echo ($liner['ltancd'] == "" ? "N/A" : $liner['ltancd']) ?>&nbsp;</td>
			             </tr>
			         </tbody>
			     </table>
			 </td>
        </tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td style="border-bottom: solid 1px Gray;">&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<?php } //end if liner ?>

