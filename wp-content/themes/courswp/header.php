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

        <nav class="nav">
            <h2 class="nav__title">Navigation principale</h2>
            <div class="nav__container">
                <?php foreach(cw_get_menu('main', 'nav__link') as $i => $link): ?>
                <a
                    href="<?= $link->url; ?>"
                    <?php if($link->target):?>target="<?= $link->target; ?>"<?php endif; ?>
                    <?php if($link->current):?>aria-current="page"<?php endif; ?>
                    class="<?= implode(' ', $link->classes);?>"><?= $link->label; ?></a>
                <?php endforeach; ?>
            </div>

            <aside class="nav__socials">
                <h3 class="nav__subtitle">Je suis sur les réseaux sociaux</h3>
                <div class="nav__medias">
                    <?php foreach(cw_get_menu('social', 'nav__social') as $i => $link): ?>
                        <a
                            href="<?= $link->url; ?>"
                            <?php if($link->target):?>target="<?= $link->target; ?>"<?php endif; ?>
                            class="<?= implode(' ', $link->classes);?>"
                        ><?= $link->label; ?></a>
                    <?php endforeach; ?>
                </div>
            </aside>

            <div class="nav__lang">
                <ul>
                <?php foreach(pll_the_languages(['raw' => true, 'echo' => false]) as $lang): ?>
                    <li><a href="<?= $lang['url']; ?>"><?= $lang['name']; ?></a></li>
                <?php endforeach; ?>
                </ul>
            </div>
        </nav>

        <?php get_search_form(); ?>
    </header>
    <main class="page">