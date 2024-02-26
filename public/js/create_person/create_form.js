class Person extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) 
    {
        location.href = document.getElementsByTagName("base")[0].href + "person/" + json.data.id
    }
    onError(error) {}
}

try {
    let person = new Person({
        //"debug": true,
        'button_id': "create",
        'switch_button_id': "handle_request",
        'input_ids': ["name", "surname", "middlename"],
        'method': "POST",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/people"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}