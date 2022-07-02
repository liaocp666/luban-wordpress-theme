<?php
// Edit By laobuluo.com
if (post_password_required())
    return;
?>
<!-- Comments -->
<section class="">
    <div class="container" style="max-width: 1072px">
        <div class="row">
            <div class="col">
                <div class="container">
                    <div id="comments" class="comments-area">
                        <div class="layoutSingleColumn">
                            <?php if (have_comments()) : ?>
                                <h2 class="comments-title">
                                    评论
                                </h2>
                                <ol class="comment-list">
                                    <?php
                                    wp_list_comments(array(
                                        'style' => 'ol',
                                        'short_ping' => true,
                                        'reply_text' => '回复',
                                        'avatar_size' => 42,
                                        'format' => 'html5'
                                    ));
                                    ?>
                                </ol>
                                <?php the_comments_pagination(array(
                                    'prev_text' => 'Prev',
                                    'next_text' => 'Next',
                                    'prev_next' => false,
                                )); ?>
                            <?php endif; ?>
                            <?php comment_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

