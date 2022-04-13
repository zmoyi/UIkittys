<?php
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
                    <div class="uk-card-body " uk-lightbox="animation: slide">
                        <?php echo core::getlbContent($this->content) ?>
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
