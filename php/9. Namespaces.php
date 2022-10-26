<?php

/**
 * 
 * 1. Namespaces overview
 * 2. Defining namespaces
 * 3. Declaring sub-namespaces
 * 4. Defining multiple namespaces in the same file
 * 5. Using namespaces: Basics
 * 6. Namespaces and dynamic language features
 * 7. namespace keyword and __NAMESPACE__ constant
 * 8. Using namespaces: Aliasing/Importing
 * 9. Global space
 * 10. Using namespaces: fallback to global function/constant
 * 11. Name resolution rules
 */

/**
 * Namespaces overview
 *
 * What are namespaces? In the broadest definition namespaces are a way of encapsulating items. 
 * This can be seen as an abstract concept in many places. For example, in any operating system 
 * directories serve to group related files, and act as a namespace for the files within them.
 */

/**
 * Defining namespaces
 * 
 * Although any valid PHP code can be contained within a namespace, only the following types of code
 * are affected by namespaces: classes (including abstracts and traits), interfaces, functions and 
 * constants.
 * 
 * Namespaces are declared using the namespace keyword. A file containing a namespace must declare 
 * the namespace at the top of the file before any other code - with one exception: the declare 
 * keyword.
 */

// #1 Declaring a single namespace   
namespace MyProject;

const CONNECT_OK = 1;
class Connection
{ /* ... */
}
function connect()
{ /* ... */
}

//  #2 Declaring a single namespace
namespace MyProject; // fatal error - namespace must be the first statement in the script


/**
 * Declaring sub-namespaces
 * 
 * Much like directories and files, PHP namespaces also contain the ability to specify a hierarchy of 
 * namespace names. Thus, a namespace name can be defined with sub-levels:
 */

namespace MyProject\Sub\Level;

const CONNECT_OK = 1;
class Connection
{ /* ... */
}
function connect()
{ /* ... */
}


// Defining multiple namespaces in the same file 

#1 Declaring multiple namespaces, simple combination syntax
namespace MyProject;

const CONNECT_OK = 1;
class Connection
{ /* ... */
}
function connect()
{ /* ... */
}

namespace AnotherProject;

const CONNECT_OK = 1;
class Connection
{ /* ... */
}
function connect()
{ /* ... */
}

#2 Declaring multiple namespaces, bracketed syntax
namespace MyProject {

    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }
    function connect()
    { /* ... */
    }
}

namespace AnotherProject {

    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }
    function connect()
    { /* ... */
    }
}

#3 Declaring multiple namespaces and unnamespaced code

namespace MyProject {

    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }
    function connect()
    { /* ... */
    }
}

namespace { // global code
    session_start();
    $a = MyProject\connect();
    echo MyProject\Connection::start();
}

#4 Declaring multiple namespaces and unnamespaced code
declare(encoding='UTF-8');

namespace MyProject {

    const CONNECT_OK = 1;
    class Connection
    { /* ... */
    }
    function connect()
    { /* ... */
    }
}

namespace { // global code
    session_start();
    $a = MyProject\connect();
    echo MyProject\Connection::start();
}

// Using namespaces: Basics
// file1.php
namespace Foo\Bar\subnamespace;

const FOO = 1;
function foo()
{
}
class foo
{
    static function staticmethod()
    {
    }
}

// file2.php
namespace Foo\Bar;

include 'file1.php';

const FOO = 2;
function foo()
{
}
class foo
{
    static function staticmethod()
    {
    }
}

/* Unqualified name */
foo(); // resolves to function Foo\Bar\foo
foo::staticmethod(); // resolves to class Foo\Bar\foo, method staticmethod
echo FOO; // resolves to constant Foo\Bar\FOO

/* Qualified name */
subnamespace\foo(); // resolves to function Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // resolves to class Foo\Bar\subnamespace\foo,
// method staticmethod
echo subnamespace\FOO; // resolves to constant Foo\Bar\subnamespace\FOO

/* Fully qualified name */
\Foo\Bar\foo(); // resolves to function Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // resolves to class Foo\Bar\foo, method staticmethod
echo \Foo\Bar\FOO; // resolves to constant Foo\Bar\FOO

/**
 * Namespaces and dynamic language features
 */

