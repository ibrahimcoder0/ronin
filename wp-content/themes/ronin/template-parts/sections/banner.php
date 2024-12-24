<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php if(!empty($options['hero_img'])): ?>
                    <div class="home_left_img">
                        <img src="<?php echo $options['hero_img']; ?>" alt="">
                    </div>
                    <?php endif;?>
                </div>
                <div class="col-lg-6">
                    <div class="banner_content">
                        <?php if(!empty($options['hero_subtitle'])): ?>
                        <h5><?php echo $options['hero_subtitle']; ?></h5>
                        <?php endif;?>
                        <?php if(!empty($options['hero_title'])): ?>
                        <h2><?php echo $options['hero_title']; ?></h2>
                        <?php endif;?>
                        <?php if(!empty($options['hero_content'])): ?>
                        <p><?php echo $options['hero_content']; ?></p>
                        <?php endif;?>
                        <?php if(!empty($options['hero_btn_text'])): ?>
                        <a class="banner_btn" href="<?php echo $options['hero_btn_link']; ?>"><?php echo $options['hero_btn_text']; ?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
