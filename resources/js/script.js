$(function() {
    $("#addStudentBtn").on("click", function() {
        $("#modalTitle").html("Add Student");
        $("#saveStudentBtn").attr("data-type", "add");
        $("#studentFormModal").modal("show");
    });
    
    let timeout;
    $("#studentForm").submit(function(event) {
        event.preventDefault();

        $('.ajax-error').each(function() {
            timeout = $(this).data("timeout");
            if(timeout) clearTimeout(timeout);
            $(this).html("");
        });

        const formObj = $(this)[0];
        const formData = new FormData(formObj);
        
        $.ajax({
            url: "/student/store",
            method: "post",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response) {                
                if(response.status === "success") {
                    $("#studentTable").load(location.href + " #studentTable > *");
                    $("#name").val("");
                    $("#email").val("");
                    $("#major").val("");
                    $("#studentFormModal").modal("hide");
                
                }
                
                if (response.validation_errors) {
                    const errors = response.validation_errors;
                    Object.entries(errors).forEach(([field, error]) => {
                        const html = `<i class="fa-solid fa-circle-info"></i> ${error}`;
                        
                        $(`#${field}-error`).html(html);                        
                        timeout = setTimeout(() => {
                            $(`#${field}-error`).html("");
                        }, 5000);                        
                        
                        $(`#${field}-error`).data("timeout", timeout);                        
                    });
                }
                
            },
        });
    });
});