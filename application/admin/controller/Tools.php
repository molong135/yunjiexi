<?php
namespace app\admin\controller;

use app\admin\controller\Base;
use app\common\model\WebSite;
use think\Db;
use think\facade\Cache;
use think\facade\Env;

class Tools extends Base
{

    public function index()
    {

        Cache::rm('web_site');
        $web_site = [];
        foreach (WebSite::select()->toArray() as $site) {
            $web_site[$site['site_id']] = $site;
        }
        Cache::set('web_site', $web_site);
        return $this->success('缓存更新成功！');
    }

    public function upgrade()
    {
        if (empty(config('app.authkey'))) {
            $file   = Env::get('config_path') . 'app.php';
            $config = file_get_contents($file);

            $config = preg_replace_callback('/[\'|\"]exception_handle[\'|\"](.*?)=>(.*?)\'\',/i', function ($matches) {
                return "'exception_handle'" . $matches['1'] . "=>" . $matches['2'] . "''," . PHP_EOL .
                "'authkey'" . $matches['1'] . "=>" . $matches['2'] . "'" . random(32) . "',";
            }, $config);
            file_put_contents($file, $config);
        }
        $sql = <<<EOT
CREATE TABLE IF NOT EXISTS `verify_code` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
	`uid` int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'uid',
	`email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱地址',
	`code` varchar(255) NOT NULL DEFAULT '' COMMENT '验证码代码',
	`out_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='验证码表';
EOT;
        $result = Db::execute($sql);
        return $this->success('程序升级成功');
    }
}
