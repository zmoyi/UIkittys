<?php while ($this->next()): ?>
    <div id="post" class="uk-width-1-1@m">
        <div class="uk-card uk-card-default  uk-margin uk-border-rounded">
            <div class="uk-card-body">
                <article class="uk-section uk-section-small uk-padding-remove-top">
                    <header>
                        <h2 class="uk-margin-remove-adjacent uk-text-bold uk-margin-small-bottom"><a
                                    title="<?php $this->permalink() ?>" class="uk-link-reset"
                                    href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                        <p class="uk-article-meta">
                            <?php echo core::getSemanticDate($this->created); ?> ·
                            <a href="<?php $this->author->permalink(); ?>"
                                    rel="author"><?php $this->author(); ?></a>
                        </p>
                    </header>
                    <div>
                        <?php if ($this->fields->imgurl): ?>
                            <img data-src="<?php $this->fields->imgurl(); ?>" width="800" height="300" alt="Alt text"
                                 class="uk-border-rounded" data-uk-img>
                        <?php endif; ?>
                    </div>
                    <p><?php $this->excerpt(100, '...'); ?></p>
                    <a href="<?php $this->permalink() ?>" title="Read More"
                       class="uk-button uk-button-default uk-button-small">阅读更多</a>

                </article>
            </div>

        </div>
    </div>
<?php endwhile; ?>