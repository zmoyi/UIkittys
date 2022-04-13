<?php use Typecho\Widget;
    use Widget\Contents\Page\Rows;
   use \Widget\Metas\Category\Rows as Row;

    if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="uk-navbar-container tm-navbar-container" uk-sticky="position: top">

    <div class="uk-container uk-container-expand">
        <div class="uk-container">
            <nav class="uk-navbar">
                <div class="uk-navbar-left">
                    <a class="uk-navbar-toggle uk-hidden@m" uk-toggle="target: #sidebar" uk-navbar-toggle-icon href="#"></a>
                    <div class="uk-navbar-item">
                        <?php if ($this->options->LogoDarkUrl&&$this->options->LogoLightUrl): ?>
                        <a class="uk-logo" href="<?php $this->options->siteUrl(); ?>">
                            <img src="<?php $this->options->LogoDarkUrl() ?>" uk-svg alt="">
                            <img class="uk-logo-inverse" src="<?php $this->options->LogoLightUrl() ?>" uk-svg alt="<?php $this->options->title() ?>">
                        </a>
                        <?php else: ?>
                        <a class="uk-logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="uk-navbar-center uk-visible@m">
                    <ul class="uk-navbar-nav">
                        <li class="uk-navbar-item <?php if ($this->is('index')) : ?>uk-active <?php endif; ?>">
                            <a href="<?php $this->options->siteUrl() ?>" class="uk-button-text uk-text-bold">首页</a>
                        </li>

                        <?php if ($this->options->enableIndexPage): ?>

                        <li class="uk-navbar-item <?php if ($this->is('archive') or $this->is('post')) : ?> uk-active<?php endif; ?>">
                            <a href="<?php echo core::getArticlePath(); ?>" class="uk-button-text uk-text-bold">文章</a>
                        </li>
                        <?php endif;?>
                        <?php Rows::alloc()->to($pages);
                        while ($pages->next()):
                            if (strtolower($pages->slug) == 'links' or strtolower($pages->slug) == 'about' or $pages->fields->headerDisplay == 1): ?>
                        <li class="uk-navbar-item <?php if ($this->is('page', $pages->slug)): ?>uk-active<?php endif; ?>">
                            <a href="<?php $pages->permalink(); ?>" class="uk-button-text uk-text-bold "><?php $pages->title(); ?></a>
                        </li>
                            <?php endif;endwhile; ?>

                    </ul>
                </div>
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">

                        <li class="uk-navbar-item">
                            <a id="lights" uk-icon="sunset"></a>
                            <a class="uk-navbar-toggle" href="#modal-full" uk-icon="search" uk-toggle></a>
                        </li>

                            <li class="uk-navbar-item  uk-visible@l">
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" width="40" height="40"
                                         src="<?php echo core::is_avatar($this->options->avatar_email)?>" alt="">
                                </div>
                            </li>
                    </ul>
                </div>
            </nav>
            <!--        搜索框-->
            <div id="modal-full" class="uk-modal-full uk-modal" uk-modal>
                <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
                    <button class="uk-modal-close-full" type="button" uk-close></button>
                    <form class="uk-search uk-search-large" id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                            <label>
                                <input class="uk-search-input uk-text-center"  id="s" name="s"   type="search" placeholder="<?php _e('搜索一下···'); ?>">
                            </label>
                    </form>
                </div>
            </div>
            <div id="sidebar" uk-offcanvas="overlay: true">
                <div class="uk-offcanvas-bar">
                    <button class="uk-offcanvas-close" type="button" uk-close></button>
                    <div class="uk-width-auto">
                        <img class="uk-border-circle"
                             width="50" height="50"
                             src="<?php echo core::is_avatar($this->options->avatar_email)?>" alt="">
                    </div>
                    <h3 class="uk-text-bolder"><?php $this->author(); ?>·</h3>
                    <p class="uk-text-bold"><?php $this->options->description() ?></p>
                    <ul class="uk-iconnav">
                        <?php if ($this->options->githubUrl&&$this->options->tiktok&&$this->options->telegram):?>
                        <li><a href="<?php $this->options->githubUrl() ?>" uk-icon="icon: brand-github"></a></li>
                        <li><a href="<?php $this->options->telegram() ?>" uk-icon="icon: brand-telegram"></a></li>
                        <li><a href="<?php $this->options->tiktok() ?>" uk-icon="icon: brand-tiktok"></a></li>
                        <?php endif;?>
                    </ul>

                    <ul class="uk-nav uk-margin-top uk-nav-parent-icon  uk-nav-default" uk-nav="multiple: true">
                        <li class="<?php if ($this->is('index')) : ?>uk-active <?php endif; ?>">
                            <a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                        </li>
                        <?php if ($this->options->enableIndexPage): ?>
                        <li class="<?php if ($this->is('archive') or $this->is('post')) : ?> uk-active<?php endif; ?>">
                            <a href="<?php echo core::getArticlePath(); ?>">文章</a>
                        </li>
                        <?php endif;?>
                        <li class="uk-parent">
                            <a href="#">分类</a>
                            <?php Row::alloc()->listCategories('wrapClass=uk-nav-sub');  ?>
                        </li>
                        <?php Rows::alloc()->to($pages); ?>
                        <?php while ($pages->next()): ?>
                        <li class="<?php if ($this->is('page', $pages->slug)): ?>uk-active<?php endif;?>">
                            <a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                        </li>
                        <?php endwhile; ?>

                    </ul>
                    <div class=" uk-text-center ">
                        <?php Widget::widget('Widget_Stat')->to($stat); ?>
                        <div class="uk-flex uk-flex-center uk-grid-small uk-margin-bottom" uk-grid>
                            <div>
                                <p class="uk-margin-remove-bottom"><?php $stat->publishedPostsNum() ?></p>
                                <small class="uk-margin-remove-top">文章数</small>
                            </div>
                            <div>
                                <p class="uk-margin-remove-bottom"><?php $stat->publishedCommentsNum() ?></p>
                                <small class="uk-margin-remove-top">评论数</small>
                            </div>
                            <div>
                                <p class="uk-margin-remove-bottom"><?php $stat->categoriesNum() ?></p>
                                <small class="uk-margin-remove-top">分类</small>
                            </div>
                        </div>
                        <small>Copyright ©   ©
                            <script>
                                document.currentScript.insertAdjacentHTML('afterend', '<time datetime="' + new Date().toJSON() + '">' + new Intl.DateTimeFormat(document.documentElement.lang, {year: 'numeric'}).format() + '</time>');
                            </script>
                            <?php $this->options->title(); ?>. <br>All rights reserved.<br class="uk-hidden@s"> Powered by <a class="uk-link-muted"
                                                                                                                              href="https://blog.x-word.cn">
                                Liu Mingxi
                            </a>.</small>

                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
