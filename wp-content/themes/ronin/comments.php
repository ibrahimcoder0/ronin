<div class="comments-area">
    <h4><?php echo get_comments_number( );?> Comments</h4>
	<?php wp_list_comments();?>
                                            				
</div>
<div class="comment-form">

    <?php 
    if(comments_open( ) && !post_password_required( )){
        comment_form();
    }elseif(!comments_open( )){
        echo 'commenting Closed!';
    } elseif(post_password_required( )){
        echo 'Post is Locked!';
    }

 ?>
</div>