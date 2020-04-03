<?php get_header(); ?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

        <article class="post">
            <h2 class="post__title"><?php the_title(); ?></h2>
            <div class="post__excerpt"><?php the_excerpt(); ?></div>
            <footer class="post__cta">
                <a href="<?php the_permalink(); ?>" class="post__link">Voir l'article <span class="sro">"<?php the_title(); ?>"</span> en entier</a>
            </footer>
        </article>

    <?php endwhile;endif; ?>

<?php get_footer(); ?>