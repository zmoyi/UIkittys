

<div class="uk-card uk-card-default uk-border-rounded uk-margin-top">
    <div class="uk-card-body">
        <h6 class="uk-heading-line uk-text-center"><span><span id="<?php $this->cid() ?>" class="waline-comment-count"></span>条评论</span></h6>
        <div class="uk-grid-medium" uk-grid="">
            <div class="uk-width-1-1@m">
                <div id="waline"></div>
            </div>
        </div>

    </div>

</div>
<script>
    Waline({
        el: '#waline',
        serverURL: 'http://typechotheme.cn/index.php/api/',
        path:'<?php $this->cid() ?>',
        dark:'body[class="uk-light"]',
        avatar: 'retro',
        copyright: false,
        math:true,
        highlight: 'github-dark-dimmed',
        login:'disable'

    });
</script>