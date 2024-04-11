<?php
get_header();

?>

<div class="sidebar-menu">
    <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" class="logo" alt="">

    <ul class="menu">
        <li>
            <a href="">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon-task.svg" alt="">
                Tâches
            </a>
        </li>
        <li>
            <a href="">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon-evolution.svg" alt="">
                Évolutions produit
            </a>
        </li>
        <li>
            <a href="">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon-settings.svg" alt="">
                Informations générales
            </a>
        </li>
        <li>
            <a href="">
                <img src="<?= get_template_directory_uri(); ?>/assets/img/icon-help.svg" alt="">
                Aide
            </a>
        </li>
    </ul>
    <a href="#" class="link-logout">
        <img src="<?= get_template_directory_uri(); ?>/assets/img/icon-logout.svg" alt="">
        Se deconnecter
    </a>
</div>


<div class="content">
    <div class="hero">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="current-project">
                        Atelier Gambetta
                    </div>
                    <div class="date-project">
                        Depuis le 13/03/2015
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <ul class="fake-select">
                        <li class="current">
                            Enseigne Gambetta
                        </li>
                        <li>
                            <a href="">
                                The Fox Agency
                            </a>
                        </li>
                        <li>
                            <a href="">
                                T'as kiffé
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Chauveau Mulon Associés
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content view">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    Tâches
                </div>

                <form action="" id="search-task">
                    <input type="text" placeholder="Rechercher une tâche">
                </form>
            </div>

            <div class="col-sm-6 text-right">
                <a href="" class="button-add-task intro-button">
                    Créer une tâche
                    <span>+</span>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <table class="table-task">
                    <thead>
                        <td>
                            Créateur
                        </td>
                        <td>
                            Titre de la tâche
                        </td>

                        <td>
                            Priorité
                        </td>
                        <td>
                            Date de création
                        </td>
                        <td class="text-right">
                            Statut
                        </td>
                    </thead>


                    <?php
                    $text = 'Créer une entrée pour la navigation principale
                               Créer une entrée pour la navigation principale
                               Créer une entrée pour la navigation principale';

                    $i = 0; while ($i < 15): ?>
                        <tr class="load">
                            <td>
                                <div class="user-initials load">

                                </div>
                            </td>
                            <td>
                                <div class="loader-text"></div>
                            </td>
                            <td>
                                <div class="loader-text"></div>
                            </td>
                            <td>
                                <div class="loader-text"></div>
                            </td>
                            <td class="text-right">
                                <div class="loader-text"></div>
                            </td>
                        </tr>
                        <?php $i++; endwhile; ?>



                   <?php
                   $text = 'Créer une entrée pour la navigation principale
                               Créer une entrée pour la navigation principale
                               Créer une entrée pour la navigation principale';

                   $i = 0; while ($i < 15): ?>
                       <tr class="loaded" data-task-id="123">
                           <td>
                               <div class="user-initials">
                                   BV
                               </div>
                           </td>
                           <td>
                               <?= substr($text, 0, 140); ?>...
                           </td>
                           <td>
                               Urgent
                           </td>
                           <td>
                               13/03/2024
                           </td>
                           <td class="text-right">
                               En attente
                           </td>
                       </tr>
                    <?php $i++; endwhile; ?>

                </table>
            </div>
        </div>
    </div>
</div>



<div class="popin-right hidden popin" id="popin-create">
    <div class="view">
        <div class="head">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-1">
                        <button class="button-validate">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22.5" cy="22.5" r="22" stroke="#E5E5E5"/>
                                <g clip-path="url(#clip0_1016_1914)">
                                    <path d="M28.1129 17.1523L27.2249 18.069C25.2301 20.1325 23.1183 22.4628 21.126 24.5598L18.4618 22.2951L17.4954 21.4728L15.9021 23.4746L16.8685 24.2969L20.4208 27.3165L21.3023 28.0647L22.1055 27.2289C24.36 24.8968 26.7978 22.1747 29.001 19.8956L29.889 18.9789L28.1129 17.1523Z" fill="#CCCCCC"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1016_1914">
                                        <rect width="14" height="11" fill="white" transform="translate(16 17)"/>
                                    </clipPath>
                                </defs>
                            </svg>

                        </button>
                    </div>
                    <div class="col-sm-10">
                        <div class="popin-status">
                            Urgent
                        </div>
                        <div class="popin-title">
                            Rendre le menu cliquable vers un site externe - Générale
                        </div>
                        <div class="popin-date">
                            13/03/2023
                        </div>
                    </div>
                    <div class="col-sm-1 text-right">
                        <button class="button-cross"></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <div class="description-ticket">
                            <p>
                                Je pense que ce ticket rejoint : https://projects.lonsdale.fr/app/tasks/24779112 je peux te laisser tout vérifier et on en reparle<br/><br/>
                                Merci bcp et à dispo
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="ticket-info">
                            <div>Créé par : Sophia Qassar</div>
                            <div>Le : 13/03/2023</div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="" class="delete">Supprimer</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-border-top">
                            Fichiers
                        </div>

                        <ul class="medias">
                            <li>
                                <a href="">
                                    <img src="https://images.pexels.com/photos/2693212/pexels-photo-2693212.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="https://images.pexels.com/photos/16059888/pexels-photo-16059888/free-photo-of-apple-iphone-connexion-technologie.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="https://images.pexels.com/photos/2878710/pexels-photo-2878710.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-border-top">
                            Commentaires
                        </div>

                        <form action="" class="comment">
                            <label for="">
                                Priorité
                                <select id="comment-priority" name="comment_priority">
                                    <option value="Low">Faible</option>
                                    <option value="Medium">Moyenne</option>
                                    <option value="High">Haute</option>
                                </select>
                            </label>


                            <?php
                            // Afficher l'éditeur WYSIWYG
                            wp_editor('', 'custom_wysiwyg_editor', array(
                                'textarea_name' => 'custom_wysiwyg_editor_content',
                                'editor_class'  => 'custom-wysiwyg-editor-class',
                                'media_buttons' => false,
                                'textarea_rows' => 10,
                                'teeny'         => false,
                                'tinymce'       => true
                            ));
                            ?>
                            <a href="" class="button-add-task intro-button">
                                Créer une tâche
                                <span>+</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="popin-center popin" id="popin-create-ticket">
    <div class="view">
        <div class="head">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-sm-11">
                        <div class="popin-title">
                            Création d'une tâche
                        </div>
                    </div>
                    <div class="col-sm-1 text-right">
                        <button class="button-cross"></button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <form action="" class="comment create">
                            <label for="">
                                <input type="text" placeholder="Titre de la tâche">
                            </label>
                            <label for="">
                                <div>Priorité</div>
                                <select id="comment-priority" name="comment_priority">
                                    <option value="Low">Faible</option>
                                    <option value="Medium">Moyenne</option>
                                    <option value="High">Haute</option>
                                </select>
                            </label>

                            <p>
                                <label for="comment-media">Médias :
                                <input type="file" id="comment-media" name="comment_media[]" multiple>
                                </label>
                            </p>


                            <?php
                            // Afficher l'éditeur WYSIWYG
                            wp_editor('', 'custom_wysiwyg_editor', array(
                                'textarea_name' => 'custom_wysiwyg_editor_content_create',
                                'editor_class'  => 'custom-wysiwyg-editor-class',
                                'media_buttons' => false,
                                'textarea_rows' => 10,
                                'teeny'         => false,
                                'tinymce'       => true
                            ));
                            ?>
                            <a href="" class="button-add-task intro-button">
                                Créer une tâche
                                <span>+</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
