<?php
if (isset($_POST['search'])) {
    $user = 'root';
    $password = '';

    $batabase = 'bustravels';

    $servername = 'localhost:3306';

    $mysqli = new mysqli($servername, $user, $password, $batabase);

    if ($mysqli->connect_error) {
        die('Connect Error (' .
            $mysqli->connect_errno . ') ' .
            $mysqli->connect_error);
    }

    $query = "SELECT * FROM route WHERE departure='" . $_POST['departure'] . "' AND arrival='" . $_POST['arrival'] . "'AND  datetype='" . $_POST['datetype'] . "'";
    $result = $mysqli->query($query);
    $mysqli->close();

    if (mysqli_num_rows($result) >= 1) {
        $result_fetch = mysqli_fetch_assoc($result);
        #if data matched
        $_SESSION['departure'] = $result_fetch['departure'];
        $_SESSION['arrival'] = $result_fetch['arrival'];
        echo 'login in';
        header("location:http://localhost/BUS_TRAVELS/Customerroute.php?departure=" . $_POST['departure'] . "&arrival=" . $_POST['arrival'] . "&datetype=" . $_POST['datetype']);
    } else {
        echo "
                <script>
                alert('No data store');
                window.location.href='route.php';
                </script>
                ";
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Route</title>
    <link rel="stylesheet" type="text/css" href="ROUTE.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
    <div class="header">
        <div>
        <img src="bus1.1.jpg" alt="BUS" height="60" width="100" align="left">&nbsp;&nbsp;&nbsp&nbsp
        <h1>BUS TRAVELS</h1>
</div>
        <form action="login.php">
        <button name="Logout" class="logout"><i class='bx bx-log-out-circle bx-flip-vertical' style='color:#fffafa'></i></button>
        </form>
    </div>
    <form action="route.php" method="post">

        <div class="Journey">


            <input type="text" list="departure" name="departure" class="input-box" placeholder="FROM..." style="margin-left:50px;" autocomplete="off" required>
            <datalist id="departure">
                <option value="AGARTALA">
                <option value="AGRA">
                <option value="AHMEDABAD ">
                <option value="AIZWAL">
                <option value="AJMER">
                <option value="ALLAHABAD ">
                <option value="ALLEPPEY">
                <option value="ALIBAUG">
                <option value="ALMORA">
                <option value="ALSISAR">
                <option value="ALWAR">
                <option value="AMBALA">
                <option value="AMLA">
                <option value="AMRITSAR">
                <option value="ANAND">
                <option value="ANKLESHWAR">
                <option value="ASHTAMUDI">
                <option value="AULI">
                <option value="AURANGABAD">

                <option value="BADDI">
                <option value="BADRINATH">
                <option value="BALASINOR">
                <option value="BALRAMPUR">
                <option value="BAMBORA">
                <option value="BANDHAVGARH">
                <option value="BANDIPUR">
                <option value="BANGALORE">
                <option value="BARBIL">
                <option value="BAREILLY">
                <option value="BEHROR">
                <option value="BELGAUM">
                <option value="BERHAMPUR">
                <option value="BERHAMPUR">
                <option value="BHARATPUR">
                <option value="BHANDARDARA">
                <option value="BHARUCH">
                <option value="BHAVANGADH">
                <option value="BHAVNAGAR">
                <option value="BHILAI">
                <option value="BHIMTAL">
                <option value="BHOPAL">
                <option value="BHUBANESHWAR">
                <option value="BHUJ">
                <option value="BIKANER">
                <option value="BINSAR">
                <option value="BANDIPUR">
                <option value="BODHGAYA">
                <option value="BUNDI">

                <option value="CALICUT">
                <option value="CANANNORE">
                <option value="CHAIL">
                <option value="CHAMBA">
                <option value="CHANDIGARH">
                <option value="CHENNAI">
                <option value="CHIKMAGALUR">
                <option value="CHIPLUN">
                <option value="CHITRAKOOT">
                <option value="CHITTORGARH">
                <option value="COIMBATORE">
                <option value="COONOOR">
                <option value="COORG">
                <option value="CORBETT NATIONAL PARK">
                <option value="CUTTACK">

                <option value="DABHOSA">
                <option value="DALHOUSIE">
                <option value="DAMAN">
                <option value="DANDELI">
                <option value="DAPOLI">
                <option value="DARJEELING">
                <option value="DAUSA">
                <option value="DEHRADUN">
                <option value="DHARAMSHALA">
                <option value="DIBRUGARH">
                <option value="DIGHA">
                <option value="DIU">
                <option value="DIVE AGAR">
                <option value="DOOARS">
                <option value="DURGAPUR">
                <option value="DURSHET">
                <option value="DWARKA">

                <option value="FARIDABAD">
                <option value="FIROZABAD">

                <option value="GANGOTRI">
                <option value="GANGTOK">
                <option value="GANAPATIPULE">
                <option value="GANDHIDHAM">
                <option value="GANDHINAGAR">
                <option value="GARHMUKTESHWAR">
                <option value="GARHWAL">
                <option value="GAYA">
                <option value="GHAZIABAD">
                <option value="GOA">
                <option value="GOKHARNA">
                <option value="GONDAL">
                <option value="GORAKHPUR">
                <option value="GREATER NOIDA">
                <option value="GULMARG">
                <option value="GURGAON">
                <option value="GURUVAYOOR">
                <option value="GUWAHATI">
                <option value="GWALIOR">

                <option value="HALEBID">
                <option value="HAMPI">
                <option value="HANSI">
                <option value="HARIDWAR">
                <option value="HASSAN">
                <option value="HOSPET">
                <option value="HOSUR">
                <option value="HUBLI">
                <option value="HYDERABAD">
                    
                <option value="IDUKKI">
                <option value="IGATPURI">
                <option value="IMPHAL">
                <option value="INDORE">

                <option value="JABALPUR">
                <option value="JAIPUR">
                <option value="JAISALMER">
                <option value="JALANDHAR">
                <option value="JALGAON">
                <option value="JAMBUGODHA">
                <option value="JAMMU">
                <option value="JAMNAGAR">
                <option value="JAMSHEDPUR">
                <option value="JAWHAR">
                <option value="JHANSI">
                <option value="JODHPUR">
                <option value="JOJAWAR">
                <option value="JORHAT">
                <option value="JUNAGADH">

                <option value="KABINI">
                <option value="KALIMPONG">
                <option value="KANATAL">
                <option value="KANCHIPURAM">
                <option value="KANHA">
                <option value="KANPUR">
                <option value="KANYAKUMARI">
                <option value="KARGIL">
                <option value="KARJAT">
                <option value="KARNAL">
                <option value="KARNATAKA">
                <option value="KARUR">
                <option value="KARWAR">
                <option value="KASARGOD">
                <option value="KASAULI">
                <option value="KASHIPUR">
                <option value="KASHID">
                <option value="KATRA">    
                <option value="KAUSANI">
                <option value="KAZA">
                <option value="KAZIRANGA">
                <option value="KEDARNATH">
                <option value="KHAJJIAR">
                <option value="KHAJURAHO">
                <option value="KHANDALA">
                <option value="KHIMSAR">
                <option value="KOCHIN">
                <option value="KODAIKANAL">
                <option value="KOLHAPUR">
                <option value="KOLKATA">
                <option value="KOLLAM">
                <option value="KOTA">
                <option value="KOTAGIRI">
                <option value="KOTTAYAM">
                <option value="KOVALAM">
                <option value="KUFRI">
                <option value="KUMBALGARH">
                <option value="KULLU">
                <option value="KUMARAKOM">
                <option value="KUMBAKONAM">
                <option value="KUMILY">
                <option value="KURSEONG">
                <option value="KUSHINAGAR">

                <option value="LACHUNG">
                <option value="LEH">
                <option value="LAKSHADWEEP">
                <option value="LONAVALA">
                <option value="LOTHAL">
                <option value="LUCKNOW">
                <option value="LUDHIANA">
                <option value="LUMBINI">

                <option value="MADURAI">
                <option value="MAHABALESHWAR">
                <option value="MAHABALIPURAM">
                <option value="MALAPPURAM">
                <option value="MALPE">
                <option value="MALSHEJ GHAT">
                <option value="MALVAN">
                <option value="MANALI">
                <option value="MANDAVI">
                <option value="MANDAWA">
                <option value="MANESAR">
                <option value="MARARRI">
                <option value="MANDORMONI">
                <option value="MANGALORE">
                <option value="MANMAD">
                <option value="MARCHULA">
                <option value="MATHERAN">
                <option value="MATHURA">
                <option value="MCLEODGANJ">
                <option value="MOHALI">
                <option value="MOUNT ABU">
                <option value="MORADABAD">
                <option value="MORBI">
                <option value="MUKTESHWAR">
                <option value="MUMBAI">
                <option value="MUMBAI">
                <option value="MUNNAR">
                <option value="MURUD JANJIRA">
                <option value="MUSSOORIE">
                <option value="MYSORE">

                <option value="NADUKANI">
                <option value="NAGAPATTINAM">
                <option value="NAGARHOLE">
                <option value="NAGAUR FORT">
                <option value="NAGOTHANE">
                <option value="NAGPUR">
                <option value="NAHAN">
                <option value="NAINITAL">
                <option value="NALDHERA">
                <option value="NANDED">
                <option value="NAPNE">
                <option value="NASHIK">
                <option value="NAVI MUMBAI">
                <option value="NERAL">
                <option value="NEW DELHI">
                <option value="NILGIRI">
                <option value="NOIDA">

                <option value="OOTY">
                <option value="ORCHHA">
                <option value="OSIAN">

                <option value="PACHMARHI">
                <option value="PALAMPUR">
                <option value="PALANPUR">
                <option value="PALI">
                <option value="PAHALGAM">
                <option value="PALITANA">
                <option value="PALLAKAD">
                <option value="PANCHGANI">
                <option value="PANCHKULA">
                <option value="PANNA">
                <option value="PANHALA">
                <option value="PANVEL">
                <option value="PANTNAGAR">
                <option value="PARWANOO">
                <option value="PATIALA">
                <option value="PATHANKOT">
                <option value="PATNA">
                <option value="PATNITOP">
                <option value="PELLING">
                <option value="PENCH">
                <option value="PHAGWARA">
                <option value="PHALODI">
                <option value="PINJORE">
                <option value="PONDICHERRY">
                <option value="POOVAR">
                <option value="PORBANDAR">
                <option value="PORT BLAIR">
                <option value="POSHINA">
                <option value="PRAGPUR">
                <option value="PUNE">
                <option value="PURI">
                <option value="PUSKHAR">
                <option value="PUTTAPARTHI">

                <option value="RAI BAREILLY">
                <option value="RAICHAK">
                <option value="RAIPUR">
                <option value="RAJASTHAN">
                <option value="RAJGIR">
                <option value="RAJKOT">
                <option value="RAJPIPLA">
                <option value="RAJSAMAND">
                <option value="RAJAHMUNDRY">
                <option value="RAMESHWARAM">
                <option value="RAM NAGAR">
                <option value="RAMGARH">
                <option value="RANAKPUR">
                <option value="RANCHI">
                <option value="RANIKHET">
                <option value="RANNY">
                <option value="RANTHAMBORE">
                <option value="RATNAGIRI">
                <option value="RAVANGLA">
                <option value="RISHIKESH">
                <option value="RISHYAP">
                <option value="ROHETGARH">
                <option value="ROURKELA">

                <option value="SAJAN">
                <option value="SALEM">
                <option value="SAPUTARA">
                <option value="SASAN GIR">
                <option value="SATTAL">
                <option value="SAWAI MADHOPUR">
                <option value="SAWANTWADI">
                <option value="SECUNDERABAD">
                <option value="SHILLONG">
                <option value="SHIMLA">
                <option value="SHIMLIPAL">
                <option value="SHIRDI">
                <option value="SHARAVANBELGOLA">
                <option value="SHIVANASAMUDRA">
                <option value="SIANA">
                <option value="SILIGURI">
                <option value="SILVASSA">
                <option value="SIVAGANGA DISTRICT">
                <option value="SOLAN">
                <option value="SRINAGAR">
                <option value="SUNDERBAN">
                <option value="SURAT">

                <option value="TANJORE">
                <option value="TAPOLA">
                <option value="TARAPITH">
                <option value="THANE">
                <option value="THEKKADY">
                <option value="THIRVANNAMALAI">
                <option value="THIRUVANANTHAPURAM">
                <option value="TIRUCHIRAPALLI">
                <option value="TIRUPUR">
                <option value="TIRUPATI">
                <option value="THRISSUR">

                <option value="UDAIPUR">
                <option value="UDHAMPUR">
                <option value="UDUPI">
                <option value="UJJAIN">
                <option value="UTTARKASHI">

                <option value="VADODARA">
                <option value="VAGAMON">
                <option value="VARKALA">
                <option value="VAPI">
                <option value="VARANASI">
                <option value="VELANKANNI">
                <option value="VELLORE">
                <option value="VERAVAL">
                <option value="VIJAYAWADA">
                <option value="VIKRAMGADH">
                <option value="VISHAKAPATNAM">

                <option value="WAYANAD	KERALA">
                <option value="WANKANER">

                <option value="YAMUNOTRI">
                <option value="YERCAUD">
                <option value="YUKSOM">        
            </datalist>
            <input type="text" list="arrival" name="arrival" class="input-box" placeholder="TO..."autocomplete="off" required>
            <datalist id="arrival">
            <option value="AGARTALA">
                <option value="AGRA">
                <option value="AHMEDABAD ">
                <option value="AIZWAL">
                <option value="AJMER">
                <option value="ALLAHABAD ">
                <option value="ALLEPPEY">
                <option value="ALIBAUG">
                <option value="ALMORA">
                <option value="ALSISAR">
                <option value="ALWAR">
                <option value="AMBALA">
                <option value="AMLA">
                <option value="AMRITSAR">
                <option value="ANAND">
                <option value="ANKLESHWAR">
                <option value="ASHTAMUDI">
                <option value="AULI">
                <option value="AURANGABAD">

                <option value="BADDI">
                <option value="BADRINATH">
                <option value="BALASINOR">
                <option value="BALRAMPUR">
                <option value="BAMBORA">
                <option value="BANDHAVGARH">
                <option value="BANDIPUR">
                <option value="BANGALORE">
                <option value="BARBIL">
                <option value="BAREILLY">
                <option value="BEHROR">
                <option value="BELGAUM">
                <option value="BERHAMPUR">
                <option value="BERHAMPUR">
                <option value="BHARATPUR">
                <option value="BHANDARDARA">
                <option value="BHARUCH">
                <option value="BHAVANGADH">
                <option value="BHAVNAGAR">
                <option value="BHILAI">
                <option value="BHIMTAL">
                <option value="BHOPAL">
                <option value="BHUBANESHWAR">
                <option value="BHUJ">
                <option value="BIKANER">
                <option value="BINSAR">
                <option value="BANDIPUR">
                <option value="BODHGAYA">
                <option value="BUNDI">

                <option value="CALICUT">
                <option value="CANANNORE">
                <option value="CHAIL">
                <option value="CHAMBA">
                <option value="CHANDIGARH">
                <option value="CHENNAI">
                <option value="CHIKMAGALUR">
                <option value="CHIPLUN">
                <option value="CHITRAKOOT">
                <option value="CHITTORGARH">
                <option value="COIMBATORE">
                <option value="COONOOR">
                <option value="COORG">
                <option value="CORBETT NATIONAL PARK">
                <option value="CUTTACK">

                <option value="DABHOSA">
                <option value="DALHOUSIE">
                <option value="DAMAN">
                <option value="DANDELI">
                <option value="DAPOLI">
                <option value="DARJEELING">
                <option value="DAUSA">
                <option value="DEHRADUN">
                <option value="DHARAMSHALA">
                <option value="DIBRUGARH">
                <option value="DIGHA">
                <option value="DIU">
                <option value="DIVE AGAR">
                <option value="DOOARS">
                <option value="DURGAPUR">
                <option value="DURSHET">
                <option value="DWARKA">

                <option value="FARIDABAD">
                <option value="FIROZABAD">

                <option value="GANGOTRI">
                <option value="GANGTOK">
                <option value="GANAPATIPULE">
                <option value="GANDHIDHAM">
                <option value="GANDHINAGAR">
                <option value="GARHMUKTESHWAR">
                <option value="GARHWAL">
                <option value="GAYA">
                <option value="GHAZIABAD">
                <option value="GOA">
                <option value="GOKHARNA">
                <option value="GONDAL">
                <option value="GORAKHPUR">
                <option value="GREATER NOIDA">
                <option value="GULMARG">
                <option value="GURGAON">
                <option value="GURUVAYOOR">
                <option value="GUWAHATI">
                <option value="GWALIOR">

                <option value="HALEBID">
                <option value="HAMPI">
                <option value="HANSI">
                <option value="HARIDWAR">
                <option value="HASSAN">
                <option value="HOSPET">
                <option value="HOSUR">
                <option value="HUBLI">
                <option value="HYDERABAD">
                    
                <option value="IDUKKI">
                <option value="IGATPURI">
                <option value="IMPHAL">
                <option value="INDORE">

                <option value="JABALPUR">
                <option value="JAIPUR">
                <option value="JAISALMER">
                <option value="JALANDHAR">
                <option value="JALGAON">
                <option value="JAMBUGODHA">
                <option value="JAMMU">
                <option value="JAMNAGAR">
                <option value="JAMSHEDPUR">
                <option value="JAWHAR">
                <option value="JHANSI">
                <option value="JODHPUR">
                <option value="JOJAWAR">
                <option value="JORHAT">
                <option value="JUNAGADH">

                <option value="KABINI">
                <option value="KALIMPONG">
                <option value="KANATAL">
                <option value="KANCHIPURAM">
                <option value="KANHA">
                <option value="KANPUR">
                <option value="KANYAKUMARI">
                <option value="KARGIL">
                <option value="KARJAT">
                <option value="KARNAL">
                <option value="KARUR">
                <option value="KARWAR">
                <option value="KASARGOD">
                <option value="KASAULI">
                <option value="KASHIPUR">
                <option value="KASHID">
                <option value="KARNATAKA">
                <option value="KATRA">    
                <option value="KAUSANI">
                <option value="KAZA">
                <option value="KAZIRANGA">
                <option value="KEDARNATH">
                <option value="KHAJJIAR">
                <option value="KHAJURAHO">
                <option value="KHANDALA">
                <option value="KHIMSAR">
                <option value="KOCHIN">
                <option value="KODAIKANAL">
                <option value="KOLHAPUR">
                <option value="KOLKATA">
                <option value="KOLLAM">
                <option value="KOTA">
                <option value="KOTAGIRI">
                <option value="KOTTAYAM">
                <option value="KOVALAM">
                <option value="KUFRI">
                <option value="KUMBALGARH">
                <option value="KULLU">
                <option value="KUMARAKOM">
                <option value="KUMBAKONAM">
                <option value="KUMILY">
                <option value="KURSEONG">
                <option value="KUSHINAGAR">

                <option value="LACHUNG">
                <option value="LEH">
                <option value="LAKSHADWEEP">
                <option value="LONAVALA">
                <option value="LOTHAL">
                <option value="LUCKNOW">
                <option value="LUDHIANA">
                <option value="LUMBINI">

                <option value="MADURAI">
                <option value="MAHABALESHWAR">
                <option value="MAHABALIPURAM">
                <option value="MALAPPURAM">
                <option value="MALPE">
                <option value="MALSHEJ GHAT">
                <option value="MALVAN">
                <option value="MANALI">
                <option value="MANDAVI">
                <option value="MANDAWA">
                <option value="MANESAR">
                <option value="MARARRI">
                <option value="MANDORMONI">
                <option value="MANGALORE">
                <option value="MANMAD">
                <option value="MARCHULA">
                <option value="MATHERAN">
                <option value="MATHURA">
                <option value="MCLEODGANJ">
                <option value="MOHALI">
                <option value="MOUNT ABU">
                <option value="MORADABAD">
                <option value="MORBI">
                <option value="MUKTESHWAR">
                <option value="MUMBAI">
                <option value="MUNNAR">
                <option value="MURUD JANJIRA">
                <option value="MUSSOORIE">
                <option value="MYSORE">

                <option value="NADUKANI">
                <option value="NAGAPATTINAM">
                <option value="NAGARHOLE">
                <option value="NAGAUR FORT">
                <option value="NAGOTHANE">
                <option value="NAGPUR">
                <option value="NAHAN">
                <option value="NAINITAL">
                <option value="NALDHERA">
                <option value="NANDED">
                <option value="NAPNE">
                <option value="NASHIK">
                <option value="NAVI MUMBAI">
                <option value="NERAL">
                <option value="NEW DELHI">
                <option value="NILGIRI">
                <option value="NOIDA">

                <option value="OOTY">
                <option value="ORCHHA">
                <option value="OSIAN">

                <option value="PACHMARHI">
                <option value="PALAMPUR">
                <option value="PALANPUR">
                <option value="PALI">
                <option value="PAHALGAM">
                <option value="PALITANA">
                <option value="PALLAKAD">
                <option value="PANCHGANI">
                <option value="PANCHKULA">
                <option value="PANNA">
                <option value="PANHALA">
                <option value="PANVEL">
                <option value="PANTNAGAR">
                <option value="PARWANOO">
                <option value="PATIALA">
                <option value="PATHANKOT">
                <option value="PATNA">
                <option value="PATNITOP">
                <option value="PELLING">
                <option value="PENCH">
                <option value="PHAGWARA">
                <option value="PHALODI">
                <option value="PINJORE">
                <option value="PONDICHERRY">
                <option value="POOVAR">
                <option value="PORBANDAR">
                <option value="PORT BLAIR">
                <option value="POSHINA">
                <option value="PRAGPUR">
                <option value="PUNE">
                <option value="PURI">
                <option value="PUSKHAR">
                <option value="PUTTAPARTHI">

                <option value="RAI BAREILLY">
                <option value="RAICHAK">
                <option value="RAIPUR">
                <option value="RAJASTHAN">
                <option value="RAJGIR">
                <option value="RAJKOT">
                <option value="RAJPIPLA">
                <option value="RAJSAMAND">
                <option value="RAJAHMUNDRY">
                <option value="RAMESHWARAM">
                <option value="RAM NAGAR">
                <option value="RAMGARH">
                <option value="RANAKPUR">
                <option value="RANCHI">
                <option value="RANIKHET">
                <option value="RANNY">
                <option value="RANTHAMBORE">
                <option value="RATNAGIRI">
                <option value="RAVANGLA">
                <option value="RISHIKESH">
                <option value="RISHYAP">
                <option value="ROHETGARH">
                <option value="ROURKELA">

                <option value="SAJAN">
                <option value="SALEM">
                <option value="SAPUTARA">
                <option value="SASAN GIR">
                <option value="SATTAL">
                <option value="SAWAI MADHOPUR">
                <option value="SAWANTWADI">
                <option value="SECUNDERABAD">
                <option value="SHILLONG">
                <option value="SHIMLA">
                <option value="SHIMLIPAL">
                <option value="SHIRDI">
                <option value="SHARAVANBELGOLA">
                <option value="SHIVANASAMUDRA">
                <option value="SIANA">
                <option value="SILIGURI">
                <option value="SILVASSA">
                <option value="SIVAGANGA DISTRICT">
                <option value="SOLAN">
                <option value="SRINAGAR">
                <option value="SUNDERBAN">
                <option value="SURAT">

                <option value="TANJORE">
                <option value="TAPOLA">
                <option value="TARAPITH">
                <option value="THANE">
                <option value="THEKKADY">
                <option value="THIRVANNAMALAI">
                <option value="THIRUVANANTHAPURAM">
                <option value="TIRUCHIRAPALLI">
                <option value="TIRUPUR">
                <option value="TIRUPATI">
                <option value="THRISSUR">

                <option value="UDAIPUR">
                <option value="UDHAMPUR">
                <option value="UDUPI">
                <option value="UJJAIN">
                <option value="UTTARKASHI">

                <option value="VADODARA">
                <option value="VAGAMON">
                <option value="VARKALA">
                <option value="VAPI">
                <option value="VARANASI">
                <option value="VELANKANNI">
                <option value="VELLORE">
                <option value="VERAVAL">
                <option value="VIJAYAWADA">
                <option value="VIKRAMGADH">
                <option value="VISHAKAPATNAM">

                <option value="WAYANAD	KERALA">
                <option value="WANKANER">

                <option value="YAMUNOTRI">
                <option value="YERCAUD">
                <option value="YUKSOM">
            </datalist>
            <input name="datetype" type="date" class="input-box" required>
            <button type="submit" name="search" class="search">SEARCH</button><br>


        </div>

    </form>
    <?php
    if (isset($_POST['Logout'])) {
        session_destroy();
        echo "<script>alert('Are you really want to logout')</script>";
        echo "<script>location.href='http://localhost/BUS_TRAVELS/login.php'</script>";
        exit();
    }


    ?>
</body>

</html>