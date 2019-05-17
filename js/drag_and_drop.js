var fileInput = document.getElementById("fileInput");
var dropArea = document.getElementById("dropArea");
var files = document.getElementById("fileInput").files;

dropArea.addEventListener("dragover", function(evt) {
  evt.preventDefault();
  fileInput.classList.add("dragover");
});

dropArea.addEventListener("dragleave", function(evt) {
  evt.preventDefault();
  fileInput.classList.remove("dragover");
});
dropArea.addEventListener("drop", function(evt) {
  evt.preventDefault();
  dropArea.classList.remove("dragenter");
  var files = evt.dataTransfer.files;
  fileInput.files = files;
  var uploadList = document.getElementById("result");
  var list = "";
  for (var i = 0; i < files.length; i++) {
     list += files[i].name + "<br>";
  }
  uploadList.innerHTML = list;
});
