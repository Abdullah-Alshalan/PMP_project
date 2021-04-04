<?php
$Conn = mysqli_connect("localhost", "root", "", "desiging_application");
if (isset($_POST["btnSubmit"])) {
    $Query = "INSERT INTO design_task_interface(task_id, name, duration, start_date, end_date) 
        VALUES ('" . $_POST["txtID"] . "','" . $_POST["txtName"] . "','" . $_POST["txtDuration"] . "','" . $_POST["txtStart"] . "','" . $_POST["txtEnd"] . "')";
    mysqli_query($Conn, $Query);
}
?>
<link rel="stylesheet" href="styles.css"> 
<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="1">
        <tr>
            <th>Task ID</th>
            <th>Task Name</th>
            <th>Duration</th>
            <th>Start Date</th>
            <th>Finish Date</th>
            <th>-</th>
        </tr>
        <?php
        $i = 1;
        $Query = "SELECT * FROM design_task_interface";
        $rstRow = mysqli_query($Conn, $Query);
        if (mysqli_num_rows($rstRow)) {
            while ($objRow = mysqli_fetch_object($rstRow)) {
        ?>
                <tr>
                    <td><?= $objRow->task_id; ?></td>
                    <td><?= $objRow->name; ?></td>
                    <td><?= $objRow->duration; ?></td>
                    <td><?= $objRow->start_date; ?></td>
                    <td><?= $objRow->end_date; ?></td>
                    <td></td>
                </tr>
        <?php
                $i++;
            }
        }
        ?>
        <form name="Form" method="post">
            <tr>
                <td><input type="number" name="txtID" readonly value="<?= $i; ?>"></td>
                <td><input type="text" name="txtName"></td>
                <td><input type="number" id="txtDuration" onblur="setDate();" name="txtDuration"> Days</td>
                <td><input type="date" id="txtStart" name="txtStart" onblur="setDate();"></td>
                <td><input type="date" id="txtEnd" name="txtEnd" readonly></td>
                <td><input type="submit" name="btnSubmit" value="Submit"></td>
            </tr>
        </form>
    </table>
    <script>
        function setDate() {
            var someDate = new Date(document.getElementById("txtStart").value);
            var numberOfDaysToAdd = parseInt(document.getElementById("txtDuration").value) - 1;
            someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
            var dd = someDate.getDate();
            var mm = someDate.getMonth() + 1;
            var y = someDate.getFullYear();
            var someFormattedDate = y + '-' + ('0' + mm).slice(-2) + '-' + ('0' + dd).slice(-2);
            document.getElementById("txtEnd").value = someFormattedDate;
        }
    </script>
</body>

</html>