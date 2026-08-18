<?php require('Database.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notely</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    svg {
        height: inherit;
        width: inherit;
    }
</style>
</head>
<body>
    
    <div class="flex min-h-screen bg-black">
      <div
        class="hidden md:w-full xl:flex flex-col justify-between p-12 bg-blue-500 text-white">
        <div class="flex gap-2 items-center">
          <div class="text-transparent stroke-white">
              <?php require 'notely-logo.svg' ?>
          </div>
          <p class="text-2xl font-semibold text-white">Notely</p>
        </div>
        <div class="p-4">
          <img
            src="<?= 'working-man.jpg' ?>"
            alt="working man"
            class="rounded-3xl w-full my-6 aspect-video object-cover" />
          <p class="">
            "The faintest ink is more powerful than the strongest memory."
          </p>
          <small class="text-zinc-300">— Shawn Genese</small>
        </div>
        <div>
          <ul class="list-disc flex flex-col gap-2">
            <li>
              <p>Capture ideas instantly</p>
              <p class="text-zinc-300 text-sm">
                Jot down thoughts before they slip away
              </p>
            </li>
            <li>
              <p>Stay organized</p>
              <p class="text-zinc-300 text-sm">
                Everything in one place always accessible
              </p>
            </li>
            <li>
              <p>Sync across devices</p>
              <p class="text-zinc-300 text-sm">
                Access your notes anywhere, anytime
              </p>
            </li>
          </ul>
        </div>
      </div>

      <!-- Forms -->

      <div class="bg-white w-full flex justify-center items-center">
        <!-- Sign In Form -->

        <div class="hidden md:w-1/2" id="signInForm">
          <div class="flex gap-2 items-center mb-8 xl:hidden">
            <div class="text-transparent stroke-blue-700">
              <?php require 'notely-logo.svg' ?>
            </div>
            <p class="text-xl font-semibold">Notely</p>
          </div>

          <h1 class="text-2xl font-semibold lg:text-3xl mb-1">Welcome back</h1>
          <p class="text-zinc-500 text-md">
            Sign in to continue to your notes.
          </p>

          <form action="login.php" class="flex flex-col gap-5 my-12" method="POST" id="formSignIn">
            <p class="text-red-500 text-center font-semibold"><?= $loginError['loginError'] ?? '' ?></p>
            <input type="hidden" name="SIGN_IN">
            <div class="form-group flex flex-col">
              <label for="" class="block mb-2.5 text-sm font-medium"
              >Email address</label
              >
              <input
              type="text"
              name="username"
              id="email"
              value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>"
              placeholder="johndoe@gmail.com"
              class="form-control bg-neutral border text-md rounded-md bg-zinc-50 focus:ring-2 <?= isset($loginError['loginError']) ? 'outline-red-500 focus:ring-transparent' : '' ?> block w-full px-3 py-2.5 shadow-xs placeholder:text-md outline-none transition-all" />
              <p class="text-red-500 text-sm font-semibold"><?= $loginError['email'] ?? '' ?></p>
            </div>
            <div class="form-group flex flex-col">
                <label for="" class="block mb-2.5 text-sm font-medium"
                >Password</label
                >
                <input
                type="password"
                name="password"
                id="password"
                placeholder="••••••"
                value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>"
                class="form-control bg-neutral border text-md rounded-md bg-zinc-50 focus:ring-2 <?= isset($loginError['loginError']) ? 'outline-red-500 focus:ring-transparent' : '' ?> block w-full px-3 py-2.5 shadow-xs placeholder:text-md outline-none transition-all" />
                <p class="text-red-500 text-sm font-semibold"><?= $loginError['password'] ?? '' ?></p>
            </div>
            <a
              href=""
              class="text-blue-600 text-end font-semibold hover:underline"
              >Forgot password?</a
            >
            <button
              type="submit"
              id="submitBtn"
              class="bg-blue-600 rounded-lg text-white p-2 w-full font-semibold hover:bg-blue-500 transition-all active:bg-blue-400">
              Sign in
            </button>
          </form>
          <p class="text-center">
            Don't you have an account?
            <a
              href="/signup"
              class="text-blue-600 font-semibold hover:underline"
              id="signUp"
              >Sign up</a
            >
          </p>
        </div>

        <!-- Sign Up Form -->

        <div class="md:w-1/2" id="signUpForm">
          <div class="flex gap-2 items-center mb-8 xl:hidden">
            <div class="text-transparent stroke-blue-700">
              <?php require 'notely-logo.svg' ?>
            </div>
            <p class="text-xl font-semibold">Notely</p>
          </div>

          <h1 class="text-2xl font-semibold lg:text-3xl mb-1">
            Create account
          </h1>
          <p class="text-zinc-500 text-md">Start capturing your ideas today</p>

          <form action="register.php" class="flex flex-col gap-5 my-12" method="POST">
            <p class="text-red-500 text-center font-semibold"><?= $registerError['registerError'] ?? '' ?></p>
            <input type="hidden" name="SIGN_UP">
            <div class="form-group flex flex-col">
              <label for="" class="block mb-2.5 text-sm font-medium"
                >Full name</label
              >
              <input
                type="text"
                name="name"
                id="name"
                placeholder="John Doe Dimatibag"
                value="<?php echo htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES); ?>"
                class="form-control bg-neutral border text-md rounded-md bg-zinc-50 focus:ring-2 block w-full px-3 py-2.5 shadow-xs placeholder:text-md outline-none transition-all" />
                <p class="text-red-500 text-sm font-semibold"><?= $registerError['name'] ?? '' ?></p>
              </div>
            <div class="form-group flex flex-col">
              <label for="" class="block mb-2.5 text-sm font-medium"
                >Email address</label
              >
              <input
                type="email"
                name="username"
                id="email"
                placeholder="johndoe@gmail.com"
                value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>"
                class="form-control bg-neutral border text-md rounded-md bg-zinc-50 focus:ring-2 <?= isset($registerError['registerError']) ? 'outline-red-500 focus:ring-transparent' : '' ?> block w-full px-3 py-2.5 shadow-xs placeholder:text-md outline-none transition-all" />
                <p class="text-red-500 text-sm font-semibold"><?= $registerError['email'] ?? '' ?></p>
            </div>
            <div class="form-group flex flex-col">
              <label for="" class="block mb-2.5 text-sm font-medium"
                >Password</label
              >
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Min. 6 characters"
                value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>"
                class="form-control bg-neutral border text-md rounded-md bg-zinc-50 focus:ring-2 block w-full px-3 py-2.5 shadow-xs placeholder:text-md outline-none transition-all" />
                <p class="text-red-500 text-sm font-semibold"><?= $registerError['password'] ?? '' ?></p>
            </div>
            <button
              type="submit"
              id="submitBtn"
              class="bg-blue-600 rounded-lg text-white p-2 w-full font-semibold hover:bg-blue-500 transition-all active:bg-blue-400">
              Create account
            </button>
          </form>
          <p class="text-center">
            Already have an account?
            <a
              href="/login"
              class="text-blue-600 font-semibold hover:underline"
              id="signIn"
              >Sign in</a
            >
          </p>
        </div>
      </div>
    </div>

    
    <div id="loadingScreen" class="hidden fixed inset-0 flex flex-col items-center justify-center text-blue-500 bg-teal-50 bg-opacity-50">
        <svg 
            class="fill-current"
            xmlns="http://www.w3.org/2000/svg" 
            width="100" height="100" 
            viewBox="0 0 24 24">
            <rect width="7.33" height="7.33" x="1" y="1" fill="currentColor">
                <animate id="SVGzjrPLenI" attributeName="x" begin="0;SVGXAURnSRI.end+0.2s" dur="0.6s" values="1;4;1"/>
                <animate attributeName="y" begin="0;SVGXAURnSRI.end+0.2s" dur="0.6s" values="1;4;1"/>
                <animate attributeName="width" begin="0;SVGXAURnSRI.end+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="0;SVGXAURnSRI.end+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="8.33" y="1" fill="currentColor"><animate attributeName="x" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="8.33;11.33;8.33"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="1;4;1"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="1" y="8.33" fill="currentColor">
                <animate attributeName="x" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="1;4;1"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="8.33;11.33;8.33"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.1s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="15.66" y="1" fill="currentColor">
                <animate attributeName="x" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="15.66;18.66;15.66"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="1;4;1"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="8.33" y="8.33" fill="currentColor">
                <animate attributeName="x" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="8.33;11.33;8.33"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="8.33;11.33;8.33"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="1" y="15.66" fill="currentColor">
                <animate attributeName="x" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="1;4;1"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="15.66;18.66;15.66"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.2s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="15.66" y="8.33" fill="currentColor">
                <animate attributeName="x" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="15.66;18.66;15.66"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="8.33;11.33;8.33"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="8.33" y="15.66" fill="currentColor">
                <animate attributeName="x" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="8.33;11.33;8.33"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="15.66;18.66;15.66"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.3s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
            <rect width="7.33" height="7.33" x="15.66" y="15.66" fill="currentColor">
                <animate id="SVGXAURnSRI" attributeName="x" begin="SVGzjrPLenI.begin+0.4s" dur="0.6s" values="15.66;18.66;15.66"/>
                <animate attributeName="y" begin="SVGzjrPLenI.begin+0.4s" dur="0.6s" values="15.66;18.66;15.66"/>
                <animate attributeName="width" begin="SVGzjrPLenI.begin+0.4s" dur="0.6s" values="7.33;1.33;7.33"/>
                <animate attributeName="height" begin="SVGzjrPLenI.begin+0.4s" dur="0.6s" values="7.33;1.33;7.33"/>
            </rect>
        </svg>
        <p class="">Redirecting. Please wait :)</p>
    </div>

    <script src="Auth.js">
    // const signInForm = document.getElementById('signInForm');
    // const signUpForm = document.getElementById('signUpForm');

    // document.getElementById('signUp').addEventListener('click', e => {
    //     e.preventDefault();
    //     signInForm.classList.add('hidden');
    //     signUpForm.classList.remove('hidden');
    // });

    // document.getElementById('signIn').addEventListener('click', e => {
    //     e.preventDefault();
    //     signUpForm.classList.add('hidden');
    //     signInForm.classList.remove('hidden');
    // });
    </script>

</body>
</html>