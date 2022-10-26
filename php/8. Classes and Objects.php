<?php

/**
 * 
 * 1. The Basics
 * 2. Properties
 * 3. Class Constants
 * 4. Autoloading Classes
 * 5. Constructors and Destructors
 * 6. Visibility
 * 7. Object Inheritance
 * 8. Scope Resolution Operator (::)
 * 9. Static Keyword
 * 10. Class Abstraction
 * 11. Object Interfaces
 * 12. Traits
 * 13. Anonymous classes
 * 14. Overloading
 * 15. Object Iteration
 * 16. Magic Methods
 * 17. Final Keyword
 * 18. Object Cloning
 * 19. Comparing Objects
 * 20. Late Static Bindings
 * 21. Objects and references
 * 22. Object Serialization
 * 23. Covariance and Contravariance
 * 
 */

/**
 * The Basics
 * 
 * Basic class definitions begin with the keyword class, followed by a class name, 
 * followed by a pair of curly braces which enclose the definitions of the properties and methods 
 * belonging to the class.
 */

class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar()
    {
        echo $this->var;
    }
}

/**
 * Properties
 * 
 * Class member variables are called properties. They may be referred to using other terms such as 
 * fields, but for the purposes of this reference properties will be used. They are defined by using 
 * at least one modifier (such as Visibility, Static Keyword, or, as of PHP 8.1.0, readonly), 
 * optionally (except for readonly properties), as of PHP 7.4, followed by a type declaration, 
 * followed by a normal variable declaration. This declaration may include an initialization, but 
 * this initialization must be a constant value.
 * 
 */

class User
{
    public int $id;
    public ?string $name;

