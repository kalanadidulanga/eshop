function changeView() {
    // alert ("Sign In");

    signUp = document.getElementById("signUpBox");
    signIn = document.getElementById("signInBox");

    signIn.classList.toggle('d-none');
    signUp.classList.toggle('d-none');
}

function signup() {
    let fname = document.getElementById("fname");
    let lname = document.getElementById("lname");
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let mobile = document.getElementById("mobile");
    let gender = document.getElementById("gender");

    let form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("m", mobile.value);
    form.append("g", gender.value);

    let request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.status == 200 & request.readyState == 4) {
            let response = request.responseText;

            if (response == "success") {
                document.getElementById("msg").innerHTML = "Registration Successfull";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            }
        }
    }
    request.open("POST", "server/SignUpProcess.php", true);
    request.send(form);
}


const signin = () => {
    let email = document.getElementById("email2");
    let password = document.getElementById("password2");
    let rememberme = document.getElementById("rememberme");

    let form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("r", rememberme.checked);

    let request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.status == 200 & request.readyState == 4) {
            let response = request.responseText;

            if (response == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgdiv1").className = "d-block";
            }
        }
    }
    request.open("POST", "server/SignInProcess.php", true);
    request.send(form);
}