$(".element").emojiPicker({
  // options here
});
$(".element").emojiPicker({
  width: "200",
  height: "350",
  position: "right",
  fadeTime: 100,
  iconColor: "black",
  iconBackgroundColor: "#eee",
  recentCount: 36,
  emojiSet: "apple",
  container: "body",
  button: true,
});
$(".element").emojiPicker({
  onShow: function (picker, settings, isActive) {
    // ...
  },
  onHide: function (picker, settings, isActive) {
    // ...
  },
});
// toggle the emoji picker on/off
// $(".element").emojiPicker("toggle");

// destroy the plugin and remove the emoji picker from DOM
// $(".element").emojiPicker("destroy");

function send_massage() {
  var massage = $("#massage").val();
  var username = $("#username").val();
  var time = $("#time").val();
  $.ajax({
    url: "../controller/get-massage.php",
    method: "POST",
    data: {
      username: username,
      massage: massage,
      time: time,
    },
    success: function (data) {
      alert("Items added");
    },
  });

  var massage = "";
}
// $("button.btn-danger").click(function () {
//   id_to_remove = $("li.flex").attr("id");
//   alert(id_to_remove);
//   $("#" + id_to_remove).remove();
// });
function refresh(e) {
  console.log(e);

  $.ajax({
    url: "../controller/delete-massage.php",
    method: "POST",
    data: {
      id: e,
    },
    success: function (data) {
      //alert(e);
    },
  });
  $("#" + e).remove();
}
function rename(e) {
  console.log(e);
  var get = $("div span.block").text();
  console.log(get);
  $.ajax({
    url: "../controller/rename-massage.php",
    method: "POST",
    data: {
      id: e,
    },
    success: function (data) {
      //alert(e);
    },
  });
}
