<footer class="footer border-top">
    <section class="container-fluid">
        <div class="footer-wrap">
            <div class="row">
                <div class="col mb-3">
                    <div class="footer-info">
                        Copyright © <?php echo date('Y'); ?>&nbsp;<a href="<?php get_site_url(); ?>"
                                                                     title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>.&nbsp;
                        Designed by&nbsp;<a href="https://github.com/liaocp666" title="Designed by Kent Liao">Kent
                            Liao</a>.&nbsp;
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer-links">
                                <div class="links-hr">关注博客</div>
                                <div>
                                    <a href="<?php echo get_site_url(); ?>/sitemap.xml" target="_blank"><i
                                                class="fa-solid fa-sitemap"></i></a>
                                    <a href="<?php echo get_site_url(); ?>/rss"><i class="fa-solid fa-rss"></i></a>
                                    <a href="javascript:modalQrcode();"><i class="fa-brands fa-weixin"></i></a>
                                    <a href="https://github.com/liaocp666" target="_blank"><i
                                                class="fa-brands fa-github"></i></a>
                                    <a href="mailto:2964556627@qq.com"><i class="fa-solid fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="footer-links">
                                <div class="links-hr">友情连接</div>
                                <div>
                                    <a href="https://www.danilelxp.com/" target="_blank">杂谈漫话小站</a>
                                    <a href="https://www.islery.com/" target="_blank">姑苏的猫</a>
                                    <a href="https://www.cnblogs.com/lin02/" target="_blank">长林咯</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modalQrcode" tabindex="-1" aria-labelledby="modalQrcode" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">微信扫码</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="mx-auto d-block"
                         src="<?php echo get_template_directory_uri() . '/static/images/qrcode.webp'; ?>"
                         alt="<?php echo the_author_meta('nickname'); ?>">
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
