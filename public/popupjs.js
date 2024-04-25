const createPopup = (popupId) => {
  const popupNode = document.querySelector(popupId);
  const overlay = popupNode.querySelector(".overlay");
  const closeBtn = popupNode.querySelector(".close-btn");

  function openPopup() {
      popupNode.classList.add("active");
  }

  function closePopup() {
      popupNode.classList.remove("active");
  }

  overlay.addEventListener("click", closePopup);
  closeBtn.addEventListener("click", closePopup);

  return openPopup;
};

const openPopupElement = document.querySelector('.open-popup');
const popup = createPopup("#popup");
openPopupElement.addEventListener('click', popup);

document.querySelectorAll('.parent-reply').forEach((btn) => {
  btn.addEventListener('click', (event) => {
      const commentSection = event.target.closest('.user-info');
      const replyInputField = commentSection.querySelector('.reply-input-field');
      replyInputField.classList.toggle('active');
  });
});

document.querySelectorAll('.parent-replies').forEach((btn) => {
  btn.addEventListener('click', (event) => {
      const commentSection = event.target.closest('.user-info');
      const repliesSection = commentSection.querySelectorAll('.user-info-reply');
  repliesSection.forEach(reply=>{

    reply.classList.toggle('active');
  })
  });
});

//
document.querySelectorAll('.btn1').forEach((btn) => {
  btn.addEventListener('click', (event) => {
    const parentReply = event.target.closest('.user-info-reply');
    const repliesSection = parentReply.querySelectorAll('.user-info-reply-2');
    repliesSection.forEach(reply=>{

      reply.classList.toggle('active');
    })
  });
});



document.querySelectorAll('.try').forEach((btn) => {
  btn.addEventListener('click', (event) => {
      const repliesSection = event.target.closest('.user-info').querySelector('.reply-input-field-2');
      return repliesSection.classList.toggle('active');
  });
});

