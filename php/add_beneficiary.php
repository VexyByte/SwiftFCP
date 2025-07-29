<?php
include('connection.php');

// Sanitize and fetch POST data
$name = $_POST['Name'];
$gender = $_POST['Gender'];
$dob = $_POST['DOB'];
$completionDate = $_POST['Completion_Date'] ?? null;
$status = $_POST['Status'];
$sponsorship = $_POST['Sponsorship'] ?? null;
$educationLevel = $_POST['Education_Level'] ?? null;
$school = $_POST['School'];
$academicLevel = $_POST['Academic_Level'];
$primaryCaregiver = $_POST['Primary_Caregiver'];
$address = $_POST['Address'];
$email = $_POST['EmailAddress'];
$locationGPS = $_POST['Location_GPS'] ?? null;
$phone = $_POST['Phone_No'];
$phone2 = $_POST['Phone_No2'];
$isOrphan = isset($_POST['Is_Orphan']) ? 1 : 0;
$isHVC = isset($_POST['Is_HVC']) ? 1 : 0;
$isDisabled = isset($_POST['Is_Disabled']) ? 1 : 0;
$notes = $_POST['Notes'] ?? null;
$acctBalance = isset($_POST['Acct_Balance']) ? floatval($_POST['Acct_Balance']) : 0.0;

// Process uploaded images
$photo = null;
$passport = null;
$hasPhoto = false;
$hasPassport = false;

if (isset($_FILES['Beneficiary_Photo']) && $_FILES['Beneficiary_Photo']['error'] == 0) {
    $photo = file_get_contents($_FILES['Beneficiary_Photo']['tmp_name']);
    $hasPhoto = true;
}
if (isset($_FILES['Beneficiary_Passport']) && $_FILES['Beneficiary_Passport']['error'] == 0) {
    $passport = file_get_contents($_FILES['Beneficiary_Passport']['tmp_name']);
    $hasPassport = true;
}

// Generate Ben_No
$benNo = "BEN" . time();

$sql = "INSERT INTO tbl_beneficiary (
    Ben_No, Name, Gender, DOB, Completion_Date, Status, Sponsorship,
    Education_Level, School, Academic_Level, Primary_Caregiver, Address,
    EmailAddress, Location_GPS, Phone_No, Phone_No2, Is_Orphan, Is_HVC,
    Is_Disabled, Notes, Acct_Balance, Beneficiary_Photo, Beneficiary_Passport
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

$stmt->bind_param(
    "sssssssssssssssiiiisdss",
    $benNo,
    $name,
    $gender,
    $dob,
    $completionDate,
    $status,
    $sponsorship,
    $educationLevel,
    $school,
    $academicLevel,
    $primaryCaregiver,
    $address,
    $email,
    $locationGPS,
    $phone,
    $phone2,
    $isOrphan,
    $isHVC,
    $isDisabled,
    $notes,
    $acctBalance,
    $null, // Placeholder for photo
    $null  // Placeholder for passport
);

// Send blob data if available
if ($hasPhoto) {
    $stmt->send_long_data(21, $photo); // 0-indexed, so 21st index
}
if ($hasPassport) {
    $stmt->send_long_data(22, $passport); // 22nd index
}

if ($stmt->execute()) {
    echo "Record added successfully!";
} else {
    echo "Error adding record: " . $stmt->error;
}

$stmt->close();
$con->close();

?>
