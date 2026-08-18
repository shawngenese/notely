<?php
// para sa dynamic na username and name sa sidebar
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notely </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
  <body class="bg-slate-100 flex">
      <!-- class="h-screen w-full md:w-80 bg-white shadow-md flex flex-col transform transition-all duration-300 ease-in-out overflow-hidden" -->
    <aside
      id="sidebar"
      class="h-screen w-80 bg-white shadow-md flex flex-col transform transition-all duration-300 ease-in-out overflow-hidden"
    >
      <div class="flex flex-col gap-4 py-6 px-5">
        <div class="flex justify-between pb-4">
          <!-- Notely Logo -->
          <div class="text-transparent stroke-blue-700 flex items-center gap-1">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="27"
              height="27"
              viewBox="0 0 24 24"
              class="fill-current"
            >
              <path
                fill=""
                class="fill-current"
                stroke=""
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M15.5 2v3m-9-3v3M11 2v3m8 7v-1.5c0-3.3 0-4.95-1.025-5.975S15.3 3.5 12 3.5h-2c-3.3 0-4.95 0-5.975 1.025S3 7.2 3 10.5V15c0 3.3 0 4.95 1.025 5.975S6.7 22 10 22h1m-4-7h4m-4-4h8m.737 10.653L14 22l.347-1.737c.07-.352.244-.676.499-.93l4.065-4.066a.91.91 0 0 1 1.288 0l.534.534a.91.91 0 0 1 0 1.288l-4.065 4.065a1.8 1.8 0 0 1-.931.499"
              />
            </svg>
            <p class="text-black font-semibold text-xl">Notely</p>
          </div>
          <div
            id="createNew"
            class="bg-slate-50 px-2 text-blue-700 font-semibold shadow rounded cursor-pointer active:translate-y-0.5"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
            >
              <path
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 12h14m-7-7v14"
              />
            </svg>
          </div>
        </div>
        <div
          class="flex bg-slate-100 rounded-lg ring-1 ring-slate-300 p-1 gap-2"
        >
          <svg
            class="fill-slate-300"
            xmlns="http://www.w3.org/2000/svg"
            width="25"
            height="25"
            viewBox="0 0 20 20"
          >
            <path
              fill="full-current"
              fill-rule="evenodd"
              d="M9 3.5a5.5 5.5 0 1 0 0 11a5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"
              clip-rule="evenodd"
            />
          </svg>
          <input id="searchNote" type="text" class="outline-none" placeholder="Search" />
        </div>
        <div class="category space-y-2">
          <button class="px-2 py-1 bg-blue-700 rounded-xl text-sm text-white">
            All
          </button>
          <button
            class="px-2 py-1 bg-slate-200 rounded-xl text-sm text-slate-500"
          >
            Work
          </button>
          <button
            class="px-2 py-1 bg-slate-200 rounded-xl text-sm text-slate-500"
          >
            Personal
          </button>
          <button
            class="px-2 py-1 bg-slate-200 rounded-xl text-sm text-slate-500"
          >
            Ideas
          </button>
          <button
            class="px-2 py-1 bg-slate-200 rounded-xl text-sm text-slate-500"
          >
            To-do
          </button>
        </div>
      </div>
      <div
        id="notesList"
        class="h-full px-2 space-y-2 overflow-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-slate-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-400"
      >
      </div>
      <div
        class="w-full flex items-center gap-2 p-5 border-t border-slate-300 bg-slate-50"
      >
        <div
          class="block px-3 py-2 bg-slate-500 rounded-full text-white font-semibold"
        >
          <?php echo mb_substr($_SESSION['name'], 0, 2) ?>
        </div>
        <div class="flex-1 truncate">
          <div class="truncate font-semibold"><?= $_SESSION['username'] ?></div>
          <div class="text-sm text-slate-500 truncate">
            <?= $_SESSION['name'] ?>
          </div>
        </div>
        <form action="logout.php">
          <button
          type="submit"
            class="fill-slate-500 hover:fill-red-500 cursor-pointer">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="28"
              height="28"
              viewBox="0 0 20 20"
            >
              <path
                fill=""
                fill-rule="evenodd"
                d="M3 3a1 1 0 0 0-1 1v12a1 1 0 1 0 2 0V4a1 1 0 0 0-1-1m10.293 9.293a1 1 0 0 0 1.414 1.414l3-3a1 1 0 0 0 0-1.414l-3-3a1 1 0 1 0-1.414 1.414L14.586 9H7a1 1 0 1 0 0 2h7.586z"
                clip-rule="evenodd"
              />
            </svg>
          </button>
        </form>
      </div>
    </aside>
    <div class="w-full flex flex-col">
    <!-- <div id="notePreview" class="hidden md:w-full md:flex flex flex-col"> -->
      <div
        class="navbar sticky top-0 flex justify-between items-center px-5 h-15 bg-white shadow-sm"
      >
        <div class="flex items-center gap-2">
          <div class="stroke-blue-700 hover:cursor-pointer" id="menu">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              viewBox="0 0 24 24"
            >
              <path
                fill=""
                stroke=""
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </div>
          <div>
            <form class="max-w-sm mx-auto">
              <select id="" class="outline-none font-semibold">
                <option value="">Personal</option>
                <option value="">Work</option>
                <option value="">Ideas</option>
                <option value="">To-do</option>
              </select>
            </form>
          </div>
        </div>
        <div class="flex gap-2">
          <div id="noteTime" class=""></div>
          <input type="checkbox" id="favorite" hidden>
          <label id="favoriteIcon" for="favorite" class="stroke-yellow-500 fill-transparent">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              viewBox="0 0 24 24"
            >
              <path
                fill="fill-current"
                stroke=""
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.12 2.12 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.12 2.12 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.12 2.12 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.12 2.12 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.12 2.12 0 0 0 1.597-1.16z"
              />
            </svg>
          </label>
          <button type="button" class="stroke-slate-400 hover:stroke-red-500" id="delete">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              viewBox="0 0 24 24"
            >
              <path
                fill="none"
                stroke=""
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 11v6m4-6v6m5-11v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"
              />
            </svg>
          </button>
        </div>
      </div>
      <form id="saveForm" class="flex-1 flex flex-col" method="POST">
        <input
          id="title"
          name="title"
          type="text"
          class="outline-none text-3xl font-semibold px-12 py-8 shadow"
          placeholder="Untitled"
        />
        <textarea
          id="content"
          name="content"
          placeholder="Type Something..."
          class="border-none outline-none text-lg px-12 border flex-1 py-4 [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-slate-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-400"
        ></textarea>
        <!-- <button type="submit" class="fixed bottom-10 right-10 bg-blue-700 stroke-white rounded-3xl p-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 24 24"
          >
            <path
              fill="none"
              stroke=""
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M20 6L9 17l-5-5"
            />
          </svg>
        </button> -->
      </form>
    </div>
    <script type="module" src="js/app.js"></script>
  </body>
</html>
