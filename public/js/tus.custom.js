var upload = null;
var uploadIsRunning = false;
var toggleBtn = document.querySelector("#toggle-btn");
var input = document.querySelector("input[type=file]");
var progress = document.querySelector(".progress");
var alertBox = document.querySelector("#support-alert");
var uploadList = document.querySelector("#upload-list");
var chunkSize = 80000000;
var parallelUploads = 1;
var endpoint = '/tus';
var cnt = document.getElementById("count");
var water = document.getElementById("water");
var percent = cnt.innerText;

if (!tus.isSupported) {
    alertBox.classList.remove("hidden");
}

if (!toggleBtn) {
    throw new Error("Toggle button not found on this page. Aborting upload-demo. ");
}

toggleBtn.addEventListener("click", function(e) {
    e.preventDefault();

    if (upload) {
        if (uploadIsRunning) {
            upload.abort();
            toggleBtn.textContent = "resume upload";
            uploadIsRunning = false;
        } else {
            upload.start();
            toggleBtn.textContent = "pause upload";
            uploadIsRunning = true;
        }
    } else {
        if (input.files.length > 0) {
            startUpload();
        } else {
            input.click();
        }
    }
});

input.addEventListener("change", startUpload);

function loading() {
    $('.box').removeClass('d-none');
    $('.upload-form').addClass('d-none');
}
var filename;

function startUpload() {
    loading();
    var file = input.files[0];
    if (!file) {
        return;
    }
    var filetype = file.type;
    filename = file.name;
    if (file.type == '') {
        var token = filename.split('.');
        filetype = token[token.length - 1];

    }
    toggleBtn.textContent = "pause upload";
    var options = {
        endpoint: '/tus',
        chunkSize: 10000000,
        retryDelays: [0, 1000, 3000, 5000],
        parallelUploads: 1,
        metadata: {
            filename: file.name,
            filetype: filetype
        },
        onError: function(error) {
            if (error.originalRequest) {
                if (window.confirm("Failed because: " + error + "\nDo you want to retry?")) {
                    upload.start();
                    uploadIsRunning = true;
                    return;
                }
            } else {
                console.log(error);
                alert("Failed because: " + error);
            }

            reset();
        },
        onProgress: function(bytesUploaded, bytesTotal) {
            var percentage = (bytesUploaded / bytesTotal * 100).toFixed(2);
            cnt.innerHTML = percentage;
            water.style.transform = 'translate(0' + ',' + (100 - percentage) + '%)';
            console.log(bytesUploaded, bytesTotal, percentage + "%");
        },
        onSuccess: function() {
            reset();
            uploaded();
        }
    }

    upload = new tus.Upload(file, options);
    upload.findPreviousUploads().then((previousUploads) => {
        askToResumeUpload(previousUploads, upload);
        upload.start();
        uploadIsRunning = true;
    });
}


function reset() {
    input.value = "";
    toggleBtn.textContent = "start upload";
    upload = null;
    uploadIsRunning = false;
}

function askToResumeUpload(previousUploads, upload) {
    if (previousUploads.length === 0) return;
    if (!isNaN(previousUploads.length - 1) && previousUploads[previousUploads.length - 1]) {
        upload.resumeFromPreviousUpload(previousUploads[previousUploads.length - 1]);
    }
}