<?php

// register autoloader to load classes
spl_autoload_register();

function printProperties($obj)
{
    foreach (get_object_vars($obj) as $prop => $val) {
        echo "\t$prop = $val\n";
    }
}

function printMethods($obj)
{
    $arr = get_class_methods(get_class($obj));
    foreach ($arr as $method) {
        echo "\tfunction $method()\n";
    }
}

function objectBelongsTo($obj, $class)
{
    if (is_subclass_of($obj, $class)) {
        echo "Object belongs to class " . get_class($obj);
        echo ", a subclass of $class\n";
    } else {
        echo "Object does not belong to a subclass of $class\n";
    }
}

// instantiate 2 objects
$veggie = new Vegetable(true, "blue");
$leafy = new Spinach();

// print out information about objects
echo "veggie: CLASS " . get_class($veggie) . "\n";
echo "leafy: CLASS " . get_class($leafy);
echo ", PARENT " . get_parent_class($leafy) . "\n";

// show veggie properties
echo "\nveggie: Properties\n";
printProperties($veggie);

// and leafy methods
echo "\nleafy: Methods\n";
printMethods($leafy);

echo "\nParentage:\n";
objectBelongsTo($leafy, Spinach::class);
objectBelongsTo($leafy, Vegetable::class);

?>