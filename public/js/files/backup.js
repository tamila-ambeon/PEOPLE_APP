class Backup extends FormGrabber
{
    beforeSend() {}
    onSuccess(json) 
    {
        console.log("json", json)
    }
    onError(error) {}
}

try {
    let person = new Backup({
        //"debug": true,
        'button_id': "backup",
        'switch_button_id': "backup_request",
        'input_ids': [],
        'method': "POST",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/backup"
    })
} catch (e) {
    console.log('Error while creating form listener: ', e)
}