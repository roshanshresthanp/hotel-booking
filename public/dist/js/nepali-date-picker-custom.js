$(".bs-date-picker").nepaliDatePicker({
    dateFormat: "%y %M %d",
    closeOnDateSelect: true
});

$(".bs-date-picker").on("dateSelect", function (event) {
    let adDate = event.datePickerData.adDate;
    let adDateInString = adDate.getFullYear() + "-" + ("0" + (adDate.getMonth() + 1)).slice(-2) + "-" + ("0" + adDate.getDate()).slice(-2);
    // $("#ad-date")[0].value = adDateInString;
    $("#ad-date").val(adDateInString);
});
$(function(){
    $(".bs-date-picker2").nepaliDatePicker({
        dateFormat: "%y %M %d",
        closeOnDateSelect: true
    })
});
$(".bs-date-picker2").on("dateSelect", function (event) {
    let adDate = event.datePickerData.adDate;
    let adDateInString = adDate.getFullYear() + "-" + ("0" + (adDate.getMonth() + 1)).slice(-2) + "-" + ("0" + adDate.getDate()).slice(-2);
    $("#ad-date2")[0].value = adDateInString;
});

$(".bs-date-picker").on("dateSelect", function (event) {
    let adDate = event.datePickerData.adDate;
    let adDateInString = adDate.getFullYear() + "-" + ("0" + (adDate.getMonth() + 1)).slice(-2) + "-" + ("0" + adDate.getDate()).slice(-2);
    $(".ad-date").val(adDateInString);
});