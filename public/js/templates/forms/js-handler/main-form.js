class MainInfo extends FormGrabber
{
    beforeSend() 
    {
        console.log("before send 2")
    }

    onSuccess(json) 
    {
        console.log("onSuccess 2", json, this)
    }

    onError(error) 
    {
        console.log("onError 2", error)
    }

}

try {
    let mainInfo = new MainInfo({
        "debug": true,
        'button_id': "my_info_button",
        'input_ids': [
            "percentage", "gender", "date", "time", 
            "timezone", "pizza", "editor"
        ],
        'method': "PATCH",
        'endpoint': document.getElementsByTagName("base")[0].href + "api/test-form-input"
    })

} catch (e) {
    console.log('Error while creating form listener: ', e)
}