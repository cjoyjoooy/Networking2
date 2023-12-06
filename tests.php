<?php require("mainSQL.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extract Hidden Input Value</title>
</head>

<body>

    <table id="table-contacts">
        <!-- ----table row-----------  -->
        <?php
        $query = "SELECT * FROM `contacts`";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $contactName = $row['fName'] . " " . $row['lName'];
        ?>
                <tr data-contactid="<?= $contactName ?>">
                    <td><i class="fa-regular fa-circle-user profilepic"></i></td>
                    <td><?= $contactName ?></td>
                    <td>
                        <input type="hidden" class="hidden-number" name="number" value="<?= $row['number'] ?>">
                    </td>
                    <td>
                        <button class="button add-contact" onclick="addContactNumber(this)">
                            <i class="fa-solid fa-plus fa-sm"></i>
                        </button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        <!-- -------end of table row-------  -->
    </table>

    <script>
        function addContactNumber(button) {
            // Traverse the DOM to find the hidden input in the same row
            var hiddenInput = button.closest('tr').querySelector('.hidden-number');

            // Extract the value from the hidden input
            var hiddenValue = hiddenInput.value;

            // Use the extracted value as needed (for example, log it to the console)
            console.log('Hidden Value:', hiddenValue);
        }
    </script>

</body>

</html>