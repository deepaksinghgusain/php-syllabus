<?php

/**
 * 
 * 1. User-defined functions
 * 2. Function arguments
 * 3. Returning values
 * 4. Variable functions
 * 6. Anonymous functions
 * 7. Arrow Functions
 */

/**
 * User-defined functions
 * 
 * A function may be defined using syntax such as the following:
 */

function foo1($arg_1, $arg_2, /* ..., */ $arg_n)
{
    echo "Example function.\n";
    return "fasf";
}

/**
 * Function arguments
 * 
 * Information may be passed to functions via the argument list, which is a comma-delimited list of 
 * expressions. The arguments are evaluated from left to right, before the function is actually 
 * called (eager evaluation).
 */

function takes_array($input)
{
    echo "$input[0] + $input[1] = ", $input[0] + $input[1];
}

/**
 * Returning values
 * 
 * Values are returned by using the optional return statement. Any type may be returned, 
 * including arrays and objects. This causes the function to end its execution immediately 
 * and pass control back to the line from which it was called
 */

function square($num)
{
    return $num * $num;
}
echo square(4);   // outputs '16'.

/**
 * Variable functions
 * 
 * PHP supports the concept of variable functions. This means that if a variable name has parentheses 
 * appended to it, PHP will look for a function with the same name as whatever the variable evaluates 
 * to, and will attempt to execute it. Among other things, this can be used to implement callbacks, 
 * function tables, and so forth.
 * 
 */

function foo()
{
    echo "In foo()<br />\n";
}

function bar($arg = '')
{
    echo "In bar(); argument was '$arg'.<br />\n";
}

// This is a wrapper function around echo
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func('test');  // This calls bar()

$func = 'echoit';
$func('test');  // This calls echoit()

/**
 * Anonymous functions
 * 
 * Anonymous functions, also known as closures, allow the creation of functions which have no 
 * specified name. They are most useful as the value of callable parameters, but they have many 
 * other uses.
 */

$example = function ($message) {
    return "hello $message";
};

var_dump($example());

/**
 * Arrow Functions
 * 
 * Arrow functions were introduced in PHP 7.4 as a more concise syntax for anonymous functions.
 */


$y = 1;

$fn1 = fn ($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};

var_export($fn1(3));
