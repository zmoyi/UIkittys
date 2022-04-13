<?php

    use Typecho\Widget;

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
                        <div class="uk-card-media-top uk-light">
                            <div class="uk-position-relative uk-visible-toggle uk-light"
                                 uk-slideshow="ratio: 7:3; min-height: 330;max-height: 550">
                                <ul class="uk-slideshow-items uk-border-img">
                                    <?php if (empty($this->fields->imgurl)||empty($this->fields->imgurl2)||empty($this->fields->imgurl3)): ?>
                                        <li>
                                            <img src="https://picsum.photos/2560/1600?random"
                                                 alt="" uk-cover>
                                            <div class="uk-container uk-container-small uk-position-relative uk-height-1-1">
                                                <div class="slide-caption">
                                                    <?php $this->title() ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif;?>
                                    <?php if ($this->fields->imgurl): ?>
                                        <li>
                                            <img src="<?php $this->fields->imgurl() ?>"
                                                 alt="" uk-cover>
                                            <div class="uk-container uk-container-small uk-position-relative uk-height-1-1">
                                                <div class="slide-caption">
                                                    <?php $this->title() ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif;?>
                                    <?php if ($this->fields->imgurl2): ?>
                                        <li>
                                            <img src="<?php $this->fields->imgurl2() ?>"
                                                 alt="" uk-cover>
                                            <div class="uk-container uk-container-small uk-position-relative uk-height-1-1">
                                                <div class="slide-caption">
                                                    <?php $this->title() ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif;?>
                                    <?php if ($this->fields->imgurl3): ?>
                                        <li>
                                            <img src="<?php $this->fields->imgurl3() ?>"
                                                 alt="" uk-cover>

                                            <div class="uk-container uk-container-small uk-position-relative uk-height-1-1">
                                                <div class="slide-caption">
                                                    <?php $this->title() ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif;?>
                                </ul>

                                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                   uk-slidenav-previous uk-slideshow-item="previous"></a>
                                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                                   uk-slideshow-item="next"></a>

                            </div>
                        </div>
                        <div class="uk-card-body" >

                            <p class="uk-article-meta">由 <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> <?php echo core::getSemanticDate($this->created); ?>发布于 <a
                                        href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></p>
                            <div class="uk-container-expand posts" uk-lightbox="animation:fade">
                                <?php echo core::getlbContent($this->content) ?>
                            </div>

                        </div>

                    </div>
                    <div class="uk-margin-top">
                        <div class="uk-grid-medium" uk-grid="">
                            <?php $prevId = core::thePrevCid($this);$nextId= core::theNextCid($this);?>
                            <?php if(!empty($prevId)) : ?>
                                <?php Widget::widget('Widget_Archive@recommend'.$prevId, 'pageSize=1&type=post', 'cid='.$prevId)->to($prev); ?>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline uk-border-rounded">
                                        <img class="uk-border-rounded"
                                             src="<?php echo core::getimgs($prev)?>" width="1800"
                                             height="1200" alt="">
                                        <div id="page-left"
                                             class="uk-overlay uk-overlay-primary uk-position-bottom border-overlay uk-text-left">
                                            <a class="uk-text-decoration-none uk-button-text" href="<?php $prev->permalink();?>">上一篇</a>
                                            <br>
                                            <small><?php $prev->title();?></small>
                                        </div>
                                    </div>

                                </div>
                            <?php else: ?>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <img class="uk-border-rounded"
                                             src="http://p2.qhimg.com/bdm/2560_1600_100/t019cc14b29a22750b2.jpg" width="1800"
                                             height="1200" alt="">
                                        <div id="page-right"
                                             class="uk-overlay uk-overlay-primary uk-position-bottom border-overlay uk-text-left">
                                            <a class="uk-text-decoration-none uk-button-text" href="">没有上一篇</a>
                                            <br>
                                            <small>该停啦</small>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>
                            <?php if(!empty($nextId)) : ?>
                                <?php Widget::widget('Widget_Archive@recommend'.$nextId, 'pageSize=1&type=post', 'cid='.$nextId)->to($next);?>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <img class="uk-border-rounded"
                                             src="<?php echo core::getimgs($next)?>" width="1800"
                                             height="1200" alt="">
                                        <div id="page-right"
                                             class="uk-overlay uk-overlay-primary uk-position-bottom border-overlay uk-text-right">
                                            <a class="uk-text-decoration-none uk-button-text" href="<?php $next->permalink();?>">下一篇</a>
                                            <br>
                                            <small><?php $next->title();?></small>
                                        </div>
                                    </div>

                                </div>
                            <?php else: ?>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-inline">
                                        <img class="uk-border-rounded"
                                             src="http://p2.qhimg.com/bdm/2560_1600_100/t019cc14b29a22750b2.jpg" width="1800"
                                             height="1200" alt="">
                                        <div id="page-right"
                                             class="uk-overlay uk-overlay-primary uk-position-bottom border-overlay uk-text-right">
                                            <a class="uk-text-decoration-none uk-button-text" href="">没有下一页</a>
                                            <br>
                                            <small>住手！！！</small>
                                        </div>
                                    </div>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php  $this->need('public/comments.php'); ?>
                </div>
                <?php  $this->need('public/rightsider.php'); ?>
            </div>
        </div>
    </div>


<?php  $this->need('public/footer.php'); ?>