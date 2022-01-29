// const actionBtn = document.querySelector("#actionBtn")
// const userProfile = document.querySelector("#userProfile")
// const logOutDiv = document.querySelector("#logOutDiv")
// const premiumPlans = document.querySelector("#premiumPlans")

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
  
/*****************scroll button******************/
// const playBtn = document.querySelector('#playBtn');
// const pauseBtn = document.querySelector('#pauseBtn');
// const audio1Src = new Audio('Dil Lauta Do.mp3');

const scrollTopBtn = document.querySelector('#scrollBtn');
const imageArrow = document.querySelector('.imgArrowTop');
const gifArrow = document.querySelector('.gifArrowTop');

scrollTopBtn.addEventListener('mouseover',()=>{
    imageArrow.style.display = "none";
    gifArrow.style.display = "block";
})
scrollTopBtn.addEventListener('mouseout',()=>{
    imageArrow.style.display = "block";
    gifArrow.style.display = "none";
})
scrollTopBtn.addEventListener('click',()=>{
    window.scrollTo({ top: 0, behavior: 'smooth' });
})
/*******************************************************/



/******************************************************/


// const songs = [
//     {songName:" Bewafa Tera Muskurana",songPath:""},
//     {songName:"Lut Gaye",songPath:""},
//     {songName:"Wafa Na Raas Aaye",songPath:""}
// ]

// playBtn.addEventListener('click', ()=>{
//     if(audio1Src.paused || audio1Src.currentTime<=0){
//         audio1Src.play();
//         playBtn.style.display = "none";
//         pauseBtn.style.display = "block";
//         // masterPlay.classList.remove('fa-play-circle');
//         // masterPlay.classList.add('fa-pause-circle');
//         // gif.style.opacity = 1;
//     }
// })
// pauseBtn.addEventListener('click',()=>{
//     if(audio1Src.played || audio1Src.currentTime>=0){
//         audio1Src.pause();
//         pauseBtn.style.display = "none";
//             playBtn.style.display = "block";
//           //  console.log("paused clicked");
//     }
// })

