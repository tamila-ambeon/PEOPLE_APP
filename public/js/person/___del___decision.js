class Decision extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.reload()
    }
    onError(error) {}
}

try {
    let mainInfo = new Decision({
        "debug": true,
        'button_id': "save_resume",
        'switch_button_id': "handle_request_resume",
        'input_ids': ["id", "decision"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}