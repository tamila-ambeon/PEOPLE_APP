class Avatar extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.reload()
    }
    onError(error) {}
}

try {
    let mainInfo = new Avatar({
        "debug": true,
        'button_id': "save_avatar",
        'switch_button_id': "handle_request_avatar",
        'input_ids': ["id", "avatar_id"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}