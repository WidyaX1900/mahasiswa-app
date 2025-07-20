$(function() {
    $("#addStudentBtn").on("click", function() {
        $("#modalTitle").html("Add Student");
        $("#saveStudentBtn").attr("data-type", "add");
        $("#studentFormModal").modal("show");
    });    
});