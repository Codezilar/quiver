const mainBar = document.querySelector(".main_bar");
const cancel = document.querySelector(".cancel");
const barItem = document.querySelector(".the_bar_item");

mainBar.addEventListener("click", function(){
    mainBar.style.display = "none";
    barItem.style.display = "flex";
    cancel.style.display = "block";
})

cancel.addEventListener("click", function(){
    cancel.style.display = "none";
    barItem.style.display = "none";
    mainBar.style.display = "block";
})

const inputTag = document.querySelector('.input_url_download');
const downloadBtn = document.querySelector('.download_btn');

downloadBtn.addEventListener("click", async () => {
    try{
        const response = await fetch(inputTag.value)
        const file = await response.blob();
        const link = document.createElement("a");
        link.href = URL.createObjectURL(file);
        link.download = new Date().getTime();
        link.click();
    }catch(error){
        alert("Download failed!");
    }
});