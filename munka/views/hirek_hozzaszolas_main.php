<h2><?= $viewData['hir']['cim'] ?></h2>	
<p class="detail"><?= $viewData['hir']['bejelentkezes'].' - '.$viewData['hir']['ido'] ?></p>
<p><?= $viewData['hir']['tartalom']?></p>
<hr>
<form action="<?= SITE_ROOT.'ujhozzaszolas'?>" method="POST">
	<input type="hidden" id="hirid" name="hirid" value="<?= $viewData['hir']['id'] ?>">
		<div class="hozzaszolas">
            <?php foreach($viewData['hozzaszolasok'] as $hozzaszolas):?>
                <label class="detail">Felhasználó: <?= $hozzaszolas['bejelentkezes'] ?> | Létrehozva: <?= $hozzaszolas['ido'] ?></label><br>
                <label><?= $hozzaszolas['tartalom'] ?></label><br><br>
            <?php endforeach; ?>
        </div>
    <div class="inputok">
		<input type="text" name="tartalom" id="tartalom" required="required"">
		<input type="submit" value="Hozzászólás">
	</div>
</form>