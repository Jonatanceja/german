import './bootstrap';

// Uncomment if you need Alpine.js
import Alpine from 'alpinejs'
import example from './components/AlpineExample'
Alpine.data('example', example)
window.Alpine = Alpine
Alpine.start()

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

var slider = new Swiper('.slider', {
    effect: 'fade',
    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
      },
    speed: 2500,
});


import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

Fancybox.bind("[data-fancybox]", {

});

import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..
AOS.init();




