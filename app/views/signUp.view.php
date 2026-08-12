<?php require(BASE_PATH . "views/partials/header.php") ?>

    <div class="flex min-h-screen bg-black">
      <div
        class="hidden md:w-full xl:flex flex-col justify-between p-12 bg-blue-500 text-white">
        <div class="flex gap-2 items-center">
          <div class="text-transparent stroke-white">
              <?php require 'assets/svg/notely-logo.svg' ?>
          </div>
          <p class="text-2xl font-semibold text-white">Notely</p>
        </div>
        <div class="p-4">
            <img
            src="<?= 'assets/images/working-man.jpg' ?>"
            alt="working man"
            class="rounded-3xl w-full my-6 aspect-video object-cover" 
            loading="lazy"/>
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
                </p
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
        <!-- Sign Up Form -->

        <div class="md:w-1/2" id="signUpForm">
          <div class="flex gap-2 items-center mb-8 xl:hidden">
            <div class="text-transparent stroke-blue-700">
              <?php require 'assets/svg/notely-logo.svg' ?>
            </div>
            <p class="text-xl font-semibold">Notely</p>
          </div>

          <h1 class="text-2xl font-semibold lg:text-3xl mb-1">
            Create account
          </h1>
          <p class="text-zinc-500 text-md">Start capturing your ideas today</p>

          <form action="" class="flex flex-col gap-5 my-12" method="POST">
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
                value="<?php echo htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES); ?>"
                placeholder="Min. 6 characters"
                class="form-control bg-neutral border text-md rounded-md bg-zinc-50 focus:ring-2 block w-full px-3 py-2.5 shadow-xs placeholder:text-md outline-none transition-all" />
                <p class="text-red-500 text-sm font-semibold"><?= $registerError['password'] ?? '' ?></p>
            </div>
            <button
              type="submit"
              name="submit"
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
        <?php require("assets/svg/loading.svg") ?>
        <p class="">Redirecting. Please wait :)</p>
    </div>

    <script>
        // document.querySelector("#loadingScreen").classList.toggle("hidden");
    </script>

<?php require(BASE_PATH . "views/partials/footer.php") ?>