    public function __construct(int $id, ?string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$user = new User(1234, null);

var_dump($user->id);
var_dump($user->name);


/**
 * Class Constants 
 * 
 * It is possible to define constants on a per-class basis remaining the same and unchangeable. 
 * The default visibility of class constants is public.
 */

class MyClass
{
    const CONSTANT = 'constant value';

    function showConstant()
    {
        echo  self::CONSTANT . "\n";
    }
}


echo MyClass::CONSTANT . "\n";


/**
 * Autoloading Classes 
 * 
 * Many developers writing object-oriented applications create one PHP source file per class definition.
 * One of the biggest annoyances is having to write a long list of needed includes at the beginning of 
 * each script (one for each class).
 * 
 * The spl_autoload_register() function registers any number of autoloaders, enabling for classes and 
 * interfaces to be automatically loaded if they are currently not defined. By registering autoloaders, 
 * PHP is given a last chance to load the class or interface before it fails with an error.
 * 
 * Any class-like construct may be autoloaded the same way. That includes classes, interfaces, traits, 
 * and enumerations.
 * 
 */

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$obj  = new MyClass1();
$obj2 = new MyClass2();

/**
 * Constructors and Destructors
 * 
 * constructor syntax __construct(mixed ...$values = ""): void
 * destructor syntax __destruct(): void
 * 
 */


class BaseClass
{
    function __construct()
    {
        print "In BaseClass constructor\n";
    }
}

class SubClass extends BaseClass
{
    function __construct()
    {
        parent::__construct();
        print "In SubClass constructor\n";
    }
}

class OtherSubClass extends BaseClass
{
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();


class MyDestructableClass
{
    function __construct()
    {
        print "In constructor\n";
    }

    function __destruct()
    {
        print "Destroying " . __CLASS__ . "\n";
    }
}

/**
 * Visibility
 * 
 * Property Visibility 
 * 
 * Class properties may be defined as public, private, or protected. Properties declared without any 
 * explicit visibility keyword are defined as public.
 * 
 * 
 * Method Visibility
 * 
 * Class methods may be defined as public, private, or protected. Methods declared without any 
 * explicit visibility keyword are defined as public.
 */

/**
 * Object Inheritance
 * Inheritance is a well-established programming principle, and PHP makes use of this principle in 
 * its object model. This principle will affect the way many classes and objects relate to one another.
 */


class A
{
    public int $prop;
}

class B extends A
{
}

/**
 * Scope Resolution Operator (::)
 * 
 * The Scope Resolution Operator (also called Paamayim Nekudotayim) or in simpler terms, the double 
 * colon, is a token that allows access to static, constant, and overridden properties or methods of 
 * a class.
 */

class MyClass
{
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';

echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;

/**
 * 
 * Static Keyword
 * 
 * Declaring class properties or methods as static makes them accessible without needing an 
 * instantiation of the class. These can also be accessed statically within an instantiated class object.
 * 
 * Static methods
 * Because static methods are callable without an instance of the object created, the pseudo-variable 
 * $this is not available inside methods declared as static.
 * 
 * Static propertie
 * 
 * Static properties are accessed using the Scope Resolution Operator (::) and cannot be accessed 
 * through the object operator (->).
 */

class Foo
{
    public static $my_static = 'foo';

    public static function aStaticMethod()
    {
        // ...
    }
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod(); // methods
$classname::$my_static; // properties

/**
 * Class Abstraction
 * 
 * PHP has abstract classes and methods. Classes defined as abstract cannot be instantiated, and 
 * any class that contains at least one abstract method must also be abstract. Methods defined as 
 * abstract simply declare the method's signature; they cannot define the implementation.
 * 
 * When inheriting from an abstract class, all methods marked abstract in the parent's class 
 * declaration must be defined by the child class, and follow the usual inheritance and signature 
 * compatibility rules.
 */

abstract class AbstractClass
{
    // Force Extending class to define this method
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Common method
    public function printOut()
    {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue()
    {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue()
    {
        return "ConcreteClass2";
    }

    public function prefixValue($prefix)
    {
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') . "\n";

$class2 = new ConcreteClass2;
$class2->printOut();
echo $class2->prefixValue('FOO_') . "\n";

/**
 * Object Interfaces
 * 
 * Object interfaces allow you to create code which specifies which methods a class must implement, 
 * without having to define how these methods are implemented. Interfaces share a namespace with 
 * classes and traits, so they may not use the same name.
 * 
 * Interfaces are defined in the same way as a class, but with the interface keyword replacing the 
 * class keyword and without any of the methods having their contents defined.
 * 
 * All methods declared in an interface must be public; this is the nature of an interface.
 * 
 * 
 */

// Declare the interface 'Template'
interface Template
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implement the interface
// This will work
class WorkingTemplate implements Template
{
    private $vars = [];

    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }

    public function getHtml($template)
    {
        foreach ($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }

        return $template;
    }
}

/**
 * Traits
 * 
 * PHP implements a way to reuse code called Traits
 * 
 * Traits are a mechanism for code reuse in single inheritance languages such as PHP. 
 * A Trait is intended to reduce some limitations of single inheritance by enabling a developer 
 * to reuse sets of methods freely in several independent classes living in different class hierarchies.
 * The semantics of the combination of Traits and classes is defined in a way which reduces complexity,
 * and avoids the typical problems associated with multiple inheritance and Mixins.
 * 
 */

trait ezcReflectionReturnInfo
{
    function getReturnType()
    { /*1*/
    }

    function getReturnDescription()
    { /*2*/
    }
}

class ezcReflectionMethod extends ReflectionMethod
{
    use ezcReflectionReturnInfo;
    /* ... */
}

class ezcReflectionFunction extends ReflectionFunction
{
    use ezcReflectionReturnInfo;
    /* ... */
}

/**
 * Anonymous classes
 * 
 * Anonymous classes are useful when simple, one-off objects need to be created.
 */


// Using an explicit class
class Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

$util->setLogger(new Logger());

// Using an anonymous class
$util->setLogger(new class
{
    public function log($msg)
    {
        echo $msg;
    }
});

/**
 * Overloading 
 * 
 * Overloading in PHP provides means to dynamically create properties and methods. 
 * These dynamic entities are processed via magic methods one can establish in a class for various 
 * action types.
 * 
 * The overloading methods are invoked when interacting with properties or methods that have not been 
 * declared or are not visible in the current scope. The rest of this section will use the terms 
 * inaccessible properties and inaccessible methods to refer to this combination of declaration and 
 * visibility.
 */

// public __set(string $name, mixed $value): void

// public __get(string $name): mixed

// public __isset(string $name): bool

// public __unset(string $name): void

// __set() is run when writing data to inaccessible (protected or private) or non-existing properties.

// __get() is utilized for reading data from inaccessible (protected or private) or non-existing properties.

// __isset() is triggered by calling isset() or empty() on inaccessible (protected or private) or non-existing properties.

// __unset() is invoked when unset() is used on inaccessible (protected or private) or non-existing properties.;


class PropertyTest
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}


echo "<pre>\n";

$obj = new PropertyTest;

$obj->a = 1;
echo $obj->a . "\n\n";

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo "\n";

echo $obj->declared . "\n\n";

echo "Let's experiment with the private property named 'hidden':\n";
echo "Privates are visible inside the class, so __get() not used...\n";
echo $obj->getHidden() . "\n";
echo "Privates not visible outside of class, so __get() is used...\n";
echo $obj->hidden . "\n";

/**
 * Object Iteration 
 * 
 * PHP provides a way for objects to be defined so it is possible to iterate through a list of items, 
 * with, for example a foreach statement. By default, all visible properties will be used for the iteration.
 */

class MyClassTwo
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible()
    {
        echo "MyClass::iterateVisible:\n";
        foreach ($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}

$class = new MyClassTwo();

foreach ($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";

$class->iterateVisible();

/**
 * Magic Methods
 */

//  __sleep() and __wakeup()
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep()
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup()
    {
        $this->connect();
    }
}

// __serialize() and __unserialize() 
class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __serialize(): array
    {
        return [
            'dsn' => $this->dsn,
            'user' => $this->username,
            'pass' => $this->password,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->dsn = $data['dsn'];
        $this->username = $data['user'];
        $this->password = $data['pass'];

        $this->connect();
    }
}

// __toString()
class TestClass
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString()
    {
        return $this->foo;
    }
}

$class = new TestClass('Hello');
echo $class;

// __invoke() 
class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}
$obj = new CallableClass;
$obj(5);
var_dump(is_callable($obj));

// __set_state()

class A
{
    public $var1;
    public $var2;

    public static function __set_state($an_array)
    {
        $obj = new A;
        $obj->var1 = $an_array['var1'];
        $obj->var2 = $an_array['var2'];
        return $obj;
    }
}

$a = new A;
$a->var1 = 5;
$a->var2 = 'foo';

$b = var_export($a, true);
var_dump($b);
eval('$c = ' . $b . ';');
var_dump($c);

// __debugInfo()
class C
{
    private $prop;

    public function __construct($val)
    {
        $this->prop = $val;
    }

    public function __debugInfo()
    {
        return [
            'propSquared' => $this->prop ** 2,
        ];
    }
}

var_dump(new C(42));

/**
 * Final Keyword
 * The final keyword prevents child classes from overriding a method or constant by prefixing the 
 * definition with final. If the class itself is being defined final then it cannot be extended.
 */

//   Final methods 
class BaseClass
{
    public function test()
    {
        echo "BaseClass::test() called\n";
    }

    final public function moreTesting()
    {
        echo "BaseClass::moreTesting() called\n";
    }
}

class ChildClass extends BaseClass
{
    public function moreTesting()
    {
        echo "ChildClass::moreTesting() called\n";
    }
}
// Results in Fatal error: Cannot override final method BaseClass::moreTesting()

//   Final class 
final class BaseClass
{
    public function test()
    {
        echo "BaseClass::test() called\n";
    }

    // As the class is already final, the final keyword is redundant
    final public function moreTesting()
    {
        echo "BaseClass::moreTesting() called\n";
    }
}

class ChildClass extends BaseClass
{
}
// Results in Fatal error: Class ChildClass may not inherit from final class (BaseClass)

// final constants example as of PHP 8.1.0
class Foo
{
    final public const X = "foo";
}

class Bar extends Foo
{
    public const X = "bar";
}

// Fatal error: Bar::X cannot override final constant Foo::X


/**
 * Object Cloning
 * 
 * Creating a copy of an object with fully replicated properties is not always the wanted behavior. 
 * A good example of the need for copy constructors, is if you have an object which represents a GTK 
 * window and the object holds the resource of this GTK window, when you create a duplicate you might 
 * want to create a new window with the same properties and have the new object hold the resource of 
 * the new window. Another example is if your object holds a reference to another object which it uses 
 * and when you replicate the parent object you want to create a new instance of this other object so 
 * that the replica has its own separate copy
 *
 * An object copy is created by using the clone keyword (which calls the object's __clone() method if possible). 
 */
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct()
    {
        $this->instance = ++self::$instances;
    }

    public function __clone()
    {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj2);


/**
 * Comparing Objects
 * 
 * When using the comparison operator (==), object variables are compared in a simple manner, 
 * namely: Two object instances are equal if they have the same attributes and values (values are 
 * compared with ==), and are instances of the same class.
 * 
 * When using the identity operator (===), object variables are identical if and only if they refer 
 * to the same instance of the same class.
 */

function bool2str($bool)
{
    if ($bool === false) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}

function compareObjects(&$o1, &$o2)
{
    echo 'o1 == o2 : ' . bool2str($o1 == $o2) . "\n";
    echo 'o1 != o2 : ' . bool2str($o1 != $o2) . "\n";
    echo 'o1 === o2 : ' . bool2str($o1 === $o2) . "\n";
    echo 'o1 !== o2 : ' . bool2str($o1 !== $o2) . "\n";
}

class Flag
{
    public $flag;

    function __construct($flag = true)
    {
        $this->flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function __construct($flag = true)
    {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class\n";
compareObjects($o, $p);

echo "\nTwo references to the same instance\n";
compareObjects($o, $q);

echo "\nInstances of two different classes\n";
compareObjects($o, $r);


/**
 * Late Static Bindings
 * 
 * PHP implements a feature called late static bindings which can be used to reference the called 
 * class in a context of static inheritance.
 * 
 * Limitations of self:: 
 * Static references to the current class like self:: or __CLASS__ are resolved using the class in which the function belongs, as in where it was defined:
 */

//  Limitations of self::
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();

/**
 * Late Static Bindings' usage
 * 
 * Late static bindings tries to solve that limitation by introducing a keyword that references the 
 * class that was initially called at runtime. Basically, a keyword that would allow referencing B 
 * from test() in the previous example. It was decided not to introduce a new keyword but rather use 
 * static that was already reserved.
 */

class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who(); // Here comes Late Static Bindings
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();

/**
 * 
 * Objects and references
 * 
 * One of the key-points of PHP OOP that is often mentioned is that "objects are passed by references by default". This is not completely true.
 */

<?php
class A {
    public $foo = 1;
}  

$a = new A;
$b = $a;     // $a and $b are copies of the same identifier
             // ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo."\n";


$c = new A;
$d = &$c;    // $c and $d are references
             // ($c,$d) = <id>

$d->foo = 2;
echo $c->foo."\n";


$e = new A;

function foo($obj) {
    // ($obj) = ($e) = <id>
    $obj->foo = 2;
}

foo($e);
echo $e->foo."\n";