let currentNoteId = null;
let currentUser = null;

export function getCurrentNoteId() {
    return currentNoteId;
};

export function setCurrentNoteId(id) {
    currentNoteId = id;
}
