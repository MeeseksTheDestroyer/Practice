var MenuIcon = document.querySelector(".icon-menu");

MenuIcon.addEventListener("click", function(){
    document.querySelector(".menu").classList.toggle("show");
    document.querySelector("header").classList.toggle("header-show");
    
})

let quest = document.querySelectorAll(".question");
for (let i=0; i < quest.length; i++) {
    quest[i].addEventListener("click", function(e) {
        if(this.children[0].children[1].children[0].style.transform == "rotate(-45deg)") 
        {
            this.children[0].children[1].children[0].style.transform = "";
            this.children[0].children[1].children[0].classList.remove("rotation");
            this.children[1].style.display = "none";
        }
        else {
            this.children[0].children[1].children[0].classList.add("rotation");
            this.children[0].children[1].children[0].style.transform = "rotate(-45deg)";
            this.children[1].style.display = "block";
        }
        
    })
}