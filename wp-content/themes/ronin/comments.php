<div class="comments-area">
    <h4><?php
    $comment_count = get_comments_number();
    echo esc_html($comment_count) . ' ' . _n('Comment', 'Comments', $comment_count, 'ronin');
    ?></h4>
    <div class="comment-list">
        <?php wp_list_comments();?>
    </div>	
                                				
</div>
<div class="comment-form">
    <?php comment_form(); ?>
</div>