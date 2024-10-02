class Contacts extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
        location.reload()
    }
    onError(error) {}
}

try {
    let mainInfo = new Contacts({
        "debug": true,
        'button_id': "save_contacts",
        'switch_button_id': "handle_request_contacts",
        'input_ids': ["id", "date_we_met", "birth_date", "name", "surname", "middlename"],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}