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
            <th>Resource Name</th>
            <th>Type</th>
            <th>Material</th>
            <th>Max no of resources</th>
            <th>St.Rate</th>
            <th>OVt.</th>
            <th>Cost/Use</th>
        </tr>
        <?php
        $i = 1;
        $Query = "SELECT * FROM design_resource";
        $rstRow = mysqli_query($Conn, $Query);
        if (mysqli_num_rows($rstRow)) {
            while ($objRow = mysqli_fetch_object($rstRow)) {
        ?>
                <tr>
                    <td><?= $objRow->name; ?></td>
                    <td><?= $objRow->type; ?></td>
                    <td><?= $objRow->material; ?></td>
                    <td><?= $objRow->resources; ?></td>
                    <td><?= $objRow->rate; ?></td>
                    <td><?= $objRow->ovt; ?></td>
                    <td><?= $objRow->cost; ?></td>
                </tr>
        <?php
                $i++;
            }
        }
        ?>
    </table>
</body>

</html>