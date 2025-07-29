<?php
include('connection.php');

if (isset($_POST['Ben_No'])) {
    $stmt = $con->prepare("UPDATE tbl_beneficiary SET 
        Name = ?, 
        Gender = ?, 
        DOB = ?, 
        Completion_Date = ?, 
        Status = ?, 
        Sponsorship = ?, 
        Education_Level = ?, 
        School = ?, 
        Academic_Level = ?, 
        Primary_Caregiver = ?, 
        Address = ?, 
        EmailAddress = ?, 
        Location_GPS = ?, 
        Phone_No = ?, 
        Phone_No2 = ?, 
        Is_Orphan = ?, 
        Is_HVC = ?, 
        Is_Disabled = ?, 
        Notes = ?, 
        Acct_Balance = ? 
        WHERE Ben_No = ?");

    $stmt->bind_param("ssssssssssssssssssds", 
        $_POST['Name'], 
        $_POST['Gender'], 
        $_POST['DOB'], 
        $_POST['Completion_Date'], 
        $_POST['Status'], 
        $_POST['Sponsorship'], 
        $_POST['Education_Level'], 
        $_POST['School'], 
        $_POST['Academic_Level'], 
        $_POST['Primary_Caregiver'], 
        $_POST['Address'], 
        $_POST['EmailAddress'], 
        $_POST['Location_GPS'], 
        $_POST['Phone_No'], 
        $_POST['Phone_No2'], 
        isset($_POST['Is_Orphan']) ? 1 : 0, 
        isset($_POST['Is_HVC']) ? 1 : 0, 
        isset($_POST['Is_Disabled']) ? 1 : 0, 
        $_POST['Notes'], 
        $_POST['Acct_Balance'], 
        $_POST['Ben_No']
    );

    if ($stmt->execute()) {
        echo "Updated successfully!";
    } else {
        echo "Update failed: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
?>
