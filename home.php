<?php
    /**
     * 自定义首页模板
     *
     * @package custom
     */
    $this->need('public/header.php');
?>

<!--navbar-->
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
                <div class="uk-card uk-card-default uk-border-rounded">
                    <div class="uk-card-media-top uk-light">
                        <div class="uk-position-relative uk-visible-toggle" tabindex="-1"
                             uk-slideshow="animation: push;autoplay: true;autoplay-interval: 3000;.uk-border-rounded">

                            <ul class="uk-slideshow-items uk-border-img">
                                <?php if ($this->fields->imgurl): ?>
                                    <li>
                                        <img src="<?php $this->fields->imgurl(); ?> " alt=""
                                             uk-cover>
                                        <div class="uk-position-center uk-position-small uk-text-center">
                                            <?php if ($this->fields->htitle&&$this->fields->subtitle): ?>
                                                <h2 uk-slideshow-parallax="x: 100,-100"><?php $this->fields->htitle(); ?></h2>
                                                <p uk-slideshow-parallax="x: 200,-200"><?php $this->fields->subtitle(); ?></p>
                                            <?php endif;?>
                                        </div>
                                    </li>
                                <?php endif;?>
                                <?php if ($this->fields->imgurl2): ?>
                                    <li>
                                        <img src="<?php $this->fields->imgurl2(); ?> " alt=""
                                             uk-cover>
                                        <div class="uk-position-center uk-position-small uk-text-center">
                                            <?php if ($this->fields->htitle&&$this->fields->subtitle): ?>
                                                <h2 uk-slideshow-parallax="x: 100,-100"><?php $this->fields->htitle(); ?></h2>
                                                <p uk-slideshow-parallax="x: 200,-200"><?php $this->fields->subtitle(); ?></p>
                                            <?php endif;?>
                                        </div>
                                    </li>
                                <?php endif;?>
                                <?php if ($this->fields->imgurl3): ?>
                                    <li>
                                        <img src="<?php $this->fields->imgurl3(); ?> " alt=""
                                             uk-cover>
                                        <div class="uk-position-center uk-position-small uk-text-center">
                                            <?php if ($this->fields->htitle&&$this->fields->subtitle): ?>
                                                <h2 uk-slideshow-parallax="x: 100,-100"><?php $this->fields->htitle(); ?></h2>
                                                <p uk-slideshow-parallax="x: 200,-200"><?php $this->fields->subtitle(); ?></p>
                                            <?php endif;?>
                                        </div>
                                    </li>
                                <?php endif;?>
                            </ul>

                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                               uk-icon="chevron-left" uk-slideshow-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                               uk-icon="chevron-right" uk-slideshow-item="next"></a>

                        </div>

                    </div>
                    <div class="uk-card-body">
                        <p>
                            <?php $this->content(); ?>
                        </p>

                    </div>
                </div>
            </div>
            <?php  $this->need('public/rightsider.php'); ?>
        </div>
    </div>

    <div class="uk-container">
        <div class="uk-container-expand uk-margin-top" uk-grid="">
            <div class="uk-width-3-4@l">
                <div class="uk-card uk-card-default uk-border-rounded">
                    <div class="uk-height-large uk-cover-container uk-border-rounded">
                        <img src="https://picsum.photos/1300/500/?random" alt="Alt img" uk-cover>
                        <div class="uk-overlay uk-overlay-primary uk-position-cover uk-flex uk-flex-center uk-flex-middle uk-text-center">
                            <div data-uk-scrollspy="cls: uk-animation-slide-bottom-small">
                                <small>精选 · 文章</small>
                                <?php if ($this->fields->articletitle&&$this->fields->articlesubtitle): ?>
                                    <h3 class="uk-margin-top uk-margin-small-bottom uk-margin-remove-adjacent"><?php $this->fields->articletitle(); ?> </h3>
                                    <p><?php $this->fields->articlesubtitle(); ?> </p>
                                    <?php if ($this->fields->btitle&&$this->fields->burl): ?>
                                        <a href="<?php $this->fields->burl(); ?>" class="uk-button uk-button-default uk-margin-top"><?php $this->fields->btitle(); ?></a>
                                    <?php endif;?>
                                <?php endif;?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!--footer-->
<?php  $this->need('public/footer.php'); ?>
<!--footer-end-->
