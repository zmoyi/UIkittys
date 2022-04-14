<?php

    use Typecho\Widget;

    if (!defined('__TYPECHO_ROOT_DIR__')) exit;
    $this->need('public/header.php');
    /**
     * 归档页面
     *
     * @package custom
     */
?>
<div class="loader-1">
    <div class="loader">
    </div>
</div>
<!--navbar-->
<?php  $this->need('public/navbar.php'); ?>
<!--navbar-end-->

<div class="uk-container">
    <div class="uk-container-expand uk-margin-top uk-grid-medium" uk-grid>
        <div class="uk-width-3-4@l">
            <div class="uk-width-1-1@m uk-text-left uk-margin-bottom">
                <div class="uk-card uk-card-default uk-border-rounded">
                    <div class="uk-card-body">
                        <?php
                           Widget::widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                            $year = 0; $mon = 0;
                            while ($archives->next()):
                                if (empty($archives->title) || $archives->title == " ") continue;
                                $year_tmp = date('Y',$archives->created);
                                $mon_tmp = date('m',$archives->created);
                                if ($year != $year_tmp && $year > 0) $output .= '</dl>';
                                if ($year != $year_tmp):
                                    $year = $year_tmp;
                                    $output .= '<h2>'. $year.'</h2> <ul class="uk-list uk-list-circle">';
                                endif;
                                $output .= '<li><time>'.date('m-d ',$archives->created).'</time><a class="uk-link-reset uk-button-text" href="'.$archives->permalink .'">'. $archives->title .'</a>';
                                if ($archives->commentsNum > 0)  $output .= ' <span uk-icon="comment"></span>'.$archives->commentsNum;
                                $output .= '</li>';
                            endwhile;
                            $output .= '</li>';
                            echo $output;
                        ?>
                    </div>
                </div>
            </div>

        </div>
        <?php  $this->need('public/rightsider.php'); ?>
    </div>
</div>





<!--navbar-->
<?php  $this->need('public/footer.php'); ?>
<!--navbar-end-->