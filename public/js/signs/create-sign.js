class CreateSign extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.href = document.getElementsByTagName("base")[0].href + "sign/" + json.data.id
    }
    onError(error) {}
}

try {
    let mainInfo = new CreateSign({
        // "debug": true,
        'button_id': "create_sign",
        'switch_button_id': "create_sign_request",
        'input_ids': ["title_women", "title_men", "short_description", "full_description", "icon_id", "type_id"],
        'method': "POST",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/sign"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}