<html>
    <!-- head -->
    <?php require_once RELATIVE_PATH_PARTIALS . "head.php" ?>
    <body>
        <!-- header -->
        <?php //require_once RELATIVE_PATH_PARTIALS . "header.php" ?>

        <!-- main -->
        <?= $this->section('content') ?>

        <!-- footer -->
        <?php require_once RELATIVE_PATH_PARTIALS . "footer.php" ?>

        <!-- scripts -->
        <?php require_once RELATIVE_PATH_PARTIALS . "scripts.php" ?>
    </body>
</html>