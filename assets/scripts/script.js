var MenuIcon = document.querySelector(".icon-menu");

MenuIcon.addEventListener("click", function(){
    document.querySelector(".menu").classList.toggle("show");
    document.querySelector("header").classList.toggle("header-show");
    
})