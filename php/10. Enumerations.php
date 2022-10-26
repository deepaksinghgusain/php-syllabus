<?php

/**
 * 
 * 1. Enumerations overview
 * 2. Basic enumerations
 * 3. Backed enumerations
 * 4. Enumeration methods
 * 5. Enumeration static methods
 * 6. Enumeration constants
 * 7. Traits
 * 8. Enum values in constant expressions
 * 9. Differences from objects
 * 10. Value listing
 * 11. Serialization
 */

/**
 * Enumerations overview
 * Enumerations, or "Enums" allow a developer to define a custom type that is limited to one of a 
 * discrete number of possible values. That can be especially helpful when defining a domain model, as it enables "making invalid states unrepresentable."
 */

/**
 * Basic enumerations
 * 
 * Enums are similar to classes, and share the same namespaces as classes, interfaces, and traits. 
 * They are also autoloadable the same way. An Enum defines a new type, which has a fixed, limited 
 * number of possible legal values.
 */

enum Suit // creating
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

$a = Suit::Spades; // geting value
$b = Suit::Spades;

/**
 * Backed enumerations
 * 
 * By default, Enumerated Cases have no scalar equivalent. They are simply singleton objects. 
 * However, there are ample cases where an Enumerated Case needs to be able to round-trip to a 
 * database or similar datastore, so having a built-in scalar (and thus trivially serializable) 
 * equivalent defined intrinsically is useful.
 */

enum Suit: string
{
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

/**
 * Enumeration methods
 * 
 * Enums (both Pure Enums and Backed Enums) may contain methods, and may implement interfaces. 
 * If an Enum implements an interface, then any type check for that interface will also accept all 
 * cases of that Enum.
 */

interface Colorful
{
    public function color(): string;
}

enum Suit implements Colorful
{
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    // Fulfills the interface contract.
    public function color(): string
    {
        return match ($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }

    // Not part of an interface; that's fine.
    public function shape(): string
    {
        return "Rectangle";
    }
}

function paint(Colorful $c)
{
}

paint(Suit::Clubs);  // Works

print Suit::Diamonds->shape(); // prints "Rectangle"

/**
 * Enumeration static methods
 * 
 * Enumerations may also have static methods. The use for static methods on the enumeration 
 * itself is primarily for alternative constructors.
 * 
 */
enum Size
{
    case Small;
    case Medium;
    case Large;

    public static function fromLength(int $cm): static
    {
        return match (true) {
            $cm < 50 => static::Small,
            $cm < 100 => static::Medium,
            default => static::Large,
        };
    }
}

/**
 * Enumeration constants 
 * 
 * Enumerations may include constants, which may be public, private, or protected, 
 * although in practice private and protected are equivalent as inheritance is not allowed.
 */

enum Size
{
    case Small;
    case Medium;
    case Large;

    public const Huge = self::Large;
}

/**
 * Traits 
 * 
 * Enumerations may leverage traits, which will behave the same as on classes. 
 * The caveat is that traits used in an enum must not contain properties. They may only include 
 * methods and static methods. A trait with properties will result in a fatal error.
 */
interface Colorful
{
    public function color(): string;
}

trait Rectangle
{
    public function shape(): string
    {
        return "Rectangle";
    }
}

enum Suit implements Colorful
{
    use Rectangle;

    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;

    public function color(): string
    {
        return match ($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades => 'Black',
        };
    }
}


/**
 * Enum values in constant expressions 
 * 
 * Because cases are represented as constants on the enum itself, they may be used as static values 
 * in most constant expressions: property defaults, static variable defaults, parameter defaults, global and class constant values. They may not be used in other enum case values, but normal constants may refer to an enum case.
 */
// This is an entirely legal Enum definition.
enum Direction implements ArrayAccess
{
    case Up;
    case Down;

    public function offsetGet($val) { ... }
    public function offsetExists($val) { ... }
    public function offsetSet($val) { throw new Exception(); }
    public function offsetUnset($val) { throw new Exception(); }
}

class Foo
{
    // This is allowed.
    const Bar = Direction::Down;

    // This is disallowed, as it may not be deterministic.
    const Bar = Direction::Up['short'];
    // Fatal error: Cannot use [] on enums in constant expression
}

// This is entirely legal, because it's not a constant expression.
$x = Direction::Up['short'];

/** 
 * Value listing
 * 
 * Both Pure Enums and Backed Enums implement an internal interface named UnitEnum. 
 * UnitEnum includes a static method cases(). cases() returns a packed array of all defined Cases 
 * in the order of declaration.
 * 
 */
Suit::cases();
// Produces: [Suit::Hearts, Suit::Diamonds, Suit::Clubs, Suit::Spades]