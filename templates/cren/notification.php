<div style="border-radius:5px;width:680px;margin:30px auto 0;max-width:100%">
    <div style="box-shadow:0 0 30px 0 rgb(219 216 214);border-radius:5px;width:630px;margin:auto;max-width:100%;;margin-bottom:-30px">
        <div style="width:200px;height:40px;margin-left:0;text-align:center;line-height:40px;text-decoration:none;color:#fff;background-color:#94a9b9;border-radius:5px 0">
            Dear: <?php echo $parent->comment_author ?></div>
        <div style="line-height:180%;padding:0 15px 12px;margin:auto;color:rgb(0, 0, 0);font-size:14px;margin-bottom:0">
            <h2 style="border-bottom:1px solid #ddd;font-size:16px;font-weight:400;padding:0px 0 10px 8px">
                <span style="color:#12addb;font-weight:700"> </span>您在
                <a style="text-decoration:none;color:#12addb;;font-weight:bold;"
                   href="https://cacx.cc/592/comment-page-1#comment-800" target="_blank"
                   rel="noopener">《<?php echo get_the_title($parent->comment_post_ID) ?>》</a>的评论有了新回复
            </h2>
            <div style="padding:0 12px 0 12px;margin-top:18px">
                <p>时间：<span style="border-bottom:1px dashed #ccc" t="5"><span
                                style="border-bottom: 1px dashed rgb(204, 204, 204); position: relative;" t="5"
                                isout="0"><?php echo $comment->comment_date ?></span>&nbsp;</span></p>
                <div class="Messages_box">
                    <p style="display:flex;justify-content:flex-end">您的评论：</p>
                    <div class="ax_post_box-comments-single Messages-author"
                         style="display: flex;justify-content: flex-end;margin-bottom: 5px">
                        <div class="ax_post_box-comment-avatar" style="width: auto;flex: none;order: 2">
                            <img src="<?php echo get_avatar_url($parent->comment_author_email) ?>"
                                 s="100&quot;" style="width: 40px;height: 40px;border-radius: 5px">
                        </div>
                        <div class="ax_post_box-comment-text" style="position: relative;margin-right: 20px">
                            <span class="ax_post_box-comment-text-before"
                                  style="width: 0;height: 0;border-top:8px solid transparent;border-bottom:8px solid transparent;border-left:8px solid;border-left-color:#333333;border-right:0;border-right-color:transparent;right: -7px;left: auto;top: 12px;position: absolute"></span>
                            <div class="ax_post_box-comment-text-inner"
                                 style="background-color: #333333;color: #ffffff;padding: 10px;border-radius: 9px;margin-bottom: 3px">
                                <?php echo $parent->comment_content ?>
                            </div>
                        </div>
                    </div>
                    <p><strong><?php echo $comment->comment_author ?></strong> 给你回复：</p>
                    <div class="ax_post_box-comments-single Messages-user" style="display: flex;margin-bottom: 5px">
                        <div class="ax_post_box-comment-avatar" style="width: auto;flex: none">
                            <img src="<?php echo get_avatar_url($comment->comment_author_email) ?>"
                                 style="width: 40px;height: 40px;border-radius: 5px">
                        </div>
                        <div class="ax_post_box-comment-text" style="position: relative;margin-left: 20px">
                            <span class="ax_post_box-comment-text-before"
                                  style="width: 0;height: 0;border-top: 8px solid transparent;border-bottom: 8px solid transparent;border-right: 8px solid;border-right-color: #333333;left: -7px;right: auto;top: 12px;position: absolute"></span>
                            <div class="ax_post_box-comment-text-inner"
                                 style="background-color: #333333;color: #ffffff;padding: 10px;border-radius: 9px;margin-bottom: 3px">
                                <?php echo $comment->comment_content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="color:#8c8c8c;font-size:10px;width:100%;text-align:center;word-wrap:break-word;margin-top: 20px;">
                <p><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></p>
            </div>
            <div style="text-align:center">
                <a style="text-decoration:none;color:#fff;background-image: -webkit-linear-gradient(0deg, #3ca5f6 0%, #a86af9 100%);padding:5px 20px;border-radius:4px;position:absolute;margin-left:-35px;margin-top:10px"
                   href="<?php echo get_comment_link($parent->comment_ID) ?>" target="_blank" rel="noopener">查看</a>
            </div>
        </div>
        <div style="color:#8c8c8c;font-size:10px;width:100%;text-align:center;margin-top:50px">
            <p>本邮件为系统自动发送，请勿直接回复~</p>
        </div>
        <div style="color:#8c8c8c;padding-bottom: 10px;font-size:10px;width:100%;text-align:center">
            <p>©<?php echo date('Y'); ?> Copyright <a href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a></p>
        </div>
    </div>
</div>