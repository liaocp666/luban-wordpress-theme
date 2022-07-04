<?php get_header() ?>
<main id="main">
    <div class="container" style="max-width: 1072px">
        <div class="row justify-content-start">
            <div class="col">
                <div class="container">
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" class="article" itemscope="itemscope"
                                     itemtype="http://schema.org/Article">
                                <div class="article-wrap">
                                    <div class="entry-title mb-3">
                                        <?php the_title(sprintf('<h2 class="entry-title default-max-width" itemprop="headline"><a href="%s" title="%s" aria-label="">', esc_url(get_permalink()), get_the_title(), get_the_title()), '</a></h2>'); ?>
                                    </div>
                                    <div class="entry-content mb-3">
                                        <p itemprop="articleBody">
                                            <?php if (post_password_required()) {
                                                the_content();
                                            } else {
                                                $content = get_post_field('post_content', get_the_ID());
                                                $content_parts = get_extended($content);
                                                echo mb_strimwidth(strip_shortcodes(strip_tags(apply_filters('the_content', $post->post_excerpt ?: $content_parts['main']))), 0, 220, '...');
                                            } ?>
                                        </p>
                                    </div>
                                    <div class="post-meta">
                                        <span>
                                            <time datetime="<?php echo the_time('Y-m-d'); ?>"
                                                  title="<?php echo the_time('Y-m-d'); ?>"
                                                  itemprop="datePublished" pubdate>
                                                <?php echo the_time('Y-m-d'); ?>
                                            </time>
                                        </span>
                                        <span>
                                            /
                                        </span>
                                        <span class="categories">
                                           <?php the_category( '、' ); ?>
                                        </span>
                                    </div>
                                </div>
                            </article>
                            <?php
                        }
                    } else {
                        echo '无文章内容';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col">
                <div class="page-navigation">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination site-pagination">
                            <li class="page-item">
                                <?php previous_posts_link('<i class="fa-solid fa-arrow-left"></i>') ?>
                            </li>
                            <li class="page-item">
                                <?php next_posts_link('<i class="fa-solid fa-arrow-right"></i>') ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>
