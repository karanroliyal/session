$(document).ready(function () {


    console.log("login page working")

    $("#login-btn").click(function () {

        var userName = $("#userID").val().trim();
        var userPassword = $("#passwordId").val().trim();

        let checkData = 1;

        if (userName == "") {
            $("#userErr").html("<span class='errorText'>This field is required</span>");
            checkData = 0;
        }else{
            $("#userErr").html("");
        }


        if (userPassword == "") {
            $("#passwordErr").html("<span class='errorText'>This field is required</span>");
            checkData = 0;
        }else{
            $("#passwordErr").html("");
        }

        if (checkData == 1) {

            $.ajax({
                url: "../php/login_backend.php",
                type: "POST",
                data: { user_name: userName, user_password: userPassword },
                success: function (data) {
                    console.log(data);
                    if(data === "success"){
                        window.location.href="../php/main.php";
                    }else{
                        $("#dataGetting").html("<span class='errorText'>Details are wrong!!!</span>")
                    }
                }
            })

        }



    })



})