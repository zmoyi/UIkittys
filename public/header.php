<?php
    if (!defined('__TYPECHO_ROOT_DIR__')) {
        exit;
    }
?>
<!doctype html>
<html lang="zh">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php $this->options->favicon(); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/uikit/css/uikit.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
    <script src="//cdn.jsdelivr.net/npm/@waline/client/dist/Waline.min.js"></script>
    <script type="text/x-mathjax-config">
        MathJax.Hub.Config({
    extensions: ["tex2jax.js"],
    jax: ["input/TeX", "output/HTML-CSS"],
    tex2jax: {
      inlineMath:  [ ["$", "$"],  ["\(","\)"] ],
      displayMath: [ ["$$","$$"], ["\[","\]"] ],
      processEscapes: true
    },
    "HTML-CSS": { availableFonts: ["TeX"] }
  });

    </script>
    <script type="text/javascript" id="MathJax-script" async
            src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
    </script>
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php $this->header(); ?>
    <style>
        /* 设置自定义背景[颜色/图片] */
        html::before {
        <?php echo core::getBackground(); ?>
        }

        <?php $this->options->customCSS(); ?>
    </style>
</head>
<body id="theme" class="uk-light">
