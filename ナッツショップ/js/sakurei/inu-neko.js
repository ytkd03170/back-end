
function boxCheck(){

  noch(); // ユーザー定義関数の呼び出し

  var str="";
  
  for(i=0;i<6;i++){
    if(document.chbox.elements[i].checked){

      if(str != "") str=str+","; // str += "," でもいい

      str=str+document.chbox.elements[i].value;
    }
  }

  if(str==""){
     alert("どれか選択してください。");
  }else{
    alert(str+"が選択されました。");
  }
}