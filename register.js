document.querySelector("#registerForm").addEventListener("submit", (e) => {
  e.preventDefault()
})
const nameField = document.querySelector("#name")
const emailField = document.querySelector("#email")
const passwordField = document.querySelector("#password")
const dayField = document.querySelector("#day")
const monthField = document.querySelector("#month")
const yearField = document.querySelector("#year")

const submit = document.querySelector("#register")

const auth = firebase.auth()
const database = firebase.firestore()

const signUpFunction = () => {
  const name = nameField.value
  const email = emailField.value
  const password = passwordField.value
  const day = dayField.value
  const month = monthField.value
  const year = yearField.value

  const dob = day + "-" + month + "-" + year

  let currentDate = new Date()
  let cDay = currentDate.getDate()
  let cMonth = currentDate.getMonth() + 1
  let cYear = currentDate.getFullYear()
  const cDate = cDay + "-" + cMonth + "-" + cYear

  auth
    .createUserWithEmailAndPassword(email, password)
    .then(() => {
      console.log("Signed Up Successfully !")
      
      const usersCollection = database.collection("usersWemail")
      const ID = usersCollection
        .add({
          name: name,
          email: email,
          password: password,
          dob: dob,
          createdAt: cDate,
        })
        .then(() => {
          console.log("User Registered successfully !")
          window.location.assign("login.php")
        })
        .catch((error) => {
          console.error(error)
        })
    })
    .catch((error) => {
      console.error(error)
    })
}
submit.addEventListener("click", signUpFunction)



// const usersCollection = database.collection("usersWemail")
// const ID = usersCollection
//   .add({
//     name: name,
//     email: email,
//     password: password,
//     dob: dob,
//     createdAt: cDate,
//   })
//   .then(() => {
//     console.log("User Registered successfully !")
//   })
//   .catch((error) => {
//     console.error(error)
//   })


/******************************* */
// const name = nameField.value
// const email = emailField.value
// const password = passwordField.value
// const day = dayField.value
// const month = monthField.value
// const year = yearField.value

// const dob = day+"-"+month+"-"+year;

// console.log(name)
// console.log(dob)
// console.log(email)
// console.log(password)

// usersCollection.doc(userId.value).get()
// .then(user => {
//   if(user.exists)
//     console.log(user.data());
//   else
//     console.log('User does not exist !');
//   })
// .catch(error => {
//   console.error(error);
// });

// const usersCollection = database.collection('usersWemail');
// const query = usersCollection.where("email", "==", email)
// query.get().then((snapshot) => {
//     snapshot.forEach((user) => {

//           console.log("email matched...")
//           console.log(user.id, " => ", user.data())
//     })
// })
// .catch((error) => {
//     console.error(error)
// })
