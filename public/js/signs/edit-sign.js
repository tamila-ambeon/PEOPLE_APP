class EditSign extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.href = document.getElementsByTagName("base")[0].href + "sign/" + json.data.id + "/edit"
    }
    onError(error) {}
}

try {
    let mainInfo = new EditSign({
         "debug": true,
        'button_id': "edit_sign",
        'switch_button_id': "edit_sign_request",
        'input_ids': ["id", "title_women", "title_men", "short_description", "full_description", "icon_id", "type_id"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/sign"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}