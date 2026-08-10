import { loadNotes } from "./notes.js";
import { setupAutoSave } from "./autosave.js";
import { getCurrentNoteId, setCurrentNoteId } from "./state.js";
import { setupSidebar } from "./sidebar.js";

const title = document.querySelector("#title");
const content = document.querySelector("#content");
const createNew = document.querySelector("#createNew");
const favorite = document.querySelector("#favorite");
const deleteNote = document.querySelector("#delete");
const noteTime = document.querySelector("#noteTime");

window.addEventListener("load", () => {
  loadNotes();
});

setupSidebar();
setupAutoSave(title, content, favorite);

createNew.addEventListener("click", createNewNote);

function createNewNote() {
  setCurrentNoteId(null);

  title.value = "";
  content.value = "";
  noteTime.textContent = "";
  favorite.checked = false;
  document.querySelector("#favoriteIcon").classList.remove("fill-yellow-500");

  localStorage.removeItem("selectedNoteId"); // clear selection
  title.focus();

// const menu = document.querySelector("#menu");
// const sidebar = document.querySelector("#sidebar");
// const notePreview = document.querySelector("#notePreview");
// sidebar.classList.add("w-80");
// sidebar.classList.remove("w-full");
// notePreview.classList.remove('hidden');
// notePreview.classList.add("w-full");
}

deleteNote.addEventListener("click", () => {
  async function deleteCurrentNote() {
    const response = await fetch("../save.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "delete", id: getCurrentNoteId() }),
    });
    const data = await response.json();
    console.log(data);
    loadNotes(); // refresh sidebar after deletion
  }

  if (getCurrentNoteId()) {
    deleteCurrentNote();
    localStorage.removeItem("selectedNoteId");
    setCurrentNoteId(null);
    title.value = "";
    content.value = "";
    noteTime.textContent = "";
    favorite.checked = false;
  }
})

// const note = document.querySelectorAll("#note");
// const aside = document.querySelector("aside");
// aside.classList.remove("w-full");
// aside.classList.add('hidden');

// note.forEach(item => {
//   item.addEventListener('click', () => {

//     console.log('clicked')
//   })
// });
