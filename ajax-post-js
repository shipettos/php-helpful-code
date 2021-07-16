function sendRegistration(){

    var aid_array = $("#aid_array").val();

    var formData = new FormData();

    var result = "";
    formData.append('aid_array', aid_array);

    //chaning cursor to waiting

    $.ajax({
        type: "POST",
        url: registerUrl,
        data: formData,
        contentType: false,
        processData: false,
        success: function(response)
        {
            if(response.message === "Error")
            {
                onRegistrationFail();
                console.log(response);
            }
            else if (response.message == "OK")
            {
                console.log(response);
                $("#customerId").val(response.model.customerId);
                onRegistrationSuccess();
            } else{ //something went wrong
                console.log(response);
                alert("Something went wrong, please try again later")

            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
            result =  "error";
            //debug
            $(".errors").html(xhr.responseText);
            console.log(xhr.responseText);
        }
    });

    return result;
}
