class EditHistory extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.reload()
    }
    onError(error) {}
}

try {
    let mainInfo = new EditHistory({
        "debug": true,
        'button_id': "update_history",
        'switch_button_id': "update_history_request",
        'input_ids': ["id", "date", "content", "quality"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/history"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}

class DeleteHistory extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.href = document.getElementsByTagName("base")[0].href + "person/" + json.data.people_id + "/histories"
    }
    onError(error) {}
}

try {
    let mainInfo = new DeleteHistory({
        "debug": true,
        'button_id': "confirm-deleting",
        'input_ids': ["id"],
        'method': "DELETE",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/history"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}