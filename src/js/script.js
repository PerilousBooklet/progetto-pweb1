function resizeDiv() {
    var windowHeight = window.innerHeight;
    var margin = document.getElementById("header").clientHeight + document.getElementById("nav").clientHeight + document.getElementById("footer").clientHeight + 98; // Adjust this margin as needed
    var divHeight = windowHeight - margin;
    document.getElementById("row").style.height = divHeight + "px";
}

// Call the function on page load and when the window is resized
//window.addEventListener("load", resizeDiv);
//window.addEventListener("resize", resizeDiv);