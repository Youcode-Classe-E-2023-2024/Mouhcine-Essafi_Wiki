<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Explore Our Blogs</h1>
                    <span class="subheading">the best blogs ever</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="relative">
    <label for="Search" class="sr-only"> Search </label>
    <select id="search-type">
        <option value="title">Title</option>
        <option value="tag">Tag</option>
    </select>
    <input type="text" id="search-input" placeholder="Search for..." class="w-full rounded-md border-gray-200 py-2.5 pe-10 shadow-sm sm:text-sm" />

    <span class="absolute inset-y-0 end-0 grid w-10 place-content-center">
        <button type="button" id="search-btn" class="text-gray-600 hover:text-gray-700">
            <span class="sr-only">Search</span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </button>
    </span>
</div>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center" id="search-results-container">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php foreach ($wikis as $wiki) : ?>
                <div class="post-preview">
                    <a href="index.php?page=wiki&id=<?= $wiki['id'] ?>">
                        <h2 class="post-title"><?= htmlspecialchars($wiki['title']) ?></h2>
                        <h3 class="post-subtitle"><?= htmlspecialchars(substr($wiki['content'], 0, 25)) ?>...</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!"><?= htmlspecialchars($wiki['author_name']) ?></a> <!-- Assuming you have author's name -->
                        on <?= date('F j, Y', strtotime($wiki['create_at'])) ?>
                    </p>
                </div>
                <hr class="my-4" />
            <?php endforeach; ?>
            <!-- Pager -->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>
<main class="h-screen" id="search-results-container">
</main>

<script>
    const searchInput = document.getElementById("search-input");
    const resultsContainer = document.getElementById("search-results-container");
    const searchType = document.getElementById("search-type");



    searchInput.addEventListener("input", () => {
        console.log(searchType.value);
        if (searchInput.value !== "") {
            getSearchedResults();
        } else
            resultsContainer.innerHTML = "";
    })

    function getSearchedResults() {
        resultsContainer.innerHTML = "";
        $.get(
            "index.php?page=search_bar&search_" + searchType.value + "=true&input_value=" + searchInput.value,
            (data) => {
                let searchedData = JSON.parse(data);

                searchedData.forEach((item) => {
                    console.log(item);
                    resultsContainer.innerHTML += `<div class="post-preview">
                <a href="index.php?page=wiki&id=${item.id}">
                    <h2 class="post-title">${item.title}</h2>
                    <h3 class="post-subtitle">${item.content}...</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">${item.author_name}</a>
                    on ${item.create_at}
                </p>
            </div>`;
                });
            }
        );


    }
</script>