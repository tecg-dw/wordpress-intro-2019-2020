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

        <section class="form">
            <h2 class="form__title">Mon formulaire de contact</h2>
            <?php if($feedback = cw_formFeedback('cw_custom_form_treatment')): ?>
            <p class="form__feedback form__feedback--<?= $feedback['success'] ? 'success' : 'error'; ?>"><?= $feedback['message']; ?></p>
            <?php endif; ?>
            <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form__element">
                <fieldset class="form__fields">
                    <div class="form__field">
                        <label for="cw_name" class="form__label">Votre nom</label>
                        <input type="text" name="cw_name" id="cw_name" class="form__input" />
                    </div>
                    <div class="form__field">
                        <label for="cw_message" class="form__label">Votre message</label>
                        <textarea name="cw_message" id="cw_message" cols="30" rows="10" class="form__input"></textarea>
                    </div>
                </fieldset>
                <div class="form__end">
                    <input type="hidden" name="cw_nonce" value="<?= wp_create_nonce('cw-custom-form'); ?>">
                    <input type="hidden" name="action" value="cw_custom_form_treatment">
                    <button class="form__btn" type="submit">Envoyer</button>
                </div>
            </form>
        </section>

    <?php endwhile;endif; ?>

<?php get_footer(); ?>