<div class="main-area">
    <div class="container">
        <form class="upload-form" id="upload-form" enctype="multipart/form-data">
            <div class="upload-container">
                <div class="upload-area" id="upload-area">
                    <div class="plus-icon">
                        <span class="material-icons">add</span>
                    </div>
                    <input type="file" id="file-upload" name="file-upload" accept="image/*">

                    <div id="image-preview" class="image-preview"></div> <!-- Preview container inside upload-area -->
                </div>
                <div id="progress-container" class="progress-container">
                    <div id="progress-bar" class="progress-bar"></div>
                </div>
            </div>
            <div class="upload-text">
                <p id="upload-description" class="upload-description">Upload an image of a leaf to detect potential diseases and receive detailed insights about its health. Our advanced image recognition system will analyze the leaf, identify any signs of disease, and provide comprehensive information about its condition and necessary care. Enhance your plant care with precise diagnostics and actionable recommendations.</p>
                <button type="button" id="upload-button" class="upload-button">Convert Image</button>
            </div>
        </form>
    </div>
</div>
<script>
  document.getElementById('upload-button').addEventListener('click', function() {
    const fileInput = document.getElementById('file-upload');
    const form = document.getElementById('upload-form');
    const progressBar = document.getElementById('progress-bar');
    const uploadDescription = document.getElementById('upload-description');
    const imagePreview = document.getElementById('image-preview');

    if (fileInput.files.length === 0) {
        alert('Please select a file to upload.');
        return;
    }

    const file = fileInput.files[0]; // Access the selected file
    console.log('Selected file:', file); // Debugging

    const formData = new FormData(form);
    
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);

    xhr.upload.onprogress = function(event) {
        if (event.lengthComputable) {
            const percentComplete = (event.loaded / event.total) * 100;
            progressBar.style.width = percentComplete + '%';
        }
    };

    xhr.onload = function() {
        if (xhr.status === 200) {
            progressBar.style.width = '100%';
            setTimeout(() => {
                progressBar.style.width = '0%'; // Reset progress bar
            }, 1000);

            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                // Show the uploaded image inside the upload area
                const img = document.createElement('img');
                img.src = `Assets/Images/${response.fileName}`; // Ensure path is correct
                imagePreview.innerHTML = '';
                imagePreview.appendChild(img);

                // Update the description
                uploadDescription.textContent = 'Your image has been converted successfully. The system will analyze the leaf and provide insights about its health and possible diseases. Please wait for the results.';
                document.getElementById('upload-button').textContent = 'Analyze Image';
            } else {
                alert('Error uploading file.');
            }
        } else {
            alert('Error with the server response.');
        }
    };

    xhr.onerror = function() {
        alert('Request failed. Please try again.');
    };

    xhr.send(formData);
});


</script>