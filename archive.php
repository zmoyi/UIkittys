<?php
    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('public/header.php');
?>
<div class="loader-1">
    <div class="loader">
    </div>
</div>
<!--navbar-->
<?php  $this->need('public/navbar.php'); ?>
<!--navbar-end-->

<div class="pjax">
    <div class="uk-container">
        <div class="uk-container-expand uk-margin-top uk-grid-medium" uk-grid>
            <div class="uk-width-3-4@l">
                <div class="uk-width-1-1@m uk-text-left uk-margin-bottom">
                    <div class="uk-card uk-card-default uk-border-rounded">
                        <div class="uk-card-body">
                            <h4><?php $this->archiveTitle(array(
                                    'category' => _t('分类 %s 下的文章'),
                                    'search' => _t('包含关键字 %s 的文章'),
                                    'tag' => _t('标签 %s 下的文章'),
                                    'author' => _t('%s 发布的文章')
                                ), '', ''); ?></h4>
                        </div>
                    </div>
                </div>
                <?php if ($this->have()): ?>
                    <div id="container" class="uk-grid-medium" uk-grid="">
                        <?php $this->need('public/article.php'); ?>
                        <div id="navigation" class="uk-width-1-1@m uk-text-center uk-margin-top">
                            <div class="uk-card uk-card-default uk-border-rounded">
                                <div class="uk-card-body">
                                    <div class="status">
                                        <div class="loaders help"></div>
                                        <div class="no-more" style="display: none">No more pages</div>
                                    </div>
                                    <div class="pager">
                                        <?php $this->pageLink('下一页','next'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="uk-width-1-1@m uk-text-left uk-margin-bottom">
                        <div class="uk-card uk-card-default uk-border-rounded">
                            <div class="uk-card-body">
                                <h4><?php _e('没有找到内容'); ?></h4>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <?php  $this->need('public/rightsider.php'); ?>
        </div>
    </div>
</div>






<!--navbar-->
<?php  $this->need('public/footer.php'); ?>
<!--navbar-end-->
