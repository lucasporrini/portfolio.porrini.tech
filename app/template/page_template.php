<!DOCTYPE html>
<html lang="en" dir="ltr">
    <!-- head -->
    <?php require_once RELATIVE_PATH_PARTIALS . "head.php" ?>
    <body>
        <?php require_once RELATIVE_PATH_PARTIALS . "loader/loader.php" ?>
        <!-- header -->
        <?php require_once RELATIVE_PATH_PARTIALS . "header.php" ?>

        <!-- main -->
        <?= $this->section('content') ?>

        <!-- chatbot -->
        <?php require_once RELATIVE_PATH_PARTIALS . "chatbot/chatbot.php" ?>

        <!-- footer -->
        <?php require_once RELATIVE_PATH_PARTIALS . "footer.php" ?>

        <!-- scripts -->
        <?php require_once RELATIVE_PATH_PARTIALS . "scripts.php" ?>
    </body>
</html>