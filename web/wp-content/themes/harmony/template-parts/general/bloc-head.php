<?php
    $projets = get_field('user_projects', 'user_' . get_current_user_id());

    $current_project_id = get_current_project();
    $current_project = get_term($current_project_id);

?>

<div class="content">
    <div class="hero">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="current-project">
                        <?= $current_project->name; ?>
                    </div>
                    <div class="date-project">
                        Depuis le 13/03/2015
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <ul class="fake-select">
                        <?php
                        foreach ($projets as $projet):
                            $termObj = get_term($projet);
                        ?>
                            <li>
                                <a href="">
                                    <?= $termObj->name; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>