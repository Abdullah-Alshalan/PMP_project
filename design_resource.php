<?php
$Conn = mysqli_connect("localhost", "root", "", "desiging_application");
if (isset($_POST["btnSubmit"])) {
    $Query = "INSERT INTO design_resource(name, type, material, resources, rate, ovt, cost) 
          VALUES ('" . $_POST["txtName"] . "','" . $_POST["cboType"] . "','" . $_POST["txtMaterial"] . "','" . $_POST["txtResources"] . "',
          '" . $_POST["txtRate"] . "','" . $_POST["txtOvt"] . "','" . $_POST["txtCost"] . "')";
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
            <th>Resource Name</th>
            <th>Type</th>
            <th>Material</th>
            <th>Max no of resources</th>
            <th>St.Rate</th>
            <th>OVt.</th>
            <th>Cost/Use</th>
            <td>-</td>
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
                    <td></td>
                </tr>
        <?php
                $i++;
            }
        }
        ?>
        <form name="Form" method="post">
            <tr>
                <td><input type="text" name="txtName"></td>
                <td>
                    <select name="cboType">
                        <option value="Work">Work</option>
                        <option value="Cost">Cost</option>
                        <option value="Material">Material</option>
                    </select>
                </td>
                <td><input type="text" name="txtMaterial"></td>
                <td><input type="number" name="txtResources">%</td>
                <td><input type="number" name="txtRate">$/hr</td>
                <td><input type="number" name="txtOvt"></td>
                <td><input type="number" name="txtCost"></td>
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