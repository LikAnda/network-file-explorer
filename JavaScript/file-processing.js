$(document).ready(function () {
    $("#upload-form").submit(function (e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "server-file-processing/upload.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                location.reload()
            }
        });
    });

    $("#new-folder-form").submit(function (e) {
        e.preventDefault();
        var folderName = $("#folder-name").val();
        console.log("new-folder-form : folderName = " + folderName)
        $.ajax({
            url: "server-file-processing/new-folder.php",
            type: "POST",
            data: { folder_name: folderName },
            success: function (response) {
                alert(response);
                location.reload()
            }
        });
    });

    $("#rm-file-form").submit(function (e) {
        e.preventDefault();
        var fileName = $("#file-name").val();
        console.log("rm-file-form : fileName = " + fileName);
        $.ajax({
            url: "server-file-processing/rm-folder.php",
            type: "POST",
            data: { file_name: fileName },
            success: function (response) {
                alert(response);
                location.reload()
            }
        });
    });
});