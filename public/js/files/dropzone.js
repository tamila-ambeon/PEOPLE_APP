class SendFile extends FormGrabber
{
    beforeSend() {
        this.dontSendAutomatically()
    }
    onSuccess(json) {}
    onError(error) {}
}


function formGrabberObject() {
    try {
        let sendFile = new SendFile({
            // "debug": true,
            'button_id': "upload",
            'input_ids': ["title", "content", "people_id", "file_type"],
            'method': "POST",
            'endpoint': document.getElementsByTagName("base")[0].href + "api/files"
        })

        sendFile.grabInputs()
        
        return sendFile
    } catch (e) {
        console.log('Error while creating form listener: ', e)
        return false
    }

}

let maxFileSizeDropzone = 2

Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: maxFileSizeDropzone, // MB
    parallelUploads: 11,
    acceptedFiles: 'image/*',
    autoProcessQueue: false,
    init: function () {
        let myDropzone = this;

        let uploadButton = document.getElementById('upload')
        uploadButton.addEventListener("click", (event) => {
            //console.log("upload clicked")
            myDropzone.processQueue()
        })
    },
    accept: function(file, done) {
        done()
    },
    
    addedfile: function (file) {

        if (this.element === this.previewsContainer) {
            this.element.classList.add("dz-started");
          }
      
          if (this.previewsContainer && !this.options.disablePreviews) {
            file.previewElement = Dropzone.createElement(
              this.options.previewTemplate.trim()
            );
            file.previewTemplate = file.previewElement; // Backwards compatibility
      
            this.previewsContainer.appendChild(file.previewElement);
            for (var node of file.previewElement.querySelectorAll("[data-dz-name]")) {
              node.textContent = file.name;
            }
            for (node of file.previewElement.querySelectorAll("[data-dz-size]")) {
              node.innerHTML = this.filesize(file.size);
            }
      
            if (this.options.addRemoveLinks) {
              file._removeLink = Dropzone.createElement(
                `<a class="dz-remove" href="javascript:undefined;" data-dz-remove>${this.options.dictRemoveFile}</a>`
              );
              file.previewElement.appendChild(file._removeLink);
            }
      
            let removeFileEvent = (e) => {
              e.preventDefault();
              e.stopPropagation();
              if (file.status === Dropzone.UPLOADING) {
                return Dropzone.confirm(
                  this.options.dictCancelUploadConfirmation,
                  () => this.removeFile(file)
                );
              } else {
                if (this.options.dictRemoveFileConfirmation) {
                  return Dropzone.confirm(
                    this.options.dictRemoveFileConfirmation,
                    () => this.removeFile(file)
                  );
                } else {
                  return this.removeFile(file);
                }
              }
            };
      
            for (let removeLink of file.previewElement.querySelectorAll(
              "[data-dz-remove]"
            )) {
              removeLink.addEventListener("click", removeFileEvent);
            }
          }

          if (file.size > (1024 * 1024 * maxFileSizeDropzone)) // not more than 5mb
          {
              this.removeFile(file);
              console.log("Only " + maxFileSizeDropzone + " mb file size is allowed");
          }

    },
    sending: function(file, xhr, formData) {
        let sendFile = formGrabberObject()

        for (var pair of sendFile.formData.entries()) {
            formData.append(pair[0], pair[1]);
        }
    },
    success: function(file, response){
        //alert("Test1");
        console.log("completemultiple")
        location.reload()
    }
}