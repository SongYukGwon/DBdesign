var swiper = new Swiper(".mySwiper", {
  // A. 옵션 설정
  slidesPerView: 3, // 한 슬라이드만 출력
  loop: true, // 무한 루프
  // B. 좌우 버튼 설정
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  // C. 페이지 네이션 설정
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // D. 슬라이드 스크롤 설정
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});
