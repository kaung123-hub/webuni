const btn = document.getElementById('dismissbtn');
const error = document.getElementById('errord');
console.log(btn);

btn.addEventListener('click', function() {
    // console.log("hello")
    error.style.display = "none";
})