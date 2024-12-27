$(document).ready(function () {


    class registerValidation {

        constructor(value, regExp, errTxt, errId) {
            this.value = value;
            this.regExp = regExp;
            this.errTxt = errTxt;
            this.errId = errId;
        }

        validate() {

            if (this.regExp.test(this.value)) {
                $(this.errId).text("");
            }
            else if (this.value == "") {
                $(this.errId).text("");
            }
            else {
                $(this.errId).text(this.errTxt);
            }

        }

        match() {
            // console.log(this.value);
            if (this.errId == "#userErr") {
                var userNameValue = this.value;
                var nameErrId = this.errId;
            }
            else if (this.errId == "#emailErr") {
                var userEmailValue = this.value;
                var emailErrId = this.errId;
            }
            $.ajax({
                url: "register_backend.php",
                tyle: "POST",
                data: {
                    user_name: userNameValue,
                    user_email: userEmailValue,
                },
                success: function (data) {
                    console.log(data);
                    if (data == "0") {
                        $(nameErrId).text("User name is already exist");
                    }
                    if (data == "1") {
                        $(emailErrId).text("Email name is already exist");
                    }
                }
            })

        }

    }


    const field = [

        {
            id: "#userID",
            regExp: /^[a-zA-Z_0-9]+$/,
            errTxt: "Username only allowed characters, _ and numberss",
            errId: "#userErr"
        },
        {
            id: "#emailId",
            regExp: /^[a-zA-Z0-9\.]+@[a-zA-Z\.]+\.[a-zA-Z]{2,3}$/,
            errTxt: "Enter a valid email",
            errId: "#emailErr"
        },
        {
            id: "#passwordId",
            regExp: /^.{8,20}$/,
            errTxt: "password must min of 8 and max of 20",
            errId: "#passwordErr"
        }

    ];


    field.map(ele => {

        $(ele.id).on('input', function () {

            let value = $(this).val().trim();
            let myObj = new registerValidation(value, ele.regExp, ele.errTxt, ele.errId);

            myObj.validate();
            myObj.match();

        })

    })


    $("#register-btn").on('click' , function(e) {

        e.preventDefault();

        var checkData = 1;

        field.map(ele=>{

            let valueOfData = $(ele.id).val().trim();

            if(valueOfData == ""){
                checkData = 0;
            }
            if(!$(ele.errId).text() == ""){
                checkData = 0
            }

        })

        // console.log("Check value = "+checkData);


        if(checkData == 1){

            let formData = new FormData(formid);
            
            $.ajax({
                url: "register_backend.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $("#dataGetting").html("<p class='success-from'>"+data+"</p>");
                    window.location.href = "../php/main.php";
                }
            })


        }
        else{
            $("#dataGetting").html("<p class='fail-form'>Check your details!</p>")
        }

    })







    console.log("working");
})