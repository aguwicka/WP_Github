<?php

$repos = get_json();?>
<div class="git_wrapper">
    <div class="git__column">
        <div class="name clm_opt">Name</div>
        <div class="link clm_opt">Link to repo</div>
        <div class="description clm_opt">Description</div>
        <div class="size clm_opt">Size</div>
        <div class="lg clm_opt">Language</div>
        <div class="iac clm_opt">Information about contributors</div>
    </div>
    <?php
        foreach ($repos as $repo) {
            //echo '<pre>';var_dump($repo); echo '</pre>';
            $name = $repo->name;
            $owners = $repo->owner;
            $repoLink = $repo->html_url;
            $desc = $repo->description;
            $size = $repo->size;
            $lg = $repo->language;
            $contributors = $repo->contributors_url;
            ?>
            <div class="git__column">
                <div class="name clm_opt"><?= $name;?></div>
                <div class="link clm_opt">
                        <a href="<?= $repoLink ?>" target="_blank">link</a>
                </div>
                <div class="description clm_opt"><?= $desc;?></div>
                <div class="size clm_opt"><?= $size;?></div>
                <div class="lg clm_opt"><?= $lg; ?></div>
                <div class="iac clm_opt"><a href="<?= $contributors;?>" target="_blank">link</a></div>
            </div>
        <?php }
    ?>
</div>
<?php
