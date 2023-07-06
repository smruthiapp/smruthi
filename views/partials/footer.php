<!-- Bottom Navbar -->
<div class="navbar navbar-fixed-bottom container-fluid">
        <a href="<?php echo route('')?>"  class="home fs-8">
            <i class="temple-icon"><img src="<?php assets('img/temple.svg');?>" alt="Temple Icon" class="img-fluid"></i>
            Home
        </a>
        <a href="<?php echo route('read')?>"  class="read fs-8">
            <i class="read-icon"><img src="<?php assets('img/read.svg');?>" alt="Read Icon" class="img-fluid"></i>
            Read
        </a>
        <a href="<?php echo route('saved')?>"  class="saved fs-8">
            <i class="saved-icon"><img src="<?php assets('img/saved.svg');?>" alt="Saved Icon" class="img-fluid"></i>
            Saved
        </a>
        <a href="<?php echo route('profile')?>"  class="profile fs-8">
            <i class="saved-icon"><img src="<?php assets('img/profile.svg');?>" alt="Saved Icon" class="img-fluid"></i>
            Profile
        </a>
    
</div>

    <script>
        const home =document.querySelector('.home')
        const read =document.querySelector('.read')
        const saved =document.querySelector('.saved')
        const profile =document.querySelector('.profile')

        path = window.location.pathname
// Extract the path from the URL
        var path = path.split("/").filter(Boolean)[1];
        switch (path) {
        case "read":
            active('.read')
            break;
        case "saved":
            active('.saved')
            break;
        case "profile":
            active('.profile')
            break;
        default:
            active('.home')
            break;
        }


        function active(icon){
         document.querySelector(icon).classList.add('active')
          const activeIcon = document.querySelector(icon+" img")
          activeIcon.src = activeIcon.src.replace('.svg', '-active.svg')
        }
        
        function truncate(elementSelector, maxLength) {
            const element = document.querySelector(elementSelector);
            
            if (!element) {
                console.error(`Element with selector "${elementSelector}" not found.`);
                return;
            }
            
            const content = element.textContent;
            
            if (content.length <= maxLength) {
                return;
            }
            const truncatedContent = content.slice(0, maxLength) + '...';
            element.textContent = truncatedContent;
        }
    </script>

    
<script>
let prevScrollPos = window.pageYOffset;
const hideElements = document.querySelectorAll(".hideOnScroll");

window.addEventListener("scroll", function() {
  const currentScrollPos = window.pageYOffset;
  
  if (prevScrollPos > currentScrollPos) {
    // Scrolling up
    hideElements.forEach(element => {
      element.classList.remove('d-none')
    });
  } else {
    // Scrolling down
    hideElements.forEach(element => {
      element.classList.add('d-none')
    });
  }
  
  prevScrollPos = currentScrollPos;
});


</script>