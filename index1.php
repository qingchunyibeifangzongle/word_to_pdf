<?php
/**
 * Created by PhpStorm.
 * User: yuepeng
 * Date: 2018/11/20
 * Time: 下午5:33
 */


################################################

$doc = '/Users/yuepeng/Desktop/开放平台额度扩展需求申请函.docx';
$pdf = '/Users/yuepeng/Desktop/开放平台额度扩展需求申请函1.pdf';
//        export LANG=en_US.UTF-8;/usr/bin/java -jar /data/wwwroot/PDFconvert/jodconverter-2.2.2/lib/jodconverter-cli-2.2.2.jar {word_file} {pdf_file}

$size = filesize($doc);
$returnSize = trans_byte($size);
echo $returnSize;

//第一种
/*$set_charset = 'export LANG=en_US.UTF-8;';
$command = "java -jar ~/Downloads/jodconverter-2.2.2/lib/jodconverter-cli-2.2.2.jar {$doc}   {$pdf}";
$t1 = microtime(true);

//exec 参数说明
//  command 执行命令行
//  output  执行的结果
//  status  执行的状态
exec($set_charset . $command, $output, $return_var);

var_dump($set_charset . $command);
var_dump($output);
var_dump($return_var);*/



//第二种
$command = "/Applications/calibre.app/Contents/calibre-debug.app/Contents/MacOS/ebook-convert {$doc}   {$pdf}";
$t1 = microtime(true);

//exec 参数说明
//  command 执行命令行
//  output  执行的结果
//  status  执行的状态
exec( $command, $output, $return_var);

var_dump($command);
var_dump($output);
var_dump($return_var);



$t2 = microtime(true);
echo '耗时'.round($t2-$t1,3).'秒<br>';
echo 'Now memory_get_usage: ' . memory_get_usage() . '<br />';



function trans_byte($byte)

{

    $KB = 1024;

    $MB = 1024 * $KB;

    $GB = 1024 * $MB;

    $TB = 1024 * $GB;

    if ($byte < $KB) {

        return $byte . "B";

    } elseif ($byte < $MB) {

        return round($byte / $KB, 2) . "KB";

    } elseif ($byte < $GB) {

        return round($byte / $MB, 2) . "MB";

    } elseif ($byte < $TB) {

        return round($byte / $GB, 2) . "GB";

    } else {

        return round($byte / $TB, 2) . "TB";

    }

}
