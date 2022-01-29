<?php if(count($errors) > 0): ?>
<div class="w3-row">
	<div class="w3-quarter"><p></p></div>
	<div class="errorlist w3-panel w3-display-container w3-half w3-pale-red w3-bottombar w3-border-red w3-border" <?php echo $style;?>>
		<span onclick="this.parentElement.style.display='none'"
			class="w3-button w3-large w3-display-topright">&times;</span>
		<?php foreach ($errors as $error): ?>
		<p><?php echo "<strong>Wrong Credential!</strong> $error"; ?></p>
		<?php endforeach ?>
	</div>
	<div class="w3-quarter"><p></p></div>
</div>
<?php endif ?>