<?php

add_action('init', 'cw_start_session', 1);
add_action('admin_post_cw_custom_form_treatment', 'cw_handleForm');
add_action('admin_post_nopriv_cw_custom_form_treatment', 'cw_handleForm');

function cw_start_session() {
    if(session_id()) return;
    
    session_start();
}

function cw_handleForm() {
    $nonce = $_POST['cw_nonce'] ?? null;
    $action = $_POST['action'] ?? null;

    if(!wp_verify_nonce($nonce, 'cw-custom-form')) {
        return false;
    }

    $name = sanitize_text_field($_POST['cw_name']);
    $message = sanitize_textarea_field($_POST['cw_message']);

    if(!strlen($name) || !strlen($message)) {
        return cw_formRedirectFeedback($action, [
            'success' => false,
            'message' => 'Veuillez remplir tous les champs'
        ]);
    }

    $content = 'Bonjour, un nouveau message est arrivé :' . PHP_EOL;
    $content .= 'Nom: ' . $name . PHP_EOL;
    $content .= 'Message :' . PHP_EOL;
    $content .= $message;

    if(wp_mail('toon@whitecube.be', 'Un nouveau message', $content)) {
        return cw_formRedirectFeedback($action, [
            'success' => true,
            'message' => 'Merci ! Votre message a été envoyé avec succès.'
        ]);
    }

    cw_formRedirectFeedback($action, [
        'success' => false,
        'message' => 'Woups! Une erreur a eu lieu.'
    ]);
}

function cw_formRedirectFeedback($action, $feedback) {
    // Récupérer l'URL de la page qui a servi à envoyer le formulaire
    $url = wp_get_referer();

    // Stocker le message en session
    $_SESSION['feedback_' . $action] = $feedback;

    // effectuer une redirection vers l'URL précédente
    wp_safe_redirect($url);
    exit;
}

function cw_formFeedback($action) {
    if(!isset($_SESSION['feedback_' . $action])) {
        // Il n'y a pas de feedback à afficher
        return false;
    }

    // Récupérer le feedback
    $feedback = $_SESSION['feedback_' . $action];

    // Supprimer le feedback de la session pour qu'il ne soit plus affiché lors de
    // la prochaine requête.
    unset($_SESSION['feedback_' . $action]);

    // Envoyer le message de feedback récupéré à la vue
    return $feedback;
}

