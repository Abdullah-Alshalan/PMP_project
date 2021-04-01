<?php
$Conn = mysqli_connect("localhost", "root", "", "desiging_application");

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
            <th>Resource</th>
            <th>Cost</th>
        </tr>
        <?php
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
                    <td>
                        <?php
                        $i = 0;
                        $Costs = array();
                        $Cost = 0;
                        if (!empty($objRow->resources)) {
                            $Query = "SELECT * FROM design_resource WHERE id IN (" . $objRow->resources . ")";
                            $rstPro = mysqli_query($Conn, $Query);
                            if (mysqli_num_rows($rstPro) > 0) {
                                while ($objPro = mysqli_fetch_object($rstPro)) {
                                    $Cost = 0;
                                    echo "-> " . $objPro->name . "<br>";
                                    $Costs[$i] = $objRow->duration * 8 * $objPro->rate;
                                    $i++;
                                }
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($Costs as $v) {
                            echo "$" . $v . "<br>";
                        }
                        ?>
                    </td>
                </tr>
        <?php

            }
        }
        ?>

    </table>

</body>

</html>