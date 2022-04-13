<?php

    use Typecho\Db;
    use Typecho\Widget\Helper\Form\Element\Radio;
    use Typecho\Widget\Helper\Form\Element\Text;
    use Typecho\Widget\Helper\Form\Element\Textarea;
    use Utils\Helper;

    if (!defined('__TYPECHO_ROOT_DIR__')) {
        exit;
    }
    require_once("core/core.php");
    core::init();
    function themeConfig($form)
    {
        $LogoDarkUrl = new Text('LogoDarkUrl', null, null, _t('站点 黑色LOGO 地址'),
            _t('在这里填入一个图片 URL 地址, 是黑色LOGO'));
        $form->addInput($LogoDarkUrl);
        $LogoLightUrl = new Text('LogoLightUrl', null, null, _t('站点 白色LOGO 地址'),
            _t('在这里填入一个图片 URL 地址, 是白色LOGO'));
        $form->addInput($LogoLightUrl);
        $favicon = new Text('favicon', null, null, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
        $form->addInput($favicon);
        $buildYear = new Text('buildYear', null, date('Y'), _t('建站年份'), _t('什么时候开始建站的呀'));
        $form->addInput($buildYear);
        $icp = new Text('icp', null, null, _t('ICP备案号'), _t('没有可以不填哟'));
        $form->addInput($icp);
        $icpUrl = new Text('icpUrl', null, 'https://beian.miit.gov.cn', _t('备案号指向链接'), _t('默认指向工信部'));
        $form->addInput($icpUrl);
        $background = new Text('background', null, null, _t('背景图片'), _t('可填颜色代码或者图片url'));
        $form->addInput($background);
        $avatar_email = new Text('avatar_email', null, null, _t('头像邮箱'), _t('邮箱地址'));
        $form->addInput($avatar_email);
        $githubUrl = new Text('githubUrl', null, null, _t('github个人地址'), _t('github个人地址'));
        $form->addInput($githubUrl);
        $telegram = new Text('telegram', null, null, _t('telegram频道地址'), _t('telegram频道地址'));
        $form->addInput($telegram);
        $tiktok = new Text('tiktok', null, null, _t('抖音地址'), _t('抖音地址'));
        $form->addInput($tiktok);
        $qcode = new Radio('qcode', array(
            '1' => _t('开启'),
            '0' => _t('关闭')
        ), '0', _t('是否开启底部二维码'), _t('默认关闭'));
        $form->addInput($qcode);
        $qcodeurl1 = new Text('qcodeurl1', null, null, _t('第一张二维码'), _t('第一张二维码'));
        $form->addInput($qcodeurl1);
        $qcodeurl2 = new Text('qcodeurl2', null, null, _t('第二张二维码'), _t('第一张二维码'));
        $form->addInput($qcodeurl2);
        $enableIndexPage = new Radio('enableIndexPage', array(
            '1' => _t('使用'),
            '0' => _t('不使用')
        ), '0', _t('是否使用独立页面作首页'), _t('默认不使用'));
        $defaultArticlePath = new Text('defaultArticlePath', null, 'index.php/blog', _t('默认头部文章路径'), _t('前面不需要加/'));
        $form->addInput($defaultArticlePath);
        $form->addInput($enableIndexPage);
        $enableKatex = new Radio('enableKatex', array(
            '1' => _t('开启'),
            '0' => _t('关闭')
        ), '0', _t('是否开启MathJax数学公式解析'), _t('默认关闭'));
        $form->addInput($enableKatex);

        $customCSS = new Textarea('customCSS', null, null, _t('自定义CSS'), _t(''));
        $form->addInput($customCSS);
        $customHeaderJS = new Textarea('customHeaderJS', null, null, _t('自定义头部JS'), _t('head标签中'));
        $form->addInput($customHeaderJS);

        $customFooterJS = new Textarea('customFooterJS', null, null, _t('自定义底部JS'), _t('body结束前'));
        $form->addInput($customFooterJS);


        $str1 = explode('/themes/', Helper::options()->themeUrl);
        $str2 = explode('/', $str1[1]);
        $name = $str2[0];//获取到模板文件夹名字也就是模板在数据库中的名字
        $db = Db::get();
        $sjdq = $db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:'.$name));
        $ysj = $sjdq['value'];
        if (isset($_POST['type'])) {
            if ($_POST["type"] == "备份模板设置数据") {
                if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:'.$name.'bf'))) {
                    $update = $db->update('table.options')->rows(array('value' => $ysj))->where('name = ?',
                        'theme:'.$name.'bf');
                    $updateRows = $db->query($update);
                    echo '<div class="tongzhi col-mb-12 home">备份已更新，请等待自动刷新！如果等不到请点击';
                    ?>
                    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
                    <script ">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
                    <?php
                } else {
                    if ($ysj) {
                        $insert = $db->insert('table.options')
                            ->rows(array('name' => 'theme:'.$name.'bf', 'user' => '0', 'value' => $ysj));
                        $insertId = $db->query($insert);
                        echo '<div class="tongzhi col-mb-12 home">备份完成，请等待自动刷新！如果等不到请点击';
                        ?>
                        <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
                        <script >window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
                        <?php
                    }
                }
            }
            if ($_POST["type"] == "还原模板设置数据") {
                if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:'.$name.'bf'))) {
                    $sjdub = $db->fetchRow($db->select()->from('table.options')->where('name = ?',
                        'theme:'.$name.'bf'));
                    $bsj = $sjdub['value'];
                    $update = $db->update('table.options')->rows(array('value' => $bsj))->where('name = ?',
                        'theme:'.$name);
                    $updateRows = $db->query($update);
                    echo '<div class="tongzhi col-mb-12 home">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
                    ?>
                    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
                    <script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
                    <?php
                } else {
                    echo '<div class="tongzhi col-mb-12 home">没有模板备份数据，恢复不了哦！</div>';
                }
            }
            if ($_POST["type"] == "删除备份数据") {
                if ($db->fetchRow($db->select()->from('table.options')->where('name = ?', 'theme:'.$name.'bf'))) {
                    $delete = $db->delete('table.options')->where('name = ?', 'theme:'.$name.'bf');
                    $deletedRows = $db->query($delete);
                    echo '<div class="tongzhi col-mb-12 home">删除成功，请等待自动刷新，如果等不到请点击';
                    ?>
                    <a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
                    <script>window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
                    <?php
                } else {
                    echo '<div class="tongzhi col-mb-12 home">不用删了！备份不存在！！！</div>';
                }
            }
        }
        echo '<form class="protected home col-mb-12" action="?'.$name.'bf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板设置数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form><br>';
    }

    function themeFields($layout)
    {
        $imgurl = new Textarea('imgurl', null, null, _t('文章头图地址1'),
            _t('在这里填入一个图片URL地址'));
        $layout->addItem($imgurl);
        $imgurl2 = new Textarea('imgurl2', null, null, _t('文章头图地址2'),
            _t('在这里填入一个图片URL地址'));
        $layout->addItem($imgurl2);
        $imgurl3 = new Textarea('imgurl3', null, null, _t('文章头图地址3'),
            _t('在这里填入一个图片URL地址'));
        $layout->addItem($imgurl3);


    }

