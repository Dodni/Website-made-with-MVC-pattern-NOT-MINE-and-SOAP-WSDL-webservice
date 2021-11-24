<h2>Kérem válasszon egy napot és egy devizát.</h2>
<form action="" method="POST">
    <div class="row">
        <div class="column">
            <label for="deviza">Válasszon egy devizát:</label><br>
            <label for="nap">Válasszon egy napot:</label>
        </div>
        <div class="column">
            <select id="deviza" name="deviza">
                <?php foreach($viewData['devizak'] as $deviza):?>
                <option value="<?= $deviza?>"><?= $deviza ?></option>
                <?php endforeach; ?>
            </select><br>
            <input type="date" id="nap" name="nap" value="<?= $viewData['LastDate'] ?>" min="<?php echo $viewData['FirstDate'] ?>" max="<?php echo $viewData['LastDate'] ?>"><br>
            <input type="submit" value="Keresés">
        </div>
    </div>
</form>
<?php if(isset($_POST['nap']) && isset($_POST['deviza'])) : ?>
    <p>A választott árfolyam: <?php echo ' '.$viewData['devizak2'][0] ?></p>
<?php endif; ?>