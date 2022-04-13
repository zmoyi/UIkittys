<?php use Widget\Comments\Recent;

    if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="uk-container">
    <div class="uk-container-expand uk-margin-top uk-margin-bottom" uk-grid>
        <div class="uk-width-1-1@m ">
            <div class="uk-card uk-card-default uk-border-rounded">
                <div class="uk-card-body">
                    <div class="uk-grid-medium" uk-grid="">
                        <div class="uk-width-1-2@m">
                            <ul class="uk-nav uk-nav-default">
                                <li class="uk-nav-header">热门文章</li>
                               <?php core::getHotComments(4);?>
                            </ul>
                        </div>

                        <div class="uk-width-1-2@m uk-text-left">
                            <div class="uk-flex uk-flex-middle uk-grid-small uk-text-center">
                                <?php if ($this->options->qcode):?>
                                <div class="uk-flex-column">
                                    <img src="<?php $this->options->qcodeurl1() ; ?>" height="100" width="100" alt="">
                                    <br>
                                    <small>微信公众号</small>
                                </div>
                                <div class="uk-flex-column">
                                    <img src="<?php $this->options->qcodeurl2() ; ?>" height="100" width="100" alt="">
                                    <br>
                                    <small>微信小程序</small>
                                </div>
                                <?php endif;?>
                            </div>

                        </div>
                    </div>
                    <div class="uk-grid-medium" uk-grid="">
                        <div class="uk-width-1-2@m">
                            <ul class="uk-iconnav">
                                <?php if ($this->options->githubUrl&&$this->options->tiktok&&$this->options->telegram):?>
                                    <li><a href="<?php $this->options->githubUrl() ?>" uk-icon="icon: brand-github"></a></li>
                                    <li><a href="<?php $this->options->telegram() ?>" uk-icon="icon: brand-telegram"></a></li>
                                    <li><a href="<?php $this->options->tiktok() ?>" uk-icon="icon: brand-tiktok"></a></li>
                                <?php endif;?>
                            </ul>
                            <ul class="uk-nav uk-nav-default">
                                <?php if ($this->options->icp):?>
                                <li><a href=" <?php if ($this->options->icp): $this->options->icpurl(); endif;echo 'https://beian.miit.gov.cn'?>"><?php $this->options->icp() ?></a></li>
                                <?php endif;?>
                            </ul>

                        </div>
                        <div class="uk-width-1-2@m">
                            <div class="uk-panel uk-text-meta uk-margin uk-text-left">
                                ©
                                <script>
                                    document.currentScript.insertAdjacentHTML('afterend', '<time datetime="' + new Date().toJSON() + '">' + new Intl.DateTimeFormat(document.documentElement.lang, {year: 'numeric'}).format() + '</time>');
                                </script>
                                <?php $this->options->title(); ?>. <br>All rights reserved.<br class="uk-hidden@s"> Powered by <a class="uk-link-muted"
                                                                                                     href="https://blog.x-word.cn">
                                    Liu Mingxi
                                </a>.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?php $this->options->themeUrl('assets/uikit/js/uikit.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/uikit/js/uikit-icons.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/dist/index.js'); ?>"></script>

</body>
</html>
