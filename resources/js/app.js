import Dropzone from 'dropzone';
import './bootstrap';
import '../css/app.css';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí la imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif, .heic",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,

    //Recuperar imagen subida por el usuario si alguna validación del formulario falla
    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

            imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
        }
    }
});

dropzone.on('success', function(file, response){
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = "";
});

