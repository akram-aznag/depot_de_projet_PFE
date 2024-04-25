const message = document.getElementById('vmessage');
const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const email=document.getElementById('eval');
document.querySelector('form').addEventListener('submit',(e)=>{
   
    e.preventDefault();
    if(!email.value.match(emailPattern)){
        message.textContent="enter an valid email !";
        message.style.color="red";
    }
    else{
        message.textContent="email verification sent successfully  !";
        message.style.color="green";
        e.target.submit()

    }
})