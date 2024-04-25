document.getElementById('image').addEventListener('change',function(e){
    let reader=new FileReader();
    reader.addEventListener('load',function(){
        document.getElementById('showimage').setAttribute('src',reader.result)
    })
    reader.readAsDataURL(e.target.files[0])
})