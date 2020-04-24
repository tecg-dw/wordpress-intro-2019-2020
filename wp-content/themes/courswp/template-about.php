<?php
/* 
    Template Name: Template page "À propos"
*/

get_header(); ?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

        <section class="about">
            <div class="about__content"><?= the_content(); ?></div>
        </section>

    <?php endwhile;endif; ?>

<?php get_footer(); ?>