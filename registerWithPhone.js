window.addEventListener("load",()=>{
  if(sessionStorage.getItem("sessionPhone") != null || sessionStorage.length>0){
      window.location.assign("home.php")
    //console.log("session is null")
  }
  else{
      console.log("current session: "+sessionStorage.getItem("sessionPhone"))
  }
})
/**********************************************************************/
document.querySelector("#registerPhoneForm").addEventListener("submit", (e) => {
  e.preventDefault()
})

const nameField = document.querySelector("#name")
const phoneCodeField = document.querySelector("#phoneCode")
const phoneNumberField = document.querySelector("#phoneNumber")
const getCodeButton = document.querySelector("#getCode")
const codeField = document.querySelector("#otp")
const registerNumberBtn = document.querySelector("#registerNumber")

const auth = firebase.auth()
const database = firebase.firestore()

// Creates and render the captcha
window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
  "recaptcha-container"
)
recaptchaVerifier.render().then((widgetId) => {
  window.recaptchaWidgetId = widgetId
})

const sendVerificationCode = () => {
  const phoneNumber = phoneCodeField.value + phoneNumberField.value
  const appVerifier = window.recaptchaVerifier

  // Sends the 6 digit code to the user's phone
  auth
    .signInWithPhoneNumber(phoneNumber, appVerifier)
    .then((confirmationResult) => {
      const sentCodeId = confirmationResult.verificationId

      // Sign in if the verification code is set correctly
      registerNumberBtn.addEventListener("click", () =>
        signInWithPhone(sentCodeId)
      )
    })
}

const signInWithPhone = (sentCodeId) => {
  const code = codeField.value
  // A credential object (contains user's data) is created after a comparison between the 6 digit code sent to the user's phone
  // and the code typed by the user in the code field on the html form.
  const credential = firebase.auth.PhoneAuthProvider.credential(
    sentCodeId,
    code
  )
  auth
    .signInWithCredential(credential)
    .then(() => {
      console.log("Signed in successfully !")

      //entering record to db for every login for the shake of records
      const name = nameField.value
      const phoneNumber = phoneCodeField.value + phoneNumberField.value

      let currentDate = new Date()
      let cDay = currentDate.getDate()
      let cMonth = currentDate.getMonth() + 1
      let cYear = currentDate.getFullYear()
      const cDate = cDay + "-" + cMonth + "-" + cYear

      const usersCollection = database.collection("usersWphone")
      const ID = usersCollection
        .add({
          name: name,
          phone: phoneNumber,
          createdAt: cDate,
        })
        .then(() => {
          console.log("User Registered successfully !")
          sessionStorage.setItem("sessionPhone",phoneNumber);
          window.location.assign("home.php")
         console.log(sessionStorage.getItem("sessionPhone"))
        })
        .catch((error) => {
          console.error(error)
        })

    })
    .catch((error) => {
      console.error(error)
    })
}

getCodeButton.addEventListener("click", sendVerificationCode)
