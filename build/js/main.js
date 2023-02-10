

// cursor
const cursorRounded = document.querySelector('.cursor');
const cursorText = document.querySelector('.custom');

document.addEventListener('mousemove', e => {
  const mouseX = e.pageX;
  const mouseY = e.pageY;   
  
  cursorRounded.style.top = mouseY + "px"; 
  cursorRounded.style.left = mouseX + "px";   
  cursorText.style.top = mouseY + "px"; 
  cursorText.style.left = mouseX + "px"; 
})


// animations
/* If Item is in Viewport */
function isInViewport(givenItem) {
    let bounding = givenItem.getBoundingClientRect()
    let myElementHeight = givenItem.offsetHeight
    let myElementWidth = givenItem.offsetWidth

    if(bounding.top >= -myElementHeight
        && bounding.left >= -myElementWidth
        && bounding.right <= (window.innerWidth || document.documentElement.clientWidth) + myElementWidth
        && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) + myElementHeight
    ) {
        return true;
    } else {
        return false;
    }

}

/* switch class (play anim) */

// On a timer for testing
function getItemsFunc(){
    let item = document.getElementsByClassName("visible-anim");
    let theArray = Array.from(item);

    function doSomeStuff(theItem,index){
      // Let us know if there is no valid element
      if(theArray[index].length == 0){
          console.error("Could not find class");
      }else if(isInViewport(theArray[index])){
          theArray[index].classList.add("animation");
      }
    }
    theArray.forEach(doSomeStuff);
}

setTimeout(function () { getItemsFunc() }, 300);

window.onscroll = function() { getItemsFunc() };



// coming soon text switch
var changeTextTimer = 0

function changeText(element) {
    element.innerHTML = "Coming soon.";
    changeTextTimer = Math.floor(Date.now() / 1000)
    setTimeout(function () {
        if (Math.floor(Date.now() / 1000) > changeTextTimer + 2) {
            element.innerHTML = "View All";
        }
    }, 3000)
}



// onclick copy to clipboard / class switcher
var copyToClipboardTime = 0

function showCopyNoitce() {
    let element = document.getElementById("copy-box");
    navigator.clipboard.writeText('April#1234')
    element.className = "copied-box-show";
    copyToClipboardTime = Math.floor(Date.now() / 1000)
    setTimeout(function () {
        if (Math.floor(Date.now() / 1000) > copyToClipboardTime + 2) {
            element.className = "copied-box-hide";
        }
    }, 3000)
}