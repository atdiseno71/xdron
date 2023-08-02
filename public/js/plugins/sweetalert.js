$('.form-delete').submit(function(e){
    e.preventDefault();
    Swal.fire({
    title: '¿Está seguro de eliminar esto?',
    text: "No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, elimina esto!'
    }).then((result) => {
    if (result.isConfirmed) {
        this.submit();
    }
    })
});

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
