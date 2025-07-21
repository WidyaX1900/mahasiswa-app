$(function() {
    $("#addStudentBtn").on("click", function() {
        $("#modalTitle").html("Add Student");
        $("#addStudentFormModal").modal("show");
    });
    
    let timeout;
    $("#addStudentForm").submit(function(event) {
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
                    $("#addStudentFormModal").modal("hide");
                
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

    $("#studentTable").on("click", ".view-btn", function() {
        $("#name-show").html("");
        $("#email-show").html("");
        const id = $(this).data("id");
        
        $.ajax({
            url: `/student/show/${id}`,
            method: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);                
                $("#name-show").html(response.student.name);                                
                $("#email-show").html(response.student.email);
                $("#studentViewModal").modal("show");                                
            },

            error: function() {
                alert("Student not found!");                
            }
        });       
    });
});