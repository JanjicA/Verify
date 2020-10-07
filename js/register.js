$("#register").click(function(){
    let arrayError = [];

    let email = $("#email").val();
    let password = $("#password").val();
    let username = $("#username").val();
    let confpassword = $("#confpassword").val();

    let regexusername = /^([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*$/;
    let regexemail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    let regexpass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                    


    if(!regexusername.test(username) || username == ""){
        arrayError.push("First letter shoud be uppercase!");
    }

    if(!regexemail.test(email) || email == ""){
        arrayError.push("Email is required!");
    }

    if(!regexpass.test(password) || password == ""){
        arrayError.push("The string must contain at least 1 lowercase character, at least 1 uppercase character, at least 1 numeric character, at least one special character and the string must be 8 characters or longer");
    }

    if(password != confpassword){
        arrayError.push("Password and Confirm Password are not equals!");
    }

    $(".alert").hide();

    if(arrayError.length > 0){
        $(".alert").show();
        let html = "";
        for(let i = 0; i < arrayError.length; i++) {
            html += "<li>" + arrayError[i] + "</li>";
        }
        $(".alert").html(html);
        return false;
    }else{
        return true;
    }

});