<?php

use CMW\Manager\Theme\Editor\Entities\EditorMenu;
use CMW\Manager\Theme\Editor\Entities\EditorType;
use CMW\Manager\Theme\Editor\Entities\EditorValue;

return [
    new EditorMenu(
        title: 'Globaux',
        key: 'global',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Afficher le titre',
                themeKey: 'header_active_title',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher le logo',
                themeKey: 'header_active_logo',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Logo',
                themeKey: 'header_img_logo',
                defaultValue: 'Config/Default/Img/logo.webp',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Autoriser les enregistrement',
                themeKey: 'header_allow_register_button',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Autoriser les connexions',
                themeKey: 'header_allow_login_button',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Message d\'enregistrement interdit',
                themeKey: 'global_no_register_message',
                defaultValue: 'Nous somme désolé mais les inscriptions sont pour le moment désactiver.',
                type: EditorType::TEXT
            ),
        ]
    ),
    /* - - - - - - - -
       - - HOME - -
    - - - - - - - - - */
    new EditorMenu(
        title: 'Accueil - Hero',
        key: 'home-hero',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Titre',
                themeKey: 'hero_title',
                defaultValue: 'Bienvenue !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Description',
                themeKey: 'hero_description',
                defaultValue: 'Une super description pour mon serveur !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Bouton',
                themeKey: 'hero_button_text',
                defaultValue: 'Texte du bouton',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'URL du bouton',
                themeKey: 'hero_button_link',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Image de fond',
                themeKey: 'hero_img_bg',
                defaultValue: 'Config/Default/Img/bg.webp',
                type: EditorType::IMAGE
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - Fonctionnalités',
        key: 'home-feature',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Activer la section',
                themeKey: 'feature_section_active',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre',
                themeKey: 'feature_section_title',
                defaultValue: 'Fonctionnalités',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Image feature 1',
                themeKey: 'feature_img_1',
                defaultValue: 'Config/Default/Img/feature1.webp',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Titre feature 1',
                themeKey: 'feature_title_1',
                defaultValue: 'Communauté',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue feature 1',
                themeKey: 'feature_description_1',
                defaultValue: 'Amet minim mollit non deserunt ullamco est sit aliqua',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Image feature 2',
                themeKey: 'feature_img_2',
                defaultValue: 'Config/Default/Img/feature2.webp',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Titre feature 2',
                themeKey: 'feature_title_2',
                defaultValue: 'Savoir faire',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue feature 2',
                themeKey: 'feature_description_2',
                defaultValue: 'Amet minim mollit non deserunt ullamco est sit aliqua',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Image feature 3',
                themeKey: 'feature_img_3',
                defaultValue: 'Config/Default/Img/feature3.webp',
                type: EditorType::IMAGE
            ),
            new EditorValue(
                title: 'Titre feature 3',
                themeKey: 'feature_title_3',
                defaultValue: 'Réactif',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue feature 3',
                themeKey: 'feature_description_3',
                defaultValue: 'Amet minim mollit non deserunt ullamco est sit aliqua',
                type: EditorType::TEXT,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - News',
        key: 'home-news',
        scope: null,
        requiredPackage: 'news',
        values: [
            new EditorValue(
                title: 'Activer la section',
                themeKey: 'news_section_active',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre',
                themeKey: 'news_section_title',
                defaultValue: 'Nouveautés',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'News à afficher',
                themeKey: 'news_number_display',
                defaultValue: '4',
                type: EditorType::NUMBER,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - Newsletter',
        key: 'home-newsletter',
        scope: null,
        requiredPackage: 'newsletter',
        values: [
            new EditorValue(
                title: 'Activer la section',
                themeKey: 'newsletter_section_active',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre',
                themeKey: 'newsletter_section_title',
                defaultValue: 'NewsLetter',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Description',
                themeKey: 'newsletter_section_description',
                defaultValue: 'Abonnez-vous à notre newsletter pour ne louper aucune news !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Bouton',
                themeKey: 'newsletter_section_button',
                defaultValue: 'S\'abonner !',
                type: EditorType::TEXT,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - Contact',
        key: 'home-contact',
        scope: null,
        requiredPackage: 'contact',
        values: [
            new EditorValue(
                title: 'Activer la section',
                themeKey: 'contact_section_active',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre',
                themeKey: 'contact_section_title',
                defaultValue: 'Nous contacter',
                type: EditorType::TEXT,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Accueil - Custom',
        key: 'home-custom',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Activer la section 1',
                themeKey: 'custom_section_active_1',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 1',
                themeKey: 'custom_section_title_1',
                defaultValue: 'Titre personnalisé 1',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 1',
                themeKey: 'custom_section_content_1',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Activer la section 2',
                themeKey: 'custom_section_active_2',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 2',
                themeKey: 'custom_section_title_2',
                defaultValue: 'Titre personnalisé 2',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 2',
                themeKey: 'custom_section_content_2',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Activer la section 3',
                themeKey: 'custom_section_active_3',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre de la section 3',
                themeKey: 'custom_section_title_3',
                defaultValue: 'Titre personnalisé 3',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Contenue de la section 3',
                themeKey: 'custom_section_content_3',
                defaultValue: '<h1>Personnalise moi</h1> <br> <p>Comme du code HTML !</p>',
                type: EditorType::HTML,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Nouveautés',
        key: 'news',
        scope: 'news',
        requiredPackage: 'news',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'news_page_title',
                defaultValue: 'Les dernières actus !',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'News à afficher',
                themeKey: 'news_page_number_display',
                defaultValue: '20',
                type: EditorType::NUMBER,
            ),
        ]
    ),
    new EditorMenu(
        title: 'F.A.Q',
        key: 'faq',
        scope: 'faq',
        requiredPackage: 'faq',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'faq_page_title',
                defaultValue: 'F.A.Q',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Questions',
                themeKey: 'faq_question_title',
                defaultValue: 'Une question ?',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Réponses',
                themeKey: 'faq_answer_title',
                defaultValue: 'Des réponses',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Afficher l\'auteur',
                themeKey: 'faq_display_autor',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher le formulaire de contact',
                themeKey: 'faq_display_form',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Votes',
        key: 'votes',
        scope: 'vote',
        requiredPackage: 'votes',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'votes_page_title',
                defaultValue: 'Voter',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Participer',
                themeKey: 'votes_participate_title',
                defaultValue: 'Participer',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Afficher les votes globaux',
                themeKey: 'votes_display_global',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Wiki',
        key: 'wiki',
        scope: 'wiki',
        requiredPackage: 'wiki',
        values: [
            new EditorValue(
                title: 'Titre de la page',
                themeKey: 'wiki_page_title',
                defaultValue: 'Wiki',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre Participer',
                themeKey: 'wiki_menu_title',
                defaultValue: 'Navigation',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Afficher les icons des cats',
                themeKey: 'wiki_display_categorie_icon',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher les icons des articles',
                themeKey: 'wiki_display_article_categorie_icon',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher les icons des articles',
                themeKey: 'wiki_display_article_icon',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher la date du wiki',
                themeKey: 'wiki_display_creation_date',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher la date d\'édition',
                themeKey: 'wiki_display_edit_date',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Afficher l\'auteur',
                themeKey: 'wiki_display_autor',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Forum',
        key: 'forum',
        scope: 'forum',
        requiredPackage: 'forum',
        values: [
            new EditorValue(
                title: 'Activer le widget',
                themeKey: 'forum_use_widgets',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Stats',
                themeKey: 'forum_widgets_show_stats',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Stats : Titre',
                themeKey: 'forum_widgets_title_stats',
                defaultValue: 'Stats du forum',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Membres',
                themeKey: 'forum_widgets_show_member',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Membres : Titre',
                themeKey: 'forum_widgets_text_member',
                defaultValue: 'Membres totaux :',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Messages',
                themeKey: 'forum_widgets_show_messages',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Messages : Titre',
                themeKey: 'forum_widgets_text_messages',
                defaultValue: 'Messages totaux :',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Topics',
                themeKey: 'forum_widgets_show_topics',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Topics : Titre',
                themeKey: 'forum_widgets_text_topics',
                defaultValue: 'Nombres de topics :',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Discord',
                themeKey: 'forum_widgets_show_discord',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Discord : API',
                themeKey: 'forum_widgets_content_id',
                defaultValue: '(Paramètres serveur > Widget > ID serveur)',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Custom',
                themeKey: 'forum_widgets_show_custom',
                defaultValue: '0',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Widget - Custom : Titre',
                themeKey: 'forum_widgets_custom_title',
                defaultValue: 'Widget personnaliser',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Widget - Custom : Contenue',
                themeKey: 'forum_widgets_custom_text',
                defaultValue: '<p>Bonjour !</p>',
                type: EditorType::HTML,
            ),
            new EditorValue(
                title: 'Menu Accueil',
                themeKey: 'forum_breadcrumb_home',
                defaultValue: 'Accueil',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Icon bouton création topic',
                themeKey: 'forum_btn_create_topic_icon',
                defaultValue: 'fa-solid fa-pen-to-square',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Texte bouton création topic',
                themeKey: 'forum_btn_create_topic',
                defaultValue: 'Créer un topic',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre page sous-forum',
                themeKey: 'forum_sub_forum',
                defaultValue: 'Sous-Forums',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre page topics',
                themeKey: 'forum_topics',
                defaultValue: 'Topics',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Titre page message',
                themeKey: 'forum_message',
                defaultValue: 'Messages',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Dernier messages',
                themeKey: 'forum_last_message',
                defaultValue: 'Dernier messages',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Affichages',
                themeKey: 'forum_display',
                defaultValue: 'Affichages',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Réponses',
                themeKey: 'forum_response',
                defaultValue: 'Réponses',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Forum vide : Message',
                themeKey: 'forum_nobody_send_message_text',
                defaultValue: 'Aucun message',
                type: EditorType::TEXT,
            ),
        ]
    ),
    new EditorMenu(
        title: 'Footer',
        key: 'footer',
        scope: null,
        requiredPackage: null,
        values: [
            new EditorValue(
                title: 'Liens dans un nouvel onglet',
                themeKey: 'footer_open_link_new_tab',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Facebook : Activer',
                themeKey: 'footer_active_facebook',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Facebook : Url',
                themeKey: 'footer_link_facebook',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Facebook : Icon',
                themeKey: 'footer_icon_facebook',
                defaultValue: 'fa-brands fa-facebook',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'X : Activer',
                themeKey: 'footer_active_x',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'X : Url',
                themeKey: 'footer_link_x',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'X : Icon',
                themeKey: 'footer_icon_x',
                defaultValue: 'fa-brands fa-square-x-twitter',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Instagram : Activer',
                themeKey: 'footer_active_instagram',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Instagram : Url',
                themeKey: 'footer_link_instagram',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Instagram : Icon',
                themeKey: 'footer_icon_instagram',
                defaultValue: 'fa-brands fa-instagram',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Discord : Activer',
                themeKey: 'footer_active_discord',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Discord : Url',
                themeKey: 'footer_link_discord',
                defaultValue: '#',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'Discord : Icon',
                themeKey: 'footer_icon_discord',
                defaultValue: 'fa-brands fa-discord',
                type: EditorType::FONTAWESOMEPICKER,
            ),
            new EditorValue(
                title: 'Afficher les CGU/CGV',
                themeKey: 'footer_active_condition',
                defaultValue: '1',
                type: EditorType::BOOLEAN,
            ),
            new EditorValue(
                title: 'Titre conditions',
                themeKey: 'footer_title_condition',
                defaultValue: 'Conditions',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'CGU',
                themeKey: 'footer_desc_condition_use',
                defaultValue: 'CGU',
                type: EditorType::TEXT,
            ),
            new EditorValue(
                title: 'CGV',
                themeKey: 'footer_desc_condition_sale',
                defaultValue: 'CGV',
                type: EditorType::TEXT,
            ),
        ]
    ),
];
