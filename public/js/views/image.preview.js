function previewFile(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        var previewId = $(input).data('preview-id');
        var img = document.getElementById(previewId);
        img.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}
