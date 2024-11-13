let currentIndex = 0;
const banner = document.querySelector('.page-heading');
const slides = document.querySelectorAll('.page-heading .slide');
const totalSlides = slides.length;
const bannerHeight = banner.offsetHeight; // Lấy chiều cao của banner

function changeSlide() {
    slides[currentIndex].classList.remove('active'); // Ẩn ảnh hiện tại
    currentIndex = (currentIndex + 1) % totalSlides; // Chuyển đến ảnh tiếp theo
    slides[currentIndex].classList.add('active'); // Hiện ảnh mới
}

// Chuyển đổi ảnh mỗi 5 giây
setInterval(changeSlide, 5000);

document.addEventListener("DOMContentLoaded", function() {
    const productItems = document.querySelectorAll('.product-item');

    function checkVisibility() {
        const windowHeight = window.innerHeight;
        const triggerBottom = windowHeight / 5 * 4; // Trigger khi lướt đến 80% chiều cao

        // Kiểm tra khả năng hiển thị của sản phẩm
        productItems.forEach(item => {
            const boxTop = item.getBoundingClientRect().top;

            if (boxTop < triggerBottom) {
                item.classList.add('visible'); // Thêm lớp 'visible'
            } else {
                item.classList.remove('visible'); // Gỡ bỏ lớp 'visible'
            }
        });

        // Kiểm tra khả năng hiển thị của banner
        const bannerBoxTop = banner.getBoundingClientRect().top;
        if (bannerBoxTop < triggerBottom) {
            banner.classList.add('visible'); // Thêm lớp 'visible' cho banner
        } else {
            banner.classList.remove('visible'); // Gỡ bỏ lớp 'visible' cho banner
        }
    }

    window.addEventListener('scroll', checkVisibility);
    checkVisibility(); // Kiểm tra khi tải trang

    let lastScrollTop = 0;
    let scrollTimeout;

    window.addEventListener('scroll', function() {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const threshold = bannerHeight * 0.3; // 30% chiều cao của banner

            if (scrollTop > lastScrollTop) {
                // Lướt xuống
                if (scrollTop > threshold) {
                    // Ẩn banner từ 30% trở đi
                    banner.style.transition = 'opacity 1s ease-in-out'; // Thêm hiệu ứng mượt mà
                    banner.style.opacity = '0'; // Ẩn banner
                }
            } else {
                // Lướt lên
                if (scrollTop < threshold) {
                    // Hiện banner khi cuộn lên và chưa qua 30%
                    banner.style.transition = 'opacity 1s ease-in-out'; // Thêm hiệu ứng mượt mà
                    banner.style.opacity = '1'; // Hiện banner
                }
            }
            lastScrollTop = scrollTop;
        }, 50); // Thay đổi thời gian delay nếu cần
    });
});


// bộ sưu tập
const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
    
    // Handle scrollbar thumb drag
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;
        
        // Update thumb position on mouse move
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;

            // Ensure the scrollbar thumb stays within bounds
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;
            
            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        // Remove event listeners on mouse up
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

     // Show or hide slide buttons based on scroll position
    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    }

    // Update scrollbar thumb position based on image scroll
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }

    // Call these two functions when image list scrolls
    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);


// header
document.addEventListener("DOMContentLoaded", function() {
    const profileIcon = document.querySelector('.user-profile');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Toggle dropdown when profile icon is clicked
    profileIcon.addEventListener('click', function(event) {
        event.preventDefault();
        dropdownMenu.classList.toggle('show');
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function(event) {
        if (!profileIcon.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
});
