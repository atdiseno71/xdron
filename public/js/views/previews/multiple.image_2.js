/*
        * Variables
        */

let filesList_2 = [];
// const classDragOver = "drag-over";
const fileInputMulti_2 = document.querySelector("#multi-selector-uniq #files_2");
// DEMO Preview
const multiSelectorUniqPreview_2 = document.querySelector("#multi-selector-uniq #preview-files_2");

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
        myButtonRemove.addEventListener("click", () => {
            filesList_2 = deleteArrayElementByIndex(currentFileList, index);
            inputFile.files = arrayFilesToFileList(filesList_2);
            return renderPreviews(filesList_2, multiSelectorUniqPreview_2, inputFile);
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
 * @param {Array<File>} filesList_2
 * @return {FileList}
 */
function arrayFilesToFileList(filesList_2) {
    return filesList_2.reduce(function (dataTransfer, file) {
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
fileInputMulti_2.addEventListener("input", async () => {
    // Get files list from <input>
    const newFilesList = Array.from(fileInputMulti_2.files);
    // Update list files
    filesList_2 = await getUniqFiles(newFilesList, filesList_2);
    // Only DEMO. Redraw
    renderPreviews(filesList_2, multiSelectorUniqPreview_2, fileInputMulti_2);
    // Set data to input
    fileInputMulti_2.files = arrayFilesToFileList(filesList_2);
});

// Drag and drop

// Drag Start - Moving element.
let myDragElement_2 = undefined;
document.addEventListener("dragstart", (event) => {
    // Saves which element is moving.
    myDragElement_2 = event.target;
});

// Drag over - Element that is below the element that is moving.
function eventDragOver(event) {
    // Remove from all elements the class that will show that it is a drop zone.
    event.preventDefault();
    multiSelectorUniqPreview_2
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
    filesList_2 = arraySwapIndex(
        getIndexOfFileList(myDragElement_2.dataset.key, filesList_2),
        getIndexOfFileList(myDropElement.dataset.key, filesList_2),
        filesList_2
    );
    // The content of the input file is updated.
    fileInputMulti_2.files = arrayFilesToFileList(filesList_2);
    // Only DEMO. Changes are redrawn.
    renderPreviews(filesList_2, multiSelectorUniqPreview_2, fileInputMulti_2);
}
