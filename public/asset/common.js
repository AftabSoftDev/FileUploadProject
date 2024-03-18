$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var baseUrl = window.location.origin;

    var r = new Resumable({
        target: baseUrl + "/file-uploading",
        query: { _token: csrfToken }, // Laravel CSRF token
        chunkSize: 1 * 1024 * 1024, // 1 MB
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    r.assignBrowse(document.getElementById("resumable-browse"));

    r.on("fileAdded", function (file) {
        // Show upload progress
        document.getElementById("upload-progress").innerText = "";
        r.upload();
    });

    r.on("fileProgress", function (file) {
        // Handle progress for each file
        var progress = Math.floor(file.progress() * 100);
        document.getElementById("progress").style.display = "block";
        document.getElementById("upload-progress").innerText =
            "Upload Progress: " + progress + "%";
        document.getElementById("upload-progress").style.width = progress;
    });

    r.on("fileSuccess", function (file, message) {
        // File has been uploaded successfully
        document.getElementById("upload-progress").innerText =
            "Upload Complete";
    });

    r.on("fileError", function (file, message) {
        // Handle errors
        console.log("Error uploading", message);
    });
});
