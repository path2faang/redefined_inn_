$(document).ready(function(e){
    function makeAjaxCall(url, data) {
        $.ajax({
            type: "POST",
            data: data,
            url: url,
            beforeSend: function (e) {
                $("#submitBtn").html("processing...").addClass("opacity-50 cursor-not-allowed disabled").attr("disable", true)
            },
            complete: function (result) {
                if (result.message && result.success) {
                    $("#success").text(result.message).addClass("bg-green-600 py-2 px-5 text-white rounded-lg text-white");
                } else {
                    $("#error").text(result.message).addClass("bg-red-600 py-2 px-5 text-white rounded");
                }
            },
            dataType: "json",


        })

    }

    $("#loginForm").submit(function (e) {
        staffInstance.registerStaff(e);
        makeAjaxCall("processAuthentication.php", $(this).serialize())
    })

    $("#registrationForm").submit(function (e) {
        makeAjaxCall("processAuthentication.php", $(this).serialize())
    })
})