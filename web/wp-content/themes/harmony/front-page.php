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
                       <tr class="loaded">
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
<?php
get_footer();
