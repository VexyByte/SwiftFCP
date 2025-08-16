<!DOCTYPE html>
<html lang="en">

<head>
    <title>FCP SwiftOffice</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/krypton.css">
    <link rel="stylesheet" href="css/participants.css">
    <link href="css/navigation.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <style>
        .krypton-table th.hide-col,
        .krypton-table td.hide-col {
            display: none;}
        .krypton-table thead th {
            position: sticky;
            top: 0;
        }
    </style>

</head>

<body>
    <div class="flex-container">
        <div class="header">
            <?php
            include_once("Includes/ribbon.html");
            ?>
        </div>

        <div class="content">
            <div class="title-panel">
                <div class="fcpno">
                    <div class="icon"><img src="images/icons/church_48px.png" alt=""></div>
                    <h1>KE-0430</h1>
                </div>
                <div class="icon"><img src="images/icons/children_30px.png" alt=""></div>
                <h1>Beneficiary Details</h1>
            </div>

            <div class="content-panel">

                <!-- LeftPanel -->
                <div class="left-panel col">
                    <div class="left-top-content">

                        <?php
                            include('php/connection.php');
                            if (isset($_GET['Ben_No'])) {
                                $benNo = $_GET['Ben_No'];
                                $stmt = $con->prepare("SELECT Ben_No, Name, Gender, DOB, Completion_Date, Status, Sponsorship, Education_Level, School, Academic_Level, Primary_Caregiver, Address, EmailAddress, Location_GPS, Phone_No, Phone_No2, Is_Orphan, Is_HVC, Is_Disabled, Notes, Acct_Balance FROM tbl_beneficiary WHERE Ben_No = ?");
                                $stmt->bind_param("s", $benNo);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $data = $result->fetch_assoc();
                                echo '<script>const beneficiaryData = ' . json_encode($data) . ';</script>';
                            }
                        ?>

                        <table>
                            <tr>
                                <td>
                                    <!-- Left Side Of The Left Panel Containg Form -->
                                    <div class="pnl-details-left">
                                        <table class="details-table">
                                            <tr>
                                                <td>
                                                    <label for="BenNo" name="BenNo" class="krypton-lbl">Beneficiary No:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="Ben_No" placeholder="e.g KE043000210">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Beneficiary Name:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="Ben_Name">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Beneficiary Gender:</label>
                                                </td>
                                                <td>
                                                    <select name="gender" id="Gender" style="width: 100%;">
                                                        <option value="Select"></option> 
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Beneficiary D.O.B:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="DOB" style="width: 7.3em;">
                                                    <label for="" class="krypton-lbl">Age:</label>
                                                    <input type="text" id="Age"  style="width: 5.4em;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Compleation Date:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="CompletionDate">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Beneficiary Status:</label>
                                                </td>
                                                <td>
                                                    <select name="active-status" id="Status" style="width: 100%;">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="Sponsorship" class="krypton-lbl">Sponsorship Stats:</label>
                                                </td>
                                                <td>
                                                    <select name="sponsorship" id="Sponsorship" style="width: 100%;">
                                                        <option value="Sponsored">Sponsored</option>
                                                        <option value="Unsponsored">Unsponsored</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="EducationLevel" class="krypton-lbl">Education Level:</label>
                                                </td>
                                                <td>
                                                    <input type="text" name="EducationLevel" id="EducationLevel">
                                                    <!-- <input type="text" name="educationLevel" id="EducationLevel DropList" list="EducationLevel" style="width: 96%;" >
                                                    <datalist id="EducationLevel" style="width: 50%;">
                                                        <option value="PP1">PP1</option> 
                                                        <option value="PP2">PP2</option>
                                                        <option value="Primary School">Primary School</option>
                                                        <option value="Jnr Secondary">Jnr Secondary</option> 
                                                        <option value="Snr School">High School</option>
                                                        <option value="V.T.C">V.T.C</option>
                                                        <option value="College">College</option> 
                                                        <option value="University">University</option>
                                                    </datalist> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Name Of School:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="School">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="Perfomance" class="krypton-lbl">Performance Level:</label>
                                                </td>
                                                <td>
                                                    <select name="Perfomance" id="Perfomance" style="width: 100%;">
                                                        <option value="Select"></option> 
                                                        <option value="Excellent">Excellent</option>
                                                        <option value="Good">Good</option>
                                                        <option value="Average">Average</option>
                                                        <option value="Below Average">Below Average</option>
                                                        <option value="Poor">Poor</option>
                                                        <option value="N/A">N/A</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Primary Caregiver:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="Caregiver">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="" class="krypton-lbl">Address/Village:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="Village">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="Email" class="krypton-lbl">E-mail Address:</label>
                                                </td>
                                                <td>
                                                    <input type="email" id="Email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="Phone1" class="krypton-lbl">Contact/Phone No:</label>
                                                </td>
                                                <td>
                                                    <input type="tel" id="Phone1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="Phone2" class="krypton-lbl">Alternative Phone:</label>
                                                </td>
                                                <td>
                                                    <input type="tel" id="Phone2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="GPS" class="krypton-lbl">GPS Co-ordinates:</label>
                                                </td>
                                                <td>
                                                    <input type="text" id="GPS">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                                <td>
                                    <!-- Right Side of the left Panel Containg Passport Image And Buttons -->
                                    <div class="pnl-details-right">

                                        <table class="passport-buttons-table">
                                            <tr>
                                                <td>
                                                    <div><img src="images/355.jpg" alt="" class="img-passport"></div>
                                                </td>
                                                <td>
                                                    <div class="buttons">
                                                        <button id="btnNewRecord"> <img src="images/icons/icons8_new.ico" alt="">New Record</button>
                                                        <button id="btnSave_Update"><img src="images/icons/icons8_save.ico" alt="">Save / Update</button>
                                                        <button id="btnDeleteRecord"><img src="images/icons/icons8_trash.ico" alt="">Delete Record</button>
                                                        <button id="btnImportData"><img src="images/icons/icons8_ms_excel.ico" alt="">Import Data</button>
                                                        <button id="btnViewReports"><img src="images/icons/icons8_report_card.ico" alt="">View Reports</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="passport-details">
                                                        <div>
                                                            <a href="#"><span><ion-icon name="search-circle"></ion-icon></span>Upload Passport</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="chkbox">
                                            <label for="Disabled" class="krypton-lbl">Disabled:<input id="Disabled" type="checkbox"></label>
                                            <label for="HVC" class="krypton-lbl">Is HVC:<input id="Orphan" type="checkbox"></label>
                                            <label for="Orphan" class="krypton-lbl">Is Orphan:<input  id="HVC" type="checkbox"></label>
                                        </div>

                                        <div class="balances" style="padding-top: 5px;">
                                            <label for="" class="krypton-lbl">Active Balances:</label>
                                            <select name="balances" id="" size="3" style="width: 100%; height: 75px;">
                                                <option value="">Acct - 500</option>
                                            </select>
                                        </div>

                                        <div class="notes" style="padding-top: 5px;">
                                            <label for="" class="krypton-lbl">Notes:</label>
                                            <div></div>
                                            <textarea id="BeneficiaryNotes" rows="6" cols="48" type="html" style="resize:none;"></textarea>
                                        </div>

                                    </div>
                                    <!-- End Of Right Side Of The Panel Containg Passport Image And Buttons -->
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div class="left-bottom-content" style="height: 40vh">
                        <div class="gpsmap" style="border: solid 1px #ffffff; height: 100%;">
                            <label for="" style="text-decoration: underline;  padding-left: 25%;">Participants Home Location (GPS Co-ordinates):-</label>
                            <div class="mapouter">
                                <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=angata&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://embedgooglemap.net/124/">Swift-FCP</a><br>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            height: 100%;
                                            width: 100%;
                                        }
                                    </style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
                                    <style>
                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            height: 100%;
                                            width: 100%;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Of Left Panel -->

                <div class="splitter col" style="width: 6px; border: solid 1px #ffffff; cursor: col-resize;"></div>

                <!-- Right Panel  -->
                <div class="right-panel" style="width: 100vw">

                    <div class="filterpanel">
                        <div class="bottom-filter" style="margin: 8px; padding:10px; border: solid 1px #ffffff; border-radius:10px; box-shadow: 5px 4px 5px rgb(25, 157, 218);">
                           

                            <label for="Show" class="krypton-lbl"> 
                                Display:
                                <select name="show" id="show" style="width: 13em;">
                                        <option value="30">All Records</option>
                                        <option value="30">Active Participants</option>
                                        <option value="50">Inactive Participants</option>
                                        <option value="100">Sponsored Particpants</option>
                                        <option value="150">Unsponsored Participants</option>
                                </select>
                            </label>

                            <label for="Show" class="krypton-lbl"> 
                                Show:
                                <select name="show" id="show" style="width: 5.2em;">
                                        <option value="30">10</option>
                                        <option value="30">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="150">150</option>
                                </select>
                            </label>

                            <label for="Search" id="search-table" class="krypton-lbl" onkeyup="SearchTable" style="padding-left: 8px;">
                                Search: <span><ion-icon name="search-circle"></ion-icon></span>
                                <input type="text" id="entireSearch" style="width: 13em;">
                            </label>
            
                            <button class="clear-btn">
                                <img src="images/icons/icons8_clear_filters.ico" alt="" style="padding-left: -5px;">
                            </button>
                        </div>
                    </div>

                    <!-- Table To Display Beneficiary Data From The DataBase -->
                    <div class="table-panel">
                        <?php
                        include('php/connection.php');

                        $sql = "SELECT Ben_No, Name, Gender, DOB, Completion_Date, Status, Sponsorship, Education_Level, School, Academic_Level, Primary_Caregiver, Address, EmailAddress, Location_GPS, Phone_No, Phone_No2, Is_Orphan, Is_HVC, Is_Disabled, Notes, Acct_Balance, Beneficiary_Photo, Beneficiary_Passport, Phone_No2 FROM tbl_beneficiary WHERE Status = 'Active' ORDER BY Ben_No ASC";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            echo '<table class="krypton-table" id="data_table">
                                                            <thead>
                                                                <th>Ben_No</th>
                                                                <th>Beneficiary Name</th>
                                                                <th>Gender</th>
                                                                <th>D.O.B</th>
                                                                <th>Completion Date</th>
                                                                <th>Status</th>
                                                                <th>Sponsorship</th>
                                                                <th>Education Level</th>
                                                                <th>P.C Balance</th>

                                                                <th class="hide-col">School</th>
                                                                <th class="hide-col">Academic_Level</th>
                                                                <th class="hide-col">Primary_Caregiver</th>
                                                                <th class="hide-col">Address</th>
                                                                <th class="hide-col">EmailAddress</th>
                                                                <th class="hide-col">Location_GPS</th>
                                                                <th class="hide-col">Phone_No</th>
                                                                <th class="hide-col">Phone_No2</th>
                                                                <th class="hide-col">Is_Orphan</th>
                                                                <th class="hide-col">Is_HVC</th>
                                                                <th class="hide-col">Is_Disabled</th>
                                                                <th class="hide-col">Notes</th>
                                                            </thead>
                                                            <tbody id="geeks">';
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                               $photoBase64 = base64_encode($row["Beneficiary_Passport"]);
                                        echo "<tr data-photo='data:image/jpeg;base64,{$photoBase64}'>";

                                        foreach ($row as $key => $value) {
                                            if ($key === "Beneficiary_Passport") continue;
                                            if ($key === "Beneficiary_Photo") continue;
                                            $hiddenCols = ['School', 'Academic_Level', 'Primary_Caregiver', 'Address', 'EmailAddress', 'Location_GPS', 'Phone_No', 'Phone_No2', 'Is_Orphan', 'Is_HVC', 'Is_Disabled', 'Notes'];
                                            $class = in_array($key, $hiddenCols) ? 'hide-col' : '';
                                            echo "<td class=\"$class\">{$value}</td>";
                                        }

                                        echo "</tr>";
                            }
                            echo "</tbody></table>";
                        }
                        $con->close();
                        ?>
                    </div>

                </div>
                <!-- End Right Panel" -->

            </div> <!-- End Of Div "Content Panel" -->

        </div> <!-- End Of Div "Content" -->

        <div class="footer">
            <?php
            include_once("Includes/footer.html");
            ?>
        </div>
    </div> <!-- End Of Flex Container -->

    <script src="js/script.js"></script>
    <script src="js/participants.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        $(document).ready(function () {
            $("#entireSearch").on("keyup", function () {
                let entireValue = $("#entireSearch").val().toLowerCase();
                
                $("#geeks tr").each(function () {
                    let rowText = $(this).text().toLowerCase();
                    // Show all rows if entire search is empty
                    let matchEntire = entireValue === "";

                    if (entireValue !== "") {
                        matchEntire = rowText.indexOf(entireValue) > -1;
                    }
                    // Assuming all rows initially match column search
                    let matchColumn = true;
                    $(this).toggle(matchEntire);
                });
            });
        });

        const rows = document.querySelectorAll('#data_table tbody tr');
            // Add click event to each row
            rows.forEach(row => {
                row.addEventListener('click', () => {
                    // Remove highlight from all rows
                    rows.forEach(r => r.classList.remove('highlight'));
                    // Add highlight to clicked row
                    row.classList.add('highlight');
                
                });
            });
    </script>
</body>

</html>