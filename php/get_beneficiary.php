<?php
include('connection.php');

if (isset($_POST['ben_no'])) {
    $benNo = $_POST['ben_no'];
    $stmt = $con->prepare("SELECT * FROM tbl_beneficiary WHERE Ben_No = ?");
    $stmt->bind_param("s", $benNo);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (!$data) {
        echo "<p>No record found.</p>";
        exit;
    }

    // ------------------------
    // 📦 Edit Mode
    // ------------------------
    if (isset($_POST['edit'])) {
        echo '<input type="hidden" name="Ben_No" value="' . $data['Ben_No'] . '">';
        foreach ($data as $key => $value) {
            if (in_array($key, ['Ben_No', 'Beneficiary_Photo', 'Beneficiary_Passport'])) continue;

            // Format label nicely
            $label = ucwords(str_replace("_", " ", $key));

            // Selects
            if ($key == 'Gender') {
                echo '<div class="mb-3">
                        <label>' . $label . '</label>
                        <select name="' . $key . '" class="form-select">
                            <option ' . ($value == 'Male' ? 'selected' : '') . '>Male</option>
                            <option ' . ($value == 'Female' ? 'selected' : '') . '>Female</option>
                        </select>
                      </div>';
            } elseif (in_array($key, ['Is_Orphan', 'Is_HVC', 'Is_Disabled'])) {
                echo '<div class="mb-3">
                        <label>' . $label . '</label>
                        <select name="' . $key . '" class="form-select">
                            <option value="1" ' . ($value ? 'selected' : '') . '>Yes</option>
                            <option value="0" ' . (!$value ? 'selected' : '') . '>No</option>
                        </select>
                      </div>';
            } elseif (strpos($key, 'Date') !== false || $key === 'DOB') {
                echo '<div class="mb-3">
                        <label>' . $label . '</label>
                        <input type="date" name="' . $key . '" class="form-control" value="' . htmlspecialchars($value) . '">
                      </div>';
            } else {
                echo '<div class="mb-3">
                        <label>' . $label . '</label>
                        <input type="text" name="' . $key . '" class="form-control" value="' . htmlspecialchars($value) . '">
                      </div>';
            }
        }

    // ------------------------
    // 👁️ View Mode
    // ------------------------
    } else {
        echo '<div class="text-center mb-3">';

        if (!empty($data['Beneficiary_Photo'])) {
            $img = base64_encode($data['Beneficiary_Photo']);
            echo '<img src="data:image/jpeg;base64,' . $img . '" class="img-thumbnail" style="max-width:200px;"><br>';
        } else {
            echo '<img src="images/default-profile.png" class="img-thumbnail" style="max-width:200px;"><br>';
        }

        echo '<h5 class="mt-2">' . htmlspecialchars($data['Name']) . '</h5>';
        echo '</div>';

        echo '<ul class="list-group">';
        foreach ($data as $key => $value) {
            if ($key == 'Beneficiary_Photo' || $key == 'Beneficiary_Passport') continue;

            $label = ucwords(str_replace("_", " ", $key));
            echo "<li class='list-group-item'><strong>$label:</strong> " . htmlspecialchars($value) . "</li>";
        }
        echo '</ul>';
    }
}
?>
