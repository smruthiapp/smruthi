<footer class="footer my-5 text-center">
  <h6>Developed By <strong>Amara Vaani Linguistic Technologies</strong></h6>
</footer>

<!-- Bottom Navbar -->
<div class="navbar navbar-fixed-bottom container-fluid">
        <a href="<?php echo route('')?>"  class="home">
            <i class="temple-icon"><img src="<?php assets('img/temple.svg');?>" alt="Temple Icon" class="img-fluid"></i>
            Home
        </a>
        <a href="<?php echo route('read')?>"  class="read">
            <i class="read-icon"><img src="<?php assets('img/read.svg');?>" alt="Read Icon" class="img-fluid"></i>
            Read
        </a>
        <a href="<?php echo route('saved')?>"  class="saved">
            <i class="saved-icon"><img src="<?php assets('img/saved.svg');?>" alt="Saved Icon" class="img-fluid"></i>
            Saved
        </a>
        <a href="<?php echo route('profile')?>"  class="profile">
            <i class="saved-icon"><img src="<?php assets('img/profile.svg');?>" alt="Saved Icon" class="img-fluid"></i>
            Profile
        </a>
    
</div>

    <script>
        const home =document.querySelector('.home')
        const read =document.querySelector('.read')
        const saved =document.querySelector('.saved')
        const profile =document.querySelector('.profile')
        function active(icon){
         document.querySelector(icon).classList.add('active')
          const activeIcon = document.querySelector(icon+" img")
          activeIcon.src = activeIcon.src.replace('.svg', '-active.svg')
        }
    </script>