#1 Dynamically accessing elements
class classname
{
    function __construct()
    {
        echo __METHOD__, "\n";
    }
}
function funcname()
{
    echo __FUNCTION__, "\n";
}
const constname = "global";

$a = 'classname';
$obj = new $a; // prints classname::__construct
$b = 'funcname';
$b(); // prints funcname
echo constant('constname'), "\n"; // prints global

#2 Dynamically accessing namespaced elements
namespace namespacename;

class classname
{
    function __construct()
    {
        echo __METHOD__, "\n";
    }
}
function funcname()
{
    echo __FUNCTION__, "\n";
}
const constname = "namespaced";

/* note that if using double quotes, "\\namespacename\\classname" must be used */
$a = '\namespacename\classname';
$obj = new $a; // prints namespacename\classname::__construct
$a = 'namespacename\classname';
$obj = new $a; // also prints namespacename\classname::__construct
$b = 'namespacename\funcname';
$b(); // prints namespacename\funcname
$b = '\namespacename\funcname';
$b(); // also prints namespacename\funcname
echo constant('\namespacename\constname'), "\n"; // prints namespaced
echo constant('namespacename\constname'), "\n"; // also prints namespaced

// namespace keyword and __NAMESPACE__ constant 
#1 __NAMESPACE__ example, namespaced code
namespace MyProject;

echo '"', __NAMESPACE__, '"'; // outputs "MyProject"

#2 __NAMESPACE__ example, global code
echo '"', __NAMESPACE__, '"'; // outputs ""

#3 using __NAMESPACE__ for dynamic name construction
namespace MyProject;

function get($classname)
{
    $a = __NAMESPACE__ . '\\' . $classname;
    return new $a;
}

#4 the namespace operator, inside a namespace
namespace MyProject;

use blah\blah as mine; // see "Using namespaces: Aliasing/Importing"

blah\mine(); // calls function MyProject\blah\mine()
namespace\blah\mine(); // calls function MyProject\blah\mine()

namespace\func(); // calls function MyProject\func()
namespace\sub\func(); // calls function MyProject\sub\func()
namespace\cname::method(); // calls static method "method" of class MyProject\cname
$a = new namespace\sub\cname(); // instantiates object of class MyProject\sub\cname
$b = namespace\CONSTANT; // assigns value of constant MyProject\CONSTANT to $b

#5 the namespace operator, in global code
namespace\func(); // calls function func()
namespace\sub\func(); // calls function sub\func()
namespace\cname::method(); // calls static method "method" of class cname
$a = new namespace\sub\cname(); // instantiates object of class sub\cname
$b = namespace\CONSTANT; // assigns value of constant CONSTANT to $b


// Using namespaces: Aliasing/Importing
#1 importing/aliasing with the use operator
namespace foo;

use My\Full\Classname as Another;

// this is the same as use My\Full\NSname as NSname
use My\Full\NSname;

// importing a global class
use ArrayObject;

// importing a function
use function My\Full\functionName;

// aliasing a function
use function My\Full\functionName as func;

// importing a constant
use const My\Full\CONSTANT;

$obj = new namespace\Another; // instantiates object of class foo\Another
$obj = new Another; // instantiates object of class My\Full\Classname
NSname\subns\func(); // calls function My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // instantiates object of class ArrayObject
// without the "use ArrayObject" we would instantiate an object of class foo\ArrayObject
func(); // calls function My\Full\functionName
echo CONSTANT; // echoes the value of My\Full\CONSTANT

#2 importing/aliasing with the use operator, multiple use statements combined
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instantiates object of class My\Full\Classname
NSname\subns\func(); // calls function My\Full\NSname\subns\func

#3 Importing and dynamic names
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instantiates object of class My\Full\Classname
$a = 'Another';
$obj = new $a;      // instantiates object of class Another

#4 Importing and fully qualified names
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instantiates object of class My\Full\Classname
$obj = new \Another; // instantiates object of class Another
$obj = new Another\thing; // instantiates object of class My\Full\Classname\thing
$obj = new \Another\thing; // instantiates object of class Another\thing


// Global space
namespace A\B\C;

/* This function is A\B\C\fopen */
function fopen() { 
     /* ... */
     $f = \fopen(...); // call global fopen
     return $f;
} 