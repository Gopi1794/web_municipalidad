 //Navegation bar effects on scroll//

 window.addEventListener("scroll" , function(){
    const header = document.querySelector("header");
    header.classList.toggle("sticky" , window.scrollY > 0);
    });
    


//Resposive navegation menu toggle
    
    const menuBtn = document.querySelector(".nav-menu-btn");
    const closeBtn = document.querySelector(".nav-close-btn");
    const navegation = document.querySelector(".navegation");
    
    menuBtn.addEventListener("click",  () =>{
    navegation.classList.add("active");
    });
    closeBtn.addEventListener("click",  () =>{
    navegation.classList.remove("active");
    });

//Menu Mi San Vicente

