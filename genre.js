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
  })