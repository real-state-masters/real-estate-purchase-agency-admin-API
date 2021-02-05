<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }
        #logout-btn{
            background-color: red;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
        <button id='logout-btn'> Log out</button>
    <h2>Login Form</h2>

    <form id='myform' action="/action_page.php" method="post">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="submit" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>


    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBWhxn3A1tUiEk7j6ZHUqUm0-AQUR6Lv8I",
            authDomain: "rea-admin-cda81.firebaseapp.com",
            projectId: "rea-admin-cda81",
            // storageBucket: "rea-admin-cda81.appspot.com",
            // messagingSenderId: "898359694447",
            appId: "1:898359694447:web:93148bfb363509cbf0e99a"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();
        const db = firebase.firestore();

        db.settings({
            timestampsInSnapshots: true
        });

        const logoutBtn = document.getElementById('logout-btn');
        logoutBtn.addEventListener('click',e=>{
            auth.signOut();
        });

        const myForm = document.getElementById('myform');
        myForm.addEventListener('submit', e => {
            e.preventDefault();
            signUp(e);
        });

        auth.onAuthStateChanged(user=>{
            console.log(user)
        })
        const REGISTER_URL = 'https://www.googleapis.com/identitytoolkit/v3/relyingparty/signupNewUser';
        const KEY = 'AIzaSyBWhxn3A1tUiEk7j6ZHUqUm0-AQUR6Lv8I';

        function signUp(e) {
            const email = myForm.querySelector('input[name="uname"]').value;
            const password = myForm.querySelector('input[name="psw"]').value;
            console.log(email);
            console.log(password);
            auth.createUserWithEmailAndPassword(email, password)
                .then(cred => console.log(cred));
            let url = REGISTER_URL+'?hola=asdfsd&key='+KEY;
            let data = {
                email:email,
                password:password,
                returnSecureToken:true,
            };
            // fetch(url, {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json'
            //         // 'Content-Type': 'application/x-www-form-urlencoded',
            //     },
            //     body: JSON.stringify(data)
            // });


            // auth.signInWithEmailAndPassword(email, password)
            // .then(cred=>console.log(cred));
        }
    </script>
</body>

</html>