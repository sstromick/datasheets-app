<?php if ($liner_id2) {

   $desc = $liner2['LDESC'] . ' ' . $liner2['LDESC2'] . ' ' .  $liner2['LDESC3'] . ' ' . $liner2['LDESC4'] . ' ' . $liner2['LDESC5'] . ' ' . $liner2['LDESC6'];
?>
   
<table width="100%" cellpadding="0" cellspacing="0">
    <tbody>
        <tr>
            <td><span style="font-size:10pt;font-weight:bold;">Release Liner(<?php echo $liner2['LINNAM']; ?>):&nbsp;</span>"<?php echo $desc; ?>"</td>
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
			                <td><?php echo $liner2['lbwght'] ?> lb/ream&nbsp;</td>
			                <td style="font-size:9pt;font-weight:bold;">Tensile:</td><td>MD:&nbsp;<?php echo ($liner2['ltenmd'] == "" ? "N/A" : $liner2['ltenmd']) ?> lb/in&nbsp;</td><td>CD:&nbsp;<?php echo ($liner2['ltencd'] == "" ? "N/A" : $liner2['ltencd']) ?>&nbsp;</td>
			             </tr>
			             <tr>
			                 <td style="font-size:9pt;font-weight:bold;">Caliper:</td>
			                 <td><?php echo $liner2['lcal'] ?> mil&nbsp;</td>
			                 <td style="font-size:9pt;font-weight:bold;">Tear:</td><td>MD:&nbsp;<?php echo ($liner2['ltanmd'] == "" ? "N/A" : $liner2['ltanmd']) ?>&nbsp;</td><td>CD:&nbsp;<?php echo ($liner2['ltancd'] == "" ? "N/A" : $liner2['ltancd']) ?>&nbsp;</td>
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

