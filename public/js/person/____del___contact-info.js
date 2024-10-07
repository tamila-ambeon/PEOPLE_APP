class ContactInfo extends FormGrabber
{
    beforeSend() 
    {
        console.log("before send 2")
    }

    onSuccess(json) 
    {
        console.log("onSuccess 2", json, this)
        location.reload()
    }

    onError(error) 
    {
        console.log("onError 2", error)
    }

}

try {
    let mainInfo = new ContactInfo({
        'button_id': "save_2",
        'input_ids': [
            'id', 'gender', 'birth_date', "date_we_met", "adresses", "contacts"
        ],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })

} catch (e) {
    console.log('Error while creating form listener: ', e)
}