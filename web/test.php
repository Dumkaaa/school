<?php

$a = 55555 . "zxc";


function problem_1($variable)
{
    $tmp = null;
    foreach ($variable as $k => $v) {
        $tmp .= $v . ' ';
    }
    return $tmp;
}

function problem_2($variable)
{
    $min = null;
    $max = null;
    foreach ($variable as $k => $v) {
        $min = $min
            ? $min < $v
                ? $v
                : $min
            : $v;

        $max = $max
            ? $max > $v
                ? $v
                : $max
            : $v;
    }
    return $min . ' / ' . $max;
}

function problem_3($variable)
{
    $count = count($variable);
    $tmp = [];
    for($i = $count - 1; $i >= 0; $i--) {
        $tmp[] = $variable[$i];
    }
    return problem_1($tmp);
}

function inArray($what, $array)
{
    foreach($array as $k => $v) {
        if ($what == $v) return true;
    }
    return false;
}
function problem_4($variable)
{
    $array = [];
    foreach($variable as $k => $v) {
        if (!inArray($v, $array)) {
           $array[] = $v;
        }
    }
    return problem_1($array);
}

function problem_5($variable)
{
    $tmp = [];
    $str = '';
    $x = 0;
    foreach ($variable as $k => $v) {
        $tmp[$v] = $k;
    }
    foreach ($tmp as $k => $v) {
        if (++$x == count($tmp)) $str .= " {$k} => {$v} ";
        else $str .= "{$k} => {$v} / ";
    }
    return $str . "\n";
}

function problem_6($variable)
{
    $str = null;
    $what = $variable[0];
    $str = $variable[1];
    $countWhat = strlen($what);
    $countStr = strlen($str);
    for($i = 0; $i < $countStr; $i++) {
        $finded = null;
        $vhojdenie = null;
        if ($str[$i] == $what[0]) {
            $iterator = $i;
            $vhojdenie = $i;
            $finded = $what[0];
            $wasBreak = false;
            for($j = 1; $j < $countWhat; $j++) {
                if ($str[++$iterator] != $what[$j]) {
                    $wasBreak = true;
                    break;
                }
                $finded .= $what[$j];
            }
            if (!$wasBreak && $finded) break;
        }
    }
    return $str . ' / ' . $finded . ' / ' . ($vhojdenie + 1) . "\n";
}
print "Problem 1\n";
$a = [1 , 2, "2"];
print problem_1($a);
print "\nProblem 2\n";
$a = [11, 100, -1, 0, 20];
print problem_2($a);
print "\nProblem 3\n";
$a = [1, 2, 16, 15];
print problem_3($a);
print "\nProblem 4\n";
$a = [1, 1, 1, 2, 3, 3, 3, 2, 2, 2, 2, 2, 2, 5];
print problem_4($a);
print "\nProblem 5\n";
$a = ["a" => 1, "b" => "DVA"];
print problem_5($a);
print "\nProblem 6\n";
$a = ["this", "you are go not to this place!"];
print problem_6($a);