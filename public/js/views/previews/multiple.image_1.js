/*
        * Variables
        */

let filesList = [];
const classDragOver = "drag-over";
const fileInputMulti = document.querySelector("#multi-selector-uniq #files_1");
// DEMO Preview
const multiSelectorUniqPreview = document.querySelector("#multi-selector-uniq #preview-files_1");

/*
* Functions
*/

/**
 * Returns the index of an Array of Files from its name. If there are multiple files with the same name, the last one will be returned.
 * @param {string} name - Name file.
 * @param {Array<File>} list - List of files.
 * @return number
 */
function getIndexOfFileList(name, list) {
    return list.reduce(
        (position, file, index) => (file.name === name ? index : position),
        -1
    );
}

/**
 * Returns a File in text.
 * @param {File} file
 * @return {Promise<string>}
 */
async function encodeFileToText(file) {
    return file.text().then((text) => {
        return text;
    });
}

/**
 * Returns an Array from the union of 2 Arrays of Files avoiding repetitions.
 * @param {Array<File>} newFiles
 * @param {Array<File>} currentListFiles
 * @return Promise<File[]>
 */
async function getUniqFiles(newFiles, currentListFiles) {
    return new Promise((resolve) => {
        Promise.all(newFiles.map((inputFile) => encodeFileToText(inputFile))).then(
            (inputFilesText) => {
                // Check all the files to save
                Promise.all(
                    currentListFiles.map((savedFile) => encodeFileToText(savedFile))
                ).then((savedFilesText) => {
                    let newFileList = currentListFiles;
                    inputFilesText.forEach((inputFileText, index) => {
                        if (!savedFilesText.includes(inputFileText)) {
                            newFileList = newFileList.concat(newFiles[index]);
                        }
                    });
                    resolve(newFileList);
                });
            }
        );
    });
}

/**
 * Only DEMO. Render preview.
 * @param currentFileList
 * @Only .EMO> param target.
 * @
 */
function renderPreviews(currentFileList, target, inputFile) {
    target.textContent = "";
    currentFileList.forEach((file, index) => {
        const myLi = document.createElement("li");
        const img = document.createElement("img"); // Crear un elemento <img>
        img.src = URL.createObjectURL(file); // Asignar la URL de la imagen
        img.setAttribute("width", "80%"); // Establece el ancho máximo
        img.setAttribute("height", "100px"); // Establece el alto máximo
        myLi.appendChild(img); // Agregar la imagen al <li>
        myLi.setAttribute("draggable", 'true');
        myLi.dataset.key = file.name;
        myLi.addEventListener("drop", eventDrop);
        myLi.addEventListener("dragover", eventDragOver);
        myLi.classList.add("section-evidence-preview"); // Agregar una clase al <li>
        // Agregar boton para remover imagenes
        const myButtonRemove = document.createElement("button");
        myButtonRemove.textContent = "X";
        myButtonRemove.classList.add("btn"); // Agregar una clase al btn
        myButtonRemove.classList.add("btn-danger"); // Agregar una clase al btn
        myButtonRemove.classList.add("btn-preview-image"); // Agregar una clase al btn
        myButtonRemove.setAttribute("type", 'button');
        myButtonRemove.addEventListener("click", () => {
            filesList = deleteArrayElementByIndex(currentFileList, index);
            inputFile.files = arrayFilesToFileList(filesList);
            return renderPreviews(filesList, multiSelectorUniqPreview, inputFile);
        });
        myLi.appendChild(myButtonRemove);
        target.appendChild(myLi);
    });
}
/**
 * Returns a copy of the array by removing one position by index.
 * @param {Array<any>} list
 * @param {number} index
 * @return {Array<any>} list
 */
function deleteArrayElementByIndex(list, index) {
    return list.filter((item, itemIndex) => itemIndex !== index);
}

/**
 * Returns a FileLists from an array containing Files.
 * @param {Array<File>} filesList
 * @return {FileList}
 */
