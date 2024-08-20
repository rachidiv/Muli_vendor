import Echo from "laravel-echo";
import Pusher from "pusher-js";
window.Pusher = Pusher;

// document.addEventListener("DOMContentLoaded", function () {
window.Echo = new Echo({
    broadcaster: "pusher",
    key: "e8e5551a6aaad444cb6d",
    cluster: "eu",
    forceTLS: true,
});
var channel = window.Echo.private(`App.Models.User.${userID}`);
channel.notification(function (data) {
    alert(JSON.stringify(data));
});
// });
