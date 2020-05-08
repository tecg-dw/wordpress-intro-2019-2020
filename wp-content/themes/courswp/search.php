<?php get_header(); ?>

    <section>
        <h2><?= __('Résultats de recherche', 'cw'); ?></h2>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>

        <article class="card">
            <h3 class="card__title"><?php the_title(); ?></h3>
            <div class="card__excerpt"><?php the_excerpt(); ?></div>
            <footer class="card__cta">
                <a href="<?php the_permalink(); ?>" class="card__link">Voir l'article <span class="sro">"<?php the_title(); ?>"</span> en entier</a>
            </footer>
        </article>

        <?php endwhile;endif; ?>

        <div class="pagination">
            <?= paginate_links(); ?>
        </div>

    </section>

<?php get_footer(); ?>