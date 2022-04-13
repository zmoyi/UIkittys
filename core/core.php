<?php

    use Typecho\Cookie;
    use Typecho\Db;
    use Typecho\Widget;
    use Utils\Helper;

    if (!defined('__TYPECHO_ROOT_DIR__')) {
        exit;
    }

    /*
     * UIkitty核心
     *
     * */

    class core
    {
        /**
         * 主题版本号
         * @var string
         */
        public static $version = "0.1_beta";

        /**
         * 主题配置
         *
         * @var array
         */
        public static $config = [
            'light_logo' => '',
            'dark_logo' => '',
            'background' => '',
            'favicon' => '',
            'defaultArticlePath' => '',

        ];

        public static $advanceConfig = [];

        public static $themeUrl = '';


        /**
         * 初始化
         *
         * @return void
         */
        public static function init()
        {
            //读取配置内容
            $options = Helper::options();
            $keys = array_keys(self::$config);
            foreach ($keys as $key) {
                if (!empty($options->{$key})) {
                    self::$config[$key] = $options->{$key};
                }
            }
            if (self::$config['advanceSetting'] != '') {
                $advanceConfig = explode("\n", self::$config['advanceSetting']);
                foreach ($advanceConfig as $item) {
                    if ($item != '') {
                        self::$advanceConfig[explode("=", $item)[0]] = explode("=", $item)[1];
                    }
                }
            }
            self::$themeUrl = Helper::options()->themeUrl.'/';
        }

        /**
         * 获取背景信息
         * regex source: https://daringfireball.net/2010/07/improved_regex_for_matching_urls
         *
         * @return string
         */
        public static function getBackground()
        {
            $background = "background";
            if (self::$config['background'] == '') {
                return $background.": #fff;";
            }

            $regex = '@(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))@';
            if (preg_match($regex, self::$config['background']) == 0) {
                return ($background.": ".self::$config['background'].";");
            }
            return $background."-image: url(".self::$config['background'].");";
        }

        /**
         * 获取语义化修改时间
         *
         * @param  string  $modified
         * @param  string  $created
         *
         * @return string
         */
        public static function getModifiedDate($modified, $created)
        {
            return $modified == $created ? "还没有修改过" : "最后修改于".self::getSemanticDate($modified);
        }

        /**
         * 获取语义化日期
         *
         * @param  string  $date
         *
         * @return string
         */
        public static function getSemanticDate($date)
        {
            $now = time();
            $sub = $now - $date;

            if ($sub < 60) {
                return $sub."秒前";
            } else {
                if ($sub < 3600) {
                    return (int) ($sub / 60)."分钟前";
                } else {
                    if ($sub < 86400) {
                        return (int) ($sub / 3600)."小时前";
                    } else {
                        return (int) ($sub / 86400)."天前";
                    }
                }
            }
        }

        /**
         * 获取头部文章路径
         *
         * @return String
         */
        public static function getArticlePath()
        {
            $path = Helper::options()->siteUrl;
            if (substr($path, -1) == '/') {
                $path = $path.self::$config["defaultArticlePath"];
            } else {
                $path = $path.'/'.self::$config["defaultArticlePath"];
            }
            return $path;
        }

        /**
         * 获取文章阅读数
         *
         *
         */
        public static function getPostView($archive)
        {
            $cid = $archive->cid;
            $db = Db::get();
            $prefix = $db->getPrefix();
            if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
                $db->query('ALTER TABLE'.$prefix.'contents ADD views INT(10) DEFAULT 0;');
                echo 0;
                return;
            }
            $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
            if ($archive->is('single')) {
                $views = Cookie::get('extend_contents_views');
                if (empty($views)) {
                    $views = array();
                } else {
                    $views = explode(',', $views);
                }
                if (!in_array($cid, $views)) {
                    $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?',
                        $cid));
                    array_push($views, $cid);
                    $views = implode(',', $views);
                    Cookie::set('extend_contents_views', $views); //记录查看cookie
                }
            }
            return $row['views'];
        }

        /**
         * 灯箱效果
         *
         */
        public static function getlbContent($content)
        {
            $img = '/<img src=\"([^\"]*)\" alt=\"([^\"]*)\" title=\"([^\"]*)\">/i';
            $rep = '<a data-type="image" data-caption="\\3" href="\\1" title="\\3"><img src="\\1" alt="\\2" title="\\3"></a>';
            return preg_replace($img, $rep, $content);
        }

        /**
         * 调用热门文章列表
         *
         */
        public static function getHotComments($limit = 10)
        {
            $db = Db::get();
            $result = $db->fetchAll($db->select()->from('table.contents')
                ->where('status = ?', 'publish')
                ->where('type = ?', 'post')
                ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
                ->limit($limit)
                ->order('commentsNum', Db::SORT_DESC)
            );
            if ($result) {
                foreach ($result as $val) {
                    $val = Widget::widget('Widget_Abstract_Contents')->push($val);
                    $post_title = htmlspecialchars($val['title']);
                    $permalink = $val['permalink'];
                    echo '<li><a href="'.$permalink.'" title="'.$post_title.'" target="_blank">'.$post_title.'</a></li>';
                }
            }
        }


        /**
         * 显示上一篇
         *
         * 如果没有下一篇,返回null
         */
        public static function thePrevCid($widget, $default = null)
        {
            $db = Db::get();
            $sql = $db->select()->from('table.contents')
                ->where('table.contents.created < ?', $widget->created)
                ->where('table.contents.status = ?', 'publish')
                ->where('table.contents.type = ?', $widget->type)
                ->where('table.contents.password IS NULL')
                ->order('table.contents.created', Db::SORT_DESC)
                ->limit(1);
            $content = $db->fetchRow($sql);

            if ($content) {
                return $content["cid"];
            } else {
                return $default;
            }
        }

        /**
         * 获取下一篇文章mid
         *
         * 如果没有下一篇,返回null
         */
        public static function theNextCid($widget, $default = null)
        {
            $db = Db::get();
            $sql = $db->select()->from('table.contents')
                ->where('table.contents.created > ?', $widget->created)
                ->where('table.contents.status = ?', 'publish')
                ->where('table.contents.type = ?', $widget->type)
                ->where('table.contents.password IS NULL')
                ->order('table.contents.created', Db::SORT_ASC)
                ->limit(1);
            $content = $db->fetchRow($sql);

            if ($content) {
                return $content["cid"];
            } else {
                return $default;
            }
        }

        public static function getimgs($widget)
        {
            // 当文章无图片时的随机缩略图

            $random = 'https://picsum.photos/2560/1600?random'; // 随机缩略图路径

            $attach = $widget->attachments(1)->attachment;
            $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';

            //如果有自定义缩略图
            if ($widget->fields->imgurl) {
                return $widget->fields->imgurl;
            } else {
                if (preg_match_all($pattern, $widget->content, $thumbUrl) && strlen($thumbUrl[1][0]) > 7) {
                    return $thumbUrl[1][0];
                } else {
                    if ($attach->isImage) {
                        return $attach->url;
                    } else {
                        return $random;
                    }
                }
            }
        }


        /**
         *
         * 头像判断
         */
        public static function is_avatar($data): string
        {

            $reg = '/^([0-9]{5,11})@qq.com$/';
            if (preg_match($reg, $data)) {
                return 'https://q1.qlogo.cn/g?b=qq&nk='.str_replace('@qq.com', '', $data).'&s=100';
            } else {
                return 'https://seccdn.libravatar.org/avatar/'.md5($data).'?d=retro';
            }


        }


    }