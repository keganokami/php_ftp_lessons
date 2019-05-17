function printfile() {
  var fileInput = document.getElementById("fileInput").files;
  var list = "";
  for (var i = 0; i < fileInput.length; i++) {
    list += fileInput[i].name + "<br>";
  }
  document.getElementById("result").innerHTML = list;
}

