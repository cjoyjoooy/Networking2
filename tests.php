<!DOCTYPE html>
<html>

<body>

    <?php

    $numbers = array(0, 1, 2);

    for ($i = 0; $i < count($numbers); $i++) {
        echo "The number is: $numbers[$i] <br>";
    }
    ?>
    <button type="button" , onclick="data1AddToInformation()">Karl</button>
    <button type="button" , onclick="data2AddToInformation()">Tan</button>

    <button type="button" , onclick="getData1Number()">Karl</button>
    <button type="button" , onclick="getData2Number()">Tan</button>


    <button type="button" , onclick="tryCode()">Code Trial</button>
</body>
<script>
    let information = [];
    let data1 = [1, "Karl", "0906460274"];
    let data2 = [2, "Tan", "09064360274"];

    function data1AddToInformation() {
        information.push(data1);
        console.log(information);
    }

    function data2AddToInformation() {
        information.push(data2);
        console.log(information);
    }

    function getData1Number() {
        console.log(information[0][2])
    }

    function getData2Number() {
        console.log(information[1][2])
    }

    const sourceArray = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9],
    ];

    const targetValue = [
        ["hello"]
    ];

    function tryCode() {
        console.log(targetValue.length);
    }
</script>

</html>