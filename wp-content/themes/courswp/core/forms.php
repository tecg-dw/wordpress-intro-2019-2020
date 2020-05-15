<?php

function cw_handleForm() {
    $nonce = $_POST['cw_nonce'] ?? null;

    if(!wp_verify_nonce($nonce, 'cw-custom-form')) {
        return false;
    }

    $name = sanitize_text_field($_POST['cw_name']);
    $message = sanitize_textarea_field($_POST['cw_message']);

    if(!strlen($name) || !strlen($message)) {
        return [
            'success' => false,
            'message' => 'Veuillez remplir tous les champs'
        ];
    }

    $content = 'Bonjour, un nouveau message est arrivé :' . PHP_EOL;
    $content .= 'Nom: ' . $name . PHP_EOL;
    $content .= 'Message :' . PHP_EOL;
    $content .= $message;

    if(wp_mail('toon@whitecube.be', 'Un nouveau message', $content)) {
        return [
            'success' => true,
            'message' => 'Merci ! Votre message a été envoyé avec succès.'
        ];
    }

    return [
        'success' => false,
        'message' => 'Woups! Une erreur a eu lieu.'
    ];
}