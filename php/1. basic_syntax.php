<?php

/**
 * 1. PHP tags
 * 2. Escaping from HTML
 * 3. Instruction separation
 * 4. Comments
 * 5. outputing data 
*/

?>


<!-- php tags -->
<?php echo 'hello world'; ?>

<?= 'print this string' ?> <!-- shorthand operator -->

<!-- Escaping from html -->
<p>This is going to be ignored by PHP and displayed by the browser.</p>
<?php echo 'While this is going to be parsed.'; ?>
<p>This will also be ignored by PHP and displayed by the browser.</p>

<!-- Instruction separation -->
<!-- every time whenever we right the code we end with the semicolon to separte the code -->

<!-- comments -->

<?php 
    // sigle line comment

    /**
     *  multiline comment
     */
?>

<!-- outputing data  -->

<!-- single value -->

<?php
    echo "echo";

    print "print";
?>

<!-- arrays and objects -->

<?php 
    var_dump([]);

    print_r([])
?>
