<?php 

//An array is a special variable that can hold many values under a single name,
//  and you can access the values by referring to an index number or name.

// 1. Indexed array, 2. Associative array and 3. Multidimensional array

    $cars = array("Toyota","Mahindra","Land Rover","Suzuki","Tata","Volvo"); //array created using array function
    $bikes = ["TVS", "Honda", "Yamaha"]; // array created using shorthand
    var_dump($cars); echo"<br/>";
    var_dump($bikes);  

    echo"<br/>";
    //array of different data types
    $myArr = array("Volvo", 15, ["apples", "bananas"]);
    var_dump($myArr);

    echo"<br/>";
    // count() function for counting array items
    echo count($cars);

    echo"<br/>";
    //accessing the array elements
    echo $cars[0].", ".$cars[1];


    echo"<br/>";
    //traversing the array using foreach loop
    foreach ($cars as $x) {
        echo "$x <br>";
      }

    echo"<br/>";
    //array_push() function to add a new item
    array_push($cars,"Volkswagen");
    var_dump($cars);


    echo"<br/>";
    //Associative arrays are arrays that use named keys that you assign to them
    $cars = array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
    var_dump($cars);

    echo"<br/>";
    //traversing an associative array
    foreach ($cars as $x => $y) {
        echo $x." - ".$y."<br/>";
    }

    // what is difference between associative array and indexed array?\
    // indexed array is same as associative array but associative array have names instead of numbers


    echo"<br/>";
    // Add one more item to the fruits array:
    $fruits = array("Apple", "Banana", "Cherry");
    $fruits[] = "Orange";

    echo"<br/>";
    // Add one item to the associative car array:
    $cars = array("brand" => "Ford", "model" => "Mustang");
    $cars["color"] = "Red";
    var_dump($cars);

    echo"<br/>";
    // Add multiple values to the array
    $fruits = array("Apple", "Banana", "Cherry");
    array_push($fruits, "Orange", "Kiwi", "Lemon");
    var_dump($fruits);

    echo"<br/>";
    // Add multiple values to the associative array using the += operator.
    $smartphones = ["Brand"=>"Xiaomi","Model" => "Redmi Note",  "Year"=>2019];
    $smartphones += ["Color"=>"Blue"];
    var_dump($smartphones);

    
    echo"<br/>";
    // Deleting the array elements using the array_splice() function.
    // With the array_splice() function you specify the index (where to start) and how many items you want to delete.
    $laptops = ["Acer","Dell","Lenovo","HP","Asus","MSI"];
    array_splice($laptops,0,2);
    var_dump($laptops);


    echo"<br/>";
    //Remove the unlimited no of items form an array
    unset($laptops[0], $laptops[1]); //deleting
    var_dump($laptops); 

    echo"<br/>";
    // To remove items from an associative array, you can use the unset() function.
    // Specify the key of the item you want to delete.
    unset($smartphones["Brand"],$smartphones["Model"]);
    var_dump($smartphones);

    echo"<br/>";
    //To remove the last element of an array
    array_pop($smartphones);
    var_dump($smartphones);

    echo"<br/>";
    //To remove the first element of an array
    array_shift($smartphones);
    var_dump($smartphones);
    
?>