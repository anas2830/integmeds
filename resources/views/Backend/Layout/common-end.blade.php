<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
{{-- googleplaces script end --}}
<script>
    $(".select2").select2();
    Dropzone.autoDiscover = false;
    function initDropzone(selector, isMultiple, uploadedFilesArray, uploadedFilesInputId, filesToDeleteInputId, existingFiles = []) {
        var dropzoneElement = document.querySelector(selector);
        var filesToDelete = [];

        if (dropzoneElement && !dropzoneElement.dropzone) {
            var maxFileSize = dropzoneElement.getAttribute('data-max-size') || 2;
            var acceptedFiles = dropzoneElement.getAttribute('data-accepted-files') || '.jpeg,.jpg,.png,.gif,.webp';

            var maxFiles = parseInt(dropzoneElement.getAttribute('data-max-files')) || 5;

            var myDropzone = new Dropzone(dropzoneElement, {
                url: '{{ route('temp-file-upload') }}', // Your upload route
                paramName: "file",
                maxFilesize: maxFileSize,
                dictDefaultMessage: "<h4>Drop files here or click to upload.</h4>",
                acceptedFiles: acceptedFiles,
                addRemoveLinks: true,
                dictRemoveFile: "Remove",
                autoProcessQueue: true,
                maxFiles: isMultiple ? maxFiles : 1, // Allow multiple files if needed
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function() {

                    if (existingFiles && existingFiles.length > 0) {
                        existingFiles.forEach(file => {
                            var mockFile = { name: file.name , size: file.size, path: file.path };
                            this.emit("addedfile", mockFile);
                            this.emit("thumbnail", mockFile, file.full_path);
                            this.emit("complete", mockFile);
                            this.files.push(mockFile);
                        });
                    }

                    if (!isMultiple) {
                        this.on("addedfile", function (file) {
                            if (this.files.length > 1) {
                                this.removeFile(this.files[0]); // Remove first file in Dropzone's array
                            }
                            document.querySelector(".dz-default.dz-message").style.display = "none"; //hide default msg
                        });
                    }

                    this.on("success", function (file, response) {
                        file.fullFileName = response.file; // Attach full filename to file object
                        uploadedFilesArray.push(file.fullFileName); // Track uploaded file
                        updateUploadedFilesInput(uploadedFilesInputId, uploadedFilesArray);
                    });

                    // Handle file removal
                    this.on("removedfile", function (file) {
                        // Remove from uploadedFilesArray
                        var index = uploadedFilesArray.indexOf(file.fullFileName);
                        if (index !== -1) {
                            uploadedFilesArray.splice(index, 1);
                            deleteTempFile(file.fullFileName); // Delete file from temp storage
                        }
                        // Update hidden input
                        updateUploadedFilesInput(uploadedFilesInputId, uploadedFilesArray);


                        //delete track file
                        var fileNameToDelete = file.path;
                        if (existingFiles.some(f => f.path === fileNameToDelete)) {
                            filesToDelete.push(fileNameToDelete);
                        }
                        var filesToDeleteInput = document.getElementById(filesToDeleteInputId);
                        if (filesToDeleteInput) {
                            filesToDeleteInput.value = filesToDelete.join(',');
                        }

                        console.log(uploadedFilesArray.length );

                        if (uploadedFilesArray.length === 0) {
                            console.log('no item');
                            document.querySelector(".dz-default.dz-message").style.display = "block"; //show default msg
                        }

                    });

                }
            });
        }
    }
    function updateUploadedFilesInput(inputId, uploadedFilesArray) {
        document.getElementById(inputId).value = uploadedFilesArray.join(',');
    }

    function deleteTempFile(fileName) {
        fetch('{{ route('delete-temp-file') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ file: fileName })
        })
        .then(data => {
            console.log('File deleted successfully:', data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }

</script>
