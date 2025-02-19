The solution involves being explicit about array key types and handling iterations more carefully. 

For the first issue, use type casting to ensure consistent keys, or use array_keys() to get an array of keys to iterate over.

```php
//Consistent Keys
$myArray = [];
$myArray[(int) "1"] = "one";
$myArray[1] = "One";

echo count($myArray); // Outputs: 1

//Using array_keys()
$myArray = [];
$myArray["1"] = "one";
$myArray[1] = "One";
foreach(array_keys($myArray) as $key){
    //access elements using $myArray[$key]
}
```

For the second issue, always use the key when you modify the array inside a foreach loop. If you only need the values, use a different approach.

```php
$data = ['a' => 1, 'b' => 2, 'c' => 3];
foreach ($data as $key => $value) {
if ($value == 2) {
    unset($data[$key]);
}
}
print_r($data);

//Alternative approach if you only need the values
$data = ['a' => 1, 'b' => 2, 'c' => 3];
$newData = [];
foreach ($data as $value) {
if ($value != 2) {
    $newData[] = $value; 
}
}
print_r($newData); // Array ( [0] => 1 [1] => 3 )
```
These modifications ensure correct array handling and prevent unexpected behavior.