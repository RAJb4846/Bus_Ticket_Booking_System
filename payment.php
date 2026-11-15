<?php
include 'connection.php';

session_start();

if (isset($_POST['submit'])) {
  $cardname = $_POST['cardname'];
  $cardnumber = $_POST['cardnumber'];
  $expmonth = $_POST['expmonth'];
  $expyear = $_POST['expyear'];
  $cvv = $_POST['cvv'];

  $sql = "insert into `payment` (cardname,cardnumber,expmonth,expyear,cvv) values('$cardname','$cardnumber','$expmonth','$expyear','$cvv')";
  $result = mysqli_query($con, $sql);

  if ($result) {
    //echo "data inseretd successfully";
    header('location:http://localhost/BUS_TRAVELS/receipt.php');
  } else {
    die(mysqli_error($con));
  }
}
?>

<!DOCTYPE html>
<html>
<title>PAYMENT</title>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: 'News701 BT''Times New Roman', Times, serif;
      font-size: 17px;
      padding: 8px;

    }

    * {
      box-sizing: border-box;
    }

    .row {
      display: -ms-flexbox;
      /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap;
      /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
      font-size: 20px;
    }

    .col-25 {
      -ms-flex: 25%;
      /* IE10 */
      flex: 25%;
    }

    .col-50 {
      -ms-flex: 50%;
      /* IE10 */
      flex: 50%;
    }

    .col-75 {
      -ms-flex: 75%;
      /* IE10 */
      flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }

    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
      width: 500px;
      margin-left: auto;
      margin-right: auto;
    }

    .container2 {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;

    }

    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type=month] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    label {
      margin-bottom: 10px;
      display: block;
    }

    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }

    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }

    .btn:hover {
      background-color: #45a049;
    }

    a {
      color: #2196F3;
    }

    hr {
      border: 1px solid lightgrey;
    }

    span.price {
      float: right;
      color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }

      .col-25 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>

  <div class="row">
    <div class="col-75">
      <div class="container">
        <form method="POST">

          <div class="row">


            <div class="col-50">
              <h3 style="text-align:center;">Payment</h3>
              <label for="fname" style="text-align:center;">Accepted Cards</label>
              <div class="icon-container" style="text-align:center;">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <?php
              $totalPrice = (int)$_SESSION["basePrice"] * (int)$_SESSION["totalSeats"];
              $_SESSION["totalPrice"] = $totalPrice;

              if (isset($_GET['passenger1-name'])) {
                $_SESSION["passenger1-name"] = $_GET['passenger1-name'];
                $_SESSION["passenger1-gender"] = $_GET['passenger1-gender'];
                $_SESSION["passenger1-age"] = $_GET['passenger1-age'];
              }
              if (isset($_GET['passenger2-name'])) {
                $_SESSION["passenger2-name"] = $_GET['passenger2-name'];
                $_SESSION["passenger2-gender"] = $_GET['passenger2-gender'];
                $_SESSION["passenger2-age"] = $_GET['passenger2-age'];
              }
              if (isset($_GET['passenger3-name'])) {
                $_SESSION["passenger3-name"] = $_GET['passenger3-name'];
                $_SESSION["passenger3-gender"] = $_GET['passenger3-gender'];
                $_SESSION["passenger3-age"] = $_GET['passenger3-age'];
              }
              if (isset($_GET['passenger4-name'])) {
                $_SESSION["passenger4-name"] = $_GET['passenger4-name'];
                $_SESSION["passenger4-gender"] = $_GET['passenger4-gender'];
                $_SESSION["passenger4-age"] = $_GET['passenger4-age'];
              }
              if (isset($_GET['passenger5-name'])) {
                $_SESSION["passenger5-name"] = $_GET['passenger5-name'];
                $_SESSION["passenger5-gender"] = $_GET['passenger5-gender'];
                $_SESSION["passenger5-age"] = $_GET['passenger5-age'];
              }
              if (isset($_GET['passenger6-name'])) {
                $_SESSION["passenger6-name"] = $_GET['passenger6-name'];
                $_SESSION["passenger6-gender"] = $_GET['passenger6-gender'];
                $_SESSION["passenger6-age"] = $_GET['passenger6-age'];
              }

              ?>
              <label>Total Price: </label><input type="text" name="total" value="<?php echo "Rs. " .  $totalPrice . "/-" ?>" disabled>
              <label>Name on Card</label><input type="text" name="cardname" placeholder="Name" required>
              <label>Credit card number</label><input type="text" name="cardnumber" data-mask="0000 0000 0000 0000" placeholder="1111 2222 3333 4444" required>
              <div class="row">
                <div class="col-25">
                  <label>Exp Month</label>
                  <input type="text" list="expmonth" name="expmonth" autocomplete="off" required>
                <datalist id="expmonth">
                <option value="January">
                <option value="February">
                <option value="March">
                <option value="April">
                <option value="May">
                <option value="June">
                <option value="July">
                <option value="August">
                <option value="September">
                <option value="October">
                <option value="November">
                <option value="December">   
                </datalist>
                

                  <label>Exp Year</label><input type="text" name="expyear" data-mask="0000" placeholder="20--" required>
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label><input type="text" name="cvv" data-mask="000" placeholder="000" required>
                </div>
              </div>
            </div>
          </div>
          <button class="btn" name="submit">Continue to checkout</button>
        </form>
      </div>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>