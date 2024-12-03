var header= document.getElementById('header');
var navigation_resp = document.getElementById('navigation_resp');
var content= document.getElementById('content');
var showSideBar=false;
let resizeTimeout;

function toggleSideBar(){
    showSideBar= !showSideBar;
   if(showSideBar)
        {
            navigation_resp.style.marginLeft = '-10vw';
            navigation_resp.style.animationName='showSideBar';
            content.style.filter='blur(2px)';
 }
    else
    {
        navigation_resp.style.marginLeft='-100vw';
        navigation_resp.style.animationName='';
        content.style.filter='';
    }
}
function closeSideBar(){
    if(showSideBar){
        toggleSideBar();
    }
}
window.addEventListener('resize', function(event) {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(function() {
        if (window.innerWidth > 768 && showSideBar) {
            toggleSideBar();
        }
    }, 100); 
});
