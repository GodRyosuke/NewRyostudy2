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

