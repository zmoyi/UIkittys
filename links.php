<?php
    /**
     * 友情链接
     *
     * @package custom
     */
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
                <div class="uk-card uk-card-default uk-border-rounded">
                    <div class="uk-height-small uk-cover-container uk-border-img">
                        <?php if ($this->fields->imgurl): ?>
                            <img class="uk-object-cover" src="<?php $this->fields->imgurl(); ?>"
                                 alt="Alt img" uk-cover>
                        <?php endif;?>
                        <div class="uk-overlay uk-overlay-primary uk-position-cover uk-flex uk-flex-bottom uk-flex-middle">
                            <div data-uk-scrollspy="cls: uk-animation-slide-bottom-small">
                                <h3><?php $this->title() ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-grid uk-grid-medium"uk-grid="">
                            <?php if (isset($this->options->plugins['activated']['Links'])) : ?>
                                <?php
                                Links_Plugin::output('<div class="uk-width-1-3@m">
                            <a target="_blank" class="uk-link-reset" href="{url}">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                    <img class="uk-border-circle" width="50" height="50" src="{image}">
                                </div>
                                <div class="uk-width-expand">
                                    <h5 class=" uk-margin-remove-bottom">{name}</h5>
                                    <p class="uk-text-meta uk-margin-remove-top">{sort}</p>
                                </div>
                            </div>
                            </a>
                        </div>', 0);
                                ?>
                            <?php endif; ?>


                        </div>


                    </div>
                </div>

            </div>
            <?php  $this->need('public/rightsider.php'); ?>
        </div>
    </div>
</div>




<!--navbar-->
<?php  $this->need('public/footer.php'); ?>
<!--navbar-end-->
