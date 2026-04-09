function goToPage(url) {
  const fade = document.getElementById("page-fade");
  if (!fade) return;

  fade.classList.remove("hide");

  setTimeout(() => {
    window.location.href = url;
  }, 600);
}

// PAGE LOAD → BUKA OVERLAY
window.addEventListener("load", () => {
  const fade = document.getElementById("page-fade");
  if (!fade) return;


  setTimeout(() => {
    fade.classList.add("hide");
  }, 50);
});

// REVEAL ON SCROLL
document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal");
  let lastScrollY = window.scrollY;

  function revealOnScroll() {
    const windowHeight = window.innerHeight;
    const revealPoint = 150;
    const currentScrollY = window.scrollY;
    const scrollingDown = currentScrollY > lastScrollY;

    if (scrollingDown) {
      reveals.forEach(el => {
        const rect = el.getBoundingClientRect();

        const isVisible =
          rect.top < windowHeight - revealPoint;

        if (isVisible && !el.classList.contains("active")) {
          el.classList.add("active");
        }
      });
    }

    lastScrollY = currentScrollY;
  }

  window.addEventListener("scroll", revealOnScroll);
});

// SKILLS ANIMATION
const skills = document.querySelectorAll('.skill-item');
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      skills.forEach((skill, index) => {
        setTimeout(() => {
          skill.classList.add('show');
        }, index * 150);
      });
      observer.disconnect();
    }
  });
}, { threshold: 0.3 });

observer.observe(document.querySelector('.skills-list'));

// MASONRY LAYOUT & REVEAL FOR SKETCH IMAGES
document.addEventListener("DOMContentLoaded", () => {
  const images = document.querySelectorAll(".sketch-grid .sketch-img.reveal");

  function setMasonrySpan(img) {
    const parent = img.parentElement;
    const rowHeight = parseInt(getComputedStyle(parent).getPropertyValue("grid-auto-rows"));
    const rowGap = parseInt(getComputedStyle(parent).getPropertyValue("gap"));
    const rowSpan = Math.ceil((img.getBoundingClientRect().height + rowGap) / (rowHeight + rowGap));
    img.style.gridRowEnd = `span ${rowSpan}`;
  }

  function revealImages() {
    const windowHeight = window.innerHeight;
    images.forEach((img, index) => {
      const rect = img.getBoundingClientRect();
      if (rect.top < windowHeight - 120 && !img.classList.contains("active")) {
        setTimeout(() => {
          img.classList.add("active");
          setMasonrySpan(img);
        }, index * 150);
      }
    });
  }

  window.addEventListener("scroll", revealImages);
  window.addEventListener("resize", () => {
    images.forEach(img => img.classList.contains("active") && setMasonrySpan(img));
  });

  revealImages();
});
