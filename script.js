const body = document.querySelector("body");
const sidebar = body.querySelector(".sidebar");
const toggle = body.querySelector(".toggle"); 
const searchBtn = body.querySelector(".search-box");
const modeSwitch = body.querySelector(".toggle-switch"); 
const modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close"); 
});
searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close"); 
});

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark"); 

    if(body.slassList.contains("dark")){
        modeText.innerText ="light Mode"
    }else{ 
        modeText.innerText ="Dark Mode"
    }
});

const linkColor = document.querySelectorAll('.nav_link')

function colorLink() {
    linkColor.forEach(link => link.classList.remove('active'))
    this.classList.add('active')
}
linkColor.forEach(link => link.addEventListener('click', colorLink))

function toggleDropdown() {
    var dropdown = document.getElementById("myDropdown");
    dropdown.classList.toggle("active");
  }
   