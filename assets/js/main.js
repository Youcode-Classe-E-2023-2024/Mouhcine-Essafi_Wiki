window.addEventListener('DOMContentLoaded', () => {
    let scrollPos = 0;
    const mainNav = document.getElementById('mainNav');
    const headerHeight = mainNav.clientHeight;
    window.addEventListener('scroll', function() {
        const currentTop = document.body.getBoundingClientRect().top * -1;
        if ( currentTop < scrollPos) {
            // Scrolling Up
            if (currentTop > 0 && mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-visible');
            } else {
                console.log(123);
                mainNav.classList.remove('is-visible', 'is-fixed');
            }
        } else {
            // Scrolling Down
            mainNav.classList.remove(['is-visible']);
            if (currentTop > headerHeight && !mainNav.classList.contains('is-fixed')) {
                mainNav.classList.add('is-fixed');
            }
        }
        scrollPos = currentTop;
    });
})

const loginform = document.getElementById("loginForm");
// console.log(loginform);
if (loginform) {
  loginform.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch("index.php?page=login", {
      method: "POST",
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        console.log(data);

        if (data.trim() === 'valide') {
          console.log('Login successful');
          // Redirect to the home page or perform other actions
          window.location.href = "index.php?page=users";
        } else {
          console.log('Login failed');
          // Handle failed login (e.g., display an error message)
        }
      })
      .catch(error => {
        console.error('Error:', error);
        // Handle errors here
      });
  });
}
