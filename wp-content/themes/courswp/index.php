<?php get_header(); ?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

    <h1><?php the_title(); ?></h1>

    <div><?php the_content(); ?></div>

    <section>
        <h2>Mes derniers articles</h2>
        
        <?php 

        $loop = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => -1
        ]);

        if($loop->have_posts()): while($loop->have_posts()): $loop->the_post(); ?>

        <article class="card">
            <h3 class="card__title"><?php the_title(); ?></h3>
            <div class="card__excerpt"><?php the_excerpt(); ?></div>
            <footer class="card__cta">
                <a href="<?php the_permalink(); ?>" class="card__link">Voir l'article <span class="sro">"<?php the_title(); ?>"</span> en entier</a>
            </footer>
        </article>

        <?php endwhile;endif; ?>

    </section>

    <section>
        <h2>Mes derniers voyages</h2>

        <?php 

        $loop = new WP_Query([
            'post_type' => 'trip',
            'posts_per_page' => -1
        ]);

        if($loop->have_posts()): while($loop->have_posts()): $loop->the_post(); ?>
            
            <article class="trip">
                <h3 class="trip__title"><?php the_title(); ?></h3>
                <dl>
                    <dt>Départ:</dt>
                    <dd><?php the_field('start'); ?></dd>
                    <dt>Retour:</dt>
                    <dd><?php the_field('end'); ?></dd>
                </dl>
                <a href="<?php the_permalink(); ?>" class="trip__link">Voir mon voyage "<?php the_title(); ?>"</a>
            </article>

        <?php endwhile;endif; ?>

    </section>

    <?php endwhile;endif; ?>

<?php get_footer(); ?>