function arrayFilesToFileList(filesList) {
    return filesList.reduce(function (dataTransfer, file) {
        dataTransfer.items.add(file);
        return dataTransfer;
    }, new DataTransfer()).files;
}


/**
 * Returns a copy of the Array by swapping 2 indices.
 * @param {number} firstIndex
 * @param {number} secondIndex
 * @param {Array<any>} list
 */
function arraySwapIndex(firstIndex, secondIndex, list) {
    const tempList = list.slice();
    const tmpFirstPos = tempList[firstIndex];
    tempList[firstIndex] = tempList[secondIndex];
    tempList[secondIndex] = tmpFirstPos;
    return tempList;
}

/*
* Events
*/

// Input file
fileInputMulti.addEventListener("input", async () => {
    // Get files list from <input>
    const newFilesList = Array.from(fileInputMulti.files);
    // Update list files
    filesList = await getUniqFiles(newFilesList, filesList);
    // Only DEMO. Redraw
    renderPreviews(filesList, multiSelectorUniqPreview, fileInputMulti);
    // Set data to input
    fileInputMulti.files = arrayFilesToFileList(filesList);
});

// Drag and drop

// Drag Start - Moving element.
let myDragElement = undefined;
document.addEventListener("dragstart", (event) => {
    // Saves which element is moving.
    myDragElement = event.target;
});

// Drag over - Element that is below the element that is moving.
function eventDragOver(event) {
    // Remove from all elements the class that will show that it is a drop zone.
    event.preventDefault();
    multiSelectorUniqPreview
        .querySelectorAll("li")
        .forEach((item) => item.classList.remove(classDragOver));

    // On the element above it, the class is added to show that it is a drop zone.
    event.target.classList.add(classDragOver);
}

// Drop - Element on which it is dropped.
function eventDrop(event) {
    // The element that is underneath the element that is moving when it is released is captured.
    const myDropElement = event.target;
    // The positions of the elements in the array are swapped. The dataset key is used as an index.
    filesList = arraySwapIndex(
        getIndexOfFileList(myDragElement.dataset.key, filesList),
        getIndexOfFileList(myDropElement.dataset.key, filesList),
        filesList
    );
    // The content of the input file is updated.
    fileInputMulti.files = arrayFilesToFileList(filesList);
    // Only DEMO. Changes are redrawn.
    renderPreviews(filesList, multiSelectorUniqPreview, fileInputMulti);
}

// Modificar los botones ya cargados
/* Buttons */
const buttons = document.querySelectorAll(".btn-preview-image");

buttons.forEach((button, index) => {

    button.textContent = "X";
    button.classList.add("btn");
    button.classList.add("btn-danger");
    button.classList.add("btn-preview-image");
    button.setAttribute("type", 'button');

    button.addEventListener("click", () => {
        // lógica para eliminar el elemento y realizar otras acciones
        // padre del botón donde se elimina
        const parentElement = button.parentElement;
        parentElement.remove();

        // Donde se supone que deberia modificar la lista
        /* filesList = deleteArrayElementByIndex(filesList, index);
        inputFile.files = arrayFilesToFileList(filesList);
        return renderPreviews(filesList, multiSelectorUniqPreview, inputFile); */
        // Acceder al valor almacenado en el atributo data-src
        const srcFile = button.getAttribute("data-src");
        // Acceder al valor almacenado en el atributo data-src
        const key = button.getAttribute("data-key");
        // Agregar srcFile a tu lista
        filesList.push(srcFile);
        // Name input por cada detalle
        const nameKey = "files_evidence_delete_" + key;
        // Actualizar el valor del input con la lista actualizada
        const inputElement = document.getElementById(nameKey);
        console.log('inputElement',inputElement)
        inputElement.value = JSON.stringify(filesList); // Guardar como JSON
        console.log('inputElement.value',inputElement.value)

        return renderPreviews(filesList, multiSelectorUniqPreview, inputFile);
    });
});
