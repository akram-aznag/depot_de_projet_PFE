User
const like_form = document.querySelectorAll('.like_form');
const unlike_form = document.querySelectorAll('.unlike_form');

like_form.forEach(btn => {
    btn.addEventListener('submit', (e) => {
        e.preventDefault();
        const form_controller=e.target.closest(".form_controller");
        form_controller.classList.remove('remove_unlike');
        form_controller.querySelector('.like_form').submit();
     

     
    });
});

unlike_form.forEach(btn => {
    btn.addEventListener('submit', (e) => {
        e.preventDefault();
        const form_controller=e.target.closest(".form_controller");
       form_controller.classList.add('remove_unlike')
       form_controller.classList.remove('remove_like')


       
    });
});