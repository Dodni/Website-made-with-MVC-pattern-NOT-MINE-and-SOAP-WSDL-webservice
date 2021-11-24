<?php foreach ($viewData['hirek'] as $hir) { ?>
    <article>
        <h1><a class="hir" href="<?php echo SITE_ROOT ?>hirek/<?php echo $hir['id']; ?>"><?php echo $hir['cim']; ?></a></h1><br>
        <p class="detail"><?php echo $hir['bejelentkezes']; ?> - <?php echo $hir['ido']; ?></p>

        <p><?php echo $hir['tartalom']; ?></p>
    </article>
<?php } ?>