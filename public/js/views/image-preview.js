function previewFile(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        console.log('dataURL', dataURL);
        var previewId = $(input).data('preview-id');
        var img = document.getElementById(previewId);
        console.log('input', img);
        img.src = dataURL;
        console.log('preview', img.src);
    };
    reader.readAsDataURL(input.files[0]);
}
