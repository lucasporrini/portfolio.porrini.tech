<header>
    <div class="header-container">
        <div class="header-left">
            <span class="header-name">Lucas PORRINI</span>
            <span class="header-job">Full Stack Developer</span>
        </div>
        
        <div class="header-nav">
            <?php
                $counter = 0;
                foreach($data['nav'] as $item) { 
                    if($item['active'] == 1) {
            ?>
                <a href="<?= $item['url'] ?>" class="strikethough">
                    <span><?= strtolower($item['nav_title']) ?></span>
                    <?php
                        if($item['nav_badge']==1) {
                            echo '<span>' . strtolower($item['nav_badge_title']) . '</span>';
                        }
                    ?>
                </a>
            <?php
                        $counter++;
                    } 
                } 
            ?>
            <a href="#" class="strikethough" style="color: white">
                <span><?php importSVG('github') ?></span>
            </a>
        </div>
    </div>
    <hr>
</header>