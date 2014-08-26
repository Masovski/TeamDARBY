<?php
if (!isset($themes)) {
?>
<p>There are currently no themes</p>
<?php }else { ?>
<p>Here are themes which are going to be discussed. And after the date you will know opinion of the team.</p>
<table>
<tr><th>Topic of the theme</th><th>Date of discution</th></tr>
<?php foreach ($themes as $theme): ?>
<tr><td><?php echo $theme['themeName']?></td><td><?php echo date("\\a\\t F jS, Y", strtotime($theme['dateOfDiscusion']));?></td></tr>
<?php endforeach;} ?>
</table>
