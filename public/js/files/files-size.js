fetch(document.getElementsByTagName("base")[0].href + 'api/files_size').then( (response) => {
    if (!response.ok) {
        throw Error(response.statusText);
    } else {
        return response.json()
    }
}).then( (json) => {
    console.log('All files size:', json.data.files_size)
    document.getElementById('file-size').innerHTML = formatBytes(json.data.files_size, decimals = 2)
}).catch( (error) => {
    console.log("error: ", error)
})


function formatBytes(bytes, decimals = 2) {
    if (!+bytes) return '0 Bytes'

    const k = 1024
    const dm = decimals < 0 ? 0 : decimals
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB']

    const i = Math.floor(Math.log(bytes) / Math.log(k))

    return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`
}