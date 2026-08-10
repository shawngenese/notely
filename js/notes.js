import { timeAgo } from "./timeAgo.js";
import { getCurrentNoteId, setCurrentNoteId } from "./state.js";

const notesList = document.querySelector("#notesList");

export async function loadNotes() {
  const response = await fetch("../load.php");
  const notes = await response.json();

  // Sort favorites first, then newest
  notes.sort((a, b) => {
    const favA = a.isFavorite ? 1 : 0;
    const favB = b.isFavorite ? 1 : 0;
    if (favA !== favB) return favB - favA;
    return new Date(b.updated_at) - new Date(a.updated_at);
  });

  notesList.innerHTML = "";

  const selectedNoteId = localStorage.getItem("selectedNoteId");
  const title = document.querySelector("#title");
  const content = document.querySelector("#content");
  const noteTime = document.querySelector("#noteTime");
  const favorite = document.querySelector("#favorite");
  const favoriteIcon = document.querySelector("#favoriteIcon");

  notes.forEach((note) => {
    const div = document.createElement("div");
    div.className = "p-2 rounded-md hover:bg-blue-50 cursor-pointer transition";

    // recently added
    div.id = "note";

    div.innerHTML = `
      <span class="flex justify-between">
        <p class="text-lg font-semibold truncate">${note.title || "Untitled"}</p>
        <p class="text-yellow-500 font-bold text-xl">${note.isFavorite ? "&starf;" : ""}</p>
      </span>
      <p class="text-sm text-slate-500 truncate">${note.content || "[DRAFT]"}</p>
      <p class="note-time text-xs text-blue-800 mt-1 text-right" data-time="${note.updated_at}">
        ${timeAgo(note.updated_at) || ""}
      </p>
    `;

    // Restore selected note after refresh
    if (String(note.id) === selectedNoteId) {
      div.classList.add("bg-blue-100");
      title.value = note.title;
      content.value = note.content;
      noteTime.textContent = timeAgo(note.updated_at);
      favorite.checked = note.isFavorite;

      setCurrentNoteId(note.id);
    }

// Update favorite icon
if (favorite.checked) {
  favoriteIcon.classList.add("fill-yellow-500");
} else {
  favoriteIcon.classList.remove("fill-yellow-500");
}

    div.addEventListener("click", () => {
      document.querySelectorAll("#notesList > div").forEach((el) => {
        el.classList.remove("bg-blue-100");
        el.classList.add("hover:bg-blue-50");

// const sidebar = document.querySelector("#sidebar");
// const notePreview = document.querySelector("#notePreview");
// sidebar.classList.remove("w-full");
// sidebar.classList.add('hidden');
// notePreview.classList.remove('hidden');
// notePreview.classList.add('w-full')
      });
      
    loadNotes();
    div.classList.add("bg-blue-100");
    div.classList.remove("hover:bg-blue-50");

    setCurrentNoteId(note.id);
    localStorage.setItem("selectedNoteId", note.id);

    title.value = note.title;
    content.value = note.content;
    noteTime.textContent = timeAgo(note.updated_at);
    favorite.checked = note.isFavorite;

    // // Update favorite icon
    // if (favorite.checked) {
    //   favoriteIcon.classList.add("fill-yellow-500");
    // } else {
    //   favoriteIcon.classList.remove("fill-yellow-500");
    // }

  });

  notesList.appendChild(div);
  });
}
