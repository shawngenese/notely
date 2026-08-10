import { getCurrentNoteId, setCurrentNoteId } from "./state.js";
import { loadNotes } from "./notes.js";

let timeout;

export function setupAutoSave(title, content, isFavorite) {
  function autoSave() {
    clearTimeout(timeout);

    timeout = setTimeout(async () => {
      const data = {
        id: getCurrentNoteId(),
        title: title.value,
        content: content.value,
        isFavorite: isFavorite.checked
      };

      try {
        const response = await fetch("../save.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(data),
        });

        const result = await response.json();

        if (!getCurrentNoteId()) {
          setCurrentNoteId(result.id);
          localStorage.setItem("selectedNoteId", result.id);
          // loadNotes(); // refresh sidebar only after new note is saved
        }

        //
          location.reload();
        //
      } catch (error) {
        console.error("Auto-save failed: ", error);
      }
    }, 1000);
  }

  async function saveFavorite() {
     const data = {
        id: getCurrentNoteId(),
        title: title.value,
        content: content.value,
        isFavorite: isFavorite.checked,
      };

      try {
        const response = await fetch("../save.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(data),
        });

        const result = await response.json();

        if (!getCurrentNoteId()) {
          setCurrentNoteId(result.id);
          localStorage.setItem("selectedNoteId", result.id);
          // loadNotes(); // refresh sidebar only after new note is saved
        }
        //
          location.reload();
        //
      } catch (error) {
        console.error("Auto-save failed: ", error);
      }
  }

  title.addEventListener("input", autoSave);
  content.addEventListener("input", autoSave);
  isFavorite.addEventListener("change", saveFavorite);
  
}
