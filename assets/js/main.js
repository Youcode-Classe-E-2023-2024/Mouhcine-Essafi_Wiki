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

if (loginform) {
  loginform.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch("index.php?page=login", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() === 'Login successful') {
          console.log('Login successful');
          alertComponent().showAlert(data.trim());
          // window.location.href = "index.php?page=users";
        } else {
          // console.log('Login not successful');
          // Handle other cases (invalid email, email not registered, invalid password)
          alertComponent().showAlert(data.trim());
        }
      })
      .catch((error) => {
        console.error('Error:', error);
        // Handle errors here
      });
  });
}

function alertComponent() {
  return {
    openAlertBox: false,
    alertBackgroundColor: '',
    alertMessage: '',
    showAlert(type) {
      this.openAlertBox = true;
      switch (type) {
        case 'Invalid Email':
          this.alertBackgroundColor = 'bg-green-500';
          this.alertMessage = `${this.infoIcon} ${this.defaultInfoMessage}`;
          break;
        case 'Email not registered':
          this.alertBackgroundColor = 'bg-blue-500';
          this.alertMessage = `${this.infoIcon} ${this.defaultInfoMessage}`;
          break;
        case 'Invalid password':
          this.alertBackgroundColor = 'bg-yellow-500';
          this.alertMessage = `${this.warningIcon} ${this.defaultWarningMessage}`;
          break;
        case 'Login successful':
          this.alertBackgroundColor = 'bg-red-500';
          this.alertMessage = `${this.dangerIcon} ${this.defaultDangerMessage}`;
          break;
        default:
          // Handle unexpected cases
          break;
      }
      this.openAlertBox = true;
    },
    successIcon: `<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 text-white"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`,
    infoIcon: `<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 text-white"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`,
    warningIcon: `<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 text-white"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>`,
    dangerIcon: `<svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 text-white"><path d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>`,
    defaultInfoMessage: `This alert contains info message.`,
    defaultSuccessMessage: `This alert contains success message.`,
    defaultWarningMessage: `This alert contains warning message.`,
    defaultDangerMessage: `This alert contains danger message.`,
  };
}
