<main id="main">
    <div class="container" style="max-width: 1072px">
        <div class="row justify-content-start">
            <div class="col">
                <div class="container">
                    <?php if (have_posts()) while (have_posts()) {
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" class="article border-bottom" itemscope="itemscope"
                                 itemtype="http://schema.org/Article">
                            <div class="article-wrap">
                                <div class="post-title mb-4">
                                    <?php the_title('<h1 class="post-title default-max-width" itemprop="headline">', '</h1>'); ?>
                                </div>
                                <div class="post-meta mb-5">
                                <span class="mr-3">
                                    <?php the_author_meta('nickname'); ?>
                                </span>
                                    <span style="color: #0FA0CE" class="mr-3">
                                    /
                                </span>
                                    <span class="mr-3">
                                    <time datetime="<?php echo get_the_time('c'); ?>"
                                          title="<?php echo get_the_time('c'); ?>"
                                          itemprop="datePublished" pubdate>
                                                <?php the_time('Y-m-d'); ?>
                                    </time>
                                </span>
                                </div>
                                <div class="post-content mb-5">
                                    <?php the_content(); ?>
                                </div>
                                <div class="clearfix"></div>
                                <div class="post-tags mb-5">
                                    <?php the_tags('<i class="fa-solid fa-tags"></i>&nbsp;', '、', ''); ?>
                                </div>
                                <div class="d-lg-flex justify-content-between flex-fill post-author border-top pt-5">
                                    <div class="d-flex">
                                        <div class="author-img" style="overflow:hidden;">
                                            <img class="rounded rounded-circle"
                                                 src="<?php echo get_avatar_url(get_the_author_meta('user_email')); ?>"
                                                 alt="头像" height="64"
                                                 width="64">
                                        </div>
                                        <div class="author-info mx-3 mt-2">
                                            <div class="">
                                                <?php echo get_the_author(); ?>
                                            </div>
                                            <div class="mt-3 post-meta">
                                                <?php echo get_the_author_meta('description'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="align-self-center post-cc">
                                        <a rel="license" href="http://creativecommons.org/licenses/by/4.0/deed.zh"><img
                                                    alt="知识共享许可协议" style="border-width:0"
                                                    src="https://i.creativecommons.org/l/by/4.0/80x15.png"/></a><br/><br/>
                                        本作品采用<a rel="license" href="http://creativecommons.org/licenses/by/4.0/deed.zh">知识共享署名
                                            4.0 国际许可协议</a>进行许可
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>