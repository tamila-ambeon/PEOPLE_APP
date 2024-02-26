class OtherInfo extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.reload()
    }
    onError(error) {}
}

try {
    let mainInfo = new OtherInfo({
         "debug": true,
        'button_id': "save",
        'switch_button_id': "handle_request",
        'input_ids': ["id", "other_info", "weaknesses"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}