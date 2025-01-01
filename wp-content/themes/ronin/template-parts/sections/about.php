<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>
<section class="welcome_area p_120">
    <div class="container">
        <div class="row welcome_inner">
            <div class="col-lg-6">
                <div class="welcome_text">
                    <?php if(!empty($options['home_about_title'])): ?>
                    <h4><?php echo $options['home_about_title']; ?></h4>
                    <?php endif;?>
                    <?php if(!empty($options['home_about_content'])): ?>
                    <p><?php echo $options['home_about_content']?></p>
                    <?php endif;?>
                    <div class="row">
                        <?php
                            $home_about_box_rep = $options['home_about_box_rep'];
                            // print_r($all_skills);
                            foreach ($home_about_box_rep as $single_rep) :
                        ?>
                        <div class="col-md-4">
                            <div class="wel_item">
                                <?php if(!empty($single_rep['home_about_rep_icon'])): ?>
                                <i class="<?php echo $single_rep['home_about_rep_icon']; ?>"></i>
                                <?php endif;?>
                                <?php if(!empty($single_rep['home_about_rep_title'])): ?>
                                <h4><?php echo $single_rep['home_about_rep_title']; ?></h4>
                                <?php endif;?>
                                <?php if(!empty($single_rep['home_about_rep_content'])): ?>
                                <p><?php echo $single_rep['home_about_rep_content']; ?></p>
                                <?php endif;?>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tools_expert">
                    <h3>Tools Expertness</h3>
                    <div class="skill_main">
                        <?php
                            $home_about_skill = $options['home_about_skill'];
                            // print_r($all_skills);
                            foreach ($home_about_skill as $single_skill) :
                        ?>
                        <div class="skill_item">

                            <h4><?php echo $single_skill['home_about_skill_title']; ?> 
                            <span class="counter"><?php echo $single_skill['home_about_skill_number']; ?></span>%</h4>
                            
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $single_skill['home_about_skill_number']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

