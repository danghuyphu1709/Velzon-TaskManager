import './bootstrap';
import moment from 'moment';

let commentElement  = document.getElementById("comment-main");
console.log(commentElement);
Echo.channel(`CommentTask`)
    .listen('CommentTaskEvent.MessageSent', (event) => {
    let commentElement  = document.getElementById("comment-main");

    comments(commentElement,event.message,event.user);

});

function comments(element,message,user){
    let html = `<div class="d-flex mb-4" >
      <div class="flex-shrink-0">
      <img src="${user.avatar}" alt="" class="avatar-xs rounded-circle"/>
      </div>
      <div class="flex-grow-1 ms-3" >
      <h5 class="fs-13">${user.name}</h5>
      <p class="text-muted">${message.content}</p>
      <a href="javascript: void(0);" class="badge text-muted bg-light"><small class="text-muted">${formatTime(message.created_at)}</small></a>
      </div>
      </div>`
    element.insertAdjacentHTML('beforeend', html);
}

function formatTime(createdAt) {
    let timeDiff = moment(createdAt).fromNow();
    return toTitleCase(timeDiff);
}

function toTitleCase(str) {
    return str.replace(/\b\w+/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}
