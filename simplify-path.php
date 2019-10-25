<?php

class Solution
{

    /**
     * @param String $path
     * @return String
     */
    public function simplifyPath($path)
    {
        $path = preg_replace("/(\/\/)+/", '/', $path);
        $pathArr = explode('/', $path);

        $stack = [];
        for ($i = 0; $i < count($pathArr); $i++) {
            if ($pathArr[$i] === '..') {
                array_pop($stack);
            } elseif ($pathArr[$i] !== '.' && $pathArr[$i] !== '') {
                array_push($stack, $pathArr[$i]);
            }
        }

        return sprintf("/%s", implode('/', $stack));
    }
}

$path = "/home/";
$path = "/../";
$path = "/home//foo/";
$path = "/a/./b/../../c/";
$path = "/a/../../b/../c//.//";
// $path = "/a//b////c/d//././/..";
// $path = "/a//b///c/d//./././/..";
// $path = '../c';

$object = new Solution();
echo $object->simplifyPath($path);
