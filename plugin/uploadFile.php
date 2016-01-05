<?php
/**
 * Created by PhpStorm.
 * User: zhangmingwen
 * Date: 16/1/5
 * Time: 上午9:12
 *
 * 上传文件并存放与upload目录
 */
$uploadDir = $conferenceName."_default.txt";
if ($_FILES["file"]["size"] < 900000)
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        exit;
    }
    else
    {
//        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//        echo "Type: " . $_FILES["file"]["type"] . "<br />";
//        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

        if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " already exists. ";
            exit;
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "upload/" . $uploadDir);
           $uploadName = $uploadDir;
        }
    }
}
else
{
    echo "Invalid file";
    exit;
}