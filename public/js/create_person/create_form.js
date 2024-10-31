class Person extends FormGrabber
{
    beforeSend() {
       // console.log(this.formData.get('name').length , this.formData.get('surname').length)
        if(this.formData.get('name').length == 0 && this.formData.get('surname').length == 0) {
            this.disableSending()
           // console.log(-1)
        } else {
            this.enableSending()
        }
    }
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


$(document).ready(function() {
    $('.my-form').keyup(function() {
        let url = document.getElementsByTagName("base")[0].href
        // Do something when a key is released
        $.ajax({
            url: url + "api/search_by_name", // Replace with your actual script URL
            type: "POST", // Specify the request method (GET, POST, etc.)
            data: {
              // Data to send to the server
              name: $('#name').val(),
              surname: $('#surname').val(),
              middlename: $('#middlename').val(),
            },
            success: function(response) {

              // middlname_search_results
                $("#name_search_results").empty();
                $("#surname_search_results").empty();
                $("#middlename_search_results").empty();
// console.log(response.data)
                response.data.name.forEach( (item) => {
                    let newDiv = $('<div>')
                    .addClass('person-page border m-1 ps-1 pe-1 rounded')
                    .append($('<a>')
                        .attr('href', url + 'person/' + item.id)
                        .attr('target', '_blank')
                        .text(item.name + ' ' + item.surname + ' ' + item.middlename));

                    $("#name_search_results").append(newDiv)
                })

                response.data.surname.forEach( (item) => {
                    let newDiv = $('<div>')
                    .addClass('person-page border m-1 ps-1 pe-1 rounded')
                    .append($('<a>')
                        .attr('href', url + 'person/' + item.id)
                        .attr('target', '_blank')
                        .text(item.name + ' ' + item.surname + ' ' + item.middlename));

                    $("#surname_search_results").append(newDiv)
                })

                response.data.middlename.forEach( (item) => {
                    let newDiv = $('<div>')
                    .addClass('person-page border m-1 ps-1 pe-1 rounded')
                    .append($('<a>')
                        .attr('href', url + 'person/' + item.id)
                        .attr('target', '_blank')
                        .text(item.name + ' ' + item.surname + ' ' + item.middlename));

                    $("#middlename_search_results").append(newDiv)
                })



            },
            error: function(xhr, status, error) {
              // Handle errors
              console.error("Error: " + error);

            }
          });

    });
});

