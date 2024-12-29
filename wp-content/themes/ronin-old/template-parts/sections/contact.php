<?php 
$options = get_option( 'ronin_framework' ); // unique id of the framework

?>
<section class="contact_area p_120">
    <div class="container">
        <div id="mapBox" class="mapBox-bd mb-5">
        <iframe width="100%" height="500px" src="https://maps.google.com/maps?q=<?php if(get_field('contact_maps')){
            the_field('contact_maps');
        } echo 'Bangladesh';  ?> &t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            </iframe>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <?php
                        $home_contact_box_rep = $options['home_contact_box_rep'];
                        foreach ($home_contact_box_rep as $contact_rep) :
                    ?>
                    <div class="info_item">
                        <?php if(!empty($contact_rep['home_contact_rep_icon'])): ?>
                        <i class="<?php echo $contact_rep['home_contact_rep_icon']; ?>"></i>
                        <?php endif;?>
                        <?php if(!empty($contact_rep['home_contact_rep_title'])): ?>
                        <h6><?php echo $contact_rep['home_contact_rep_title']; ?></h6>
                        <?php endif;?>
                        <?php if(!empty($contact_rep['home_contact_rep_content'])): ?>
                        <p><?php echo $contact_rep['home_contact_rep_content']; ?></p>
                        <?php endif;?>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>