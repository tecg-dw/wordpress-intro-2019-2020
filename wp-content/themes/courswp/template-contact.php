<?php
/* 
    Template Name: Template page "Contact"
*/

get_header(); ?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

        <section class="contact">
            <div class="contact__content"><?= the_content(); ?></div>
            <div class="contact__info">
                <dl class="contact__data">
                    <dt class="contact__term">Phone</dt>
                    <dt class="contact__definition">+32 ...</dt>
                    <dt class="contact__term">E-mail</dt>
                    <dt class="contact__definition">toon@whitecube.be</dt>
                </dl>
            </div>
        </section>

    <?php endwhile;endif; ?>

<?php get_footer(); ?>