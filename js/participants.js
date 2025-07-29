
const noOfRows = document.getElementById("krypton-table_length");
const btnNewRecord = document.getElementById('btnNewRecord');
const btnSave_Update = document.getElementById('btnSave_Update');
const btnDeleteRecord = document.getElementById('btnDeleteRecord');
const btnImportData = document.getElementById('btnImportData');
const btnViewReports = document.getElementById('btnViewReports');
const txtBenNo = document.getElementById('Ben_No');
const txtBenName = document.getElementById('Ben_Name');
const txtGender = document.getElementById('Gender');
const txtDOB = document.getElementById('DOB');
const txtAge = document.getElementById('Age');
const txtCompletionDate = document.getElementById('CompletionDate');
const cboActiveStatus = document.getElementById('Status');
const cboSponsorshipStatus = document.getElementById('Sponsorship');
const cboEducationLevel = document.getElementById('EducationLevel');
const txtSchool = document.getElementById('School');
const cboPerformanceLevel = document.getElementById('Perfomance');
const txtPrimaryCaregiver = document.getElementById('Caregiver');
const txtVillage = document.getElementById('Village');
const txtemail = document.getElementById('Email');
const txtPhoneNo1 = document.getElementById('Phone1');
const txtPhoneNo2 = document.getElementById('Phone2');
const txtGPS = document.getElementById('GPS');
const txtBeneficiaryNotes = document.getElementById('BeneficiaryNotes');
const chkboxDisabled = document.getElementById('Disabled');
const checkboxHVC = document.getElementById('HVC');
const checkboxOrphan = document.getElementById('Orphan');


btnNewRecord.addEventListener('click', function(event){
ClearInputFields();
});

btnSave_Update.addEventListener('click', function(event){
alert('Save / Update Yet To Be Done');
});

btnDeleteRecord.addEventListener('click', function(event){
alert('Delete Record Yet To Be Done');
alert(noOfRows);
});

btnImportData.addEventListener('click', function(event){
alert('Import Data To Be Done');
});

btnViewReports.addEventListener('click', function(event){
alert('View Reports Yet To Be Done');
});

function ClearInputFields(){
txtBenNo.value = "";
txtBenName.value = "";
txtGender.selectedIndex = "0";
txtDOB.value = "";
txtAge.value = "";
txtCompletionDate.value = "";
cboActiveStatus.selectedIndex = "0";
cboSponsorshipStatus.selectedIndex = "0";
cboEducationLevel.selectedIndex = "0";
txtSchool.value = "";
cboPerformanceLevel.selectedIndex = "0";
txtPrimaryCaregiver.value = "";
txtVillage.value = "";
txtemail.value = "";
txtPhoneNo1.value = "";
txtPhoneNo2.value = "";
txtGPS.value = "";
txtBeneficiaryNotes.value = "";
chkboxDisabled.checked = false;
checkboxHVC.checked = false;
checkboxOrphan.checked = false;
};


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

$(document).ready(function () {
function calculateAge(dob) {
    const birthDate = new Date(dob);
    const today = new Date();
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return isNaN(age) ? "" : age;
}


$("#geeks").on("click", "tr", function () {
    const data = $(this).children("td").map(function () {
        return $(this).text();
    }).get();

    const keys = ["Ben_No", "Name", "Gender", "DOB", "Completion_Date", "Status", "Sponsorship", "Education_Level", "School", "Academic_Level", "Primary_Caregiver", "Address", "EmailAddress", "Location_GPS", "Phone_No", "Phone_No2", "Is_Orphan", "Is_HVC", "Is_Disabled", "Notes", "Acct_Balance"];

    const dataMap = {};
    keys.forEach((key, i) => dataMap[key] = data[i] || "");

    $("#Ben_No").val(dataMap["Ben_No"]);
    $("#Ben_Name").val(dataMap["Name"]);
    $("#Gender").val(dataMap["Gender"].toLowerCase());
    $("#DOB").val(dataMap["DOB"]);
    $("#Age").val(calculateAge(dataMap["DOB"]));
    $("#CompletionDate").val(dataMap["Completion_Date"]);
    $("#Status").val(dataMap["Status"]);
    $("#Sponsorship").val(dataMap["Sponsorship"]);
    $("#EducationLevel").val(dataMap["Education_Level"]);
    $("#School").val(dataMap["School"]);
    $("#Perfomance").val(dataMap["Academic_Level"]);
    $("#Caregiver").val(dataMap["Primary_Caregiver"]);
    $("#Village").val(dataMap["Address"]);
    $("#Email").val(dataMap["EmailAddress"]);
    $("#GPS").val(dataMap["Location_GPS"]);
    $("#Phone1").val(dataMap["Phone_No"]);
    $("#Phone2").val(dataMap["Phone_No2"]);
    $("#Orphan").prop("checked", dataMap["Is_Orphan"] == 1);
    $("#HVC").prop("checked", dataMap["Is_HVC"] == 1);
    $("#Disabled").prop("checked", dataMap["Is_Disabled"] == 1);
    $("#BeneficiaryNotes").val(dataMap["Notes"]);

    if (dataMap["Acct_Balance"]) {
        $("select[name='balances']").html(`<option value="">Acct - ${dataMap["Acct_Balance"]}</option>`);
    }

    const photoSrc = $(this).data("photo");
    if (photoSrc) {
        $(".img-passport").attr("src", photoSrc);
    }
});

$("#entireSearch").on("keyup", function () {
    const value = $(this).val().toLowerCase();
    $("#geeks tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

});
