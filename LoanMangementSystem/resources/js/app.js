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


$(document).on('click','.search_account',function(){
	var account_no = $('.accnt_no').val();

	$.ajax({
		url: BASE_URL+'account-query',
		type: 'POST',
		dataType: "json",
		data: {
			account_no : account_no
		},
		success:function(response){
			if(response.success == true){
				$(".acc_no").addClass("has-success");
				$(".fa-search").addClass("text-success");
				$('.full_name').val(response.name);
				$('.address').val(response.address);
				$('.email').val(response.email);
				$('.sim1').val(response.sim1);
				$('.sim2').val(response.sim2);
				$(".acc_no").removeClass("has-danger");
				$(".fa-search").removeClass("text-danager");
				

				$('.fas').click();
				
				checkconnection();

			}else{
				showNotification(
					'Borrowers data not found!',
					"info",
					"danger"
				);

				$('.full_name').val('');
				$('.address').val('');
				$('.email').val('');
				$('.sim1').val('');
				$('.sim2').val('');
				$(".acc_no").removeClass("has-success");
				$(".fa-search").removeClass("text-success");
				$(".acc_no").addClass("has-danger");
				$(".fa-search").addClass("text-danger");
			}
		}
	});
	return false;
});
