<?php get_header(); ?>

    <section>
        <h2><?= __('Mes derniers articles', 'cw'); ?></h2>

        <?php if(have_posts()): while(have_posts()): the_post(); ?>

        <article class="card">
            <h3 class="card__title"><?php the_title(); ?></h3>
            <div class="card__excerpt"><?php the_excerpt(); ?></div>
            <figure class="card__fig">
                <?php the_post_thumbnail('post-cover', ['class' => 'card__img']); ?>
            </figure>
            <footer class="card__cta">
                <a href="<?php the_permalink(); ?>" class="card__link">Voir l'article <span class="sro">"<?php the_title(); ?>"</span> en entier</a>
            </footer>
        </article>

        <?php endwhile;endif; ?>

        <div class="pagination">
            <?= paginate_links(); ?>
        </div>

    </section>

    <section>
        <h2><?= __('Mes derniers voyages', 'cw'); ?></h2>

        <?php 

        $loop = new WP_Query([
            'post_type' => 'trip',
            'posts_per_page' => 1,
            'paged' => get_query_var('trips-pagination') ?: 1,
        ]);

        if($loop->have_posts()): while($loop->have_posts()): $loop->the_post(); ?>
            
            <article class="trip">
                <h3 class="trip__title"><?php the_title(); ?></h3>
                <dl>
                    <dt><?= __('Départ:', 'cw'); ?></dt>
                    <dd><?php the_field('start'); ?></dd>
                    <dt><?= __('Retour:', 'cw'); ?></dt>
                    <dd><?php the_field('end'); ?></dd>
                </dl>
                <a href="<?php the_permalink(); ?>" class="trip__link">Voir mon voyage "<?php the_title(); ?>"</a>
            </article>

        <?php endwhile;endif; ?>

        <div class="pagination">
            <?= paginate_links([
                'format' => '?trips-pagination=%#%',
                'current' => get_query_var('trips-pagination') ?: 1,
                'total' =>  $loop->max_num_pages
            ]); ?>
        </div>

    </section>

<?php get_footer(); ?>