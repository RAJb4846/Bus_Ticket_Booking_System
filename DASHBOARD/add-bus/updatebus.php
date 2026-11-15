<?php
include 'Connection.php';
$busId = $_GET['updateid'];
$sql = "Select * from `add-bus` where id='$busId'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>UPDATE BUS FORM</title>
    <link rel="stylesheet" type="text/css" href="addbus.css">
</head>

<body>
    <div class="container">
        <form id="updateBusDetails" method="POST" action="/BUS_TRAVELS/DASHBOARD/add-bus/update-id-db.php">
            <div class="form-group">
                <label>IMAGE:</label>
                <?php $thumbnail = base64_encode($row['image']); ?>
                <th><input type="file" class="input-box" name="image" autocomplete="off" required><img src='data:image/jpg;charset=utf8;base64,<?php echo $thumbnail ?>' width='100px' height='50px' /></th>
            </div>

            <div class="form-group">
                <label>BUS TYPE:</label>
                <select name="type" class="input-box" required>
                    <option value="NON-AC" <?php if ($row['bus_type'] == "NON-AC") echo "selected" ?>>NON-AC</option>
                    <option value="AC" <?php if ($row['bus_type'] == "AC") echo "selected" ?>>AC</option>
                    <option value="SLEEPER" <?php if ($row['bus_type'] == "SLEEPER") echo "selected" ?>>SLEEPER</option>
                </select>
            </div>

            <div class="form-group">
                <label>BUS NAME:</label>
                <input type="text" class="input-box" value="<?php echo $row['name'] ?>" placeholder="Enter Bus Name" name="name" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>BUS NUMBER:</label>
                <input type="text" class="input-box" value="<?php echo $row['bus_no'] ?>" placeholder="Enter Bus Number" name="bus_no" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label>BUS DETAILS:</label>
                <input type="text" class="input-box" value="<?php echo $row['bus_details'] ?>" name="bus_details" autocomplete="off" required>
            </div><br>

            <input type="hidden" name="updateid" value="<?php echo $busId ?>">
            <button type="submit" class="submit-btn" name="update">UPDATE</button>
        </form>
    </div>

    <script>
        const form = document.getElementById("updateBusDetails");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const submittedForm = e.target;
            const formData = new FormData(submittedForm);
            const response = await fetch('/BUS_TRAVELS/DASHBOARD/add-bus/update-id-db.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            location.href = data.redirectPath;
        });
    </script>
</body>

</html>