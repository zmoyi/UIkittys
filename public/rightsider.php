<?php

    use Typecho\Widget;

    if (!defined('__TYPECHO_ROOT_DIR__')) {
        exit;
    }

    Widget::widget('Widget_Stat')->to($stat);
?>
<div class="uk-width-1-4@m uk-visible@l">
    <div class="uk-card uk-card-small uk-card-default uk-border-rounded">
        <div class="uk-card-body uk-text-center">
            <div class="uk-width-auto uk-margin">
                <img class="uk-border-circle" width="50" height="50"
                     src="<?php echo core::is_avatar($this->options->avatar_email)?>" alt="">
            </div>
            <div class="uk-width-expand">
                <h4 class="uk-text-bold"><?php $this->author(); ?></h4>
                <p class="uk-text-meta"><?php $this->options->description(); ?></p>
            </div>
            <div class="uk-flex uk-flex-center uk-grid-small" uk-grid>
                <div><a href="" class="uk-icon-button" uk-icon="twitter"></a></div>
                <div><a href="" class="uk-icon-button" uk-icon="facebook"></a></div>
                <div><a href="" class="uk-icon-button" uk-icon="youtube"></a></div>
            </div>
            <div class="uk-flex uk-flex-center uk-grid-small uk-text-center" uk-grid>
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

        </div>

    </div>
    <div class="uk-card uk-card-small uk-card-default uk-border-rounded uk-margin-top">
        <div class="uk-height-small uk-cover-container uk-border-img">
            <img class="uk-object-cover" src="http://p5.qhimg.com/bdm/2560_1600_100/t0118bb0aeb1217fc42.jpg"
                 alt="Alt img" uk-cover>
            <div class="uk-overlay uk-overlay-primary uk-position-cover uk-flex uk-flex-bottom uk-flex-middle uk-text-center">
                <div data-uk-scrollspy="cls: uk-animation-slide-bottom-small">
                    <small>标签云</small>
                    <br>
                </div>
            </div>
        </div>
        <?php Widget::widget('Widget_Metas_Tag_Cloud','limit=30&sort=count&desc=1')->to($tags); ?>
        <div class="uk-card-body uk-text-center">
            <?php while($tags->next()): ?>

            <span style="color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" class="uk-label"><a  href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a></span>
            <?php endwhile; ?>
        </div>
    </div>

</div>
