import lightGallery from 'lightgallery';

// Plugins
import lgThumbnail from 'lightgallery/plugins/thumbnail'
import lgZoom from 'lightgallery/plugins/zoom'
import lgAutoplay from 'lightgallery/plugins/autoplay'
import lgHash from 'lightgallery/plugins/hash'
import lgRotate from 'lightgallery/plugins/rotate'


lightGallery(document.getElementById('animated-thumbnails'), {
    plugins: [lgZoom, lgThumbnail, lgAutoplay, lgHash, lgRotate],
    speed: 500,
    mode: 'lg-fade',
    galleryId: "nature",
    thumbnail: true,
    width: '300px',
    hash: true,
    customSlideName: true,
});
