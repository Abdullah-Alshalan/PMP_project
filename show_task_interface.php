<?php
    $Conn = mysqli_connect("localhost","root","","desiging_application");

?>
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

    </tr>
    <?php
        $i = 1;
        $Query = "SELECT * FROM design_task_interface";
        $rstRow = mysqli_query($Conn,$Query);
        if(mysqli_num_rows($rstRow))
        {
            while ($objRow = mysqli_fetch_object($rstRow))
            {
    ?>
                <tr>
                    <td><?= $objRow->task_id; ?></td>
                    <td><?= $objRow->name; ?></td>
                    <td><?= $objRow->duration; ?></td>
                    <td><?= $objRow->start_date; ?></td>
                    <td><?= $objRow->end_date; ?></td>

                </tr>
    <?php
                $i++;
            }

        }
    ?>

</table>

</body>
</html>