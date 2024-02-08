let krug = document.getElementById("krug");
let item = document.querySelector(".header-panel")

document.addEventListener( 'click', (e) => {
	const withinBoundaries = e.composedPath().includes(krug);
	if ( ! withinBoundaries ) {
        if(item.style.display == "flex"){
            console.log("1111");
            item.style.display = 'none';
        }
	}
})

krug.addEventListener("click", ()=>{
    item.style.display = "flex";
});

