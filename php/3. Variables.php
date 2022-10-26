<?php

/**
 * 
 * 1. Basics
 * 2. Predefined Variables
 * 3. Variable scope
 * 4. Variable variables 
 * 5. Variables From External Sources
 */

/**
 * Basics
 * 
 * Variables in PHP are represented by a dollar sign followed by the name of the variable. 
 * The variable name is case-sensitive.
 */
$var = 'Bob';
$Var = 'Joe';

/**
 * 
 * Predefined Variables
 * 
 * Superglobals — Built-in variables that are always available in all scopes
 * $GLOBALS — References all variables available in global scope
 * $_SERVER — Server and execution environment information
 * $_GET — HTTP GET variables
 * $_POST — HTTP POST variables
 * $_FILES — HTTP File Upload variables
 * $_REQUEST — HTTP Request variables
 * $_SESSION — Session variables
 * $_ENV — Environment variables
 * $_COOKIE — HTTP Cookies
 * $php_errormsg — The previous error message
 * $http_response_header — HTTP response headers
 * $argc — The number of arguments passed to script
 * $argv — Array of arguments passed to script
 */


// Variable scope
$a = 1; /* global scope */

function test($a)
{
    echo $a; /* reference to local scope variable */
}

test(10);

// The global keyword
$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
}

Sum();
echo $b;

$a = 1;
$b = 2;

function Sum2()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

Sum();
echo $b;

// Using static variables
function test1()
{
    static $a = 0;
    echo $a;
    $a++;
}

// Variable variables
$a = 'hello';
$$a = 'world';

// Variables From External Sources

?>

<form action="foo.php" method="post">
    Name: <input type="text" name="username" /><br />
    Email: <input type="text" name="email" /><br />
    <input type="submit" name="submit" value="Submit me!" />
</form>

<?php
echo $_POST['username'];
echo $_REQUEST['username'];
?>