<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>HULLADÉKSZÁLLÍTÁS KFT.</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT?>css/main_style.css">
        <?php if($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="'.$viewData['style'].'">'; ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>
        <link rel="stylesheet" ref="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <header>
            <div id="user"><em><?= $_SESSION['userlastname']." ".$_SESSION['userfirstname'] ?></em></div>
            <h1 class="header">ELSZÁLLÍTJUK HULLADÉKÁT</h1>
        </header>
        <nav>
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </nav>
        <section>
            <?php if($viewData['render']) include($viewData['render']); ?>
        </section>
        <footer>&copy; HULLADÉKSZÁLLÍTÁS KFT. <?= date("Y") ?></footer>
    </body>
</html>
