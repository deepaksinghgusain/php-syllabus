<?php

/**
 * 
 * 1. if
 * 2. else
 * 3. elseif
 * 4. alternative syntax fot control structure
 * 5. while
 * 6. do-while
 * 7. for
 * 8. foreach
 * 9. break
 * 10. continue
 * 11. switch
 * 12. match
 * 14. return
 * 15. require
 * 16. include
 * 17. require_once
 * 18. include_once
 */

//  if
if ($a > $b) {
    echo "a is bigger than b";
    $b = $a;
}

// else
if ($a > $b) {
    echo "a is greater than b";
} else {
    echo "a is NOT greater than b";
}

// elseif
if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}

// alternative syntax for control structure
// if ($a == 5):  'A is equal to 5' endif; 

// switch

switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}

// while 
$i = 1;
while ($i <= 10) {
    echo $i++;  /* the printed value would be
                   $i before the increment
                   (post-increment) */
}

// do-while 
$i = 0;
do {
    echo $i;
} while ($i > 0);

// for 
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

// foreach
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}

// break
$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
foreach ($arr as $val) {
    if ($val == 'stop') {
        break;    /* You could also write 'break 1;' here. */
    }
    echo "$val<br />\n";
}

// continue
foreach ($arr as $key => $value) {
    if (!($key % 2)) { // skip even members
        continue;
    }
    // do_something_odd($value);
}

// match
$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

var_dump($return_value);

/**
 * return
 * 
 * return returns program control to the calling module. Execution resumes at the expression 
 * following the called module's invocation.
 * 
 * If called from within a function, the return statement immediately ends execution of the current 
 * function, and returns its argument as the value of the function call. 
 * return also ends the execution of an eval() statement or script file.
 * 
 */

/**
 *  require
 *  
 * require is identical to include except upon failure it will also produce a fatal E_COMPILE_ERROR level error. 
 * In other words, it will halt the script whereas include only emits a warning (E_WARNING) which allows the script to continue.
 * 
 */

require('somefile.php');
require 'somefile.php';

/**
 * include
 * 
 * Files are included based on the file path given or, if none is given, the include_path specified. 
 * If the file isn't found in the include_path, include will finally check in the calling script's own directory 
 * and the current working directory before failing. The include construct will emit an E_WARNING if it cannot find a file; 
 * this is different behavior from require, which will emit an E_ERROR.
 * 
 */
include 'vars.php';

/**
 * require_once 
 * 
 * The require_once expression is identical to require except PHP will check if the file has already been included, 
 * and if so, not include (require) it again.
 */

require_once('fiddle2.php');

/**
 * include_once 
 * 
 * The include_once statement includes and evaluates the specified file during the execution of the script. 
 * This is a behavior similar to the include statement, with the only difference being that if the code from a 
 * file has already been included, it will not be included again, and include_once returns true. 
 * As the name suggests, the file will be included just once.
 * 
 */