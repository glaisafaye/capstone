<?php include 'layout.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="top-container">
        <!-- You can add content or headings here if needed -->
    </div>
    <div class="content-container">
        <section id="mission">
            <h2>Mission</h2>
            <p>
                <a href="#" onclick="showPopup('mission-popup')">Click to view mission</a>
            </p>
        </section>

        <section id="vision">
            <h2>Vision</h2>
            <p>
                <a href="#" onclick="showPopup('vision-popup')">Click to view vision</a>
            </p>
        </section>

        <section id="history">
            <h2>History</h2>
            <p>
                <a href="#" onclick="showPopup('history-popup')">Click to view history</a>
            </p>
        </section>

        <div id="mission-popup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup('mission-popup')">&times;</span>
                <h2>Mission</h2>
                <p> "Panaghiusa sa katawhan ug mga opisyales us pakiglambigit sa mga pribado nga mga institusyon ug mga ahensiya sa kagamhanan 
                aron makab-ot ang kalambo-an, kauswagan ug kalinaw uban sa pag-adaptar sa bag-ong teknolohiya para sa kaangayan sa tanan."</p>
            </div>
        </div>

        <div id="vision-popup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup('vision-popup')">&times;</span>
                <h2>Vision</h2>
                <p>"Ang Barangay Puntian limpyo ug hapsay ang palibot, malamboon, moderno ug lig-on ang mga pasilidad, gidumala sa ligdong, adunay kahibalo,
                    kahanas ug maabilidad nga lider nga gipuy-an sa katawhan nga kugihan ug mahinadlokon sa diyos."</p>
            </div>
        </div>

        <div id="history-popup" class="popup">
            <div class="popup-content">
                <span class="close-btn" onclick="closePopup('history-popup')">&times;</span>
                <h2>History</h2>
                <p>History of Barangay Puntian
                In the year 1905, Barangay Puntian was founded by a group of people who were headed by the following: Ramon Hugno-an, Juan Lumicay and Benito Layoc.
                Thirteen years later, two leaders emerged and they were highly respected by the people. They were Manuel Hilayag and Agustin Tumopong.
                In gratitude to the Almighty for finding such blissful area for to live, they offered "Thanksgiving". While in the act of religious ceremony, all of a sudden a white man, riding on a white clothed with white apparel appeared. They were caught and amazed of what they saw.
                them horse and tongue-tied
                And after a considerable period of silence, someone from the group shouted: "SI PUTI, SI PUTI, SI PUTI" (meaning white) and then the white figure disappeared.
                The story of apparition was retold countless times and the word "puti" was transmitted countless times from one tongue to another such that instead of uttering "Puti man”, people transmitted the word as PUNTI-AN.</p>
            </div>
        </div>
    </div>

    <script>
        function showPopup(id) {
            document.getElementById(id).style.display = "block";
        }

        function closePopup(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>

</body>
</html>
