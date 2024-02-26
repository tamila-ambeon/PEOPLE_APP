class MainInfo extends FormGrabber
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
    let mainInfo = new MainInfo({
        'button_id': "save_1",
        'input_ids': [
            'id', 'name', 'surname', "middlename"
        ],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/main_info",
    })

} catch (e) {
    console.log('Error while creating form listener: ', e)
}