$(function() {
    $("#addStudentBtn").on("click", function() {
        $("#modalTitle").html("Add Student");
        $("#addStudentFormModal").modal("show");
        $("#alertInfo").html("");
    });
    
    let timeout;
    $("#addStudentForm").submit(function(event) {
        event.preventDefault();
        $("#alertInfo").html("");

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
                    $("#major_id").val("");
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
        $("#alertInfo").html("");
        const id = $(this).data("id");
        
        $.ajax({
            url: `/student/show/${id}`,
            method: "get",
            dataType: "json",
            success: function (response) {                
                $("#name-show").html(response.student.name);                                
                $("#email-show").html(response.student.email);
                $("#major-show").html(response.student.major.name);
                $("#studentViewModal").modal("show");                                
            },

            error: function() {
                alert("Student not found!");                
            }
        });       
    });

    let editTimeout;
    $("#studentTable").on("click", ".edit-btn", function () {
        $("#alertInfo").html("");
        const id = $(this).data("id");
        $('.edit-ajax-error').each(function () {
            editTimeout = $(this).data("timeout");
            if (editTimeout) clearTimeout(editTimeout);
            $(this).html("");
        });
        
        $.ajax({
            url: `/student/show/${id}`,
            method: "get",
            dataType: "json",
            success: function (response) {
                $("#edit-id").val(response.student.id);
                $("#edit-name").val(response.student.name);
                $("#edit-email").val(response.student.email);
                $("#edit-major_id").val(response.student.major_id);
                $("#editStudentFormModal").modal("show");
            },

            error: function () {
                alert("Student not found!");
            }
        });
    });

    $("#editStudentForm").submit(function (event) {
        event.preventDefault();
        $("#alertInfo").html("");

        $('.edit-ajax-error').each(function () {
            editTimeout = $(this).data("timeout");
            if (editTimeout) clearTimeout(editTimeout);
            $(this).html("");
        });

        const formObj = $(this)[0];
        const formData = new FormData(formObj);
        const id = $("#edit-id").val();

        $.ajax({
            url: `/student/update/${id}`,
            method: "post",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {                
                if (response.status === "success") {
                    $("#studentTable").load(location.href + " #studentTable > *");
                    $("#edit-name").val("");
                    $("#edit-email").val("");
                    $("#edit-major_id").val("");
                    $("#editStudentFormModal").modal("hide");

                }

                if (response.validation_errors) {
                    const errors = response.validation_errors;
                    Object.entries(errors).forEach(([field, error]) => {
                        const html = `<i class="fa-solid fa-circle-info"></i> ${error}`;

                        $(`#edit-${field}-error`).html(html);
                        editTimeout = setTimeout(() => {
                            $(`#edit-${field}-error`).html("");
                        }, 5000);

                        $(`#edit-${field}-error`).data("timeout", editTimeout);
                    });
                }

                if (response.alert_html) {
                    $("#editStudentFormModal").modal("hide");
                    const color = response.status === "error" ? "alert-danger" : "alert-success";
                    
                    $("#alertInfo").html(`<div class="alert ${color} alert-dismissible fade show text-center" role="alert">
                        ${response.alert_html}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`);
                }

            },
        });
    });
});