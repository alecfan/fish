<?php
// ===================分词系统常量定义===================

// Constant Define
define('XDB_VERSION', 34); // 0x01 ~ 0xff
define('XDB_TAGNAME', 'XDB'); // First bytes
define('XDB_MAXKLEN', 0xf0);
// maxklen: < 255

/**
 * defines for ruleset
 */
define('PSCWS4_RULE_MAX', 31); // just 31, PHP do not support unsigined Int
define('PSCWS4_RULE_SPECIAL', 0x80000000);
define('PSCWS4_RULE_NOSTATS', 0x40000000);
define('PSCWS4_ZRULE_NONE', 0x00);
define('PSCWS4_ZRULE_PREFIX', 0x01);
define('PSCWS4_ZRULE_SUFFIX', 0x02);
define('PSCWS4_ZRULE_INCLUDE', 0x04); // with include
define('PSCWS4_ZRULE_EXCLUDE', 0x08); // with exclude
define('PSCWS4_ZRULE_RANGE', 0x10); // with znum range

/**
 * defines for mode of scws <= 0x800
 */
define('PSCWS4_IGN_SYMBOL', 0x01);
define('PSCWS4_DEBUG', 0x02);
define('PSCWS4_DUALITY', 0x04);

/**
 * multi segment policy >= 0x1000
 */
define('PSCWS4_MULTI_NONE', 0x0000); // nothing
define('PSCWS4_MULTI_SHORT', 0x1000); // split long words to short words from left to right
define('PSCWS4_MULTI_DUALITY', 0x2000); // split every long words(3 chars?) to two chars
define('PSCWS4_MULTI_ZMAIN', 0x4000); // split to main single chinese char atr = j|a|n?|v?
define('PSCWS4_MULTI_ZALL', 0x8000); // attr = ** , all split to single chars
define('PSCWS4_MULTI_MASK', 0xf000); // mask check for multi set
define('PSCWS4_ZIS_USED', 0x8000000);

/**
 * single bytes segment flag (纯单字节字符)
 */
define('PSCWS4_PFLAG_WITH_MB', 0x01);
define('PSCWS4_PFLAG_ALNUM', 0x02);
define('PSCWS4_PFLAG_VALID', 0x04);
define('PSCWS4_PFLAG_DIGIT', 0x08);
define('PSCWS4_PFLAG_ADDSYM', 0x10);

/**
 * constant var define
 */
define('PSCWS4_WORD_FULL', 0x01); // 多字: 整词
define('PSCWS4_WORD_PART', 0x02); // 多字: 前词段
define('PSCWS4_WORD_USED', 0x04); // 多字: 已使用
define('PSCWS4_WORD_RULE', 0x08); // 多字: 自动识别的

define('PSCWS4_ZFLAG_PUT', 0x02); // 单字: 已使用
define('PSCWS4_ZFLAG_N2', 0x04); // 单字: 双字名词头
define('PSCWS4_ZFLAG_NR2', 0x08); // 单字: 词头且为双字人名
define('PSCWS4_ZFLAG_WHEAD', 0x10); // 单字: 词头
define('PSCWS4_ZFLAG_WPART', 0x20); // 单字: 词尾或词中
define('PSCWS4_ZFLAG_ENGLISH', 0x40); // 单字: 夹在中间的英文
define('PSCWS4_ZFLAG_SYMBOL', 0x80); // 单字: 符号系列

define('PSCWS4_MAX_EWLEN', 16);
define('PSCWS4_MAX_ZLEN', 128);

// =========================分词系统常量定义=================

date_default_timezone_set("PRC");

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package Laravel
 * @author Taylor Otwell <taylorotwell@gmail.com>
 */

/*
 * |--------------------------------------------------------------------------
 * | Register The Auto Loader
 * |--------------------------------------------------------------------------
 * |
 * | Composer provides a convenient, automatically generated class loader for
 * | our application. We just need to utilize it! We'll simply require it
 * | into the script here so that we don't have to worry about manual
 * | loading any of our classes later on. It feels nice to relax.
 * |
 */

require __DIR__ . '/../bootstrap/autoload.php';

/*
 * |--------------------------------------------------------------------------
 * | Turn On The Lights
 * |--------------------------------------------------------------------------
 * |
 * | We need to illuminate PHP development, so let us turn on the lights.
 * | This bootstraps the framework and gets it ready for use, then it
 * | will load up this application so that we can run it and send
 * | the responses back to the browser and delight our users.
 * |
 */

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
 * |--------------------------------------------------------------------------
 * | Run The Application
 * |--------------------------------------------------------------------------
 * |
 * | Once we have the application, we can handle the incoming request
 * | through the kernel, and send the associated response back to
 * | the client's browser allowing them to enjoy the creative
 * | and wonderful application we have prepared for them.
 * |
 */

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle($request = Illuminate\Http\Request::capture());

$response->send();

$kernel->terminate($request, $response);
