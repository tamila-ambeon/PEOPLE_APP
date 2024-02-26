class CreateHistory extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        //console.log("json", json)
        location.href = document.getElementsByTagName("base")[0].href + "person/" + json.data.people_id + "/histories"
    }
    onError(error) {}
}

try {
    let mainInfo = new CreateHistory({
        "debug": true,
        'button_id': "create_history",
        'switch_button_id': "create_history_request",
        'input_ids': ["people_id", "date", "content", "quality"],
        'method': "POST",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/history"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}