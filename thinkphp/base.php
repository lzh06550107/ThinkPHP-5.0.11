<?php
/**
 * 定义框架基本常量和加载类加载器
 */

define('THINK_VERSION', '5.0.11'); // 定义框架版本
define('THINK_START_TIME', microtime(true)); // 定义请求开始时间
define('THINK_START_MEM', memory_get_usage()); // 定义请求分配的内存
define('EXT', '.php'); // 定义脚本扩展名
define('DS', DIRECTORY_SEPARATOR); // 定义平台的目录分隔符
defined('THINK_PATH') or define('THINK_PATH', __DIR__ . DS); // 定义THINK_PATH路径为当前文件目录
define('LIB_PATH', THINK_PATH . 'library' . DS); // 定义框架库的路径
define('CORE_PATH', LIB_PATH . 'think' . DS); // 定义框架核心库的路径
define('TRAIT_PATH', LIB_PATH . 'traits' . DS); // 定义框架traits路径
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS); // 定义应用所在目录路径
defined('ROOT_PATH') or define('ROOT_PATH', dirname(realpath(APP_PATH)) . DS); // 定义项目根路径
defined('EXTEND_PATH') or define('EXTEND_PATH', ROOT_PATH . 'extend' . DS); // 定义项目扩展路径
defined('VENDOR_PATH') or define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS); // 定义项目扩展包路径
defined('RUNTIME_PATH') or define('RUNTIME_PATH', ROOT_PATH . 'runtime' . DS); // 定义项目运行时路径
defined('LOG_PATH') or define('LOG_PATH', RUNTIME_PATH . 'log' . DS); // 定义日志路径
defined('CACHE_PATH') or define('CACHE_PATH', RUNTIME_PATH . 'cache' . DS); // 定义缓存路径
defined('TEMP_PATH') or define('TEMP_PATH', RUNTIME_PATH . 'temp' . DS); // 定义临时文件路径
defined('CONF_PATH') or define('CONF_PATH', APP_PATH); // 配置文件目录
defined('CONF_EXT') or define('CONF_EXT', EXT); // 配置文件后缀
defined('ENV_PREFIX') or define('ENV_PREFIX', 'PHP_'); // 系统中环境变量的前缀

// 环境常量
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
define('IS_WIN', strpos(PHP_OS, 'WIN') !== false);

// 载入Loader类
require CORE_PATH . 'Loader.php';

// 加载环境变量配置文件
if (is_file(ROOT_PATH . '.env')) {
    $env = parse_ini_file(ROOT_PATH . '.env', true);
    foreach ($env as $key => $val) {
        $name = ENV_PREFIX . strtoupper($key); // 添加环境变量前缀
        if (is_array($val)) {
            foreach ($val as $k => $v) {
                $item = $name . '_' . strtoupper($k);
                putenv("$item=$v");
            }
        } else {
            putenv("$name=$val");
        }
    }
}

// 注册自动加载
\think\Loader::register();

// 注册错误和异常处理机制
\think\Error::register();

// 加载惯例配置文件(这里是默认配置，后面可以被用户配置覆盖)
\think\Config::set(include THINK_PATH . 'convention' . EXT);
