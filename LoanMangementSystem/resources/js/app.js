import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';



window.Alpine = Alpine;

Alpine.start();



//Icons
const sunIcon = document.querySelector(".sun");
const moonIcon = document.querySelector(".moon");

// Theme
const userTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

//icon toggling
const iconToggle =  () => {
    moonIcon.classList.toggle("display-none");
    sunIcon.classList.toggle("display-none");
    
};

//initial Theme Chech
const themeCheck = () => {
    if (userTheme === "dark" || (!userTheme && systemTheme)) {
        document.documentElement.classList.add("dark");
        moonIcon.classList.add("display-none");
        return;
    }
    sunIcon.classList.add("display-none");
};


// Manual Theme Switch

const themeSwitch = () => {
    if (document.documentElement.classList.contains("dark")){
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "light");
        iconToggle();
        return;
    }
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
    iconToggle();
};

// call theme switch on clicking buttons
sunIcon.addEventListener("click", () => {
    themeSwitch();
});

moonIcon.addEventListener("click", () => {
    themeSwitch();
});


// invoke theme check on initial load

themeCheck();

