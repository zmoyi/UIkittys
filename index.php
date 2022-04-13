<?php
    /**
     * 基于UIkit-css框架的TypeCho Theme
     *
     * @package Uikitty
     * @author 刘铭熙
     * @version 1.0.0
     * @link https://blog.x-word.cn
     */

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
                    <div id="container" class="uk-grid-medium" uk-grid="">
                        <?php $this->need('public/article.php'); ?>
                    </div>
                    <div class="uk-width-1-1@m uk-text-center uk-margin-top">
                        <div class="uk-card uk-card-default uk-border-rounded">
                            <div class="uk-card-body ">
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
                <?php $this->need('public/rightsider.php'); ?>
            </div>
        </div>
    </div>



<!--navbar-->
<?php  $this->need('public/footer.php'); ?>
<!--navbar-end-->