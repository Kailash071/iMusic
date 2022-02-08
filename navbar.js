const actionBtn = document.querySelector("#actionBtn")
const userProfile = document.querySelector("#userProfile")
const logOutDiv = document.querySelector("#logOutDiv")
const btnLogOut = document.querySelector("#logOut")
const userName = document.querySelector("#userName")
const premiumPlans = document.querySelector("#premiumPlans")
const premiumBtn = document.querySelector("#premiumBtn")

window.addEventListener("load", () => {
  if (sessionStorage.length<=0) {
    window.location.assign("login.php")
    userProfile.style.display = "none"
    logOutDiv.style.display = "none"
    actionBtn.style.display = "flex"
    premiumPlans.style.display = "none"
    console.log("session is null")
  }
   else {
     if(sessionStorage.getItem("sessionEmail")){
       console.log("current session: " + sessionStorage.getItem("sessionEmail"))
     }
     else if(sessionStorage.getItem("sessionPhone")){
      console.log("current session: " + sessionStorage.getItem("sessionPhone"))
     }
     else{
       console.log("another session")
     }
      userProfile.style.display = "flex"
      logOutDiv.style.display = "flex"
      premiumPlans.style.display = "flex"
      actionBtn.style.display = "none"
   
  }

  if(sessionStorage.getItem("sessionEmail") != null){
    const currentUser = sessionStorage.getItem("sessionEmail")
    console.log("current user:"+currentUser)

    const usersCollection = database.collection('premiumAccounts');
    const query = usersCollection.where('email', '==', currentUser);
    query.get().then(snapshot => {
      snapshot.forEach(user => {
        console.log(user.id, ' => ', user.data());
        console.log("user with premium account")
        premiumPlans.style.display = "none"
      });
    })
    .catch(error => {
      console.error(error);
    });

  }
  else if(sessionStorage.getItem("sessionPhone") != null){
    const currentUser = sessionStorage.getItem("sessionPhone").substring(3)
    console.log("current user:"+currentUser)

    const usersCollection = database.collection('premiumAccounts');
    const query = usersCollection.where('phone', '==', currentUser);
    query.get().then(snapshot => {
      snapshot.forEach(user => {
        console.log(user.id, ' => ', user.data());
      });
      console.log("user with premium account")
      premiumPlans.style.display = "none"
    })
    .catch(error => {
      console.error(error);
    });
    
  }
  else{
    console.log("user from login with google ")
  }
})

premiumBtn.addEventListener("click", () => {
  window.location.assign("premiumPlans.php")
})

const auth = firebase.auth()
const database = firebase.firestore()

btnLogOut.addEventListener("click", () => {
  //signOut() is a built in firebase function responsible for signing a user out
  auth
    .signOut()
    .then(() => {
      console.log("User signed out successfully !")
      sessionStorage.removeItem("sessionEmail")
      sessionStorage.removeItem("sessionPhone")
      window.location.assign("./login.php")
    })
    .catch((error) => {
      console.error(error)
    })
})

const usersCollection = database.collection("usersWemail")

auth.onAuthStateChanged((user) => {
  const query = usersCollection.where("email", "==", user.email)
  query
    .get()
    .then((snapshot) => {
      snapshot.forEach((user) => {
        userName.innerHTML = user.data().name
        console.log(userName)

        console.log(user.id, " => ", user.data())
      })
    })
    .catch((error) => {
      console.error(error)
    })

  // console.log(user)
  // The user object holds the current user's informtaion such as their
  // display name, their email, their avatar etc...
  if (user.displayName) {
    console.log(user.displayName)
    userName.innerHTML = user.displayName
  }
})

if (sessionStorage.getItem("sessionPhone")!= null) {
  userName.innerHTML = sessionStorage.getItem("sessionPhone")
}

/**************************************************/
// if(sessionStorage.getItem("premiumAcc") != null){
//   premiumPlans.style.display = "none" 
// }
// console.log("premium Account Id :"+ sessionStorage.getItem("premiumAcc"))