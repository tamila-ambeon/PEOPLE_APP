class Person extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) 
    {
        location.href = document.getElementsByTagName("base")[0].href + "person/" + json.data.people_id + "/photos/" + json.data.id
    }
    onError(error) {}
}

try {
    let person = new Person({
        //"debug": true,
        'button_id': "update_photo",
        'switch_button_id': "update_photo_request",
        'input_ids': ["id", "title", "content"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/files"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}


class DeleteFile extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.href = document.getElementsByTagName("base")[0].href + "person/" + json.data.people_id + "/photos/"
    }
    onError(error) {}
}

try {
    let mainInfo = new DeleteFile({
        "debug": true,
        'button_id': "confirm-deleting",
        'input_ids': ["id"],
        'method': "DELETE",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/files"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}