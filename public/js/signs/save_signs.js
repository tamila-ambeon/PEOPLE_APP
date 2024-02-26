class EditSign extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) {
       // location.href = document.getElementsByTagName("base")[0].href + "sign/" + json.data.id + "/edit"
       console.log("resp", json)
    }
    onError(error) {}
}

try {
    let mainInfo = new EditSign({
        "debug": true,
        'button_id': "save_signs",
        'switch_button_id': "save_signs_request",
        'input_ids': ["person_id", "signs"],
        'method': "POST",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/person/signs"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}