<?php
// Check if $residentName is defined and not empty
if (isset($residentName) && !empty($residentName)) {
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size: 8in 11in;
            margin: 0;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
        .print-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            height: 100vh;
        }
        .paper {
            width: 8in;
            height: 11in;
            border: 5px solid blue;
            box-sizing: border-box;
            padding: 0;
            display: flex;
        }
        .content {
            width: 6in;
            padding: 2cm;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            margin-top: -70px;
            font-size: 12pt;
            line-height: 1;
        }
        .logo-left {
            width: 100px;
            height: auto;
            margin: 0 10px;
        }
        .logo-right {
            width: 80px;
            height: auto;
            margin: 0 10px;
        }
        .certificate {
        text-align: center;
        font-size: 16pt;
        margin-top: -40px;
        position: relative; /* Add this line to make the line position relative to this element */
        }

        .certificate::before {
            content: "";
            display: block;
            width: 100%;
            height: 5px; /* Adjust the thickness of the line as needed */
            background-color: blue;
            position: absolute;
            top: 3 px; /* Adjust the position of the line above the text */
            left: 0;
        }
        .business-operator p {
            font-weight: bold;
            font-size: 12pt;
            text-align: center;
            margin-top: -40px;
        }
        .first{
            text-indent: 2em;
            font-size: 12pt;
            text-align: justify;
        }
        .signature{
            font-size: 12pt;
            font-weight: bold;
            text-align: center;
            text-decoration: underline;
        }
        .signatures{
            font-size: 12pt;
            font-weight: bold;
            text-align: center;
            line-height: 1;
        }
        .business-operator-box {
            float: left;
            text-align: center;
            width: 20%;
            border: 4px solid blue;
            margin-top: -300px; /* Adjust as needed */
        }

        .business-operator-box p {
            font-weight: bold;
            font-size: 10pt;
            margin-top: 5px; /* Adjust as needed */
            line-height: .5;
        }
        
        .type {
            float: right;
            text-align: center;
            width: 20%;
            border: 4px solid blue;
            margin-top: -300px; /* Adjust as needed */
        }

        .type p {
            font-weight: bold;
            font-size: 12pt;
            margin-top: 5px; /* Adjust as needed */
            line-height: .5;
        }

        .clearno {
            float: right;
            text-align: center;
            width: 20%;
            border: 4px solid blue;
            margin-top: -250px; /* Adjust as needed */
        }
        .clearno p {
            font-weight: bold;
            font-size: 12pt;
            margin-top: 5px; /* Adjust as needed */
            line-height: .5;
        }
    </style>
</head>
<body>
<div class="print-button" onclick="window.print()">Print</div>
<div class="paper">
    <div class="content">
        <div class="header">
            <img class="logo-left" src="logo1.JPG" alt="Left Logo">
            <p>Republic of the Philippines<br>
                PROVINCE OF BUKIDNON<br>
                Municipality of Sumilao<br>
                Barangay Puntian<br>
                -o0o-<br>
                OFFICE OF THE PUNONG BARANGAY</p>
            <img class="logo-right" src="logo2.PNG" alt="Right Logo">
        </div>
        <div class="certificate">
            <h2>BARANGAY BUSINESS CLEARANCE</h2><br>
        </div>
        <div class="business-operator">
            <p style="font-weight: bold; font-size: 12pt;  text-decoration: underline;"><strong class="name" style="font-size: 18pt; color: red;"><?php echo $residentName; ?></strong></p><br>
            <p style="font-size: 12pt;">Name of Owner/Operator</p><br><br>
        </div>
        <div class="business-operator">
            <p style="font-weight: bold; font-size: 12pt;  text-decoration: underline;">PUNTIAN SUMILAO BUKIDNON</p><br>
            <p style="font-size: 12pt;">ADDRESS</p><br><br>
        </div>
        <div class="business-operator">
            <p style="font-weight: bold; font-size: 12pt;  text-decoration: underline;"><strong class="description" style="font-size: 18pt; color: red;"><?php echo $description; ?></strong></p><br>
            <p style="font-size: 12pt;">BUSINESS DESCRIPTION</p><br><br>
        </div>
        <div class="business-operator">
            <p style="font-weight: bold; font-size: 12pt;  text-decoration: underline;">PUNTIAN SUMILAO BUKIDNON</p><br>
            <p style="font-size: 12pt;">BUSINESS ADDRESS</p><br>
        </div>
        <div class="business-operator-box">
            <p>OR NO.</p>
            <p><strong class="orNo"><?php echo $orNo; ?></strong</p>
            <p>Amount Paid</p>
            <p><strong class="amount"><?php echo $amount; ?></strong</p>
        </div>
        <div class="type">
            <p><strong class="types"><?php echo $types; ?></strong</p>
        </div>
        <div class="clearno">
            <p>BUSINESS</p>
            <p>CLEARANCE</p>
            <p>NO.</p>
            <p><strong class="clearanceNO"><?php echo $clearanceNO; ?></strong</p>
        </div>
        <div class="first">
                    <p>This is to Certify that as per record of this Barangay, the above-mentioned person has been consistent in abiding Ordinances, Laws and other Rules and Regulations pertaining to the operation of the aforementioned business endeavor.</p>
                    <p>Issued upon the request of the above-mentioned person in support to his/her desire in securing Business Permit of the said business endeavor.</p>
                    <p>Valid until <strong class="validDate"><?php echo $validDate; ?></strong>, 2023 only unless sooner be revoked for a cause as provided by Law, Ordinance or Regulation</p>
                    <p>Issued this <strong class="date" style="font-size: 18pt;"><?php echo date("F j, Y"); ?></strong> at Puntian, Sumilao, Bukidnon.<br><br><br><br><br><br><br><br>
                </div>
                <div class="signature">
                    HON. TIRSO B. AMISTOSO<br>
                 </div>
                 <div class="signatures">
                    Punong Barangay<br><br>
                 </div>
    </div>
</div>
</body>
</html>
<?php
} else {
    // Handle the case where $residentName is not defined
    echo "Resident Name is not available.";
}
?>