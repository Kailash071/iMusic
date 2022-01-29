window.addEventListener("load", () => {
  if (sessionStorage.getItem("sessionEmail") != null || sessionStorage.getItem("sessionPhone")!= null || sessionStorage.length>0) {
    window.location.assign("home.php")
    //console.log("session is null")
  } else {
    console.log("current session: " + sessionStorage.getItem("sessionEmail"))
  }
})
/******************************************************************/
document.querySelector("#loginForm").addEventListener("submit", (e) => {
  e.preventDefault()
})
/******************************************************************/

const emailField = document.querySelector("#email")
const passwordField = document.querySelector("#password")
const login = document.querySelector("#login")

const auth = firebase.auth()
const database = firebase.firestore()

//Sign in function
const signInWithEmailFunction = () => {
  const email = emailField.value
  const password = passwordField.value
  //Built in firebase function responsible for authentication
  auth.signInWithEmailAndPassword(email, password)
  .then(() => {
    //Signed in successfully
    console.log('You\'re successfully signed in !');
    const usersCollection = database.collection("usersWemail")
    const query = usersCollection.where("email", "==", email)
    query
      .get()
      .then((snapshot) => {
        snapshot.forEach((user) => {
          console.log("email matched...")
          console.log(user.id, " => ", user.data())
          sessionStorage.setItem("sessionEmail", user.data().email)
          //  console.log("session:"+sessionStorage.getItem("sessionEmail"));
          window.location.assign("home.php")
        })
      })
      .catch((error) => {
        console.error(error)
      }) 
  })
  .catch(error => {
    console.error(error);
  })
}
login.addEventListener("click", signInWithEmailFunction)

/**  const usersCollection = database.collection("usersWemail")
      const query = usersCollection.where("email", "==", email)
      query
        .get()
        .then((snapshot) => {
          snapshot.forEach((user) => {
            console.log("email matched...")
            console.log(user.id, " => ", user.data())
            sessionStorage.setItem("sessionEmail", user.data().email)
            //  console.log("session:"+sessionStorage.getItem("sessionEmail"));
            //window.location.assign("home.php")
          })
        })
        .catch((error) => {
          console.error(error)
        }) */

/**********************Login With Google**************************/
const loginOptionGoogle = document.querySelector("#login-option-google")
//const signInWithGoogleBtn = document.getElementById('signInWithGoogle');

//const auth = firebase.auth();

const signInWithGoogle = () => {
  const googleProvider = new firebase.auth.GoogleAuthProvider()

  auth
    .signInWithPopup(googleProvider)
    .then(() => {      
        sessionStorage.setItem("sessionEmail","signInWithGooglePopUp")
        console.log("You're now signed in !")
        window.location.assign("home.php")
      })
    .catch((error) => {
      console.error(error)
    })
}
loginOptionGoogle.addEventListener("click", signInWithGoogle)

/****************Login With Phone Redirected to phone.php ********/
const loginOptionPhone = document.querySelector("#login-option-phone")

loginOptionPhone.addEventListener("click", () => {
  window.location.assign("registerWithPhone.php")
})
