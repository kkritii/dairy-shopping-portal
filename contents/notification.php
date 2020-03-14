<section id="notification-bar" class="section-notification-bar" >
            <div class="notification">
                    <div class="block-1">
                        <span class="notification--emoji">
                            BISKET OFFER
                        </span>
                        <span> | </span>
                        <span class="notification--text">
                            Buy products more than 2000Rs
                            to get free Delivery😍
                        </span>
                    </div>
                    <div class="block-2"> 
                        <span>Offer ends in : </span>
                        <span id="count-down"></span>
                    </div>
                
            </div>
            <span class="notification--close-btn" onclick="" id="close">
                <i class="lnr lnr-cross"> 
                    <svg class="icon-cross">
                        <use xlink:href="./imgs/icons/sprite.svg#icon-cross"></use>
                    </svg>
                </i>
            </span>
 </section>
  <!-- notification script -->
  <script>
            let countDownTime = new Date("April 12, 2020 10:00:00").getTime();
            let now = new Date().getTime();
            let timeDistance = countDownTime - now;
            let days = Math.floor(timeDistance/(1000 * 60 * 60 * 24));
            let hr = Math.floor(timeDistance % (1000 * 60 * 60 * 24) / (1000 *60*60));
            let min = Math.floor(timeDistance % (1000 * 60 * 60) / (1000 *60));
            let sec = Math.floor(timeDistance % (1000 * 60) / 1000);
            document.getElementById("count-down").innerHTML = days + " days : " + hr + " hours :" + min + " minutes :" + sec + " seconds";

            let countDownFunction = setInterval(function(){
                let now = new Date().getTime();
                let timeDistance = countDownTime - now;
                let days = Math.floor(timeDistance/(1000 * 60 * 60 * 24));
                let hr = Math.floor(timeDistance % (1000 * 60 * 60 * 24) / (1000 *60*60));
                let min = Math.floor(timeDistance % (1000 * 60 * 60) / (1000 *60));
                let sec = Math.floor(timeDistance % (1000 * 60) / 1000);
                document.getElementById("count-down").innerHTML = days + " days : " + hr + " hours :" + min + " minutes :" + sec + " seconds";
                if(timeDistance < 0){
                    document.getElementById("count-down").innerHTML = "offer Ended";
                }
            },1000);
</script>
<!-- end of notification script  -->