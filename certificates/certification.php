<!DOCTYPE html>
<html>
<head>
    <title>Document Request Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        select, input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ccc;
            text-decoration: none;
            color: #333;
            border-radius: 3px;
        }

        .btn-cancel:hover {
            background-color: #999;
        }

        .request-form {
            display: none;
        }

        .request-form.active {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Select a Document Request</h1>
    <form method="post" action="">
        <select name="document_type">
            <option value="barangay_certificate">Barangay Clearance</option>
            <option value="business_clearance">Business Clearance</option>
            <option value="barangay_indigency">Barangay Indigency</option>
        </select>
        <input type="submit" name="submit" value="Submit">
        <a class="btn btn-outline-primary" href="/mis/certificates/certificates.php" role="button">Cancel</a>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selected_document = $_POST["document_type"];
        if ($selected_document === "barangay_certificate") {
          
            echo "<h2>Barangay Clearance Request Form</h2>";
            echo "<form method='post' action='/mis/brgyclear/barangayclearance.php'>";
        
            echo "<input type='submit' name='submit' value='Submit'>";
            echo "</form>";
        } elseif ($selected_document === "business_clearance") {
         
            echo "<h2>Business Clearance Request Form</h2>";
            echo "<form method='post' action='/mis/busclear/businessclearance.php'>";
            
            echo "<input type='submit' name='submit' value='Submit'>";
            echo "</form>";
        } elseif ($selected_document === "barangay_indigency") {
           
            echo "<h2>Barangay Indigency Request Form</h2>";
            echo "<form method='post' action='/mis/brgyin/barangayindigency.php'>";
          
            echo "<input type='submit' name='submit' value='Submit'>";
            echo "</form>";
        }
    }
    ?>
</body>
</html>
