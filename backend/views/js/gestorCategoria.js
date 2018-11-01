document.getElementById("imagen").onchange = function(e) {
  let reader = new FileReader();
  
  reader.onload = function(){
    let preview = document.getElementById('preview'),
        image = document.createElement('img');

    image.src = reader.result;
    
    preview.innerHTML = '';
    preview.append(image);
  };
 
  reader.readAsDataURL(e.target.files[0]);
}

document.getElementById("imagenEdit").onchange = function(e) {
  let reader = new FileReader();
  
  reader.onload = function(){
    let preview = document.getElementById('preview'),
        image = document.createElement('img');

    image.src = reader.result;
    
    preview.innerHTML = '';
    preview.append(image);
  };
 
  reader.readAsDataURL(e.target.files[0]);
}
