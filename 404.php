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
                        <div class="uk-card-body uk-text-center">
                            <div class="uk-flex to404">
                                <div class="ghost">
                                    <!-- 身体 -->
                                    <div class="body">
                                        <!-- 脸部 -->
                                        <div class="face">
                                            <!-- 眼睛 -->
                                            <div class="eye left"></div>
                                            <div class="eye right"></div>
                                            <!-- 嘴巴 -->
                                            <div class="mouth"></div>
                                            <!-- 腮红 -->
                                            <div class="rosy left"></div>
                                            <div class="rosy right"></div>
                                        </div>
                                        <!-- 手臂 -->
                                        <div class="arm left"></div>
                                        <div class="arm right"></div>

                                        <!-- 底部 -->
                                        <div class="bottom">
                                            <!-- 脚 -->
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>

                                    </div>
                                    <!-- 阴影 -->
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <h4>你咋走丢了？</h4>
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