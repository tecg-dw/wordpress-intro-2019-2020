<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= cw_get_title(); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= cw_get_theme_asset('assets/css/style.css'); ?>" />
    <script src="<?= cw_get_theme_asset('assets/js/script.js'); ?>"></script>
</head>
<body>
    <header class="header">
        <h1><?= cw_get_title('-', false); ?></h1>
    </header>
    <main class="page">