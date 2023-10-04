<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            size: 8in 11in;
            margin: 0;
        }
        @media print {
            /* Hide the print button when printing */
            .print-button {
                display: none;
            }
        }
        /* Style for the print button */
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
        .pink-box {
            width: 2in;
            background: pink;
            height: 96%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 20px;
        }
        .pink-box-text {
            font-size: 9pt;
            text-align: center;
            font-weight: bold;
        }
        .content {
            width: 6in;
            padding: 2cm;
            line-height: 1.5;
        }
        .name {
            font-size: 9pt;
            font-weight: bold;
        }
        .blue {
            color: blue;
            font-size: 6pt;
            text-align: center;
        }
        .black {
            color: black;
            font-size: 9pt;
            font-weight: bold;
            text-align: center;
        }
        .republic-title additional-info {
            font-size: 12pt;
            text-align: center;
        }
        .logos-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            width: 100px;
            height: 100px;
        }
        .content {
            padding-left:30px;
            display:float; 
            float:right;

        }
        .name {
            font-size: 9pt;
            font-weight: bold; 
        }

        .p {
        text-align: center;
        margin: 0;
        line-height: =1.5;
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

        .location-info {
        line-height: 1; /* Set line-height to 1 for no spacing */
        margin: 0; /* Remove any default margin */
        }

        .logo-left{
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
            font-size: 20pt;
            margin-top: -70px;
            margin-right: -60px; 

        }

        .letter{
            text-align: left;
            font-size: 12pt;  
            font-weight: bold;
            margin-top: -80px; 
        }

        .first{
            text-indent: 2em;
            font-size: 12pt;
            font-weight: bold;
            text-align: justify;
            margin-right: -40px; 
        }
        .or::before {
        content: "";
        display: block;
        width: 110%;
        height: 6px;
        background-color: blue;
        }
        .or{
            font-size: 12pt;
            font-weight: bold;
            text-align: right;
            margin-top: -10px;
            color: red; 
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
        .birth{
            font-size: 10pt;
            font-weight: normal;
            text-align: left;
            line-height: 1;
        }
        .signatures1{
          text-align: right;
        }

        .purpose{
          font-size: 14pt;
          font-weight: bold;
          text-align: left;
          line-height: 1;
        }
        .date{
          font-size: 8pt;
          font-weight: normal;
          text-align: left;
          margin-right: -40px; 
        }
        .ornum{
            font-size: 10pt;
            font-weight: bold;
            text-align: left;
            margin-top: -10px;
            color: red; 
        }

    </style>
</head>
<body>
<div class="print-button" onclick="window.print()">Print</div>
    <div class="paper">
        <div class="pink-box">
            <div class="pink-box-text">
            
                The Sangguniang Barangay<br>
                Puntian, Sumilao, Bukidnon<br><br>
                HON. TIRSO B. AMISTOSO
            </div>
            <div class="blue">
                Punong Barangay<br>
                0975-839-1590<br><br>
            </div>
            <div class="black">
                HON. JOANN B. GAID<br>
            </div>
            <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on Budget, Finance & Appropriations<br>
                Com.Chair.on Laws & Rules, Ordinances and Legal Matters<br>
                0997-887-6734<br><br>
            </div>
            <div class="black">
                HON. EVA R. CABARLES<br>
            </div>
            <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on HEALTH & SANITATION<br>
                Com.Chair.on PUROK AFFAIRS<br>
                0905-773-6816<br><br>
            </div>
            <div class="black">
                HON. APOLINARIO C. LUMAGHAN<br>
            </div>
            <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on PEACE & ORDER<br>
                Com.Chair.on TOURISM<br>
                0967-773-1159<br><br>
            </div>
            <div class="black">
                HON. FEGIE D. NACASABOG<br>
            </div>
            <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on SOCIAL SERVICES<br>
                Com.Chair.on LOCAL TAXATION<br>
                0965-062-0353<br><br>
            </div>
            <div class="black">
                HON. FELICITO H. BONCAIT<br>
            </div>
            <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on AGRICULTURE & FISHERIES<br>
                Com.Chair.on ELDERLY & PERSONS WITH DISABILITY<br>
                0965-851-7385<br><br>
            </div>
            <div class="black">
                HON. GAVINO C. BANTOG<br>
            </div>
            <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on INFRASTRUCTURE<br>
                Com.Chair.on WOMEN & GENDER DEVELOPMENT<br>
                0905-773-6816<br><br>
            </div>
            <div class="black">
                HON. ESTRELLA B. LUMANCES<br>
            </div>
                <div class="blue">
                Barangay Kagawad<br>
                Com.Chair.on Education<br>
                Com.Chair.on ETHICS & GOOD GOVERNANCE<br>
                0975-836-8970<br><br>
            </div>
            <div class="black">
                HON. RUSTOM B. MILLA<br>
            </div>
                <div class="blue">
                SK CHAIRPERSON<br>
                Com.Chair.on YOUTH & SPORTS DEVELOPMENT<br>
                Com.Chair.on LABOR & EMPLOYMENT<br>
                0926-539-3849<br><br>
            </div>
            <div class="black">
                DATU ELORDE L. FLORENCIO<br>
            </div>
                <div class="blue">
                BARANGAY IPMR<br>
                Com.Chair.on CULTURAL DEVELOPMENT<br>
                Com.Chair.on ENVIRONMENTAL PROTECTION<br>
                0926-535-8146<br><br>
            </div>
            <div class="black">
                JOELA D. GOLOSINDA<br>
            </div>
                <div class="blue">
                BARANGAY SECRETARY<br>
                0927-331-7357<br>
                0935-293-4410<br><br>
            </div>
            <div class="black">
                MARILOU A. BALUMA<br>
            </div>
                <div class="blue">
                BARANGAY TREASURER<br>
                0997-793-0512<br><br>
            </div>
            <div class="black">
                CHERRY MAY M. GAID<br>
            </div>
            <div class="blue">
                BARANGAY RECORDS-KEEPER<br>
                0926-464-6797<br><br>
            </div>
        </div>
            <div class="content">
                <div class="header">
                    <img class="logo-left" src="logo1.JPG" alt="Left Logo"></img>
                        <p>Republic of the Philippines<br>
                        PROVINCE OF BUKIDNON<br>
                        Municipality of Sumilao<br>
                        Barangay Puntian<br>
                        -o0o-<br>
                        OFFICE OF THE PUNONG BARANGAY</p>
                    <img class="logo-right" src="logo2.PNG" alt="Right Logo"></img>
                </div>
                <div class="or">
                    <h2>C. NO. <?= $clearanceNO ?></h2><br>
                </div>
                <div class="certificate">
                    <h2>BARANGAY CLEARANCE</h2><br>
                </div>
                <div class="letter">
                    <h2>TO WHOM IT MAY CONCERN:</h2>
                </div>
                <div class="first">
                    <p>THIS IS TO CERTIFY THAT <span style="color: red; font-size: 18pt; text-decoration: underline;"><?= $residentName ?></span> a bonafide resident of Puntian, Sumilao, Bukidnon whose, signature/thumbmarks and other relevant information appeared hereunder is a person of good moral character and has no civil/criminal/miscellaneous case/s, involvement to any crime punishable by law, nor has any pending legal charges filed against him/her as per record of the barangay on the date of the issuance.</p>
                </div>
                <div class="birth">
                <h2><span>Date of Birth :</span> <span style="color: red; font-size: 16pt; text-decoration: underline;"><?= $dateOfBirth ?></span></h2>
                </div>
                <div class="birth">
                <h2><span>Age :</span> <span style="color: red; font-size: 16pt; text-decoration: underline;"><?= $age ?></span></h2>
                </div>
                <div class="birth">
                <h2><span>Place of Birth :</span> <span style="color: red; font-size: 16pt; text-decoration: underline;">Puntian Sumilao Bukidnon</span></h2>
                </div>
                <div class="birth">
                <h2><span>Gender :</span> <span style="color: red; font-size: 16pt; text-decoration: underline;"><?= $gender ?></span></h2>
                </div>
                <div class="birth">
                <h2><span>Civil Status :</span> <span style="color: red; font-size: 16pt; text-decoration: underline;"><?= $civilStatus ?></span></h2>
                </div>
                <div class="signatures1">
                    Signature<br><br>
                 </div>
                 <div class="purpose">
                    PURPOSE      : <span style="color: red; font-size: 16pt;text-decoration: underline;"><?= $purpose ?></span><br><br>
                 </div>
                 <div class="first">
                 <p>Issued this <strong class="date" style="font-size: 18pt; color: red;"><?php echo date("jS \\d\\a\\y \\of F, Y"); ?></strong> at Puntian, Sumilao, Bukidnon, Philippines.<br>

                </div>
                <div class="signature">
                    HON. TIRSO B. AMISTOSO<br>
                 </div>
                 <div class="signatures">
                    Punong Barangay<br><br>
                 </div>
                 <div class="ornum">
                    <h2>O. R. <?= $orNumber ?></h2>
                </div>
                 
        </div>
    </div>

    
</body>
</html>