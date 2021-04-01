<?php
$Conn = mysqli_connect("localhost", "root", "", "desiging_application");
if (isset($_POST["btnSubmit"])) {
    $resource = implode(",", $_POST["cboResorce"]);
    $Query = "UPDATE design_task_interface SET resources='" . $resource . "' WHERE task_id=" . $_POST["ID"];
    mysqli_query($Conn, $Query);
}
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
            <th>Resorce</th>
            <th>-</th>
        </tr>
        <?php
        $i = 1;
        $Query = "SELECT * FROM design_task_interface";
        $rstRow = mysqli_query($Conn, $Query);
        if (mysqli_num_rows($rstRow)) {
            while ($objRow = mysqli_fetch_object($rstRow)) {
        ?>
                <form name="Form" method="post">
                    <tr>
                        <td><?= $objRow->task_id; ?></td>
                        <td><?= $objRow->name; ?></td>
                        <td><?= $objRow->duration; ?></td>
                        <td><?= $objRow->start_date; ?></td>
                        <td><?= $objRow->end_date; ?></td>
                        <td>
                            <select name="cboResorce[]" multiple="multiple">
                                <?php
                                $selected = explode(",", $objRow->resources);
                                $Query = "SELECT * FROM design_resource";
                                $rstPro = mysqli_query($Conn, $Query);
                                if (mysqli_num_rows($rstPro)) {
                                    while ($objPro = mysqli_fetch_object($rstPro)) {
                                        if (in_array($objPro->id, $selected)) {
                                            $select = "selected";
                                        } else {
                                            $select = "";
                                        }
                                ?>

                                        <option <?= $select; ?> value="<?= $objPro->id; ?>"><?= $objPro->name; ?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input type="hidden" value="<?= $objRow->task_id; ?>" name="ID">
                        </td>
                        <td><input type="submit" name="btnSubmit" value="Submit"></td>
                    </tr>
                </form>
        <?php
                $i++;
            }
        }
        ?>
    </table>
</body>

</html>