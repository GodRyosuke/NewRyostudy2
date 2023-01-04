let body = document.querySelector("body");

function showMenu() {
    ListCon.style.right = "0";
    body.style.overflow = "hidden";
    DarkDisplay.style.display = "block";
    // navLinks.style.display = "block";
}
function hideMenu() {
    ListCon.style.right = "-200px";
    body.style.overflow = "scroll";
    DarkDisplay.style.display = "none";

    // navLinks.style.display = "none";
}

// 3重線をクリックされたらメニュー開く
document.querySelectorAll('.fa-bars').forEach(function(bar) {
    bar.addEventListener('click', showMenu);
});
// メニュー閉じる
document.getElementById('ListCon').addEventListener('click',hideMenu);


// プログラムの表示処理
let codes = document.querySelectorAll("code");
codes.forEach(function(code) {
    code.classList.add('prettyprint', 'linenums');
});


// contact form
// input
let inputs = document.querySelectorAll("input");
inputs.forEach(function(input) {
    input.classList.add('form-control');
});

let textarea = document.querySelector("textarea");
if (textarea) {
    textarea.classList.add('form-control');
}


// Scroll Button
const ScrollTop = document.querySelector('#ScrollTop');

//クリックイベントを追加
ScrollTop.addEventListener('click', scroll_to_top);

function scroll_to_top(){
    console.log("hello");
	window.scroll({top: 0, behavior: 'smooth'});
};
window.addEventListener( 'scroll' , event_ecrotll );

function event_ecrotll(){
	
	if(window.pageYOffset > 400){
		// ScrollTop.style.display = 'block';
		ScrollTop.style.opacity = '1';
	}else	if(window.pageYOffset < 400){
        // ScrollTop.style.display = 'none';
		ScrollTop.style.opacity = '0';
	}
	
};