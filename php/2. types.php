<?php

/**
 * 1. Booleans
 * 2. Integers 
 * 3. Floating point numbers
 * 4. Strings 
 * 5. Numeric strings
 * 6. Arrays 
 * 8. Objects 
 * 9. Enumerations
 * 10. Resources 
 * 11. NULL 
 * 12. Callbacks / Callables
 * 13. Type declarations
 * 14. Type Juggling
 * 15. gettype()
 */


// Boolean - true or false
$foo = true;
$foo1 = false;

// Integers
$int = 10;

// floating point numbers
$a = 1.234;

// strings
$str = 'this is a simple string';

// Numeric strings
$foo = 1 + "10.5";

// arrays
$array = array(
    "foo" => "bar",
    "bar" => "foo",
);

$array = [
    "foo" => "bar",
    "bar" => "foo",
];

$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);

// Objects
class foo
{
    function do_foo()
    {
        echo "Doing foo.";
    }
}

$bar = new foo;
$bar->do_foo();

// Enumerations
enum Suit
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

/**
 * Resource
 * 
 * A resource is a special variable, holding a reference to an external resource. 
 * Resources are created and used by special functions. 
 */

//  Null
$var = NULL;

/**
 * 
 * Callbacks / Callables 
 * 
 * Some functions like call_user_func() or usort() accept user-defined callback functions as a parameter. 
 * Callback functions can not only be simple functions, but also object methods, including static class methods.
 * 
 */


/**
 * Type declarations
 * 
 * Class/interface - The value must be an instanceof the given class or interface.
 * self - The value must be an instanceof the same class as the one in which the type declaration is used. Can only be used in classes. 
 * parent - The value must be an instanceof the parent of the class in which the type declaration is used. Can only be used in classes. 
 * array - The value must be an array.
 * callable - The value must be a valid callable. Cannot be used as a class property type declaration.
 * bool - The value must be a boolean value.
 * float - The value must be a floating point number.
 * int - The value must be an integer.
 * string -	The value must be a string.
 * object -	The value must be an object.
 * iterable - The value must be either an array or an instanceof Traversable.
 * mixed - The value can be any value.
 * 
 */

/**
 * Type Juggling
 * 
 * PHP does not require explicit type definition in variable declaration. 
 * In this case, the type of a variable is determined by the value it stores. 
 * That is to say, if a string is assigned to variable $var, then $var is of type string. 
 * If afterwards an int value is assigned to $var, it will be of type int.
 * 
 * PHP may attempt to convert the type of a value to another automatically in certain contexts. 
 * The different contexts which exist are:
 * Numeric
 * String
 * Logical
 * Integral and string
 * Comparative
 * Function
 */
