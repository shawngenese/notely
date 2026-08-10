export function setupSidebar() {
  const menu = document.querySelector("#menu");
  const sidebar = document.querySelector("#sidebar");

  menu.addEventListener("click", () => {
    sidebar.classList.toggle("w-0");
    sidebar.classList.toggle("w-80");
  });
};
// export function setupSidebar() {
//   const menu = document.querySelector("#menu");
//   const sidebar = document.querySelector("#sidebar");

//   const notePreview = document.querySelector("#notePreview");

//   menu.addEventListener("click", () => {
//     // sidebar.classList.toggle("w-0");
//     // sidebar.classList.toggle("w-80");
//     sidebar.classList.remove("hidden");
//     sidebar.classList.add("w-full");
//     notePreview.classList.add('hidden');
//     notePreview.classList.add("w-full");
//   });
// };